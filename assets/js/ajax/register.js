document.getElementById("register-form").addEventListener("submit", function (e) {
    e.preventDefault();

    // alert("called");

    let fullName = document.getElementById("full-name");
    let email = document.getElementById("email");
    let ukn = document.getElementById("ukn");
    let uis = document.getElementById("uis");
    let cdcRelationNumber = document.getElementById("cdc-relation-no");
    let cdcAccountNumber = document.getElementById("cdc-account-no");
    let clearingMemberId = document.getElementById("clearing-member-id");
    let clientCode = document.getElementById("client-code");
    let password = document.getElementById("password");
    let passwordConfirm = document.getElementById("password-confirm");

    let fullNameE = document.getElementById("full-name-error");
    let emailE = document.getElementById("email-error");
    let uknE = document.getElementById("ukn-error");
    let uisE = document.getElementById("uis-error");
    let cdcRelationNumberE = document.getElementById("cdc-relation-no-error");
    let cdcAccountNumberE = document.getElementById("cdc-account-no-error");
    let clearingMemberIdE = document.getElementById("clearing-member-id-error");
    let clientCodeE = document.getElementById("client-code-error");
    let passwordE = document.getElementById("password-error");
    let passwordConfirmE = document.getElementById("password-confirm-error");

    let error = false;

    let redBorder = "1px solid #FF0000";
    let transparentBorder = "1px solid #00000000";

    if (fullName.value == "") {
        fullName.style.border = redBorder;
        fullNameE.innerHTML = "Please enter a valid name!";
        error = true;
    }
    else if (fullName.value.length > 64) {
        fullName.style.border = redBorder;
        fullNameE.innerHTML = "Your name should be less than or equal to 64 characters!";
        error = true;
    }
    else {
        fullName.style.border = transparentBorder;
        fullNameE.innerHTML = "";
    }
    
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

    if (ukn.value.length > 32) {
        ukn.style.border = redBorder;
        uknE.innerHTML = "Your UKN should be less than 32 characters!";
        error = true;
    }
    else {
        ukn.style.border = transparentBorder;
        uknE.innerHTML = "";
    }

    if (uis.value.length > 32) {
        uis.style.border = redBorder;
        uisE.innerHTML = "Your UIS should be less than 32 characters!";
        error = true;
    }
    else {
        uis.style.border = transparentBorder;
        uisE.innerHTML = "";
    }

    if (cdcRelationNumber.value.length > 32) {
        cdcRelationNumber.style.border = redBorder;
        cdcRelationNumberE.innerHTML = "Your CDC Relation Number should be less than 32 characters!";
        error = true;
    }
    else {
        cdcRelationNumber.style.border = transparentBorder;
        cdcRelationNumberE.innerHTML = "";
    }

    if (cdcAccountNumber.value.length > 32) {
        cdcAccountNumber.style.border = redBorder;
        cdcAccountNumberE.innerHTML = "Your CDC Relation Number should be less than 32 characters!";
        error = true;
    }
    else {
        cdcAccountNumber.style.border = transparentBorder;
        cdcAccountNumberE.innerHTML = "";
    }

    if (clearingMemberId.value.length > 32) {
        clearingMemberId.style.border = redBorder;
        clearingMemberIdE.innerHTML = "Your Clearing Member ID should be less than 32 characters!";
        error = true;
    }
    else {
        clearingMemberId.style.border = transparentBorder;
        clearingMemberIdE.innerHTML = "";
    }

    if (clientCode.value.length > 32) {
        clientCode.style.border = redBorder;
        clientCodeE.innerHTML = "Your Client Code should be less than 32 characters!";
        error = true;
    }
    else {
        clientCode.style.border = transparentBorder;
        clientCodeE.innerHTML = "";
    }

    if (password.value.length < 8) {
        password.style.border = redBorder;
        passwordE.innerHTML = "Your password should be atleast 8 characters long!";
        error = true;
    }
    else {
        password.style.border = transparentBorder;
        passwordE.innerHTML = "";
    }

    if (passwordConfirm.value != password.value) {
        passwordConfirm.style.border = redBorder;
        passwordConfirmE.innerHTML = "Your password does not match!";
        error = true;
    }
    else {
        passwordConfirm.style.border = transparentBorder;
        passwordConfirmE.innerHTML = "";
    }

    if (error) return;

    let params = `full_name=${fullName.value}&email=${email.value}&ukn=${ukn.value}&uis=${uis.value}&cdc_relation_number=${cdcRelationNumber.value}&cdc_account_number=${cdcAccountNumber.value}&clearing_member_id=${clearingMemberId.value}&client_code=${clientCode.value}&password=${password.value}&password_confirm=${passwordConfirm.value}&date=${Date.now()}&ajax_request=${true}`;

    let xhr = new XMLHttpRequest();
    xhr.open('POST', "includes/ajax/register.ajax.php");
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        let response = String(this.responseText);
        switch (response) {
            case "email_taken":
                email.style.border = redBorder;
                emailE.innerHTML = "This email is already taken!";
                break;
            case "full_name_empty":
                fullName.style.border = redBorder;
                fullNameE.innerHTML = "Please enter a valid name!";
                break;
            case "full_name_long":
                fullName.style.border = redBorder;
                fullNameE.innerHTML = "Your name should be less than or equal to 64 characters!";
                break;
            case "email_empty":
                email.style.border = redBorder;
                emailE.innerHTML = "Please enter a valid email!";
                break;
            case "email_long":
                email.style.border = redBorder;
                emailE.innerHTML = "Your email should be less than 254 characters!";
                break;
            case "ukn_long":
                ukn.style.border = redBorder;
                uknE.innerHTML = "Your UKN should be less than or equal to 32 characters!";
                break;
            case "uis_long":
                uis.style.border = redBorder;
                uisE.innerHTML = "Your UIS should be less than or equal to 32 characters!";
                break;
            case "cdc_relation_number_long":
                cdcRelationNumber.style.border = redBorder;
                cdcRelationNumberE.innerHTML = "Your CDC Relation Number should be less than or equal to 32 characters!";
                break;
            case "cdc_account_number_long":
                cdcAccountNumber.style.border = redBorder;
                cdcAccountNumberE.innerHTML = "Your CDC Account Number should be less than or equal to 32 characters!";
                break;
            case "clearing_member_id_long":
                clearingMemberId.style.border = redBorder;
                clearingMemberIdE.innerHTML = "Your Clearing Member ID should be less than or equal to 32 characters!";
                break;
            case "client_code_long":
                clientCode.style.border = redBorder;
                clientCodeE.innerHTML = "Your Client Code should be less than or equal to 32 characters!";
                break;            
            case "password_short":
                password.style.border = redBorder;
                passwordE.innerHTML = "Your password should be atleast 8 characters long!";
                break;
            case "password_no_match":
                passwordConfirm.style.border = redBorder;
                passwordConfirmE.innerHTML = "Your password does not match!";
                break;
            case "success":
                let successToast = '<b class="green-text">Account created!<a href="/login.php">Click here</a> to login</b>';
                M.toast({html: successToast});
                break;
            case "db":
                // let btn = document.getElementById("register-btn");
                // btn.value = "Please reload the page and try again";
                // btn.style.backgroundImage = "linear-gradient(to right, #c72424, rgb(186, 49, 140), #772bb6)";
            default:
                let errorToast = '<b class="red-text">Error Occurred! Please try again later.</b>';
                M.toast({html: errorToast});
                break;
        }
        
    }

    xhr.send(params);
});