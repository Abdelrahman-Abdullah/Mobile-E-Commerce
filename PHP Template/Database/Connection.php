<?php

class Connection
{
    const LOCAL_HOST = 'mysql:host=localhost';
    const DB_NAME    = 'e-commerce';
    const USERNAME   = 'root';
    const PASSWORD   = '';
    const OPTIONS    =
        [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

    public static function Connect()
    {
        try {
            return new PDO(
                self::LOCAL_HOST.";dbname=".self::DB_NAME ,
                self::USERNAME ,
                self::PASSWORD,
                self::OPTIONS
            );
        }
        catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }
    }
}
