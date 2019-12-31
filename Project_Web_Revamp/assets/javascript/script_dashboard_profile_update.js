var linkHeaderProfile = document.getElementById('linkHeaderProfileUser');
var linkHeaderCart = document.getElementById('linkHeaderProfileKeranjang');
var linkHeaderHistory = document.getElementById('linkHeaderProfileHistori');
var linkHeaderCheckout = document.getElementById('linkHeaderProfileCheckout');

profileActive();

function profileActive()
{
    linkHeaderProfile.classList.add('active');
    linkHeaderCart.classList.remove('active');
    linkHeaderHistory.classList.remove('active');
    linkHeaderCheckout.classList.remove('active');
}

/* Parameter Validator */

var regexOnlyLetter = new RegExp("^[a-zA-Z\ ]+$");
var regexOnlySpace = new RegExp("^[ ]+$");
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
    if(regexOnlySpace.test(value))
    {
        return true;
    }else
    {
        return false;
    }
}

/* The Form */
var formUpdate = document.forms.formProfileUpdateUser;
var namaUser = formUpdate.namaUserProfile;
var alamatUser = formUpdate.alamatUserProfile;
var notelpUser = formUpdate.notelpUserProfile;

namaUser.onblur = function()
{
    if(isEmpty(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNama').innerText = "Nama pengguna tidak boleh kosong.";
    }else if(!regexOnlyLetter.test(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNama').innerText = "Nama pengguna hanya boleh berisi huruf.";
    }else if(isOnlySpace(namaUser.value))
    {
        namaUser.classList.remove('is-valid');
        namaUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNama').innerText = "Nama pengguna tidak boleh hanya berisi spasi.";
    }else
    {
        namaUser.classList.remove('is-invalid');
        namaUser.classList.add('is-valid');
    }    
}

alamatUser.onblur = function()
{
    if(isEmpty(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateAlamat').innerText = "Alamat pengguna tidak boleh kosong.";
    }else if(!regexNumberLetterAndCharacter.test(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateAlamat').innerText = "Alamat pengguna hanya boleh berisi huruf, angka, dan tanda titik / koma.";
    }else if(isOnlySpace(alamatUser.value))
    {
        alamatUser.classList.remove('is-valid');
        alamatUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateAlamat').innerText = "Alamat pengguna tidak boleh hanya berisi spasi.";
    }else
    {
        alamatUser.classList.remove('is-invalid');
        alamatUser.classList.add('is-valid');
    }
}

notelpUser.onblur = function()
{
    if(isEmpty(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNotelp').innerText = "Nomor Telepon pengguna tidak boleh kosong.";
    }else if(!regexOnlyNumber.test(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNotelp').innerText = "Nomor Telepon pengguna hanya boleh berisi angka.";
    }else if(isOnlySpace(notelpUser.value))
    {
        notelpUser.classList.remove('is-valid');
        notelpUser.classList.add('is-invalid');
        document.getElementById('invalidUpdateNotelp').innerText = "Nomor Telepon pengguna tidak boleh hanya berisi spasi.";   
    }else
    {
        notelpUser.classList.remove('is-invalid');
        notelpUser.classList.add('is-valid');
    }
}

formUpdate.addEventListener('submit', function(event){

    if(isEmpty(namaUser.value) || isEmpty(alamatUser.value) || isEmpty(notelpUser.value))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Mohon mengisi semua form yang disediakan terlebih dahulu.";
        event.preventDefault();
        event.stopPropagation();
    }else if(namaUser.classList.contains('is-invalid') || alamatUser.classList.contains('is-invalid')
            || notelpUser.classList.contains('is-invalid'))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Mohon mengisi semua form yang disediakan dengan benar.";
        event.preventDefault();
        event.stopPropagation();
    }else
    {
        return true;
    }

});
