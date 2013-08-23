<!--<div class="container" style="padding-top: 80px;">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <h2>Welcome to Twitter</h2>

            <h3><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Tweet your life</h3>
            <div>twitter is a great place to talk about yourself.</div>

            <h3><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Tweet to the world</h3>
            <div>you can address people all over the world through twitter.</div>

            <h3><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Keep updated</h3>
            <div>you will constantly get the latest information on twitter.</div>

        </div>-->
        <div class="col-md-4">
            <div class="form-signin">
                <h2 class="form-signin-heading">Please sign in</h2>
                <?php echo form_open('forms/login_try') ?>

                <input type="text" class="form-control" name="username" value="" placeholder="Username" autofocus="">
                <input type="password" class="form-control" name="password" value="" placeholder="Password">
                
                <!--<h5>Username</h5>
                <?php echo form_error('username'); ?>
                <input type="text" name="username" value="" size="20" />

                <h5>Password</h5>
                <?php echo form_error('password'); ?>
                <input type="password" name="password" value="" size="20">

                <div><input type="submit" name="submit" value="Log in" /></div>-->
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