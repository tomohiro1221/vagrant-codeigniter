<h2>Welcome to Twitter</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('forms/login_validate') ?>

	<h5>Username</h5>
	<input type="text" name="username" value="" size="20" />

	<h5>Password</h5>
	<input type="password" name="password" value="" size="20">

	<div><input type="submit" name="submit" value="Log in" /></div>

</form>