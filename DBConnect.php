<?php

class DBConnect extends \PDO
{
    function __construct(
        ?string $dsn = null,
        ?string $username = null,
        ?string $password = null,
        ?array $options = null
    ) {
        parent::__construct($dsn ?? 'sqlite:./database/address_book.db', $username, $password, $options);
    }
}
