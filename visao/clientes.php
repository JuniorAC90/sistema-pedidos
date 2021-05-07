<?php
    $clientes = pegaClientes();
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