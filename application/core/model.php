<?php

class DB extends PDO
{
    protected $dsn = "mysql:host=127.0.0.1; dbname=flk; charset=utf8;",
        $username = "root",
        $password = "",
        $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');


    public function __construct()
    {
        parent::__construct($this->dsn, $this->username, $this->password, $this->options);
    }
}

class Model
{
    protected $db;

    public function connect()
    {
        $this->db = new DB;
    }

    public function get_data()
    {
        // todo
    }

    public function add_data()
    {

    }

}