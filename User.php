<?php

class User
{
    private $connection;

    public function construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=skillbox_users;port=3306', 
        'root', 'root');
    }

    public function create(array $data): void
    {

    }

    public function update(array $data, int $id): void
    {

    }

    public function delete(int $id): void
    {

    }

    public function list(): void
    {

    }
}
