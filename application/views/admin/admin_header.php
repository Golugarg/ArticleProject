<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF=8">
	<title>Admin Panel</title>
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
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">
        <li>
        <!-- <a href="#">Log Out</a>-->
        <?= anchor('login/admin_logout','Log Out'); ?>
        </li>
      </ul>
    </div>
  </div>
</nav>