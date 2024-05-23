<?php

require_once "database.php";

class EmpresaModel extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function getEmpresas(){
        $sql = "SELECT * FROM empresa";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function CriarEmpresa($nif, $nome, $morada, $image){
        $sql = "INSERT INTO empresa VALUES (\"$nif\", \"$nome\", \"$morada\", \"$image\")";
        $this->conn->query($sql);
    }

    public function getEmpresaByNif($nif){
        $sql = "SELECT * FROM empresa WHERE empresa.NIF = \"$nif\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return NULL;
        }
    }

    public function editarEmpresa($nif, $nome, $morada){ //achei correto não editar o NIF dado quie este nunca muda mas amanhã revejo isto
        $sql = "UPDATE empresa
        SET empresa.nome = \"$nome\", empresa.morada_fiscal = \"$morada\" 
        WHERE empresa.NIF = \"$nif\" ";
        $this->conn->query($sql);
    }

}

?>