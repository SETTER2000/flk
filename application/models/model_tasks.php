<?php

class Model_Tasks extends Model
{

    private $sql;

    function __construct()
    {
        $this->connect();
    }

    public function add_data($data)
    {

        $sql = "INSERT INTO tasks (user, email, description, pic,done) VALUES (:user, :email, :description, :pic, :done)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':user', $data['user']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':pic', $data['pic']);
        $stmt->bindParam(':done', $data['done']);
        return $stmt->execute();
//        try {
//            $this->db->beginTransaction();
//            foreach ($data as $row)
//            {
//                print_r($row);
//                $stmt->execute($row);
//            }
//            $this->db->commit();
//        }catch (Exception $e){
//            $this->db->rollback();
//            throw $e;
//        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update_data($data)
    {

        $sql = "UPDATE tasks SET  description=:description, done=:done WHERE task_id=:task_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);

    }

    public function get_data()
    {
        $this->sql = $this->db->prepare("...");
        return $this->sql;
    }

}
