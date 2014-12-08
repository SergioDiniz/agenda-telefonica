<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/6/2014
 * Time: 8:34 PM
 */

include "config.php";
include "banco.php";


if ( isset($_GET['pesquisa']) or isset($_GET['letra']) or isset($_GET['categoria']) or isset($_GET['numerico']) ){

    $sqlPesquisa = "";

    if (isset($_GET['pesquisa'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (nomeResponsavel like '%{$_GET['pesquisa']}%'
                    or nomeEstabelecimento like '%{$_GET['pesquisa']}%'
                    or descricao like '%{$_GET['pesquisa']}%' or subcategoria
                    like '%{$_GET['pesquisa']}%') order by prioridade asc, nomeEstabelecimento asc";
    } elseif (isset ($_GET['letra'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (nomeEstabelecimento like '{$_GET['letra']}%')
                    order by prioridade asc, nomeEstabelecimento asc";
    } elseif (isset($_GET['categoria'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (subcategoria like '{$_GET['categoria']}')
                    order by prioridade asc, nomeEstabelecimento asc";
    } elseif (isset($_GET['numerico'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                      and (nomeEstabelecimento like '0%' or nomeEstabelecimento like '1%'
                        or nomeEstabelecimento like '2%' or nomeEstabelecimento like '3%'
                        or nomeEstabelecimento like '4%' or nomeEstabelecimento like '5%'
                        or nomeEstabelecimento like '6%' or nomeEstabelecimento like '7%'
                        or nomeEstabelecimento like '8%' or nomeEstabelecimento like '9%')
                    order by prioridade asc, nomeEstabelecimento asc";
    }


    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $resultado = $mysqli->query($sqlPesquisa);
    $totalDeLinhas = mysqli_num_rows($resultado);
    $linhasPorPagina = 8;
    $numPaginas = ceil($totalDeLinhas/$linhasPorPagina);
    $inicio = ($pagina*$linhasPorPagina) - $linhasPorPagina;


    if (isset($_GET['pesquisa'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (nomeResponsavel like '%{$_GET['pesquisa']}%'
                    or nomeEstabelecimento like '%{$_GET['pesquisa']}%'
                    or descricao like '%{$_GET['pesquisa']}%' or subcategoria
                    like '%{$_GET['pesquisa']}%') order by prioridade asc, nomeEstabelecimento asc limit $inicio, $linhasPorPagina";
    } elseif (isset ($_GET['letra'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (nomeEstabelecimento like '{$_GET['letra']}%')
                    order by prioridade asc, nomeEstabelecimento asc limit $inicio, $linhasPorPagina";
    } elseif (isset($_GET['categoria'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                    and (subcategoria like '{$_GET['categoria']}')
                    order by prioridade asc, nomeEstabelecimento asc limit $inicio, $linhasPorPagina";
    } elseif (isset($_GET['numerico'])) {
        $sqlPesquisa = "select * from agenda where ativo = 1
                      and (nomeEstabelecimento like '0%' or nomeEstabelecimento like '1%'
                        or nomeEstabelecimento like '2%' or nomeEstabelecimento like '3%'
                        or nomeEstabelecimento like '4%' or nomeEstabelecimento like '5%'
                        or nomeEstabelecimento like '6%' or nomeEstabelecimento like '7%'
                        or nomeEstabelecimento like '8%' or nomeEstabelecimento like '9%')
                    order by prioridade asc, nomeEstabelecimento asc limit $inicio, $linhasPorPagina";
    }

    $resultado = $mysqli->query($sqlPesquisa);

    $resultados = array();

    while ($result = mysqli_fetch_assoc($resultado)){
        $resultados[] = $result;
    }

    mysqli_close($mysqli);
    
} else{
    header('Location: index.php');
}






include "resultadoPesquisa.php";