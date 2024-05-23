<?php

require_once __DIR__."/../Core/Render.php";

require_once __DIR__."/../Models/ArtigoModel.php";

require_once __DIR__."/../Models/ArtigoNDModel.php";


class ArtigoController extends Render {
    private $amodel;
    private $ANDmodel;

    public function __construct() {
        $this->amodel = new ArtigoModel();
        $this->ANDmodel = new ArtigoNDModel();
    }
    
    public function index(){
        $artigos = $this->amodel->getArtigos();
        if ($artigos == null){
            $this->CriarArtigo();//se não existirem Artigos, este mostr auma pagina para criar um

        }
        else{
            $this->renderView("ArtigoView", ["artigos"=>$artigos]);
        }       
    }

    public function CriarArtigo() {
        $this->renderView("CriarArtigo", [] );
    }

    public function CriarArtigoAction(){

        if (!(isset($_POST['nome']) && isset($_POST['valor']) && isset($_POST['iva']))){
            $mensagem = "preencha todos!!";
            $this->renderView("Error", ["mensagem" => "preencha todos os campos"] ); 
            return ;  
        }

        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $iva = $_POST['iva'];
        $this->amodel->CriarArtigo($nome, $valor, $iva);
        $this->index();
 
    }

    public function EditarArtigo($id){
        $artigo = $this->amodel->getArtigoByID($id[1]); 
        print_r($artigo);
        $this->renderView("EditarArtigo", $artigo );
    }

    public function EditarArtigoAction(){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $iva = $_POST['IVA'];
        $this->amodel->EditarArtigo($id, $nome, $valor, $iva);
        $this->index();
    }

    public function EliminarArtigo($id){ 
        $cliente = $this->amodel->getArtigoByID($id[1]);
        $this->renderView("EliminarArtigo", $cliente);
    }

    public function EliminarArtigoAction(){
        $id = $_POST['id'];
        
        $exists = $this->ANDmodel->getAllANDByID($id);
        if (isset($exists)){
            echo "não pode remover artigos adicionados em documentos";
        }
        else{
            $this->amodel->EliminarArtigo($id);
            $this->index();
        }
    }
    
}