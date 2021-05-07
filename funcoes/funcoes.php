<?php
    function menuAtivo($rota) {
        switch ($rota) {
            case '/produtos':
                $nav = array("", "ativo", "");
                break;
            case '/clientes':
                $nav = array("", "", "ativo");
                break;
            default:
                $nav = array("ativo", "", "");
                break;
        }
        return $nav;
    }

    function lancaMensagem($mensagem, $tipo) {
        if ($tipo == "sucesso") {
            echo "<div class='mensagem-sucesso'>
                    {$mensagem}
                  </div>";
        } else if ($tipo == "erro") {
            echo "<div class='mensagem-erro'>
                    {$mensagem}
                  </div>";
        }
    }

    function pegaClientes() {
        $banco = new Banco();
        $conexao = $banco->pegaConexao();
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
        $statement->close();
        return $clientes;

    }

    function pegaProdutos() {
        $banco = new Banco();
        $conexao = $banco->pegaConexao();
        $produtos = array();
        $query = "SELECT * FROM produto";
        $statement = $conexao->prepare($query);
        if ($statement->execute()) {
            $resultado = $statement->get_result();
            while ($linha = $resultado->fetch_assoc()) {
                $dadosProduto = array();
                $dadosProduto['id'] = $linha['id'];
                $dadosProduto['descricao'] = $linha['descricao'];
                $dadosProduto['preco'] = $linha['preco'];
                
                $produtos[] = $dadosProduto;
            }
        }
        $statement->close();
        return $produtos;
    }

