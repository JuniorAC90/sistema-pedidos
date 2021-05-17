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
    <link rel="stylesheet" href="css/recibo.css">
    
</head>
<body>
    <?php
        include_once 'funcoes/funcoes.php';
        include_once "modelo/Banco.php"; 
        include_once "modelo/Cliente.php"; 
        include_once "modelo/Produto.php"; 
        include_once "modelo/Item.php"; 
        include_once "modelo/Pedido.php"; 
        
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
                $edita = false;
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-clientes.php"; 
                break;
            case '/salvar-clientes':
                include_once "controlador/salvar-clientes.php"; 
                break;
            case '/edicao-clientes':
                $edita = true;
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $cliente = pegaUmCliente($id);
                include_once "visao/formulario-clientes.php"; 
                break;
            case '/editar-clientes':
                include_once "controlador/editar-clientes.php"; 
                break;
            case '/excluir-clientes':
                include_once "controlador/excluir-clientes.php"; 
                break;
            case '/formulario-produtos':
                $edita = false;
                $titulo = 'Cadastro de Produtos';
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-produtos.php"; 
                break;
            case '/salvar-produtos':
                include_once "controlador/salvar-produtos.php"; 
                break;
            case '/edicao-produtos':
                $edita = true;
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $produto = pegaUmProduto($id);
                include_once "visao/formulario-produtos.php"; 
                break;
            case '/editar-produtos':
                include_once "controlador/editar-produtos.php"; 
                break;
            case '/excluir-produtos':
                include_once "controlador/excluir-produtos.php"; 
                break;
            case '/formulario-pedidos':
                $edita = false;
                $titulo = 'Cadastro de Pedidos';
                include_once "visao/titulo.php"; 
                include_once "visao/formulario-pedidos.php"; 
                break;
            case '/salvar-pedidos':
                include_once "controlador/salvar-pedidos.php"; 
                break;
            case '/edicao-pedidos':
                $edita = true;
                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $pedido = pegaUmPedidoComItens($id);
                include_once "visao/formulario-pedidos.php"; 
                break;
            case '/editar-pedidos':
                include_once "controlador/editar-pedidos.php"; 
                break;
            case '/excluir-pedidos':
                include_once "controlador/excluir-pedidos.php"; 
                break;
            case '/impressao':
                include_once "visao/recibo.php"; 
                break;
            default:
                $titulo = 'Pedidos';
                header("Location: /pedidos");
                break;
        }

        
        
        //var_dump($_SERVER);
        
    ?>
    <script src="js/funcoes.js"></script>
    <script src="js/formulario-clientes/cep.js"></script>
    <script src="js/formulario-clientes/telefone.js"></script>
    <script src="js/formulario-produtos/preco.js"></script>
    <script src="js/formulario-pedidos/cliente.js"></script>
    <script src="js/formulario-pedidos/produto.js"></script>
    <script src="js/formulario-pedidos/pedido.js"></script>
    <script src="js/recibo.js"></script>
</body>
</html>