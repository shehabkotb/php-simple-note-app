$(document).ready(function() {
    const loginBtn = $("#btn-signup");
    const errorLbl = $("#lbl-error");
    const nameInput = $("#input-name");
    const emailInput = $("#input-email");
    const passwordInput = $("#input-password");

    loginBtn.click(function() {
        errorLbl.text("");
        $.ajax({
            url: 'api/user/signup.php',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify({
                name: nameInput.val(),
                email: emailInput.val(),
                password: passwordInput.val(),
            }),
            success: function(data, textStatus, jQxhr) {
                window.location.replace('index.php');
            },
            error: function( jqXhr, textStatus, errorThrown ){
                try {
                    const data = JSON.parse(jqXhr.responseText);
                    if (!data.message) throw "";
                    errorLbl.text(data.message);
                } catch (e) {
                    errorLbl.text("An error occured while creating the user");
                }
            }
        });
    })
})