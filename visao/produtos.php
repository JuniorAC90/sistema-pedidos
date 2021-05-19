<?php
    $produtos = pegaProdutos(); 
?>

<main class="container">
    <section class="busca-produtos">
        <label>Filtro:</label><input type="text" placeholder="Descrição do produto..." data-busca-produtos>
    </section>
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>-</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($produtos); $i++) {
            echo "<tr data-linha-produto>
                    <td>{$produtos[$i]->pegaId()}</td>
                    <td data-dados-descricao-produto>{$produtos[$i]->pegaDescricao()}</td>
                    <td>{$produtos[$i]->pegaPrecoFormatado()}</td>
                    <td class='operacoes'>
                        <a href='/edicao-produtos?id={$produtos[$i]->pegaId()}'>Editar</a>
                        <a href='/excluir-produtos?id={$produtos[$i]->pegaId()}' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a> 
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>