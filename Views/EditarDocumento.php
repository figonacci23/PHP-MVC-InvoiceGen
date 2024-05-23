<?php

include('start.php');

?>
                
                <main>
                <link href="../assets/css/styles.css" rel="stylesheet" />
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Documento</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Insira os dados que pretende editar</div>
                                        <?php echo
                                        "<form action=\"/ex1final/EditarDocumentoAction\" method=\"post\">
                                        <div class=\"form-floating mb-3\">
                                                <input class=\"form-control\" value=\"$nr_de_serie\" name=\"nr_de_serie\" type=\"number\" placeholder=\"asd321\" readonly/>
                                                <label for=\"inputEmail\">Número de Série (fixo)</label>
                                            </div>
                                            <div class=\"form-floating mb-3\">
                                                <input class=\"form-control\" value=\"$data_emissao\" name=\"data_emissao\" type=\"date\" placeholder=\"asd321\" />
                                                <label for=\"inputEmail\">data de emissao</label>
                                            </div>
                                            <div class=\"form-floating mb-3\">
                                                <input class=\"form-control\" value=\"$nif_cliente\"  name=\"nif_cliente\" type=\"number\" placeholder=\"123456789\" />
                                                <label for=\"inputEmail\">nif cliente</label>
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