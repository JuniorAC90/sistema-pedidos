<?php 
    $clientes = pegaClientes();
    $produtos = pegaProdutos();
?>

<main class="container">
    <form class="formulario-pedidos" method="post" action="/salvar-pedidos">
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Cliente:<input list="lista-clientes">
                <datalist id="lista-clientes">
                    <?php 
                        for ($i = 0; $i < count($clientes); $i++) {
                            echo "<option value={$clientes[$i]['id']}>{$clientes[$i]['nome']}</option>";
                        }
                        
                    ?>
                </datalist>
                <button type="button">Adicionar</button>
            </label>
            <label class="formulario-pedidos__texto">
                Produto:<input list="lista-produtos">
                <datalist id="lista-produtos">
                    <?php 
                        for ($i = 0; $i < count($produtos); $i++) {
                            echo "<option value={$produtos[$i]['id']}>{$produtos[$i]['descricao']}</option>";
                        }
                        
                    ?>
                </datalist>
                <button type="button">Adicionar</button>
            </label>
            
        </fieldset>
        <fieldset class="formulario-pedidos__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>