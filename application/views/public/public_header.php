<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF=8">
	<title>Article List</title>
	<?php echo link_tag('assests/css/bootstrap.min.css'); ?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <!--  <form class="navbar-form navbar-left" role="search"> -->
    <?= form_open('user/search',['class'=>'navbar-form navbar-left','role'=>'search'])  ?>
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <?= form_error('search',"<p class='navbar-text'>","</p>")?>
      <ul class="nav navbar-nav navbar-right">
        <li><?= anchor('login','Login')?></li>
      </ul>
    </div>
  </div>
</nav>