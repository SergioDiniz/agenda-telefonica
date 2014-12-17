<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/7/2014
 * Time: 10:21 AM
 */
include "config.php";
include "banco.php";
include "ajustes.php";



$erros = array();
$tem_erros = false;

if(isset($_POST['termo'])){

        $erros = array();
        $tem_erros = false;

        if (telefoneExiste($mysqli, $_POST['telefone'])){
            $erros['telefone'] = "Telefone ja cadastrado";
            $tem_erros = true;
        }

        if(!$tem_erros){
            if($_POST['numero'] == ""){
                $_POST['numero'] = -1;
            }


            $data = date('Y-m-d');
            $categoria = getCategoria($_POST['subcategoria']);

            $sqlPesquisar = "insert into agenda (nomeResponsavel, emailResponsavel, nomeEstabelecimento,
                        telefone, descricao, Rua, Numero, Complemento,
                        ativo, codigo, categoria, subcategoria, dataCastro, prioridade)
                        value ('{$_POST['nomeResponsavel']}', '{$_POST['emailResponsavel']}', '{$_POST['nomeEstabelecimento']}',
                        '{$_POST['telefone']}', '{$_POST['descricao']}', '{$_POST['rua']}', {$_POST['numero']}, '{$_POST['complemento']}',
                        true, '{$_POST['telefone']}', '{$categoria}', '{$_POST['subcategoria']}', '{$data}', 1)";

            $mysqli->query($sqlPesquisar);

            mysqli_close($mysqli);

            header('Location: index.php');

        }
}

$cadastro = array(
    'nomeResponsavel' => (isset($_POST['nomeResponsavel'])) ? $_POST['nomeResponsavel'] : '',
    'emailResponsavel' => (isset($_POST['emailResponsavel'])) ? $_POST['emailResponsavel'] : '',
    'nomeEstabelecimento' => (isset($_POST['nomeEstabelecimento'])) ? $_POST['nomeEstabelecimento'] : '',
    'telefone' => (isset($_POST['telefone'])) ? $_POST['telefone'] : '',
    'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
    'rua' => (isset($_POST['rua'])) ? $_POST['rua'] : '',
    'numero' => (isset($_POST['numero'])) ? $_POST['numero'] : '',
    'complemento' => (isset($_POST['complemento'])) ? $_POST['complemento'] : '',
    'subcategoria' => (isset($_POST['subcategoria'])) ? $_POST['subcategoria'] : ''
);


include "cadastroHTML.php";

