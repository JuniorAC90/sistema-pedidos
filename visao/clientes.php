<?php
    $clientes = pegaClientes();
?>

<main class="container">
    
    <table class="tabela">
        <thead class="tabela-cabecalho">
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
                <th>-</th>
            </tr>
        </thead>
        <tbody class="tabela-principal">
        <?php
        for ($i = 0; $i < count($clientes); $i++) {
            echo "<tr>
                    <td>{$clientes[$i]->pegaId()}</td>
                    <td>{$clientes[$i]->pegaNome()}</td>
                    <td>{$clientes[$i]->pegaSobrenome()}</td>
                    <td>{$clientes[$i]->pegaTelefone()}</td>
                    <td>{$clientes[$i]->pegaCep()}</td>
                    <td>{$clientes[$i]->pegaEndereco()}</td>
                    <td>{$clientes[$i]->pegaNumero()}</td>
                    <td>{$clientes[$i]->pegaBairro()}</td>
                    <td>{$clientes[$i]->pegaComplemento()}</td>
                    <td class='operacoes'>
                        <a href='/edicao-clientes?id={$clientes[$i]->pegaId()}'>Editar</a>
                        <a href='/excluir-clientes?id={$clientes[$i]->pegaId()}' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a> 
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>