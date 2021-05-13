<?php 
    $clientes = pegaClientes();
    $produtos = pegaProdutos();
?>

<main class="container">
    <section class="secao-pedidos">
        <div class="secao-pedidos__campos">
            <label class="secao-pedidos__texto">
                Cliente:<input list="lista-clientes" data-cliente>
                <datalist id="lista-clientes">
                    <?php 
                        for ($i = 0; $i < count($clientes); $i++) {
                            echo "<option value={$clientes[$i]['telefone']}>{$clientes[$i]['nome']}</option>";
                        }
                        
                    ?>
                </datalist>
                <button data-adiciona-cliente>Adicionar</button>
            </label>
        </div>
        <div class="secao-pedidos__campos">
            <label class="secao-pedidos__texto">
                Produto:<input list="lista-produtos">
                <datalist id="lista-produtos">
                    <?php 
                        for ($i = 0; $i < count($produtos); $i++) {
                            echo "<option value={$produtos[$i]['id']}>{$produtos[$i]['descricao']}</option>";
                        }
                        
                    ?>
                </datalist>
            </label>
            <label class="secao-pedidos__texto">
                
                Quantidade:<input type="number" id=quantidade-pedido name="quantidade-pedido" min="1" value="1">
                <button adiciona-clientes>Adicionar</button>
            </label>
            
        </div>
        <div class="formulario-pedidos__botoes">
            <button >Fechar Pedido</button>
            <button>Limpar</button>
        </div>
    </section>
    <form class="formulario-pedidos" method="post" action="/salvar-pedidos">
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Cliente:<input type="text" id="cliente-pedido" name="cliente-pedido" data-cliente-pedido readonly>
            </label>
        </fieldset>
        <fieldset class="formulario-pedidos__campos">
            <label class="formulario-pedidos__texto">
                Produto:<input list="lista-produtos">
                <datalist id="lista-produtos">
                    <?php 
                        for ($i = 0; $i < count($produtos); $i++) {
                            echo "<option value={$produtos[$i]['id']}>{$produtos[$i]['descricao']}</option>";
                        }
                        
                    ?>
                </datalist>
            </label>
            <label class="formulario-pedidos__texto">
                
                Quantidade:<input type="number" id=quantidade-pedido name="quantidade-pedido" min="1" value="1">
                <button adiciona-cliente>Adicionar</button>
            </label>
            
        </fieldset>
        <fieldset class="formulario-pedidos__botoes">
            <input type="submit" value="Salvar">
            <input type="reset" value="Limpar">
        </fieldset>
    </form>
</main>