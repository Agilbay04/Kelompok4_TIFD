/* Form Login */
var formLoginPelanggan = document.forms.formLoginPelanggan;
var emailLogin = formLoginPelanggan.emailLogin;
var passwordLogin = formLoginPelanggan.passwordLogin;
var rememberLogin = formLoginPelanggan.checkRememberMe;

/* The Regex */
var regexOnlyLetter = new RegExp("^[a-zA-Z\ ]+$");
var regexOnlyNumber = new RegExp("^[0-9]+$");
var regexNumberAndLetter = new RegExp("^[a-zA-Z0-9\ ]+$");
var regexNumberLetterAndCharacter = new RegExp("^[a-zA-Z0-9\ .,]+$");
var regexEmail = new RegExp("^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");

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
}

/* Email User */
emailLogin.onblur = function()
{

    if(isEmpty(emailLogin.value))
    {
        emailLogin.classList.remove('is-valid');
        emailLogin.classList.add('is-invalid');
        document.getElementById('invalidEmailLogin').innerText = "Email tidak boleh kosong.";
    }else if(!regexEmail.test(emailLogin.value))
    {
        emailLogin.classList.remove('is-valid');
        emailLogin.classList.add('is-invalid');
        document.getElementById('invalidEmailLogin').innerText = "Email tidak valid.";
    }else
    {
        emailLogin.classList.remove('is-invalid');
        emailLogin.classList.add('is-valid');
    }

}

/* Password User */
passwordLogin.onblur = function()
{

    if(isEmpty(passwordLogin.value))
    {
        passwordLogin.classList.remove('is-valid');
        passwordLogin.classList.add('is-invalid');
        document.getElementById('invalidPasswordLogin').innerText = "Password tidak boleh kosong.";
    }else if(!regexNumberAndLetter.test(passwordLogin.value))
    {
        passwordLogin.classList.remove('is-valid');
        passwordLogin.classList.add('is-invalid');
        document.getElementById('invalidPasswordLogin').innerText = "Password hanya boleh berisi huruf dan angka.";
    }else
    {
        passwordLogin.classList.remove('is-invalid');
        passwordLogin.classList.add('is-valid');
    }

};

/* Login */
formLoginPelanggan.addEventListener('submit', function(event){

    if(emailLogin.classList.contains('is-invalid') || passwordLogin.classList.contains('is-invalid'))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
        event.preventDefault();
        event.stopPropagation();
    }else if(isEmpty(emailLogin.value) || isEmpty(passwordLogin.value))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
        event.preventDefault();
        event.stopPropagation();
    }
    {
        return true;
    }

});
