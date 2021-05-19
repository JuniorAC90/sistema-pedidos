<?php
    $pedidos = pegaPedidos(); 
?>

<main class="container">
    <section class="busca-pedidos">
        <label>Filtro:</label><input type="text" placeholder="Nome do cliente..." data-busca-pedidos>
    </section>
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
            $cliente = pegaUmCliente($pedidos[$i]->pegaClienteId());
            echo "<tr data-linha-pedido>
                    <td>{$pedidos[$i]->pegaId()}</td>
                    <td data-dados-nome-pedido>{$cliente->pegaNome()}</td>
                    <td>{$pedidos[$i]->pegaData()}</td>
                    <td>{$pedidos[$i]->pegaHorario()}</td>
                    <td>{$pedidos[$i]->pegaEstado()}</td>
                    <td>{$pedidos[$i]->pegaPagamento()}</td>
                    <td>{$pedidos[$i]->pegaTotalFormatado()}</td>
                    <td class='operacoes'>
                        <a href='/impressao?id={$pedidos[$i]->pegaId()}'>Recibo</a>
                        <a href='/edicao-pedidos?id={$pedidos[$i]->pegaId()}'>Editar</a>
                        <a href='/excluir-pedidos?id={$pedidos[$i]->pegaId()}' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a> 
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>