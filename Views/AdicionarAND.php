<?php

include('start.php');

?>
                
                <main>
                <link href="../assets/css/styles.css" rel="stylesheet" />
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Adicionar Artigo no Documento</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Escolha o artigo que deseja adicionar e a sua quantidade</div>
                                        <?php echo
                                        "<form action=\"/ex1final/AdicionarANDAction/$id\" method=\"post\">";
                                        ?>
                                            <select name="artigo">
                                                <?php
                                                $i=0;
                                                foreach ($artigos as $artigo) {
                                                    echo "<option value='$artigo[0]'>$artigo[1]</option>";
                                                    $i += 1;
                                                }
                                                ?>
                                            </select>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="quantidade" type="number" placeholder="asd321" />
                                                <label for="inputEmail">Quantidade</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
                    <script src="../assets/js/scripts.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                    <script src="../assets/js/datatables-simple-demo.js"></script>

<?php

include('end.php');

?>