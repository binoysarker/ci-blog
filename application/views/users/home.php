<?php include('header.php') ?>
<!-- form section -->
<div class="container">
	<?= form_open('AdminController/send') ?>
	  <fieldset>
	    <legend>Amin Login</legend>
	    <div class="form-group">
	      <label for="username">User Name</label>
	      <?= form_input(['class'=>'form-control','type'=>'text','id'=>'username','aria-describedby'=>'username','placeholder'=>'Full Name','name'=>'username']) ?>
	      <small id="username" class="form-text text-muted">Please enter you name</small>
	    </div><div class="form-group">
	      <label for="exampleInputEmail1">Email address</label>
	      <?= form_input(['class'=>'form-control','type'=>'email','id'=>'exampleInputEmail1','aria-describedby'=>'emailHelp','placeholder'=>'Enter email','name'=>'email']) ?>
	      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	    </div>
	    <div class="form-group">
	      <label for="exampleInputPassword1">Password</label>
	      <?= form_password(['type'=>'password','class'=>'form-control','id'=>'exampleInputPassword1','aria-describedby'=>'passwordHelp','placeholder'=>'Password','name'=>'pass']) ?>
	      <small id="passwordHelp" class="form-text text-muted">please enter a strong password</small>
	    </div>
	    </fieldset>
	    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
	    <?= form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'Submit']) ?>
	    <?= form_reset(['type'=>'reset','class'=>'btn btn-info','value'=>'Reset']) ?>
</div>
<?php include('footer.php') ?>