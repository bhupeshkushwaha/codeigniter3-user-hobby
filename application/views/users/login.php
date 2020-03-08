<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">
          <h1 class="mt-5 mb-2">User Hobbies</h1>
        </div>

        <?php  
            if(!empty($success_msg)){ 
                echo '<p class="status-msg success">'.$success_msg.'</p>'; 
            }elseif(!empty($error_msg)){ 
                echo '<p class="status-msg error">'.$error_msg.'</p>'; 
            } 
        ?>

        <form action="" method="post">
            <input type="text" id="email" class="fadeIn second" name="email" placeholder="Enter your mail id" />
            <?php echo form_error('email','<p class="help-block">','</p>'); ?>

            <input type="text" id="password" class="fadeIn third" name="password" placeholder="Enter your password" />
            <?php echo form_error('password','<p class="help-block">','</p>'); ?>

            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <div id="formFooter">
          Don't have an user? <a href="<?php echo base_url('users/registration'); ?>">Register</a>
        </div>

    </div>
</div>