<?php


namespace App\Entity;


class Post
{
    private ?string $title = null;
    private ?int $price = null;
    private ?string $place = null;
    private ?string $content = null;
    private ?array $images = null;

    /**
     * @return array|null
     */
    public function getCategory(): ?array
    {
        return $this->category;
    }

    /**
     * @param array|null $category
     */
    public function setCategory(?array $category): void
    {
        $this->category = $category;
    }

    private ?array $category = null;
    private ?int $id = null;


    static public function createFromData(array $data): Post
    {
        $post = new Post();

        $fieldsMap = [
            'id' => 'id',
            'title' => 'title',
            'price' => 'price',
            'place' => 'place',
            'content' => 'content',
        ];

        foreach ($fieldsMap as $propertyName => $fieldName) {
            if (isset($data[$fieldName])) {
                $post->{$propertyName} = $data[$fieldName];
            }
        }

        return $post;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string|null
     */
    public function getPlace(): ?string
    {
        return $this->place;
    }

    /**
     * @param string|null $place
     */
    public function setPlace(?string $place): void
    {
        $this->place = $place;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return array|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }

    /**
     * @param array|null $images
     */
    public function setImages(?array $images): void
    {
        $this->images = $images;
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