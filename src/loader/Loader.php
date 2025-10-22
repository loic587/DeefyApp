<?php

class loader
{

    private String $prefix;
    private String $repertoire;

    public function __construct(String $pref, String $rep)
    {
        $this->prefix = $pref;
        $this->repertoire = $rep;
    }

    public function loadClass(String $className)
    {
        $className = str_replace('iutnc\deefy', $this->repertoire, $className);
        $class = $className . ".php";
        // remplacer \\ par DIRECTORY_SEPARATOR
        $file = str_replace(array('/', '\\'), '/', $class);
        if(is_file($file)){
            require_once $file;
        }
    }

    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

}