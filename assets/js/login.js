function IsEmail(email) {
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(!regex.test(email)) {
		return false;
	}

	return true;
}

$(function () {
    $("#signupSubmit").click(function (e) {
    	e.preventDefault();

    	var $form = $('#userRegisterForm');
    	var fullName = $("#full_name").val(); 
    	var email = $("#email").val(); 
        var password = $("#password").val();
        var confirmPassword = $("#conf_password").val();

        var is_validate = [];

        if (fullName == "") {
        	$form.find("#full_name").next("span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if (email == "") {
        	$form.find("#email").next("span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if( IsEmail(email) == false ) {
          	$form.find("#email").next("span.error-block").text('Email-id is invalid.')
            
          	is_validate.push('false');
        }

        if (password != confirmPassword) {
        	$form.find("#conf_password").next("span.error-block").text('Passwords do not match.')
            
            is_validate.push('false');
        }

        if( is_validate.length !== 0 && $.inArray("false", is_validate)) {
		    return false;
		} 

        $form.submit();
    });



    $("#loginSubmit").click(function (e) {
    	e.preventDefault();

    	var $form = $('#userLoginForm');
    	var email = $("#email").val(); 
        var password = $("#password").val();

        var is_validate = [];

        if (email == "") {
        	$form.find("#email").next("span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if( IsEmail(email) == false ) {
          	$form.find("#email").next("span.error-block").text('Email-id is invalid.')
            
          	is_validate.push('false');
        }

        if (password == "") {
        	$form.find("#password").next("span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if( is_validate.length !== 0 && $.inArray("false", is_validate)) {
		    return false;
		} 

        $form.submit();
    });
});