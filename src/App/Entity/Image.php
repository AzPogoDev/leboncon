<?php


namespace App\Entity;


class Image
{

    private ?string $url = null;
    private ?int $postId = null;
    private ?int $id = null;


    static public function createFromData(array $data): Image
    {
        $image = new Image();

        $fieldsMap = [
            'id' => 'id',
            'url' => 'url',
            'postid' => 'postid'
        ];

        foreach ($fieldsMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $image->{$propertyName} = $data[$fieldName];
            }
        }

        return $image;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     */
    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return int|null
     */
    public function getPostId(): ?int
    {
        return $this->postId;
    }

    /**
     * @param int|null $postId
     */
    public function setPostId(?int $postId): void
    {
        $this->postId = $postId;
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


}