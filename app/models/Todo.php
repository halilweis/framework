<?php
    class Todo {
        private $db;

        public function __construct() {
            $this->db = new Database;
        }
        public function getAll() {
            $this->db->query("SELECT * FROM todo ");

            $result = $this->db->resultSet();

            return $result;
        }
        public function addData($data)
        {
            $this->db->query("INSERT INTO todo values ('','".$data['username']."', '', '".$data['email']."', '".$data['task']."', 0)");
            return $this->db->execute();
        }
        public function find($id) {
            $this->db->query("SELECT * FROM todo where id='$id'");

            $result = $this->db->single();
            return $result;
        }
        public function updateData($data)
        {
            $this->db->query("UPDATE todo SET taskText = '".$data['task']."', status = '".$data['status']."' 
            WHERE id='".$data['id']."'");
            return $this->db->execute();
        }

    }
