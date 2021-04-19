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

