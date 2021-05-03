<?php
    $clientes = array();
    $query = "SELECT * FROM cliente";
    $statement = $conexao->prepare($query);
    if ($statement->execute()) {
        $resultado = $statement->get_result();
        while ($linha = $resultado->fetch_assoc()) {
            $dadosCliente = array();
            $dadosCliente['id'] = $linha['id'];
            $dadosCliente['nome'] = $linha['nome'];
            $dadosCliente['sobrenome'] = $linha['sobrenome'];
            $dadosCliente['telefone'] = $linha['telefone'];
            $dadosCliente['cep'] = $linha['cep'];
            $dadosCliente['endereco'] = $linha['endereco'];
            $dadosCliente['numero'] = $linha['numero'];
            $dadosCliente['bairro'] = $linha['bairro'];
            $dadosCliente['complemento'] = $linha['complemento'];
            $clientes[] = $dadosCliente;
        }
    }
    echo "<pre>";
    print_r($clientes);
    echo "</pre>";
    die();
    
?>

<main class="container">
    <h2 class="titulo"><?=$titulo?></h2>
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