    <div class="col-md-4">
        <div class="form-signin">
            <h2 class="form-signin-heading">Please sign up</h2>
            <?php echo form_open('forms/signup_try') ?>

            <input type="text" class="form-control" name="username" value="" placeholder="Username" autofocus="" />
            <input type="password" class="form-control" name="password" value="" placeholder="Password" />
            <input type="password" class="form-control" name="passconf" value="" placeholder="Password Again" />
            <input type="text" class="form-control" name="email" value="" placeholder="Your Email" />       
                <!--<h5>Username</h5>
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
                <input type="text" name="email" value="" size="20" />-->
                <div class="container">
                    <div class="col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-5">
                        <button class="btn btn-warning form-button" type="submit" name="submit">Sign in</button>
                    </div>
                </div>
                </form>
                <?php if($error_exists) echo '<div class="alert alert-danger form-error">'.$error_description.'</div>'; ?>
            </div>
        </div>
    </div>
</div>