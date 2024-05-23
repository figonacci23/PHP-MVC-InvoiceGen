<?php

require_once "database.php";

class ArtigoNDModel extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function getAllAND(){
        $sql = "SELECT * FROM artigonodocumento";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function getAllANDByNS($ns){
        $sql = "SELECT * FROM artigonodocumento WHERE nr_de_serie = \"$ns\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function getAllANDByID($id){
        $sql = "SELECT * FROM artigonodocumento WHERE id_artigo = \"$id\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function AddArtigoND($nr_de_serie, $id_artigo, $quantidade){
        $sql = "INSERT INTO artigonodocumento (nr_de_serie, id_artigo, quantidade) VALUES (\"$nr_de_serie\", \"$id_artigo\", \"$quantidade\")";
        $this->conn->query($sql);
    }

    public function RemoverArtigoND($id){
        $sql = "DELETE FROM artigonodocumento
        WHERE id = \"$id\" ";
        $this->conn->query($sql);
    }

    public function RemoverAllArtigosByNS($nr_de_serie){
        $sql = "DELETE FROM artigonodocumento
        WHERE nr_de_serie = \"$nr_de_serie\" ";
        $this->conn->query($sql);
    }

}

?>