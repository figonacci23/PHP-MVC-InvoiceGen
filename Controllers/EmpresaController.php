<?php

require_once __DIR__."/../Core/Render.php";

require_once __DIR__."/../Models/EmpresaModel.php";

class EmpresaController extends Render {

    private $emodel;

    public function __construct() {
        $this->emodel = new EmpresaModel();
    }

    public function index(){
        $empresas = $this->emodel->getEmpresas();
        if ($empresas == null){
            echo "erro, a empresa não existe";// render view para criar empresa
            $this->CriarEmpresa();
        }
        else{
            $this->renderView("EmpresaView", ["empresas"=>$empresas]);
        }       
    }

    public function CriarEmpresa() {  // deveria deixar criar mais empresas, for the sake of testing?
        $empresas = $this->emodel->getEmpresas();
        if (isset($empresas)){
            $this->renderView("Error", ["mensagem" => "já existe uma empresa"] );
        }
        else{
            $this->renderView("CriarEmpresa", [] );
        }
        
    }

    public function CriarEmpresaAction(){

        if (!(isset($_POST['nif']) && isset($_POST['nome']) && isset($_POST['morada']))){
            $this->renderView("Error", ["mensagem" => "preencha todos os campos"] );
            return ;  
        }
        $nif = $_POST['nif'];
        if ($nif < 100000000 || $nif >= 1000000000 ){
            $this->renderView("Error", ["mensagem" => "nif invalid"] );
            return ;
        }
        /////////////////////////////////////////////////////////////////
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $image=basename( $_FILES["imageUpload"]["name"],".jpg");
        /////////////////////////////////////////////////////////////////////////
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];
        $this->emodel->CriarEmpresa($nif, $nome, $morada, $image);
        $this->index();
 
    }

    public function EditarEmpresa($nif){
        $empresa = $this->emodel->getEmpresaByNif($nif[1]);
        $this->renderView("EditarEmpresa", $empresa );
    }

    public function EditarEmpresaAction(){
        //echo $inputnif = $_POST['nif'];
        //echo $allempresas = $this->emodel->getEmpresas();
        //echo $empresa = $this->emodel->getEmpresaByNif($nif[1]);

        $empresas = $this->emodel->getEmpresas();

        $nif = $_POST['nif'];
        $nome = $_POST['nome'];
        $morada = $_POST['morada'];

        $NIFigual = false;

        foreach ($empresas as $empresa) {
            if ($empresa['nif'] == $nif) {
                $NIFigual = true;
                break;
            }
        }

        if ($NIFigual){ ////////////////////////////
            $this->emodel->EditarEmpresa($nif, $nome, $morada);
        }
        else{
            /////////////////////////////////////////
        }
        
        $this->emodel->EditarEmpresa($nif, $nome, $morada);
        $this->index();
    }
}