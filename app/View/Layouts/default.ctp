<!DOCTYPE html>
<html>
<head>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Cryptocurrency Market Capitalizations With Voice" />
    <meta property="og:description" content="Cryptocurrency Market Capitalizations With Voice" />
    <meta property="og:image" content="http://www.buythemoon.org/img/principal.jpg" />
    <meta property="og:image:alt" content="http://www.buythemoon.org/img/principal.jpg" />
    <meta property="og:url" content="http://www.buythemoon.org" />
	<?php echo $this->Html->charset(); ?>
	<title>
    <?php
/**
 * Buy the moon
 * 
 */

$cakeDescription = '- Trading Cryptocurrency';
?>
    Buy The Moon
		<?php echo $cakeDescription; ?>
	</title>
	<?php 
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('cssStylePersonal');

		//echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  <!--Etiquetas facebook, falta la imagen-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="description" content="Cryptocurrency Market Capitalizations with voice" />
  <meta name="keywords" content="">

  <!-- -->
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109300346-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-109300346-1');
  </script>

</head>
<body class="gradient-bg">
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_EU/sdk.js#xfbml=1&version=v2.11&appId=1422158741431453';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-default class-menu" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="https://buythemoon.org/" style="color: #5bc0de !important;">Buy the moon (Beta)</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul>
      <li></li>
    </ul>
  </div>
</nav>


	
		<div id="content" class="container">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>


		</div>
	
</body>
</html>
