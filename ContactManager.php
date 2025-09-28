<?php

class ContactManager
{
    private PDO $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM contact');

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Contact");
    }
}
