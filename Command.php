<?php


class Command
{
    private ContactManager $contactManager;

    public function __construct(ContactManager $contactManager)
    {
        $this->contactManager = $contactManager;
    }

    public function list(): void
    {
        $contacts = $this->contactManager->findAll();

        foreach ($contacts as $contact) {
            echo ($contact . "\n");
        }
    }

    public function detail(string $id): void
    {
        echo ($this->contactManager->findById(intval($id))) . "\n";
    }

    public function create(string|null $params): void
    {
        list($name, $email, $phone_number) = array_pad(
            explode(',', $params, 3),
            3,
            null
        );

        if (empty($name) || empty($email) || empty($phone_number)) return;

        $this->contactManager->create([
            'name' =>  trim($name),
            'email' =>  trim($email),
            'phone_number' =>  trim($phone_number)
        ]);

        echo ("\n");
    }
    public function delete(string|null $params)
    {
        if (empty($params)) return;

        $this->contactManager->delete(intval(trim($params)));

        echo ("\n");
    }
}
