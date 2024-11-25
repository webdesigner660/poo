<?php

namespace Symplefony;

use Exception;

class Database
{
    private static ?self $app_instance = null;
    private function __construct() {}
    private string $last_message;
    public static function getDatabase(): self
    {
        // Si l'instance n'existe pas encore on la crée
        if (
            is_null(self::$app_instance)
        ) {
            self::$app_instance = new self();
        }
        return self::$app_instance;
    }
    public function titi(string $msg1): void
    {
        $this->last_message = $msg1;
        echo $msg1 . ' Je suis titi !';
    }
    private function __clone() {}
    public function __wakeup()
    {
        echo 'Je suis Toto !';
        throw new Exception("Non c'est interdit !");
    }


    private static ?self $database_instance = null;
}
