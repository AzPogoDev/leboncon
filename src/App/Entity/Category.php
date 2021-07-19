<?php


namespace App\Entity;


class Category
{
    static public function createFromData(array $data): Category
    {
        $Category = new Category();

        $fieldsMap = [
            'id' => 'id',
            'name' => 'name',
            'postid' => 'postid'
        ];

        foreach ($fieldsMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $Category->{$propertyName} = $data[$fieldName];
            }
        }

        return $Category;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
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

    private ?string $name = null;
    private ?int $postId = null;
    private ?int $id = null;

}