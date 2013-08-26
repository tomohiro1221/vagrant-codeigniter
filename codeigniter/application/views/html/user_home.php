<div class="row">
    <div class="col-md-6 col-md-offset-3 wrapper">
        <?php echo form_open('users/tweet') ?>
        <!--<div class="row">-->
            <textarea id="tweet-box" rows="3" name="content"></textarea>
            <input type="text" class="hidden-username" name="username" value="<?php echo $username ?>" />
        <!--</div>-->
        <!--<div class="container">-->
            <!--<div class="col-md-2 col-md-offset-10">-->
            <button class="btn btn-warning tweet-button" type="submit" name="submit">Tweet</button>
            <!--</div>-->
        <!--</div>-->
        </form>
    </div>
</div>