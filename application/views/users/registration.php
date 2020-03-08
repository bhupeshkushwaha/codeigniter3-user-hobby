<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">
          <h1 class="mt-5 mb-2">Create a New User</h1>
        </div>

        <?php  
            if(!empty($success_msg)){ 
                echo '<p class="status-msg success">'.$success_msg.'</p>'; 
            }elseif(!empty($error_msg)){ 
                echo '<p class="status-msg error">'.$error_msg.'</p>'; 
            } 
        ?>

        <form action="" method="post">

            <input 
                type="text" 
                class="fadeIn second"
                name="full_name" 
                placeholder="Enter your full name" 
                value="<?php echo !empty($user['full_name']) ? $user['full_name'] : ''; ?>" 
                required 
            />
            <?php echo form_error('full_name','<p class="help-block">','</p>'); ?>

            <input 
                type="email" 
                class="fadeIn third"
                name="email" 
                placeholder="Enter your email" 
                value="<?php echo !empty($user['email']) ? $user['email'] : ''; ?>" 
                required 
            />
            <?php echo form_error('email','<p class="help-block">','</p>'); ?>

            <input 
                type="password" 
                class="fadeIn fourth"
                id="password"
                name="password" 
                placeholder="Enter your password" 
                required
            />
            <?php echo form_error('password','<p class="help-block">','</p>'); ?>

            <input 
                type="password" 
                class="fadeIn fifth"
                id="conf_password" 
                name="conf_password" 
                placeholder="Enter your confirm passsword" 
                required 
            />
            <?php echo form_error('conf_password','<p class="help-block">','</p>'); ?>

            <input type="submit" class="fadeIn sixth" value="Register">
        </form>

        <div id="formFooter">
          Already have an user? <a href="<?php echo base_url('users/login'); ?>">Login</a>
        </div>

    </div>
</div>