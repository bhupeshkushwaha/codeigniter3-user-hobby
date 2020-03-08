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

    	var fullName = $("#full_name").val(); 
    	var email = $("#email").val(); 
        var password = $("#password").val();
        var confirmPassword = $("#conf_password").val();

        var is_validate = [];

        if (fullName == "") {
        	$("#full_name span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if (email == "") {
        	$("#full_name span.error-block").text('This fiels is required.')
            
            is_validate.push('false');
        }

        if( IsEmail(email) == false ) {
          	$("#full_name span.error-block").text('Email-id is invalid.')
            
          	is_validate.push('false');
        }

        if (password != confirmPassword) {
        	$("#conf_password span.error-block").text('Passwords do not match.')
            
            is_validate.push('false');
        }

        if($.inArray("false", is_validate)) {
		    return false;
		} 

        return true;
    });
});