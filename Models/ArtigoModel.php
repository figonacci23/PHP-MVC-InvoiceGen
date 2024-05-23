<?php

require_once "database.php";

class ArtigoModel extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function getArtigos(){
        $sql = "SELECT * FROM artigos";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function getArtigoNameByID($id){
        $sql = "SELECT nome FROM artigos WHERE artigos.id = \"$id\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }
    

    public function CriarArtigo($nome, $valor, $iva){
        $sql = "INSERT INTO artigos (nome, valor, iva) VALUES (\"$nome\", \"$valor\", \"$iva\")";
        $this->conn->query($sql);
    }

    public function getArtigoByID($id){
        $sql = "SELECT * FROM artigos WHERE artigos.id = \"$id\" ";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return NULL;
        }
    }


    public function editarArtigo($id, $nome, $valor, $iva){
        $sql = "UPDATE artigos
        SET artigos.nome = \"$nome\", artigos.valor = \"$valor\", artigos.IVA = \"$iva\"
        WHERE artigos.id = \"$id\" ";
        $this->conn->query($sql);
    }

    public function eliminarArtigo($id){
        $sql = "DELETE FROM artigos
        WHERE id = \"$id\" ";
        $this->conn->query($sql);
    }

}

?>