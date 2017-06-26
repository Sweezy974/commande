<?php

namespace Controllers;
use App\Connect;
use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller extends Connect
{
    protected $twig;

    function __construct()
    {
        $className = substr(get_class($this), 12, -10);
        // Twig Configuration
        //indique le dossie des vues par défaut à twig
        $loader = new Twig_Loader_Filesystem('./views/');
        //   $loader = new Twig_Loader_Filesystem('./views/' . strtolower($className));
        $this->twig = new Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true,
        ));

        //
    }
}
