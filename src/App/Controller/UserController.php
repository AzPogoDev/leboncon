<?php


namespace App\Controller;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;

use App\Aware\TwigAware;
use App\Aware\TwigAwareTrait;

use App\Aware\UserRepositoryAware;
use App\Aware\UserRepositoryAwareTrait;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController implements RequestAware, TwigAware, UserRepositoryAware
{

    use RequestAwareTrait;
    use TwigAwareTrait;
    use UserRepositoryAwareTrait;

    public function signUp()
    {
        $signUpForm = [];
        $signUpFormErrors = [];

        if ($this->request->request->has('signUpForm')) {
            $signUpForm = $this->request->request->get('signUpForm');

            if (!isset($signUpForm['emailAddress']) || empty($signUpForm['emailAddress'])) {
                $signUpFormErrors['emailAddress'] = 'Ce champ est requis';
            }
            if (!isset($signUpForm['plainPassword']) || empty($signUpForm['plainPassword'])) {
                $signUpFormErrors['plainPassword'] = 'Ce champ est requis';
            }
            if (!isset($signUpForm['plainPasswordRepeat']) || empty($signUpForm['plainPasswordRepeat'])) {
                $signUpFormErrors['plainPasswordRepeat'] = 'Ce champ est requis';
            }
            if (!isset($signUpForm['nickName']) || empty($signUpForm['nickName'])) {
                $signUpFormErrors['nickName'] = 'Ce champ est requis';
            }

            if (count($signUpFormErrors) === 0) {
                if ($signUpForm['plainPassword'] !== $signUpForm['plainPasswordRepeat']) {
                    $signUpFormErrors['plainPasswordRepeat'] = 'Les mots de passes ne correspondent pas';
                }

                if (false === filter_var($signUpForm['emailAddress'], FILTER_VALIDATE_EMAIL)) {
                    $signUpFormErrors['emailAddress'] = 'Ce n\'est pas une adresse e-mail valide';
                }
            }

            if (count($signUpFormErrors) === 0) {
                $user = new User();
                $user->setNickName($signUpForm['nickName']);
                $user->setEmailAddress($signUpForm['emailAddress']);
                $user->setPlainPassword(password_hash($signUpForm['plainPassword'], PASSWORD_ARGON2I));

                $this->Userrepo->persist($user);

                return new RedirectResponse('/sign-in?emailAddress=' . $user->getEmailAddress());
            }
        }

        return new Response(
            $this->twig->render(
                'signUp.html.twig',
                [
                    'signUpForm' => $signUpForm,
                    'signUpFormErrors' => $signUpFormErrors,
                ]
            )
        );
    }

    public function signIn()
    {
        $signInForm = [
            'emailAddress' => $this->request->query->get('emailAddress'),
        ];
        $signInFormErrors = [];

        if ($this->request->request->has('signInForm')) {
            $signInForm = $this->request->request->get('signInForm');

            if (!isset($signInForm['emailAddress']) || empty($signInForm['emailAddress'])) {
                $signInFormErrors['emailAddress'] = 'Ce champ est requis';
            }
            if (!isset($signInForm['plainPassword']) || empty($signInForm['plainPassword'])) {
                $signInFormErrors['plainPassword'] = 'Ce champ est requis';
            }

            if (count($signInFormErrors) === 0) {
                $user = $this->Userrepo->getOneByEmailAddress($signInForm['emailAddress']);

                if (!password_verify($signInForm['plainPassword'], $user->getPlainPassword())) {
                    $signInFormErrors['emailAddress'] = 'L\'adresse e-mail peut être incorrecte';
                    $signInFormErrors['plainPassword'] = 'Le mot de passe pet être incorrecte';
                    var_dump(password_get_info($user->getPlainPassword()));
                }


                if (count($signInFormErrors) === 0) {

                    $this->request->getSession()->set('user', $user);

                    return new RedirectResponse('/');
                }
            }
        }

        return new Response(
            $this->twig->render(
                'signIn.html.twig',
                [
                    'signInForm' => $signInForm,
                    'signInFormErrors' => $signInFormErrors,
                ]
            )
        );
    }

    public function signOut()
    {
        $this->request->getSession()->remove('user');

        return new RedirectResponse('/');
    }
}
