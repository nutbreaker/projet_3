<?php
require_once('./DBConnect.php');
require_once('./ContactManager.php');
require_once('./Contact.php');
require_once('./Command.php');

$db = new DBConnect();
$contactManager = new ContactManager($db);
$command = new Command($contactManager);

while (true) {
    $line = readline("Entrez votre commande (help, list, detail, create, update, delete, quit) : ");
    list($commandArg, $args) = array_pad(explode(" ", $line, 2), 2, null);

    if ($commandArg === "") {
        echo "\nAucune commande saisie. Veuillez essayer à nouveau.\n\n";

        continue;
    }

    try {
        $result = match ($commandArg) {
            'list' => $command->list(),
            'detail' => $command->detail($args),
            'create' => $command->create($args),
            'delete' => $command->delete($args),
            'update' => $command->update($args),
            'help' => $command->help(),
            'quit' => $command->quit(),
            default => "\nLa commande \033[1m$line\033[0m n'existe pas. Veuillez essayer à nouveau.\n\n",
        };

        echo ($result);
    } catch (\UnhandledMatchError $e) {
    }
}
