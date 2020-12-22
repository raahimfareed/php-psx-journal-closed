let logoutBtns = document.querySelectorAll('.logout-btn');

for (let i = 0; i < logoutBtns.length; i++) {
    logoutBtns[i].addEventListener('click', function(e) {
        e.preventDefault();
        
        let params = `ajax_request=${true}`;

        let xhr = new XMLHttpRequest();
        xhr.open('POST', "includes/ajax/logout.ajax.php");
        xhr.setRequestHeader('Content-type', "application/x-www-form-urlencoded");

        xhr.onload = function() {
            let response = String(this.responseText);

            switch (response) {
                case "success":
                    let successToast = '<b class="green-text">Logged out! You will shortly be redirected.</b>';
                    M.toast({html: successToast});
                    location.replace("./index.php");
                    break;
                default:
                    let errorToast = '<b class="red-text">An error occurred! Please reload the page and try again.</b>';
                    M.toast({html: errorToast});
            }
        }

        xhr.send(params);
    });
}