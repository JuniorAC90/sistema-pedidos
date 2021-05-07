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

    function insereCliente($cliente) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "INSERT INTO cliente(nome, sobrenome, telefone, cep, endereco, numero, bairro, complemento) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sssssiss', $nome, $sobrenome, $telefone, $cep, $endereco, $numero, $bairro, $complemento);

        $nome = $cliente->pegaNome();
        $sobrenome = $cliente->pegaSobrenome();
        $telefone = $cliente->pegaTelefone();
        $cep = $cliente->pegaCep();
        $endereco = $cliente->pegaEndereco();
        $numero = $cliente->pegaNumero();
        $bairro = $cliente->pegaBairro();
        $complemento = $cliente->pegaComplemento();

        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao inserir os dados.", "erro");
        } else {
            lancaMensagem("Dados inseridos com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/clientes");
        }
    }

    function insereProduto($produto) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "INSERT INTO produto(descricao, preco) VALUES(?, ?)";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sd', $descricao, $preco);

        $descricao = $produto->pegaDescricao();
        $preco = $produto->pegaPreco();

        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao inserir os dados.", "erro");
        } else {
            lancaMensagem("Dados inseridos com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/produtos");
        }
    }

