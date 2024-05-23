<?php

$routes = [
    '/' => 'EmpresaController@index',
    ////////////////////////////////////////////////////////////////////
    '/Empresas' => 'EmpresaController@index',
    '/CriarEmpresa' => 'EmpresaController@CriarEmpresa',
    '/CriarEmpresaAction' => 'EmpresaController@CriarEmpresaAction',
    '/EditarEmpresa/{id}' => 'EmpresaController@EditarEmpresa',
    '/EditarEmpresaAction' => 'EmpresaController@EditarEmpresaAction',
    ///////////////////////////////////////////////////////////////////////
    '/Clientes' => 'ClienteController@index',
    '/CriarCliente' => 'ClienteController@CriarCliente',
    '/CriarClienteAction' => 'ClienteController@CriarClienteAction',
    '/EditarCliente/{id}' => 'ClienteController@EditarCliente',
    '/EditarClienteAction' => 'ClienteController@EditarClienteAction',
    '/EliminarCliente/{id}' => 'ClienteController@EliminarCliente',
    '/EliminarClienteAction' => 'ClienteController@EliminarClienteAction',
    ////////////////////////////////////////////////////////////////////////
    '/Artigos' => 'ArtigoController@index',
    '/CriarArtigo' => 'ArtigoController@CriarArtigo',
    '/CriarArtigoAction' => 'ArtigoController@CriarArtigoAction',
    '/EditarArtigo/{id}' => 'ArtigoController@EditarArtigo',
    '/EditarArtigoAction' => 'ArtigoController@EditarArtigoAction',
    '/EliminarArtigo/{id}' => 'ArtigoController@EliminarArtigo',
    '/EliminarArtigoAction' => 'ArtigoController@EliminarArtigoAction',
    //////////////////////////////////////////////////////////////////////////
    '/Documentos' => 'DocumentoController@index',
    '/CriarDocumento' => 'DocumentoController@CriarDocumento',
    '/CriarDocumentoAction' => 'DocumentoController@CriarDocumentoAction',
    '/EditarDocumento/{id}' => 'DocumentoController@EditarDocumento',
    '/EditarDocumentoAction' => 'DocumentoController@EditarDocumentoAction',
    '/EliminarDocumento/{id}' => 'DocumentoController@EliminarDocumento',
    '/EliminarDocumentoAction' => 'DocumentoController@EliminarDocumentoAction',
    '/GerarDocumentoAction/{id}' => 'DocumentoController@GerarDocumentoAction',
    ///////////////////////////////////////////////////////////////////////////
    '/GerirAND/{id}'=> 'DocumentoController@GerirAND',
    '/AdicionarAND/{id}'=> 'DocumentoController@AdicionarAND',
    '/AdicionarANDAction/{id}'=> 'DocumentoController@AdicionarANDAction',
    '/EliminarAND/{id}'=> 'DocumentoController@EliminarAND',
    '/EliminarANDAction/{id}'=> 'DocumentoController@EliminarANDAction',  
]
;