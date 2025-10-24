<?php

namespace iutnc\deefy\repository;

class DeefyRepository {

    private \PDO $pdo;
    private static ?DeefyRepository $instance = null;
    private static array $config = [];

    public function __construct(array $conf)
    {
        $this->pdo = new \PDO($conf['dsn'], $conf['user'], $conf['pass'],
            [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
    }

    public static function setConfig( $file ) : void {
        $conf = parse_ini_file($file);
        self::$config = [ 'dsn' => $conf['dsn'], 'user' => $conf['username'], 'pass' => $conf['password'],
            'host' => $conf['host'], 'database' => $conf['database']];
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new DeefyRepository(self::$config);
        }
        return self::$instance;
    }
}
