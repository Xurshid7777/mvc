<?php
// модель
Class Model_Task extends Model {
    const TABLE = 'task';

    public function getTaskAll(){
        $model = $this;
        $sql = "SELECT * FROM `task`";
        $res = $model->query($sql);

        return $res;
	}

    public function get_one_db($id) {
        $model = $this;
        $sql = "SELECT * FROM `task` WHERE `id` = '$id'";

        $res = $model->query($sql);


        return $res;

    }

    public function create($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $text = $data['text'];
        $time = time();
        $db = $this;
        $sql = "INSERT INTO `task` (name, email, text, status, created) VALUES ('$name', '$email', '$text','1','$time')";

        return $db->execute($sql);
    }

    public function save($model)
    {
        $db = $this;
        $sql = "UPDATE task SET `text` = :text, `status` = :status WHERE `id` = :id";
        return $db->query($sql, [
            ':text' => $model['text'],
            ':status' => $model['status'],
            ':id' => $model['id'],
        ]);
    }

    public  function findById($id)
    {
        $db = $this;
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id',
            [':id' => $id]
        )[0];
    }


    public  function getPageContent($page, $rows, $sort = 'created', $sorttype = '')
    {
        $page--;
        $start = $page*3;
        $db = $this;
        $sql = "SELECT * FROM task WHERE status IN (0, 1) ORDER BY {$sort} {$sorttype} LIMIT {$start}, {$rows}";
        return $db->query($sql);
    }




}