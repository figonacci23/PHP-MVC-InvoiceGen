<?php
    include('start.php');
?>

<div>
<link href="../assets/css/styles.css" rel="stylesheet" />
    <h1>Documentos</h1>


    <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Criar Documentos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/ex1final/CriarDocumento">clique aqui</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Número de Série</th>
                                            <th>NIF do Cliente</th>
                                            <th>Data de Emissão</th>
                                            <th></th> <!-- botão de editar informações !-->
                                            <th></th> <!-- botão de editar artigos !-->
                                            <th></th> <!-- botão de gerar pdf !-->
                                            <th></th> <!-- botão de eliminar !-->
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        <?php
                                        foreach ($documentos as $documento){
                                            echo "<tr>";
                                            echo "<td> $documento[0] </td>";
                                            echo "<td> $documento[2] </td>";
                                            echo "<td> $documento[1] </td>";
                                            echo "<td><a class=\"btn btn-dark\" href=\"/ex1final/GerirAND/$documento[0]\">Gerir Artigos</a></td>";
                                            echo "<td><a class=\"btn btn-warning\" href=\"/ex1final/EditarDocumento/$documento[0]\">editar informações</a></td>";
                                            echo "<td><a class=\"btn btn-primary\" href=\"/ex1final/GerarDocumentoAction/$documento[0]\">gerar pdf</a></td>";
                                            echo "<td><a class=\"btn btn-danger\" href=\"/ex1final/EliminarDocumento/$documento[0]\">eliminar</a></td>";
                                            echo "</tr>"; 
                                        }
                                        
                                        ?>
                                          
                                    </tbody>
                                </table>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                            <script src="../assets/js/scripts.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                            <script src="../assets/js/datatables-simple-demo.js"></script>
</div>

<?php
    include('end.php');
?>