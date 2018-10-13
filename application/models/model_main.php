<?php

class Model_Main extends Model
{

    private $data;

    function __construct()
    {
        $this->connect();
    }


    public function get_data()
    {
        $sql = 'SELECT * FROM tasks';
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

}
