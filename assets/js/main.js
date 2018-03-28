$(document)
.on("submit", "form.js-register", function(event){
    event.preventDefault();
    var _form = $(this);
    var _error = $(".js-error",_form);
    var dataObj = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()
    };

    if(dataObj.email.length <16){
        _error
        .text("Please enter a valid email adress").show();
        return false;
    } else if(dataObj.password.length<10){
        _error
        .text("Please enter a passphrase that is at least 10 characters long.")
        .show();
        return false;
    }

    //assuming code gets this far, we can start the ajax process
    _error.hide();
    $.ajax({
        type: 'POST',
        url: 'ajax/register.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data){
        //whatever data is
        if(data.redirect !== undefined){
            window.location=data.redirect;

        }else if(data.error !== undefined){
            _error.text(data.error).show();
        }
        //alert(data.name);
    })
    .fail(function ajaxFailed(e){
        // this failed
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data){
        //always
        console.log('Always');
    })
    return false;
})
.on("submit", "form.js-login", function(event){
    event.preventDefault();
    var _form = $(this);
    var _error = $(".js-error",_form);
    var dataObj = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()
    };

    if(dataObj.email.length <16){
        _error
        .text("Please enter a valid email adress").show();
        return false;
    } else if(dataObj.password.length<10){
        _error
        .text("Please enter a passphrase that is at least 10 characters long.")
        .show();
        return false;
    }

    //assuming code gets this far, we can start the ajax process
    _error.hide();
    $.ajax({
        type: 'POST',
        url: 'ajax/login.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data){
        //whatever data is
        if(data.redirect !== undefined){
            window.location=data.redirect;

        }else if(data.error !== undefined){
            _error.html(data.error).show();
        }
        //alert(data.name);
    })
    .fail(function ajaxFailed(e){
        // this failed
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data){
        //always
        console.log('Always');
    })
    return false;
})

//LETS ENCRYPT
