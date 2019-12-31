var link = window.location.href.split("?").pop().split("=");

checkError(link);

function checkError(value)
{
    //Global Error
    if(value.includes("systemerror","true"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Mohon maaf terjadi kesalahan dari sistem, silahkan coba beberapa saat lagi";
    }

    //File Error
    if(value.includes("error","fileexceed"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Ukuran file melebihi kapasitas server saat ini, harap periksa kembali file anda.";      
    }else if(value.includes("error","filemaxexceed"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Ukuran file melebihi batas maksimal file, harap periksa kembali file anda.";
    }else if(value.includes("error","partialupload"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Hanya sebagian file yang terupload, harap melakukan proses upload ulang.";
    }else if(value.includes("error","nofile"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Tidak ada file yang di upload.";
    }else if(value.includes("error","notempdir"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Temporary Directory tidak ditemukan, harap coba beberapa saat lagi.";
    }else if(value.includes("error","failedtowrite"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Gagal menyalin file kedalam server, harap coba beberapa saat lagi.";
    }else if(value.includes("unknown","true"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Terjadi sebuah kesalahan, harap coba beberapa saat lagi.";
    }else if(value.includes("error","fileoverload"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Ukuran file melebihi kapasitas maksimum, harap periksa file anda.";
    }

    //Register Error
    if(value.includes("error","usernameexist"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Email tersebut sudah terdaftar, mohon gunakan email lainnya.";
    }else if(value.includes("error","failedtoregister"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Terjadi sebuah kesalahan dalam mendaftarkan akun, silahkan coba beberapa saat lagi.";
    }else if(value.includes("error","systemerror"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Terjadi sebuah kesalahan di server, silahkan coba beberapa saat lagi.";
    }


    //Login
    if(value.includes("wrongpassword","true"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Password yang anda masukkan salah, silahkan coba lagi.";
    }else if(value.includes("usernotfound","true"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "User tidak ditemukan, harap periksa kembali email dan password anda.";
    }else if(value.includes("errorlogin","system"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Terjadi sebuah kesalahan, harap coba beberapa saat lagi.";
    }else if(value.includes("activestatus","false"))
    {
        $('#modalWarning').modal('show');
        document.getElementById('modalWarningMessage').innerText = "Akun anda belum teraktivasi, harap periksa email anda untuk aktivasi akun.";
    }


}