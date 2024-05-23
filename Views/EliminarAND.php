<?php

include('start.php');

?>
                
                <main>
                <link href="../assets/css/styles.css" rel="stylesheet" />
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Eliminar Artigo No Documento</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted"></div>
                                        <?php echo                               
                                        "<form action=\"/ex1final/EliminarANDAction/$id\" method=\"post\">
                                        <h4>Tem a certeza que quer eliminar o artigo?</h4>
                                            <div class=\"form-floating mb-3\">
                                                <p>Confirme o ID do artigo que quer eliminar, ou insira o do que pretende eliminar</p>
                                                <input class=\"form-control\" value=\"$id\"  name=\"id\" type=\"number\" placeholder=\"123456789\" />
                                                <label for=\"inputEmail\">NIF</label>
                                            </div>
                                            <div class=\"d-flex align-items-center justify-content-between mt-4 mb-0\">
                                                <input class=\"btn btn-primary\" type=\"submit\">
                                            </div>
                                        </form>"
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="../assets/js/scripts.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                    <script src="../assets/js/datatables-simple-demo.js"></script>
                </main>

<?php

include('end.php');

?>