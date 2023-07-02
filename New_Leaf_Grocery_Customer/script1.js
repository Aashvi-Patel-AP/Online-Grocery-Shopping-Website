
let shoppingCart = document.querySelector('.shopping-cart');
document.querySelector('#cart-btn').onclick = () =>
{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let loginForm = document.querySelector('.login-form');
document.querySelector('#login-btn').onclick = () =>
{
    searchForm.classList.remove('active');
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    shoppingCart.classList.remove('active');
}

let UpdateForm = document.querySelector('.user-update-form');
document.querySelector('#login-btn').onclick = () =>
{
    searchForm.classList.remove('active');
    UpdateForm.classList.toggle('active');
    navbar.classList.remove('active');
    shoppingCart.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>
{
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.toggle('active');
    shoppingCart.classList.remove('active');
}

var closebtns= document.getElementsByClassName("btn-close");
var i;
for(i=0;i<closebtns.length;i++)
{
    closebtns[i].addEventListener("click",function(){
        var form=document.querySelector('.registration-form');
        form.style.display='none';
    });
}
