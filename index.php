<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mensagens.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/links.css">
    <link rel="stylesheet" href="css/titulo.css">
    <link rel="stylesheet" href="css/container.css">
    <link rel="stylesheet" href="css/formulario/formulario-clientes.css">
    <link rel="stylesheet" href="css/formulario/formulario-produtos.css">
    <link rel="stylesheet" href="css/formulario/formulario-pedidos.css">
    <link rel="stylesheet" href="css/links/links-formulario.css">
    <link rel="stylesheet" href="css/tabela.css">
    
</head>
<body>
    <?php
        include_once 'funcoes/funcoes.php';
        include_once "modelo/Banco.php"; 
        include_once "modelo/Cliente.php"; 
        include_once "modelo/Produto.php"; 
        
        $rota = $_SERVER['PATH_INFO'];
        $nav = menuAtivo($rota);
        include_once "visao/cabecalho.php"; 
        include_once "visao/links.php"; 
        

        switch ($rota) {
            case '/produtos':
                $titulo = 'Produtos';
                include_once "visao/titulo.php"; 
                include_once "visao/produtos.php"; 
                break;
            case '/clientes':
                $titulo = 'Clientes';
                include_once "visao/titulo.php"; 
                include_once "visao/clientes.php"; 
                break;
            case '/pedidos':
                $titulo = 'Pedidos';
                include_once "visao/titulo.php"; 
                include_once "visao/pedidos.php"; 
                break;
            case '/formulario-clientes':
                $titulo = 'Cadastro de Clientes';
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-clientes.php"; 
                break;
            case '/salvar-clientes':
                include_once "controlador/salvar-clientes.php"; 
                break;
            case '/formulario-produtos':
                $titulo = 'Cadastro de Produtos';
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-produtos.php"; 
                break;
            case '/salvar-produtos':
                include_once "controlador/salvar-produtos.php"; 
                break;
            case '/formulario-pedidos':
                $titulo = 'Pedidos';
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-pedidos.php"; 
                break;
            default:
                $titulo = 'Pedidos';
                include_once 'visao/principal.php';
                break;
        }

        
        
        //var_dump($_SERVER);
        
    ?>
    
</body>
</html>