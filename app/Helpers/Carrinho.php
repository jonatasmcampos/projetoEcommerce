<?php

use App\Models\Carrinho;

if (!function_exists('carrinho_itens')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function carrinho_itens()
    {
        dd(Carrinho::all());
    }
}
