<?php
    include('start.php');
?>

<div>
    <h1>Clientes</h1>


    <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Criar Cliente</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="/ex1final/CriarCliente">clique aqui</a>
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
                                            <th></th> <!-- botão de editar !-->
                                        </tr>
                                    </thead>                           
                                    <tbody>
                                        <?php
                                        foreach ($clientes as $cliente){
                                            echo "<tr>";
                                            echo "<td> $cliente[1] </td>";
                                            echo "<td> $cliente[0] </td>";
                                            echo "<td> $cliente[2] </td>";
                                            echo "<td><a class=\"btn btn-primary\" href=\"/ex1final/EditarCliente/$cliente[0]\">editar</a></td>";
                                            echo "<td><a class=\"btn btn-danger\" href=\"/ex1final/EliminarCliente/$cliente[0]\">eliminar</a></td>";
                                            echo "</tr>"; 
                                        }
                                        
                                        ?>
                                          
                                    </tbody>
                                </table>
</div>

<?php
    include('end.php');
?>