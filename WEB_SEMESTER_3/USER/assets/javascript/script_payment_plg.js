/* Membuat Sistem validasi format gambar yang akan diupload */
var formUploadBuktiBayar = document.forms.formBuktiBayar;
var uploadBuktiBayar = formUploadBuktiBayar.buktiTransferUser;

/* Utility Function */
function isEmpty(value)
{
    if(value == "")
    {
        return true;
    }else
    {
        return false;
    }
}

/* Memeriksa apakah file yang akan diunggah sesuai atau tidak */

uploadBuktiBayar.onblur = function()
{

    var fileName = uploadBuktiBayar.value;
    var allowedExt = new Array('jpg','png','jpeg');
    var fileExt = fileName.split('.').pop();

    if(isEmpty(uploadBuktiBayar.value))
    {
        uploadBuktiBayar.classList.remove('is-valid');
        uploadBuktiBayar.classList.add('is-invalid');
        document.getElementById('invalidBuktiBayar').innerText = "Bukti pembayaran tidak boleh kosong";
    }else if(!allowedExt.includes(fileExt))
    {
        uploadBuktiBayar.classList.remove('is-valid');
        uploadBuktiBayar.classList.add('is-invalid');
        document.getElementById('invalidBuktiBayar').innerText = "Format foto yang anda kirim tidak sesuai.";
    }else
    {
        uploadBuktiBayar.classList.remove('is-invalid');
        uploadBuktiBayar.classList.add('is-valid');
    }
};

formUploadBuktiBayar.addEventListener('submit',function(event){

    if(isEmpty(uploadBuktiBayar.value))
    {
        uploadBuktiBayar.classList.remove('is-valid');
        uploadBuktiBayar.classList.add('is-invalid');
        document.getElementById('invalidBuktiBayar').innerText = "Bukti pembayaran tidak boleh kosong";
        event.preventDefault();
        event.stopPropagation();
    }else if(uploadBuktiBayar.classList.contains('is-invalid'))
    {
        uploadBuktiBayar.classList.remove('is-valid');
        uploadBuktiBayar.classList.add('is-invalid');
        document.getElementById('invalidBuktiBayar').innerText = "Bukti pembayaran tidak boleh kosong";
        event.preventDefault();
        event.stopPropagation();
    }else
    {
        uploadBuktiBayar.classList.remove('is-invalid');
        uploadBuktiBayar.classList.add('is-valid');
        return true;
    }

});