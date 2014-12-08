<?php
/**
 * Created by PhpStorm.
 * User: Sergiod
 * Date: 12/6/2014
 * Time: 8:47 PM
 */


$mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO, 3306);

/*
$mysqli->query("SET NAMES ‘utf8’");
$mysqli->query("SET character_set_connection=utf8");
$mysqli->query("SET character_set_client=utf8");
$mysqli->query("SET character_set_results=utf8");
*/
if($mysqli->connect_errno){
    echo "erro ao conectar com o banco";
    die();
}
