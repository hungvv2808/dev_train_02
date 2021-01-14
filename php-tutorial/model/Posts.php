<?php
class Posts {
    private $id;
    private $title;
    private $description;
    private $image;
    private $status;
    private $createAt;
    private $updateAt;

    public function __construct()
    {
    }

    public function __get($propertyName)
    {
        return $this->$propertyName;
    }

    public function __set($propertyName, $propertyValue)
    {
        $this->$propertyName = $propertyValue;
    }
}
