    <div class="col-md-4">
        <div class="form-signin">
            <h2 class="form-signin-heading">Please sign up</h2>
            <?php echo form_open('forms/signup_try') ?>

            <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" autofocus="" />
            <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" />
            <input type="password" class="form-control" name="passconf" value="<?php echo set_value('passconf'); ?>" placeholder="Password Again" />
            <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Your Email" />       
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
                        <button class="btn btn-warning form-button" type="submit" name="submit">Sign up</button>
                    </div>
                </div>
                </form>
                <?php if($error_exists) echo '<div class="alert alert-danger form-error">'.$error_description.'</div>'; ?>
                <!--<?php if($error_exists) echo '<div class="alert alert-danger form-error"></div>'; ?>  -->              
                <!--<?php if($error_exists) echo validation_errors(); ?>-->
            </div>
        </div>
    </div>
</div>