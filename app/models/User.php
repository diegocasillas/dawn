<?php

class User extends Model
{
    protected $username;
    protected $password;
    protected $posts = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function username()
    {
        return $this->username;
    }

    public function password()
    {
        return $this->password;
    }

    public function create()
    {
        $sql = "INSERT INTO {$this->table}(username, password) VALUES('{$this->username}', '{$this->password}')";
        $this->db->exec($sql);

        $this->id = $this->db->lastInsertId();
    }

    public function writePost()
    {
        Post::save();
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}