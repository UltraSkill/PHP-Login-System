$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();
    var _form = $(this);
    var _error = $(".js-error",_form);
    var data = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()
    };

    if(data.email.length <16){
        _error
        .text("Please enter a valid email adress").show();
        return false;
    } else if(data.password.length<10){
        _error
        .text("Please enter a passphrase that is at least 10 characters long.")
        .show();
        return false;
    }

    //assuming code gets this far, we can start the ajax process
    _error.hide();
    console.log(data);

    return false;
})

//LETS ENCRYPT