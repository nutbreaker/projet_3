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

    public function findById(int $id): Contact|false
    {
        $stmt = $this->db->prepare('SELECT * FROM contact WHERE id = :id');
        $stmt->execute([':id' => $id]);

        return $stmt->fetchObject("Contact");
    }

    public function create(array $params): bool
    {
        $sql = <<<SQLREQUEST
        INSERT INTO contact (name, email, phone_number)
        VALUES (:name, :email, :phone_number)
        SQLREQUEST;

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($params);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM contact WHERE id = :id');

        return $stmt->execute([':id' => $id]);
    }

    public function update(array $params): bool
    {
        $sql = <<<SQLREQUEST
        UPDATE contact
        SET
            name = COALESCE(:name, name),
            email = COALESCE(:email, email),
            phone_number = COALESCE(:phone_number, phone_number)
        WHERE id = :id
        SQLREQUEST;

        $stmt = $this->db->prepare($sql);

        return $stmt->execute($params);
    }
}