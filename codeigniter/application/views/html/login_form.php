<h2>Welcome to Twitter</h2>

<a href="forms/load_signup_form">Sign up now!</a>

<?php echo form_open('forms/login_try') ?>

    <h5>Username</h5>
    <?php echo form_error('username'); ?>
    <input type="text" name="username" value="" size="20" />

    <h5>Password</h5>
    <?php echo form_error('password'); ?>
    <input type="password" name="password" value="" size="20">

    <div><input type="submit" name="submit" value="Log in" /></div>

</form>