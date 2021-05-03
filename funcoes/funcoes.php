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

