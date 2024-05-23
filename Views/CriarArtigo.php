<?php

include('start.php');

?>
                
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar Artigo</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Submeta os dados do artigo que deseja adicionar nos seus respetivos campos</div>
                                        <form action="/ex1final/CriarArtigoAction" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="nome" type="name" placeholder="asd321" />
                                                <label for="inputEmail">Nome do artigo</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="valor" type="decimal" placeholder="123456789" />
                                                <label for="inputEmail">Valor (xx.xx)</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="iva" type="number" placeholder="asd321" />
                                                <label for="inputEmail">iva (EM PERCENTAGEM)</label>
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

<?php

include('end.php');

?>