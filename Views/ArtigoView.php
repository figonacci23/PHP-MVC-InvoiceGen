<?php
    include('start.php');
?>

<div>
    <h1>Artigos</h1>


    <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Criar Artigos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/ex1final/CriarArtigo">clique aqui</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>nome</th>
                                            <th>valor</th>
                                            <th>IVA</th>
                                            <th></th> <!-- botão de editar !-->
                                            <th></th> <!-- botão de eliminar !-->
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        <?php
                                        foreach ($artigos as $artigo){
                                            echo "<tr>";
                                            echo "<td> $artigo[0] </td>";
                                            echo "<td> $artigo[1] </td>";
                                            echo "<td> $artigo[2] </td>";
                                            echo "<td> $artigo[3] </td>";
                                            echo "<td><a class=\"btn btn-primary\" href=\"/ex1final/EditarArtigo/$artigo[0]\">editar</a></td>";
                                            echo "<td><a class=\"btn btn-danger\" href=\"/ex1final/EliminarArtigo/$artigo[0]\">eliminar</a></td>";
                                            echo "</tr>"; 
                                        }
                                        
                                        ?>
                                          
                                    </tbody>
                                </table>
</div>

<?php
    include('end.php');
?>