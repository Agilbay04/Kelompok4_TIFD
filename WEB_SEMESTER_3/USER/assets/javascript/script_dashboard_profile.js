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
