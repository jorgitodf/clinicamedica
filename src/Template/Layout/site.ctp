<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $this->fetch('title') ?></title>
    <!-- Bootstrap -->
    <?php echo $this->Html->css('/css/bootstrap.min.css'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php echo $this->Html->css('/css/style.css'); ?>

  </head>
  <body>
    <main role="main">
      <?php echo $this->fetch('content'); ?>







    <?php echo $this->Html->script('/js/jquery.min.js'); ?>
    <?php echo $this->Html->script('/js/scripts.js'); ?>
    <?php echo $this->Html->script('/js/bootstrap.min.js'); ?>

    </main>
  </body>
</html>
