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

        echo ("\nListe des contacts :\n\n");
        echo ("id, name, email, phone number\n");
        echo (implode("\n", $contacts));
        echo ("\n\n");
    }

    public function detail(string $id): void
    {
        echo ("\n" . $this->contactManager->findById(intval($id)) . "\n\n");
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

    public function update(string|null $params)
    {
        list($id, $name, $email, $phone_number) = array_pad(
            explode(',', $params, 4),
            4,
            null
        );

        if (empty($id)) return;

        $this->contactManager->update([
            'id' =>  trim($id),
            'name' =>  trim($name)?: null,
            'email' =>  trim($email)?: null,
            'phone_number' =>  trim($phone_number)?: null
        ]);
    }

    public function help()
    {
        $help = <<<HELP

        help : affiche cette aide
        list : liste les contacts
        detail [id] : affiche les détails d'un contact
        create [name], [email], [phone number] : crée un contact
        update [id], [name], [email], [phone number] : met à jour un contact
        delete [id] : supprime un contact
        quit : quitte le programme


        HELP;

        echo ($help);
    }

    public function quit()
    {
        exit();
    }
}
