<?php

class Contact
{
    private int $id;
    private string $name;
    private string $email;
    private string $phone_number;

    public function __construct() {}

    public function __toString() {
        return implode(', ',[$this->id, $this->name, $this->email, $this->phone_number]); 
    }

    public function setId(int $id): Contact
    {
        $this->id = $id;

        return $this;
    }
    public function setName(string $name): Contact
    {

        $this->name = $name;
        return $this;
    }
    public function setEmail(string $email): Contact
    {
        $this->email = $email;

        return $this;
    }
    public function setPhoneNumber(string $phone_number): Contact
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }
}
