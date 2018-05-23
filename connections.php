<?php
$link = mysql_connect('mysql08.redehost.com.br', 'seven', 'Senha@123');
if (!$link) {
    die('Não foi possível estabelecer uma conexão com o MySQL : ' . mysql_error());
}
// make foo the current db
$db_selected = mysql_select_db('seven', $link);
if (!$db_selected) {
    die ('Não foi possivel acessar o banco de dados: ' . mysql_error());
}
?>