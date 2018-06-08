<?php

if (isset($_COOKIE["nome_usuario"])) {
    $nome_usuario = $_COOKIE["nome_usuario"];
}
if (isset($_COOKIE["senha_usuario"])) {
    $senha_usuario = $_COOKIE["senha_usuario"];
}
if (!(empty($nome_usuario) or empty($senha_usuario))) {
    include './conecta_mysql.inc';
    $resultado = mysql_query("select * from usuarios where login='$nome_usuario'");
    $linha = mysql_num_rows($resultado);
    if ($linha == 1) {
        if ($senha_usuario != mysql_result($resultado, 0, "senha")) {
            setcookie($nome_usuario);
            setcookie($senha_usuario);
            echo "<h1>Você não efetuou o login</h1>";
            echo "<p>";
            echo "<a href='login.html' > Voltar LUL</a>";
            echo "</p>";
            exit();
        }
    } else {
        setcookie($nome_usuario);
        setcookie($senha_usuario);
        echo "<h1>Você não efetuou o login LUL</h1>";
        echo "<p>";
        echo "<a href='login.html' > Voltar </a>";
        echo "</p>";
        exit();
    }
} else{
     setcookie($nome_usuario);
            setcookie($senha_usuario);
            echo "<h1>Você não efetuou o login lul</h1>";
            echo "<p>";
            echo "<a href='login.html' > Voltar </a>";
            echo "</p>";
            exit();
}
mysql_close($con);