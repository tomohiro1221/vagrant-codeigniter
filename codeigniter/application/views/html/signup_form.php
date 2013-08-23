<h2>Welcome to Twitter</h2>

<?php echo form_open('forms/signup_try') ?>

    <h5>Username</h5>
    <?php echo form_error('username'); ?>
    <input type="text" name="username" value="" size="20" />

    <h5>Password</h5>
    <?php echo form_error('password'); ?>   
    <input type="password" name="password" value="" size="20" />

    <h5>Password again</h5>
    <?php echo form_error('passconf'); ?>   
    <input type="password" name="passconf" value="" size="20" />

    <h5>Email</h5>
    <?php echo form_error('email'); ?>  
    <input type="text" name="email" value="" size="20" />

    <div><input type="submit" name="submit" value="Log in" /></div>

</form>