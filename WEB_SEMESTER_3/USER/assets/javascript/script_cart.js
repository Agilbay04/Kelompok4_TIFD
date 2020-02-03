var linkHeaderProfile = document.getElementById('linkHeaderProfileUser');
var linkHeaderCart = document.getElementById('linkHeaderProfileKeranjang');
var linkHeaderHistory = document.getElementById('linkHeaderProfileHistori');
var linkHeaderCheckout = document.getElementById('linkHeaderProfileCheckout');

cartActive();

function cartActive()
{
    linkHeaderCart.classList.add('active');
    linkHeaderProfile.classList.remove('active');
    linkHeaderHistory.classList.remove('active');
    linkHeaderCheckout.classList.remove('active');
}



//Membuat pengurangan dan penjumlahan laptop yang ini dibeli ketika tombol kurang dan tambah di klik
function decreaseQtyBeli(element)
{
    var qtyBeli = element.nextElementSibling;
    if(qtyBeli.innerText <= 1)
    {
        element.classList.add('disabled');
    }else if(qtyBeli.innerText > 1)
    {
        element.classList.remove('disabled');
        qtyBeli.innerText = parseInt(qtyBeli.innerText) - 1;
    }
}

function increaseQtyBeli(element)
{
    var qtyBeli = element.previousElementSibling;
    if(qtyBeli.innerText > 0)
    {
        qtyBeli.innerText = parseInt(qtyBeli.innerText) + 1;
    }
}