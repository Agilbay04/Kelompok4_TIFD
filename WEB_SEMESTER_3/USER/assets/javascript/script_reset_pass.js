var formReset = document.forms.formResetPassword;
var passwordReset = formReset.resetPassword;
var confPasswordReset = formReset.confirmResetPassword;

/* Regex */
var regexNumberAndLetter = new RegExp("^[a-zA-Z0-9\ ]+$");

/* Utility */
function isEmpty(value)
{
    if(value === '')
    {
        return true;
    }else
    {
        return false;
    }
};


/* Password */
passwordReset.onblur = function()
{

    if(isEmpty(passwordReset.value))
    {
        passwordReset.classList.remove('is-valid');
        passwordReset.classList.add('is-invalid');
        document.getElementById('invalidResetPassword').innerText = "Password tidak boleh kosong.";
    }else if(!regexNumberAndLetter.test(passwordReset.value))
    {
        passwordReset.classList.remove('is-valid');
        passwordReset.classList.add('is-invalid');
        document.getElementById('invalidResetPassword').innerText = "Password hanya boleh berisi huruf dan angka.";
    }else
    {
        passwordReset.classList.remove('is-invalid');
        passwordReset.classList.add('is-valid');
    }

};

/* Confirm Password */

confPasswordReset.onfocus = function()
{

    if(isEmpty(passwordReset.value))
    {
        confPasswordReset.classList.remove('is-valid');
        confPasswordReset.classList.add('is-invalid');
        document.getElementById('invalidConfResetPassword').innerText = "Password kosong, harap isi terlebih dahulu.";
    }else if(passwordReset.classList.contains('is-invalid'))
    {
        confPasswordReset.classList.remove('is-valid');
        confPasswordReset.classList.add('is-invalid');
        document.getElementById('invalidConfResetPassword').innerText = "Password invalid, harap perbaiki terlebih dahulu.";
    }else
    {
        confPasswordReset.classList.remove('is-invalid');
    }

};

confPasswordReset.onblur = function()
{

    if(isEmpty(passwordReset.value))
    {
        confPasswordReset.classList.remove('is-valid');
        confPasswordReset.classList.add('is-invalid');
        document.getElementById('invalidConfResetPassword').innerText = "Password kosong, harap isi terlebih dahulu.";
    }else if(passwordReset.classList.contains('is-invalid'))
    {
        confPasswordReset.classList.remove('is-valid');
        confPasswordReset.classList.add('is-invalid');
        document.getElementById('invalidConfResetPassword').innerText = "Password invalid, harap perbaiki terlebih dahulu.";
    }else
    {
        confPasswordReset.classList.remove('is-invalid');

        if(isEmpty(confPasswordReset.value))
        {
            confPasswordReset.classList.remove('is-valid');
            confPasswordReset.classList.add('is-invalid');
            document.getElementById('invalidConfResetPassword').innerText = "Confirm password tidak boleh kosong.";
        }else if(!regexNumberAndLetter.test(confPasswordReset.value))
        {
            confPasswordReset.classList.remove('is-valid');
            confPasswordReset.classList.add('is-invalid');
            document.getElementById('invalidConfResetPassword').innerText = "Confirm password hanya boleh berisi huruf dan angka.";
        }else if(confPasswordReset.value !== passwordReset.value)
        {
            confPasswordReset.classList.remove('is-valid');
            confPasswordReset.classList.add('is-invalid');
            document.getElementById('invalidConfResetPassword').innerText = "Password tidak sama.";
        }else
        {
            confPasswordReset.classList.remove('is-invalid');
            confPasswordReset.classList.add('is-valid');
        }

    }

};

/* Form nya  */

formReset.addEventListener('submit', function(event){


    if(isEmpty(passwordReset.value) || isEmpty(confPasswordReset.value))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
        event.preventDefault();
        event.stopPropagation();
    }else if(passwordReset.classList.contains('is-invalid') || confPasswordReset.classList.contains('is-invalid'))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
        event.preventDefault();
        event.stopPropagation();
    }else
    {
        return true;
    }

});