<?php
    include('start.php');
?>

<div>
    <h1>Empresa</h1>


    <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Criar Empresa</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/ex1final/CriarEmpresa">clique aqui</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

    <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>nome</th>
                                            <th>NIF</th>
                                            <th>morada</th>
                                            <th></th> <!-- botão de editar !-->
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        <?php
                                        foreach ($empresas as $empresa){
                                            echo "<tr>";
                                            echo "<td> $empresa[1] </td>";
                                            echo "<td> $empresa[0] </td>";
                                            echo "<td> $empresa[2] </td>";
                                            echo "<td><a class=\"btn btn-primary\" href=\"/ex1final/EditarEmpresa/$empresa[0]\">editar</a></td>";
                                            echo "</tr>"; 
                                        }
                                        
                                        ?>
                                          
                                    </tbody>
                                </table>
</div>

<?php
    include('end.php');
?>