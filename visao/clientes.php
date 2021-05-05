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
    
    
?>

<main class="container">
    
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Complemento</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($clientes); $i++) {
            echo "<tr>
                    <td>{$clientes[$i]['id']}</td>
                    <td>{$clientes[$i]['nome']}</td>
                    <td>{$clientes[$i]['sobrenome']}</td>
                    <td>{$clientes[$i]['telefone']}</td>
                    <td>{$clientes[$i]['cep']}</td>
                    <td>{$clientes[$i]['endereco']}</td>
                    <td>{$clientes[$i]['numero']}</td>
                    <td>{$clientes[$i]['bairro']}</td>
                    <td>{$clientes[$i]['complemento']}</td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>