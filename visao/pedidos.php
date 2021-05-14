<?php
    $pedidos = pegaPedidos(); 
?>

<main class="container">
    
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Estado</th>
                <th>Pagamento</th>
                <th>Total</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($pedidos); $i++) {
            echo "<tr>
                    <td>{$pedidos[$i]->pegaId()}</td>
                    <td>{$pedidos[$i]->pegaClienteId()}</td>
                    <td>{$pedidos[$i]->pegaData()}</td>
                    <td>{$pedidos[$i]->pegaHorario()}</td>
                    <td>{$pedidos[$i]->pegaEstado()}</td>
                    <td>{$pedidos[$i]->pegaPagamento()}</td>
                    <td>{$pedidos[$i]->pegaTotalFormatado()}</td>
                    <td class='operacoes'>
                        <a href='/edicao-pedidos?id={$pedidos[$i]->pegaId()}'>Editar</a>
                        <a href='/excluir-pedidos?id={$pedidos[$i]->pegaId()}' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a> 
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>