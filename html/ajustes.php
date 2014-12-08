<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/7/2014
 * Time: 11:00 AM
 */

function telefoneExiste($mysqli, $telefone){
    $telefone_existe = false;

    $sqlTelefone = "select * from agenda WHERE telefone like {$telefone}";
    $resultadot = $mysqli->query($sqlTelefone);

    if (mysqli_num_rows($resultadot) > 0){
        $telefone_existe = true;
    }

    return $telefone_existe;
}



function getCategoria($subcategoria){


    $categoria = '';

    switch($subcategoria){
        case "Pizzaria":
        case "Bares e Churrascaria":
        case "Padaria":
        case "Lanches":
                $categoria = "restaurantes";
                break;

        case "Supermercados":
        case "Frigorificos":
        case "Postos de Gasolina":
        case "Destribuidoras":
            $categoria = "locais";
            break;

        case "Cabeleireiros":
        case "Manicure e Pedicure":
        case "Esteticista":
            $categoria = "beleza";
            break;

        case "Roupas":
        case "Moveis":
        case "Informatica":
        case "Acessórios":
        case "Catalogo":
            $categoria = "lojas";
            break;

        case "Limpeza":
        case "Pedreiros":
        case "Mototaxistas":
        case "Taxistas":
        case "Serralheiros":
        case "Serviços Gerais":
            $categoria = "servicos ";
            break;

        case "Academias":
        case "Farmacias":
        case "Clínicas":
        case "Consultórios":
        case "Hospitais":
            $categoria = "saude";
            break;


        case "Pousada":
        case "Hoteis":
        case "Motéis":
            $categoria = "hoteis";
            break;

        case "Oficinas":
        case "Concessionárias":
        case "Auto Escola":
            $categoria = "automoveis";
            break;

        case "Escolas":
        case "Reforço":
        case "Professor de Música":
        case "Professor de Dança":
            $categoria = "educacao";
            break;

        case "Provedor de Internet":
        case "Assistência Técnica":
        case "Desenvolvedor de Softwares":
        case "Lan Houses":
        case "Cursos e Treinamento":
            $categoria = "informatica";
            break;

        case "Prefeitura":
        case "Secretarias":
        case "Orelhões":
        case "Segurança":
        case "Serviços Publicos":
            $categoria = "publico";
            break;

        case "Igrejas":
        case "Imobiliárias":
        case "Bancos":
        case "Funerarias":
        case "Pessoal":
        case "Outros":
            $categoria = "outros";
            break;

        default :
                $categoria = "outros";
                break;

    }


    return $categoria;

}