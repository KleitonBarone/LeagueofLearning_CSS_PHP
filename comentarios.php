<?php
if (!isset($_POST['usuario'])){
    header("Location: index.html");
}
else{
 $usuario = $_POST['usuario'];
}
?>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <title>League of Learning - Login</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
   <body class="indigo">
        <nav class="indigo darken-2" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.html" class="brand-logo white-text text-lighten-1">League of Learning</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.html" class="white-text text-lighten-1">Home</a></li>
                    <li><a href="Guides.html" class="white-text text-lighten-1">Guides</a></li>
                    <li><a href="E-sports.html" class="white-text text-lighten-1">E-sports</a></li>
                    <li><a href="Grupo.html" class="white-text text-lighten-1">Grupo</a></li>
                    <li class="active"><a href="#" class="white-text text-lighten-1">Login</a></li>
                    <li><a href="cadastro.html" class="white-text text-lighten-1">Cadastrar-se</a></li>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="index.html" class="blue-text text-darken-4">Home</a></li>
                    <li><a href="Guides.html" class="blue-text text-darken-4">Guides</a></li>
                    <li><a href="E-sports.html" class="blue-text text-darken-4">E-sports</a></li>
                    <li><a href="Grupo.html" class="blue-text text-darken-4">Grupo</a></li>
                    <li class="active"><a href="#" class="blue-text text-darken-4">Login</a></li>
                    <li><a href="cadastro.html" class="blue-text text-darken-4">Cadastrar-se</a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        
        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <div class="header center no-pad-bot"><img src="Logo2.png" alt="League of Learning" /></div>
                    <br><br><br><br>
                </div>
            </div>
            <div class="parallax"><img src="FundodoLogo.jpg" alt="League of Legends"></div>
        </div>
  
        
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row card-panel gray lighten-1 z-depth-5">
                    <h2 class="center">Comentários:</h2>
                    <br />
         <?php
         require 'conecta_mysql.inc';
         $buscaComentarios = mysql_query("SELECT * FROM comentarios ORDER BY id ASC");
         while ($lista = mysql_fetch_array($buscaComentarios)){

        $nome	= $lista['nome'];
        $email	= $lista['email'];
        $comentario = $lista['comentario'];

        echo "
        <div class='card-panel teal lighten-2 black-text'>
        <p class='card-panel white'><strong>Nome:</strong> $nome</p>
        <p class='card-panel white'><strong>Email:</strong> $email</p>
        <p class='card-panel white'><strong>Comentário:</strong> $comentario</p>
        <div class='clear'></div>
        </div>
        <hr />
        ";
}
         ?>
                          <h2 class="center">Deixe seu comentário:</h2>
<form action="cadastraComentario.php" method="post">
    <h5><strong>Nome:</strong> <?= mysql_result(mysql_query("SELECT nome FROM usuarios WHERE login='$usuario' "), 0, "nome")?></h5>
<input class="" type="text" value="<?= mysql_result(mysql_query("SELECT nome FROM usuarios WHERE login='$usuario' "), 0, "nome")?>" name="nome" hidden/>
<div class="clear"></div>
<div class="input-field">
<input class="validate" type="email" name="email" />
<label for="email">E-mail:</label>
</div>
<div class="clear"></div>
<div class="input-field">
    <textarea  class="materialize-textarea" name="comentario" required=""></textarea>
<label for="comentario">Deixe seu comentário:</label>
</div>
<div class="clear"></div>
<br /> <br />
<div class="row">
    <button class="btn waves-effect col s6" type="submit" value="Comente!" >Comente!</button>

 <a class="btn waves-effect col s6" href="index.html">Sair</a>
    </div>
      </form>
      
      
    </div>
    </div>
            </div>
        
        <footer class="page-footer indigo darken-4">
          <div class="container">
            <div class="row">
               <div class="col l6 s12">
                <p class="grey-text text-lighten-4">Obrigado por visitar nosso site. Considere visitar as Redes Sociais do League of Legends</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Redes Sociais</h5>
                <ul>
                  <li><a class="" href="https://twitter.com/lolegendsbr?lang=pt"><img src="Icone-RedeSocial/Twitter.png" alt="Twitter" height="25"/></a></li>
                  <li><a class="" href="https://www.facebook.com/LeagueofLegendsBrasil/"><img src="Icone-RedeSocial/facebook.png" alt="Facebook" height="25"/></a></li>
                  <li><a class="" href="https://www.twitch.tv/riotgamesbrazil"><img src="Icone-RedeSocial/twitchtv.png" alt="TwitchTv" height="25"/></a></li>
                  <li><a class="" href="https://www.youtube.com/user/RiotGamesBrasil"><img src="Icone-RedeSocial/youtube.png" alt="Youtube" height="25"/></a></li>
                </ul>
              </div>
            </div>
          </div>
            
          <div class="footer-copyright">
            <div class="container">
            © 2016 Todos os direitos reservados.
            
            </div>
          </div>
        </footer>

        <script src="https://code.jquery.com/jquery-2.1.1.min.js">
        </script>
        <script src="js/materialize.js">
        </script>
        <script src="js/init.js">
        </script>

        <script>
            $(document).ready(function () {
                $('.slider').slider({full_width: true});
            });
            $(document).ready(function () {
                $('.collapsible').collapsible();
            });
            $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
        </script>

    </body>
</html>
        