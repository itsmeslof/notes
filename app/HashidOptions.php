<?php

namespace App;

class HashidOptions
{
    public function __construct(public string $connection, public array $fields)
    {
    }

    public static function from(string $connection, array $fields): HashidOptions
    {
        return new self(connection: $connection, fields: $fields);
    }
}
