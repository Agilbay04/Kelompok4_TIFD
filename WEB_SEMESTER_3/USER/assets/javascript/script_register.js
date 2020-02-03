/* Miscellaneous */
var link_home = document.getElementById('linkHeaderHome');
var link_about = document.getElementById('linkHeaderAbout');
var link_blog = document.getElementById('linkHeaderBlog');
var link_catalog = document.getElementById('linkHeaderCatalog');
var link_register = document.getElementById('linkHeaderRegister');

registerActive();

function registerActive()
{
    if(link_register == null)
    {
        link_register = null;
    }else
    {
        link_register.classList.add('active');
    }
    link_home.classList.remove('active');
    link_about.classList.remove('active');
    link_blog.classList.remove('active');
    link_catalog.classList.remove('active');
}

/* Register  */

var formRegister = document.querySelector("#formRegister");
var namaUser = formRegister.namaUser;
var genderUser = formRegister.genderUser;
var alamatUser = formRegister.alamatUser;
var notelpUser = formRegister.notelpUser;
var emailUser = formRegister.emailUser;
var passwordUser = formRegister.passwordUser;
var confPassword = formRegister.confPasswordUser;
var fotoProfilUser = formRegister.fotoProfilUser;
var termsAgreement = formRegister.agreeTermsRegister;

/* Parameter Validator */

var regexOnlyLetter = new RegExp("^[a-zA-Z\ ]+$");
var regexOnlyNumber = new RegExp("^[0-9]+$");
var regexNumberAndLetter = new RegExp("^[a-zA-Z0-9\ ]+$");
var regexNumberLetterAndCharacter = new RegExp("^[a-zA-Z0-9\ .,]+$");
var regexEmail = new RegExp("^[a-zA-Z0-9.!#$%&'*+=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$");

/* Utility Function */
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

function isOnlySpace(value)
{
    if(value === ' ')
    {
        return true;
    }else
    {
        return false;
    }
}

/* Validasi Register */

/* Nama User */
namaUser.onblur = function()
{
    if(isEmpty(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidName').innerText = "Nama User tidak boleh kosong.";
    }else if(!regexOnlyLetter.test(namaUser.value))
    {
        namaUser.classList.remove('is-valid')
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidName').innerText = "Nama User hanya boleh berisi huruf saja.";
    }else if(isOnlySpace(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidName').innerText = "Nama user tidak boleh hanya berisi spasi.";
    }else
    {
        namaUser.classList.remove('is-invalid');
        namaUser.classList.add('is-valid');
    }
};

/* Gender User */
genderUser.onblur = function()
{
    if(isEmpty(genderUser.value))
    {
        genderUser.classList.remove('is-valid');
        genderUser.classList.add('is-invalid');
        document.getElementById('invalidGender').innerText = "Harap pilih Jenis Kelamin.";
    }else
    {
        genderUser.classList.remove('is-invalid');
        genderUser.classList.add('is-valid');
    }
};

/* Alamat User */
alamatUser.onblur = function()
{

    if(isEmpty(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidAddress').innerText = "Alamat User tidak boleh kosong.";
    }else if(!regexNumberLetterAndCharacter.test(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidAddress').innerText = "Alamat User hanya boleh berisi huruf dan angka.";
    }else if(isOnlySpace(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidAddress').innerText = "Alamat User tidak boleh hanya berisi spasi.";
    }else
    {
        alamatUser.classList.remove('is-invalid');
        alamatUser.classList.add('is-valid');
    }

};

/* No. Telp User */
notelpUser.onblur = function()
{

    if(isEmpty(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidPhoneNum').innerText = "No. Telp tidak boleh kosong.";
    }else if(!regexOnlyNumber.test(notelpUser.value))
    {

        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidPhoneNum').innerText = "No. Telp hanya boleh berisi angka.";
    }else if(isOnlySpace(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidPhoneNum').innerText = "No. Telp tidak boleh hanya berisi spasi.";
    }else
    {
        notelpUser.classList.remove('is-invalid');
        notelpUser.classList.add('is-valid');
    }

};

/* Email */

emailUser.onblur = function()
{

    if(isEmpty(emailUser.value))
    {
        emailUser.classList.remove('is-valid');
        emailUser.classList.add('is-invalid');
        document.getElementById('invalidEmail').innerText = "Email User tidak boleh kosong.";
    }else if(!regexEmail.test(emailUser.value))
    {
        emailUser.classList.remove('is-valid');
        emailUser.classList.add('is-invalid');
        document.getElementById('invalidEmail').innerText = "Email User tidak valid.";
    }else if(isOnlySpace(emailUser.value))
    {
        emailUser.classList.remove('is-valid');
        emailUser.classList.add('is-invalid');
        document.getElementById('invalidEmail').innerText = "Email User tidak boleh hanya berisi spasi.";
    }else
    {
        emailUser.classList.remove('is-invalid');
        emailUser.classList.add('is-valid');
    }

};

/* Password */

passwordUser.onblur = function()
{

    if(isEmpty(passwordUser.value))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User tidak boleh kosong.";
    }else if(!regexNumberAndLetter.test(passwordUser.value))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User hanya boleh berisi huruf dan angka.";
    }else if(passwordUser.value.toLowerCase().match("kosong"))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User tidak boleh kosong.";
    }else if(isOnlySpace(passwordUser.value))
    {
        passwordUser.classList.remove('is-valid');
        passwordUser.classList.add('is-invalid');
        document.getElementById('invalidPassword').innerText = "Password User tidak boleh hanya berisi spasi.";
    }else
    {
        passwordUser.classList.remove('is-invalid');
        passwordUser.classList.add('is-valid');
    }

};

/* Confirm Password */

confPassword.onfocus = function()
{
    if(passwordUser.classList.contains('is-invalid'))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password salah, harap diperbaiki terlebih dahulu.";
    }else if(isEmpty(passwordUser.value))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password kosong, harap diisi terlebih dahulu.";
    }else
    {
        if(isEmpty(passwordUser.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Password kosong, harap isi terlebih dahulu.";
        }else
        {
            confPassword.classList.remove('is-invalid');
        }
    }
};

confPassword.onblur = function()
{

    if(passwordUser.classList.contains('is-invalid'))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password salah, harap diperbaiki terlebih dahulu.";
    }else if(isEmpty(passwordUser.value))
    {
        confPassword.classList.remove('is-valid');
        confPassword.classList.add('is-invalid');
        document.getElementById('invalidConfirmPassword').innerText = "Password kosong, harap diisi terlebih dahulu.";
    }else
    {
        if(isEmpty(confPassword.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Confirm password tidak boleh kosong.";
        }else if(!regexNumberAndLetter.test(confPassword.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Confirm password hanya boleh berisi huruf dan angka.";
        }else if(confPassword.value !== passwordUser.value)
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Password tidak sesuai.";
        }else if(isOnlySpace(confPassword.value))
        {
            confPassword.classList.remove('is-valid');
            confPassword.classList.add('is-invalid');
            document.getElementById('invalidConfirmPassword').innerText = "Confirm password tidak boleh hanya berisi spasi.";
        }else
        {
            confPassword.classList.remove('is-invalid');
            confPassword.classList.add('is-valid');
        }
    }

};

fotoProfilUser.onchange = function()
{
    var fileName = fotoProfilUser.value;
    var allowedExt = new Array("jpg","png","jpeg");
    var fileExt = fileName.split('.').pop();

    if(allowedExt.includes(fileExt))
    {
        fotoProfilUser.classList.remove('is-invalid');
        fotoProfilUser.classList.add('is-valid');
    }else
    {
        fotoProfilUser.classList.remove('is-valid');
        fotoProfilUser.classList.add('is-invalid');
        document.getElementById('invalidFotoProfile').innerText = "Maaf format file tidak cocok, harap mengganti.";
    }
};

formRegister.addEventListener('submit', function(event){

    if(termsAgreement.checked == false)
    {
        termsAgreement.classList.remove('is-valid');
        termsAgreement.classList.add('is-invalid');
        document.getElementById('invalidAgreement').innerText = "Mohon setujui syarat dan ketentuan kami.";
        event.preventDefault();
        event.stopPropagation();
    }else
    {
        termsAgreement.classList.remove('is-invalid')
        termsAgreement.classList.add('is-valid');


        if(namaUser.classList.contains('is-invalid') || alamatUser.classList.contains('is-invalid') ||
           notelpUser.classList.contains('is-invalid') || emailUser.classList.contains('is-invalid') ||
           passwordUser.classList.contains('is-invalid') || confPassword.classList.contains('is-invalid')
           || fotoProfilUser.classList.contains('is-invalid') || genderUser.classList.contains('is-invalid'))
        {
            $('#modalWarning').modal('show');
            document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
            event.preventDefault();
            event.stopPropagation();
        }else if(isEmpty(namaUser.value) || isEmpty(alamatUser.value) || isEmpty(notelpUser.value)
                || isEmpty(emailUser.value) || isEmpty(passwordUser.value) || isEmpty(confPassword.value)
                || isEmpty(fotoProfilUser.value) || isEmpty(genderUser.value))
        {
            $('#modalWarning').modal('show');
            document.getElementById('modalWarningMessage').innerText = "Harap mengisi form dengan baik dan benar. Isilah form sesuai dengan petunjuk yang diberikan.";
            event.preventDefault();
            event.stopPropagation();
        }else
        {
            return true;
        }
    }

});

