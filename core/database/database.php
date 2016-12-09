<?php

class Db
{
    public function connect()
    {
        // Try and connect to the database
        $this->connection = new mysqli("127.0.0.1", USER, PWD, DB, PORT);

        // If connection was not successful, handle the error
        if ($this->connection === false) {
            return false;
        }

        return $this->connection;
    }

    public function query($query)
    {
        // Connect to the database
        $connection = $this -> connect();

        // Query the database
        $result = $connection -> query($query);

        return $result;
    }

    public function select($query)
    {
        $rows = array();
        $result = $this -> query($query);
        if ($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function clean($value)
    {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}
