<?php

    $conn = new PDO('mysql:host=127.0.0.1;dbname=todoapp', 'root', '');


    function insertTodo($data){
        global $conn;
        $sql = "INSERT INTO `info`(`name`) VALUES (:title)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute(array(
            
            ':title' => $data
        
        ));
    }

    function readData($table = 'info', $done = 0, $id = NULL){
        global $conn;
        $where = '';
        if($id != NULL){
            $where = " AND id = $id ";
        }
        $sql = "SELECT * FROM $table WHERE done = $done $where";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll();
    }

    function deleteData($id){
        global $conn;
        $sql = "DELETE FROM info WHERE id = $id";
        return $conn->exec($sql);
    }

    function updateTask($data, $id){
        global $conn;
        $sql = "UPDATE info SET name = :data WHERE id = :id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute(array(
            
            ':data' => $data,
            ':id' => $id
        
        ));
    }














