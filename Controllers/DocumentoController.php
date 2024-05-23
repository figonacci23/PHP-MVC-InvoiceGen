<?php

require_once __DIR__."/../Core/Render.php";

require_once __DIR__."/../Models/DocumentoModel.php";
require_once __DIR__."/../Models/EmpresaModel.php";
require_once __DIR__."/../Models/ClienteModel.php";
require_once __DIR__."/../Models/ArtigoModel.php";
require_once __DIR__."/../Models/ArtigoNDModel.php";



class DocumentoController extends Render {
    private $emodel;
    private $cmodel;
    private $amodel;
    private $dmodel;
    private $ANDmodel;

    public function __construct() {
        $this->emodel = new EmpresaModel();
        $this->cmodel = new ClienteModel();
        $this->amodel = new ArtigoModel();
        $this->dmodel = new DocumentoModel();
        $this->ANDmodel = new ArtigoNDModel();
    }
    
    public function index(){
        $documentos = $this->dmodel->getDocumentos(); 
        $this->renderView("DocumentoView", ["documentos"=>$documentos]);  
    }

    public function CriarDocumento() {
        $this->renderView("CriarDocumento", [] );
    }

    public function CriarDocumentoAction(){
        if (!(isset($_POST['data_emissao']) && isset($_POST['nif_cliente']))){
            $this->renderView("Error", ["mensagem" => "preencha todos os campos"] );
            return ;  
        }

        $currentNIF = $_POST['nif_cliente'];
        $data = $_POST['data_emissao'];
        $result = $this->cmodel->getClienteByNIF($currentNIF);

        if (isset($result)){
            $this->dmodel->CriarDocumento($data, $currentNIF);
            $this->index();
        }
        else{
            $this->renderView("Error", ["mensagem" => "não existe nenhuma empresa com esse NIF"] );
        }
    }

    public function EditarDocumento($id){
        $documento = $this->dmodel->getDocumentosByNS(intval($id[1]));
        $this->renderView("EditarDocumento", $documento);
    }

    public function EditarDocumentoAction(){
        $nr_de_serie = $_POST['nr_de_serie'];
        $data_emissao = $_POST['data_emissao'];
        $nif_cliente = $_POST['nif_cliente'];
        $exists = $this->cmodel->getClienteByNif($nif_cliente);
        if (isset($exists)){
            $this->dmodel->EditarDocumentoByNS($nr_de_serie, $data_emissao, $nif_cliente);
            $this->index();
        }
        else {
            $this->renderView("Error", ["mensagem" => "cliente não existe"] );
        }
    }

    public function EliminarDocumento($id){ 
        $documento = $this->dmodel->getDocumentosByNS(intval($id[1]));
        $this->renderView("EliminarDocumento", $documento);
    }

    public function EliminarDocumentoAction(){
        $id = $_POST['id'];
        $exists = $this->ANDmodel->getAllANDByNS($id);
        if (isset($exists)){
            $this->ANDmodel->RemoverAllArtigosByNS($id);
            $this->dmodel->EliminarDocumento($id);
            $this->index();
        }
        else{
            $this->renderView("Error", ["mensagem" => "documento não existe"] );
        }
        
    }

    public function GerirAND($id){
        $ands = $this->ANDmodel->getAllANDByNS($id[1]);
        $name = [];
        $i = 0;
        if (!isset($ands))
        {
            $this->AdicionarAND($id);
            return;
        }

        foreach ($ands as $and) {
            $name = $this->amodel->getArtigoNameByID(intval($and[2]));
            $names[$i] = $name[0][0];
            $i +=1;
        }
        $this->renderView("GerirAND", ["ands"=>$ands, "names" => $names, "id" => $id[1]]);
    }

    public function AdicionarAND($id){
        $artigos = $this->amodel->getArtigos();
        $this->renderView("AdicionarAND", ["artigos" => $artigos, "id" => $id[1]]);
    }

    public function AdicionarANDAction($id){
        if (!(isset($_POST['artigo']) && isset($_POST['quantidade']))){
            $this->renderView("Error", ["mensagem" => "preencha todos os campos"] );
            return ;  
        }

        $artigo = $_POST['artigo'];
        $quantidade = $_POST['quantidade'];
        $this->ANDmodel->AddArtigoND($id[1], $artigo, $quantidade);
        $this->index();
    }

    public function EliminarAND($id){
        $this->renderView("EliminarAND", ["id" => $id[1]]);
    }

    public function EliminarANDAction($id){
        $this->ANDmodel->RemoverArtigoND($id[1]);
        $this->index();
    }


    ///////////////////////////////////////////////////////////
    //                 GERAÇÃO DO PDF                        //
    ///////////////////////////////////////////////////////////

    public function GerarDocumentoAction() {
        $current_url = $_SERVER['REQUEST_URI'];
        preg_match('#/ex1final/GerarDocumentoAction/(\d+)#', $current_url, $matches);
    
        $idDoc = $matches[1]; // nr de serie do documento
        $documento = $this->dmodel->getDocumentosByNS($idDoc);
        $dataemissao = $documento['data_emissao'];
        $nif = $documento['nif_cliente']; // nif do cliente
        $cliente = $this->cmodel->getClienteByNif($nif);
        $nomecliente = $cliente['nome']; // nome cliente
        $moradacliente = $cliente['morada']; //morada cliente
        $ArtigosND = $this->ANDmodel->getAllANDByNS($idDoc);
        $id_artigo = $ArtigosND[0][2];
        $quantidade = $ArtigosND[0][3];
        $empresa = $this->emodel->getEmpresas();
    
        require('fpdf/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();

        $pdf->Image("uploads/".$empresa[0][3], 10, 6, 30);
    
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(100);
        $pdf->Cell(0, 10, "De: " . $empresa[0][1], 0, 1, 'C');
    
        $pdf->SetFont('Arial', '', 15);
        $pdf->Cell(100);
        $pdf->Cell(0, 10, "Morada Fiscal: " . $empresa[0][2], 0, 1, 'C');
        $pdf->Cell(100);
        $pdf->Cell(0, 10, "NIF: " . $empresa[0][0], 0, 1, 'C');
    
        $pdf->Ln(10);
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(10);
        $pdf->Cell(100, 10, "Para: " . $nomecliente, 0, 1);
    
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10);
        $pdf->Cell(100, 10, "NR DE SERIE: " . $idDoc, 0, 1);
        $pdf->Cell(10);
        $pdf->Cell(100, 10, "DATA DE EMISSAO: " . $dataemissao, 0, 1);
    
        $pdf->Ln(10);
    
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10);
        $pdf->Cell(60, 10, 'PRODUTOS', 1);
        $pdf->Cell(30, 10, 'QNT.', 1);
        $pdf->Cell(30, 10, 'VALOR PP (eur)', 1);
        $pdf->Cell(30, 10, 'IVA', 1);
        $pdf->Cell(30, 10, 'TOTAL (eur)', 1);
        $pdf->Ln();
    
        $pdf->SetFont('Arial', '', 10);
    
        $totalizadorLIQ = 0;
        $totalizadorIVA = 0;
    
        foreach ($ArtigosND as $artigond) {
            $artigo = $this->amodel->getArtigoByID($artigond[2]);
    
            $pdf->Cell(10);
            $pdf->Cell(60, 10, $artigo['nome'], 1);
            $pdf->Cell(30, 10, $artigond[3], 1);
            $pdf->Cell(30, 10, $artigo['valor'], 1);
            $pdf->Cell(30, 10, $artigo['IVA'] . "%", 1);
    
            $totalartigoLIQ = floatval($artigo['valor']) * floatval($artigond[3]);
            $pdf->Cell(30, 10, $totalartigoLIQ, 1);
    
            $totalartigoIVA = floatval($artigo['valor']) * $artigo['IVA'] / 100;
    
            $totalizadorIVA += $totalartigoIVA;
            $totalizadorLIQ += $totalartigoLIQ;
    
            $pdf->Ln();
        }

        
    
        $pdf->Cell(10);
        $pdf->Cell(150, 10, 'TOTAL LIQUIDO', 1);
        $pdf->Cell(30, 10, $totalizadorLIQ, 1);
        $pdf->Ln();
    
        $pdf->Cell(10);
        $pdf->Cell(150, 10, 'TOTAL IVA', 1);
        $pdf->Cell(30, 10, round($totalizadorIVA, 2), 1);
        $pdf->Ln();
    
        $totalizadorILIQ = round($totalizadorIVA, 2) + $totalizadorLIQ;
    
        $pdf->Cell(10);
        $pdf->Cell(150, 10, 'TOTAL ILIQUIDO', 1);
        $pdf->Cell(30, 10, $totalizadorILIQ, 1);
        $pdf->Ln();
    
        $pdf->Output();
    }
}