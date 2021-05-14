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
                $cliente = new Cliente();
                $cliente->insereId($linha['id']);
                $cliente->insereNome($linha['nome']);
                $cliente->insereSobrenome($linha['sobrenome']);
                $cliente->insereTelefone($linha['telefone']);
                $cliente->insereCep($linha['cep']);
                $cliente->insereEndereco($linha['endereco']);
                $cliente->insereNumero($linha['numero']);
                $cliente->insereBairro($linha['bairro']);
                $cliente->insereComplemento($linha['complemento']);
                $clientes[] = $cliente;
            }
        }
        $statement->close();
        return $clientes;

    }

    function pegaUmCliente($id) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao();
        $cliente = new Cliente();
        $query = "SELECT * FROM cliente WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            $resultado = $statement->get_result();
            while ($linha = $resultado->fetch_assoc()) {
                $cliente->insereId($linha['id']);
                $cliente->insereNome($linha['nome']);
                $cliente->insereSobrenome($linha['sobrenome']);
                $cliente->insereTelefone($linha['telefone']);
                $cliente->insereCep($linha['cep']);
                $cliente->insereEndereco($linha['endereco']);
                $cliente->insereNumero($linha['numero']);
                $cliente->insereBairro($linha['bairro']);
                $cliente->insereComplemento($linha['complemento']);;
            }
        }
        $statement->close();
        return $cliente;

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
                $produto = new Produto();
                $produto->insereId($linha['id']);
                $produto->insereDescricao($linha['descricao']);
                $produto->inserePreco($linha['preco']);
                
                $produtos[] = $produto;
            }
        }
        $statement->close();
        return $produtos;
    }

    function pegaUmProduto($id) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao();
        $produto = new Produto();
        $query = "SELECT * FROM produto WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('i', $id);
        if ($statement->execute()) {
            $resultado = $statement->get_result();
            while ($linha = $resultado->fetch_assoc()) {
                $produto->insereId($linha['id']);
                $produto->insereDescricao($linha['descricao']);
                $produto->inserePreco($linha['preco']);
            }
        }
        $statement->close();
        return $produto;
    }

    function pegaPedidos() {
        $banco = new Banco();
        $conexao = $banco->pegaConexao();
        $pedidos = array();
        $query = "SELECT * FROM pedido";
        $statement = $conexao->prepare($query);
        if ($statement->execute()) {
            $resultado = $statement->get_result();
            while ($linha = $resultado->fetch_assoc()) {
                $pedido  = new Pedido();
                $pedido->insereId($linha['id']);
                $pedido->insereClienteId($linha['cliente_id']);
                $pedido->insereAno($linha['ano']);
                $pedido->insereMes($linha['mes']);
                $pedido->insereDia($linha['dia']);
                $pedido->insereHora($linha['hora']);
                $pedido->insereMinuto($linha['minuto']);
                $pedido->insereSegundo($linha['segundo']);
                $pedido->insereTotal($linha['total']);
                $pedido->insereEstado($linha['estado']);
                $pedido->inserePagamento($linha['pagamento']);
                
                $pedidos[] = $pedido;
            }
        }
        $statement->close();
        return $pedidos;
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

    function inserePedido($pedido) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "INSERT INTO pedido(id, cliente_id, ano, mes, dia, hora, minuto, segundo, total, estado, pagamento) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sissssssdss', $id, $clienteId, $ano, $mes, $dia, $hora, $minuto, $segundo, $total, $estado, $pagamento);

        $id = $pedido->pegaId();
        $clienteId = $pedido->pegaClienteId();
        $ano = $pedido->pegaAno();
        $mes = $pedido->pegaMes();
        $dia = $pedido->pegaDia();
        $hora = $pedido->pegaHora();
        $minuto = $pedido->pegaMinuto();
        $segundo = $pedido->pegaSegundo();
        $total = $pedido->pegaTotal();
        $estado = $pedido->pegaEstado();
        $pagamento = $pedido->pegaPagamento();

        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao inserir os dados.", "erro");
        } else {
            lancaMensagem("Dados inseridos com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/pedidos");
        }
    }

    function insereItem($item, $indice) {
        $indice++;
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "INSERT INTO item(pedido_id, produto_id, quantidade) VALUES(?, ?, ?)";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sii', $pedidoId, $produtoId, $quantidade);

        $pedidoId = $item->pegaPedidoId();
        $produtoId = $item->pegaProdutoId();
        $quantidade = $item->pegaQuantidade();
        

        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao inserir os dados.", "erro");
        } else {
            lancaMensagem("Item {$indice} inserido com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            //header("refresh:2; url=/pedidos");
        }
    }

    function editaCliente($cliente) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "UPDATE cliente set nome = ?, sobrenome = ?, telefone = ?, cep = ?, endereco = ?, numero = ?, bairro = ?, complemento = ? WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sssssissi', $nome, $sobrenome, $telefone, $cep, $endereco, $numero, $bairro, $complemento, $id);

        $nome = $cliente->pegaNome();
        $sobrenome = $cliente->pegaSobrenome();
        $telefone = $cliente->pegaTelefone();
        $cep = $cliente->pegaCep();
        $endereco = $cliente->pegaEndereco();
        $numero = $cliente->pegaNumero();
        $bairro = $cliente->pegaBairro();
        $complemento = $cliente->pegaComplemento();
        $id = $cliente->pegaId();

        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao editar os dados.", "erro");
        } else {
            lancaMensagem("Dados editados com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/clientes");
        }
    }

    function editaProduto($produto) {
        
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "UPDATE produto set descricao = ?, preco = ? WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('sdi', $descricao, $preco, $id);

        $descricao = $produto->pegaDescricao();
        $preco = $produto->pegaPreco();
        $id = $produto->pegaId();
        

        $statement->execute();
       

        if ($statement->error) {
            lancaMensagem("Erro ao editar os dados.", "erro");
        } else {
            lancaMensagem("Dados editados com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/produtos");
        }
    }

    function removeCliente($id) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "DELETE FROM cliente WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('i', $id);

        
        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao apagar os dados.", "erro");
        } else {
            lancaMensagem("Dados removidos com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/clientes");
        }
    }

    function removeProduto($id) {
        $banco = new Banco();
        $conexao = $banco->pegaConexao(); 
        $query = "DELETE FROM produto WHERE id = ?";
        $statement = $conexao->prepare($query);
        $statement->bind_param('i', $id);

        
        $statement->execute();

        if ($statement->error) {
            lancaMensagem("Erro ao apagar os dados.", "erro");
        } else {
            lancaMensagem("Dados removidos com sucesso!", "sucesso");
            //$statement->affected_rows;
            $statement->close();
            header("refresh:2; url=/produtos");
        }
    }

