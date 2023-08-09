<?php

abstract class Config
{
    protected function configAdm()
    {
        define('URL', 'http://localhost/celke/');
        define('URLADM', 'http://localhost/celke/adm/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Erro');
    } 
}