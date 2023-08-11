<?php

namespace App\adms\Models\helper;

use PDOException;
use PDO;

abstract class AdmsConn
{
    private string $host = HOST;
    private string $user = USER;
    private string $pass = PASS;
    private string $dbname = DBNAME;
    private int|string $port = PORT;
    private object $connect;

    protected function connectDb(): object
    {
        try {
            // Conexao com a porta
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbname, $this->user, $this->pass);

            return $this->connect;

        }catch(PDOException $err) {
            die("Erro: Por favor tente novamente. Caso o problema persista, entre em contato com o administrador " . EMAILADM);
        }
    }
}