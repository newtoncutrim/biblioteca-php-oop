<?php

namespace App\Conf;

use App\Helpers\EnvHelper;
use Dotenv\Dotenv;
use PDO;

class Connection
{
    private static $host;
    private static $user;
    private static $pass;
    private static $db;

    public function __construct() {
        $this->init();
    }

    private function init()
    {
        // php parse .env
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        self::$host = EnvHelper::get('DB_HOST');
        self::$user = EnvHelper::get('DB_USER');
        self::$pass = EnvHelper::get('DB_PASS');
        self::$db = EnvHelper::get('DB_NAME');

        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getPDO() {
        return $this->init();    
    }

    public static function connect()
    {
        return new self();
    }

    public function getHost() {
        return self::$host;
    }

    public function getUser() {
        return self::$user;
    }

    public function getPass() {
        return self::$pass;
    }

    public function getDb() {
        return self::$db;
    }
}