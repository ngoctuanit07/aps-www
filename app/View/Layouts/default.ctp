<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('bootstrap');
    ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php 
    echo $this->Html->script('bootstrap.min.js');
    echo $this->fetch('meta');
    ?>
    <style>
        .popover {  z-index: 2220; }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('Assistant Prévention Suicide', '/', array('class' => 'navbar-brand')); ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
			<?php echo $this->Html->link('Accueil', array('controller' => 'admins', 'action' => 'display', 'home')); ?>
            </li>
            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Statistiques <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                	<a href="stats_facebook.html">Facebook</a>
            	</li>
                <li>
                	<a href="stats_twitter.html">Twitter</a>
            	</li>
              </ul>
            </li>
            <li><a href="profile.html">Profils</a></li>
            <li class="divider"></li>
            <li><a href="manual.html">Aide / Manuel</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="divider"></li>
            <li><a href="administration.html">Administration</a></li>
            <li class="divider"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Romain Monin <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="user.html">Paramètres</a></li>
                <li class="divider"></li>
                <li>
                <?php echo $this->Html->link('Déconnexion', array('controller' => 'admins', 'action' => 'logout')); ?>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right" role="search" action="profile_search_result.html">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Rechercher un profil...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
              </span>
            </div>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>
