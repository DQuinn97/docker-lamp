<?php
class User
{
    static $count = 0;

    public $id;
    public $name;
    public $email;
    private $password;
    public $avatar;

    public function login(String $email, String $password) {}
    function getId()
    {
        return $this->id;
    }
    function setId($newId)
    {
        $this->id = $newId;
    }
    function getName()
    {
        return $this->name;
    }
    function setName($newName)
    {
        $this->name = $newName;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
    public function __construct()
    {
        self::$count++;
        $this->id = self::$count;
    }
}
