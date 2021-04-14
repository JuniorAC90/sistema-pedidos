<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Pedidos</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/principal.css">
</head>
<body>
    <?php
        include_once "visao/cabecalho.php"; 
    ?>
    <main class="container">
        <table class="tabela">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Bairro</th>
                    <th>Estado</th>
                    <th>Valor</th>
                    <th>-</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nome do Cliente</td>
                    <td>Nome do Bairro</td>
                    <td>Nome do Estado</td>
                    <td>Nome do Valor</td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>