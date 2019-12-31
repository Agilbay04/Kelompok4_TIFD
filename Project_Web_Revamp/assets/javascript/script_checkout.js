var linkHeaderProfile = document.getElementById('linkHeaderProfileUser');
var linkHeaderCart = document.getElementById('linkHeaderProfileKeranjang');
var linkHeaderHistory = document.getElementById('linkHeaderProfileHistori');
var linkHeaderCheckout = document.getElementById('linkHeaderProfileCheckout');

checkoutActive();

function checkoutActive()
{
    linkHeaderCheckout.classList.add('active');
    linkHeaderCart.classList.remove('active');
    linkHeaderProfile.classList.remove('active');
    linkHeaderHistory.classList.remove('active');
}