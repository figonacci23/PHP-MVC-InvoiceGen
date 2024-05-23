<?php

require_once "database.php";

class ClienteModel extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function getClientes(){
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function CriarCliente($nif, $nome, $morada){
        $sql = "INSERT INTO cliente VALUES (\"$nif\", \"$nome\", \"$morada\")";
        $this->conn->query($sql);
    }

    public function getClienteByNif($nif){
        $sql = "SELECT * FROM cliente WHERE cliente.NIF = \"$nif\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return NULL;
        }
    }

    public function editarCliente($nif, $nome, $morada){ 
        $sql = "UPDATE cliente
        SET cliente.nome = \"$nome\", cliente.morada = \"$morada\" 
        WHERE cliente.NIF = \"$nif\" ";
        $this->conn->query($sql);
        
    }

    public function eliminarCliente($nif){
        $sql = "DELETE FROM cliente
        WHERE cliente.NIF = \"$nif\" ";
        $this->conn->query($sql);
    }

}

?>