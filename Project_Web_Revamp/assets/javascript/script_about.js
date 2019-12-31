var link_home = document.getElementById('linkHeaderHome');
var link_about = document.getElementById('linkHeaderAbout');
var link_blog = document.getElementById('linkHeaderBlog');
var link_catalog = document.getElementById('linkHeaderCatalog');
var link_register = document.getElementById('linkHeaderRegister');

aboutActive();

function aboutActive()
{

    link_about.classList.add('active');
    link_home.classList.remove('active');
    link_blog.classList.remove('active');
    link_catalog.classList.remove('active');
    link_register.classList.remove('active');

}