<?php

include('start.php');

?>
                
                <main>
                    
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar Documento</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Insira a data de emissão da fatura e o NIF do cliente a que se destina</div>
                                        <form action="/ex1final/CriarDocumentoAction" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="data_emissao" type="date" placeholder="123456789" />
                                                <label for="inputEmail">data de emissao</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="nif_cliente" type="number" placeholder="asd321" />
                                                <label for="inputEmail">NIF do Cliente</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input class="btn btn-primary" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                
                </main>

<?php

include('end.php');

?>