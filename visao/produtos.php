<?php
    $produtos = pegaProdutos(); 
?>

<main class="container">
    
    <table class="tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 0; $i < count($produtos); $i++) {
            echo "<tr>
                    <td>{$produtos[$i]['id']}</td>
                    <td>{$produtos[$i]['descricao']}</td>
                    <td>{$produtos[$i]['preco']}</td>
                    
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</main>