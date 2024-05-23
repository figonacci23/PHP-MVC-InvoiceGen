<?php

require_once "database.php";

class DocumentoModel extends Database{
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function getDocumentos(){
        $sql = "SELECT * FROM documentos";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_all();
            return $row;
        } else {
            return NULL;
        }
    }

    public function getDocumentosByNS($nr_de_serie){
        $sql = "SELECT * FROM documentos WHERE nr_de_serie = \"$nr_de_serie\" " ;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return NULL;
        }
    }

    public function getDocumentosByNIFCliente($nif_cliente){
        $sql = "SELECT * FROM documentos WHERE nif_cliente = \"$nif_cliente\" " ;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return NULL;
        }
    }

    public function CriarDocumento($data_emissao, $nif_cliente){
        $sql = "INSERT INTO documentos (data_emissao, nif_cliente) VALUES (\"$data_emissao\", \"$nif_cliente\")";
        $this->conn->query($sql);
    }

    public function EditarDocumentoByNS($nr_de_serie, $data_emissao, $nif_cliente){
        $sql = "UPDATE documentos
        SET data_emissao = \"$data_emissao\", nif_cliente = \"$nif_cliente\"
        WHERE nr_de_serie = \"$nr_de_serie\" ";
        $this->conn->query($sql);
    }

    public function EliminarDocumento($nr_de_serie){
        $sql = "DELETE FROM documentos
        WHERE nr_de_serie = \"$nr_de_serie\" ";
        $this->conn->query($sql);
    }
}

?>