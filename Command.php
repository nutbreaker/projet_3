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

        \033[1mhelp\033[0m : affiche cette aide
        \033[1mlist\033[0m : liste les contacts
        \033[1mdetail\033[0m [id] : affiche les détails d'un contact
        \033[1mcreate\033[0m [name], [email], [phone number] : crée un contact
        \033[1mupdate\033[0m [id], [name], [email], [phone number] : met à jour un contact
        \033[1mdelete\033[0m [id] : supprime un contact
        \033[1mquit\033[0m : quitte le programme


        HELP;

        echo ($help);
    }

    public function quit()
    {
        exit();
    }
}
