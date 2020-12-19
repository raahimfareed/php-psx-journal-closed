document.getElementById("login-form").addEventListener("submit", function (e) {
    e.preventDefault();

    let email = document.getElementById("email");
    let password = document.getElementById("password");

    let emailE = document.getElementById("email-error");
    let passwordE = document.getElementById("password-error");

    let error = false;

    let redBorder = "1px solid #FF0000";
    let transparentBorder = "1px solid #00000000";
    
    if (email.value == "") {
        email.style.border = redBorder;
        emailE.innerHTML = "Please enter a valid email!";
        error = true;
    }
    else if (email.value.length >= 254) {
        email.style.border = redBorder;
        emailE.innerHTML = "Your email should be smaller than 254 characters!";
        error = true;
    }
    else {
        email.style.border = transparentBorder;
        emailE.innerHTML = "";
    }
    
    if (password.value == "") {
        password.style.border = redBorder;
        passwordE.innerHTML = "Please enter a password!";
        error = true;
    }
    else {
        password.style.border = transparentBorder;
        passwordE.innerHTML = "";
    }

    if (error) return;

    let params = `email=${email.value}&password=${password.value}&ajax_request=${true}`;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', "includes/ajax/login.ajax.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        let response = String(this.responseText);
        switch (response) {
            case "email_empty":
                email.style.border = redBorder;
                emailE.innerHTML = "Please enter an email!";
                break;
            case "email_invalid":
                email.style.border = redBorder;
                emailE.innerHTML = "Please enter a valid email!";
                break;
            case "no_user":
                email.style.border = redBorder;
                emailE.innerHTML = "Can't find your account!";
                let emailErrorToast = '<b class="red-text">This account does not exist! <a href="/login.php">Click here</a> to register</b>';
                M.toast({html: emailErrorToast});
                break;
            case "password_empty":
                password.style.border = redBorder;
                passwordE.innerHTML = "Please enter a password!";
                break;
            case "invalid_password":
                password.style.border = redBorder;
                passwordE.innerHTML = "Incorrect password";
                break;
            case "success":
                let successToast = '<b class="green-text">Logged in! You\'ll be redirected shortly</b>';
                M.toast({html: successToast});
                location.replace("./dashboard.php");
                break;
            case "db":
            default:
                let errorToast = '<b class="red-text">Error Occurred! Please try again later.</b>';
                M.toast({html: errorToast});
                break;
        }
        
    }

    xhr.send(params);
});