<?php include('public_header.php');?>
<div class="container">
<!--<form class="form-horizontal">-->
<?= form_open('login/admin_login',['class'=>'form-horizontal'])?>
  <fieldset>
    <legend>Admin Login</legend>
   	 <div class="row">
    	<div class="col-lg-6">
    	 <div class="form-group"> 
    	  <label for="inputEmail" class="col-lg-2 control-label">User Name</label>
    	  <div class="col-lg-10">
    	   <!-- <input type="text" class="form-control" id="inputEmail" placeholder="Username"> -->
    	     <?= form_input(['name'=>'username','class'=>'form-control','placeholder'=>'Username','value'=>set_value('username')]) ?>
    	  </div>
   		 </div>
    	</div>
    	<div class="col-lg-6">
    		<?= form_error('username',"<p class='text-danger'>","</p>")?>
    	</div>
    </div>
    <div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
      <?= form_password(['name'=>'password','class'=>'form-control','id'=>'inputPassword','placeholder'=>'Password']) ?>
   <!--     <input type="password" class="form-control" id="inputPassword" placeholder="Password">-->
      </div>
      </div>
    </div>
    <div class="col-lg-6">
    		<?= form_error('password')?>
    	</div>
    </div>
<?php if($error=$this->session->flashdata('login_failed')):?>
    <div class="row">
     <div class="col-lg-6">
     <div class="alert alert-dismissible alert-danger">
   <!--  <button type="button" class="close" data-dismiss="alert">X</button>
      <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.-->
      <?= $error ?>
      </div>
      </div>
    </div>
<?php endif; ?>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
      	<?= form_reset(['name'=>'reset','value'=>'Cancel','class'=>'btn btn-default'])?>
      	<?= form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary'])?>
<!--    <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>-->
      </div>
    </div>
  </fieldset>
</form>
</div>
<?php

 include('public_footer.php'); ?>