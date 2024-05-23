<?php
    include('start.php');
?>

<div>
<link href="../assets/css/styles.css" rel="stylesheet" />
    <h1>Gerir Artigos no Documento</h1>


    <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Adicionar Artigo</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?php echo "
                                        <a class=\"small text-white stretched-link\" href=\"/ex1final/AdicionarAND/$id\">clique aqui</a>";?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nome do Artigo</th>
                                            <th>Quantidade</th>
                                            <th></th> <!-- botão de editar informações !-->
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($ands as $and){
                                            echo "<tr>";
                                            echo "<td> $names[$i] </td>";
                                            echo "<td> $and[3] </td>";
                                            echo "<td><a class=\"btn btn-danger\" href=\"/ex1final/EliminarANDAction/$and[0]\">eliminar</a></td>";
                                            echo "</tr>"; 
                                            $i += 1;
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