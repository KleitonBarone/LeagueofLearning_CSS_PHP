<?php
$servidor = "localhost";
$usuario_bd = "root";
$senha_bd = "";
$banco = "League";
//linha para conexão com o banco my sql
$con = mysql_connect($servidor, $usuario_bd, $senha_bd);
//linha de escolha de banco de dados
mysql_select_db($banco);
