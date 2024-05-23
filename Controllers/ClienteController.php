<?php

require_once __DIR__."/../Core/Render.php";

require_once __DIR__."/../Models/ClienteModel.php";

require_once __DIR__."/../Models/DocumentoModel.php";


class ClienteController extends Render {
    private $cmodel;
    private $dmodel;

    public function __construct() {
        $this->cmodel = new ClienteModel();
        $this->dmodel = new DocumentoModel();
    }
    
    public function index(){
        $clientes = $this->cmodel->getClientes();
        if ($clientes == null){
            $this->CriarCliente();//se não existirem clientes, este mostr auma pagina para criar um

        }
        else{
            $this->renderView("ClienteView", ["clientes"=>$clientes]);
        }       
    }

    public function CriarCliente() {
        $this->renderView("CriarCliente", [] );
    }

    public function CriarClienteAction(){

        if (!(isset($_POST['nif']) && isset($_POST['nome']) && isset($_POST['morada']))){
            $this->renderView("Error", ["mensagem" => "preencha todos os campos"] );
            return ;  
        }
        $nif = $_POST['nif'];
        if ($nif < 100000000 || $nif >= 1000000000 ){
            $this->renderView("Error", ["mensagem" => "nif invalido"] );
            return ;
        }
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $this->cmodel->CriarCliente($nif, $nome, $morada);
        $this->index();
 
    }

    public function EditarCliente($nif){
        $cliente = $this->cmodel->getClienteByNif($nif[1]);
        $this->renderView("EditarCliente", $cliente );
    }

    public function EditarclienteAction(){
        //echo $inputnif = $_POST['nif'];
        //echo $allclientes = $this->cmodel->getclientes();
        //echo $cliente = $this->cmodel->getClienteByNif($nif[1]);
        $nif = $_POST['nif'];
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $this->cmodel->EditarCliente($nif, $nome, $morada);
        $this->index();
        //verificar se existe o nif antes de alterar
    }

    public function EliminarCliente($nif){ 
        $cliente = $this->cmodel->getClienteByNif($nif[1]);
        $this->renderView("EliminarCliente", $cliente);
    }

    public function EliminarClienteAction(){
        $nif = $_POST['nif'];
        $existe = $this->dmodel->getDocumentosByNIFCliente($nif);
        if (isset($existe)){
            $this->renderView("Error", ["mensagem" => "cliente existe num documentos"] );
        }
        else{
            $this->cmodel->EliminarCliente($nif);
            $this->index();
        }
    }    
}