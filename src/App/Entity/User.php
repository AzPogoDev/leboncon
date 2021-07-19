<?php


namespace App\Entity;


class User
{
    private ?string $emailAddress = null;
    private ?string $plainPassword = null;
    private ?string $nickName = null;

    static public function createFromData(array $data)
    {
        $user = new User();

        $fieldMap = [
            'id' => 'id',
            'emailAddress' => 'email',
            'plainPassword' => 'password',
            'nickName' => 'nickname'
        ];

        foreach ($fieldMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $user->{$propertyName} = $data[$fieldName];
            }
        }

        return $user;
    }



    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    private ?int $id = null;

    /**
     * @return string|null
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param string|null $emailAddress
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     */
    public function setPlainPassword(?string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }


    /**
     * @return string|null
     */
    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    /**
     * @param string|null $nickName
     */
    public function setNickName(?string $nickName): void
    {
        $this->nickName = $nickName;
    }


}