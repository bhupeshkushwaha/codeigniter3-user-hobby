<div class="wrapper fadeInDown">
    <div id="formContent">

        <div class="fadeIn first">
          <h1 class="mt-5 mb-3">Create a New User</h1>
        </div>

        <?php  
            if(!empty($success_msg)){ 
                echo '<p class="status-msg success">'.$success_msg.'</p>'; 
            }elseif(!empty($error_msg)){ 
                echo '<p class="status-msg error">'.$error_msg.'</p>'; 
            } 
        ?>

        <form id="userRegisterForm" action="" method="post">

            <input 
                type="text" 
                class="fadeIn second"
                id="full_name"
                name="full_name" 
                placeholder="Enter your full name" 
                value="<?php echo !empty($user['full_name']) ? $user['full_name'] : ''; ?>" 
                required 
            />
            <span class="error-block text-danger"></span>
            <?php echo form_error('full_name','<p class="help-block text-danger">','</p>'); ?>

            <input 
                type="email" 
                class="fadeIn third"
                id="email"
                name="email" 
                placeholder="Enter your email" 
                value="<?php echo !empty($user['email']) ? $user['email'] : ''; ?>" 
                required 
            />
            <span class="error-block text-danger"></span>
            <?php echo form_error('email','<p class="help-block text-danger">','</p>'); ?>

            <input 
                type="password" 
                class="fadeIn fourth"
                id="password"
                name="password" 
                placeholder="Enter your password" 
                required
            />
            <span class="error-block text-danger"></span>
            <?php echo form_error('password','<p class="help-block text-danger">','</p>'); ?>

            <input 
                type="password" 
                class="fadeIn fifth"
                id="conf_password" 
                name="conf_password" 
                placeholder="Enter your confirm passsword" 
                required 
            />
            <span class="error-block text-danger"></span>
            <?php echo form_error('conf_password','<p class="help-block text-danger">','</p>'); ?>

            <input 
                type="submit" 
                class="fadeIn sixth" 
                id="signupSubmit"
                name="signupSubmit" 
                value="Register" 
            />
        </form>

        <div id="formFooter">
          Already have an user? <a href="<?php echo base_url('users/login'); ?>">Login</a>
        </div>

    </div>
</div>