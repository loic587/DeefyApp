<?php

namespace iutnc\deefy\repository;

use iutnc\deefy\audio\lists\Playlist;

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
        $dsn = "$conf[driver]:$conf[host];dbname=$conf[database]";
        self::$config = [ 'dsn' => $dsn, 'user' => $conf['username'], 'pass' => $conf['password']];
    }

    public static function getInstance() : DeefyRepository {
        if (is_null(self::$instance)) {
            self::$instance = new DeefyRepository(self::$config);
        }
        return self::$instance;
    }

    public function findPlaylistById(int $id): Playlist {

    }
}
