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
        self::$config = [ 'dsn' => ""]
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new DeefyRepository(self::$config);
        }
        return self::$instance;
    }
    /*try {
    $bdd = new PDO('mysql:host=localhost; dbname=bdd; charset=utf8','root', '');
    }
    catch (Exception $e) {
        die('erreur : ' . $e->getMessage());
    }

    $query = $bdd->query("SELECT prix FROM personnage");
    while($data=$query->fetch())
    {
        echo $data['prix'] . "<br>";
    }*/
}
