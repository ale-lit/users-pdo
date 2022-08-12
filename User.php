<?php

class User
{
    private $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=skillbox_users;port=3306', 'root', '');
    }

    public function create(array $data): void
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `age`, `date_created`) VALUES (NULL, :email, :first_name, :last_name, :age, :date '2022-08-11 23:51:13.000000')");
            $statement->bindValue('email', $data['email']);
            $statement->bindValue('first_name', $data['first_name']);
            $statement->bindValue('last_name', $data['last_name']);
            $statement->bindValue('age', $data['age']);
            $dt = new DateTime();
            $statement->bindValue('date', $dt->format('Y-m-d H:i:s'));
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(array $data, int $id): void
    {
        try {
            $statement = $this->connection->prepare("UPDATE `users` SET `email`=:email,`first_name`=:first_name,`last_name`=:last_name,`age`=:age WHERE `id` = :id");
            $statement->bindValue('email', $data['email']);
            $statement->bindValue('first_name', $data['first_name']);
            $statement->bindValue('last_name', $data['last_name']);
            $statement->bindValue('age', $data['age']);
            $statement->bindValue('id', $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete(int $id): void
    {

    }

    public function list(): array
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM `users`");
            $statement->execute();
            $result = $statement->fetchAll();        
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
