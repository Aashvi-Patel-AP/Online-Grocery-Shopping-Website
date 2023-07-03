let searchForm = document.querySelector('.search-form');
document.querySelector('#search-btn').onclick = () =>
{
    searchForm.classList.toggle('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let loginForm = document.querySelector('.login-form');
document.querySelector('#login-btn').onclick = () =>
{
    searchForm.classList.remove('active');
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');
document.querySelector('#menu-btn').onclick = () =>
{
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.toggle('active');
}

// var closebtns= document.getElementsByClassName("btn-close");
// var i;
// for(i=0;i<closebtns.length;i++)
// {
//     closebtns[i].addEventListener("click",function(){
//         var form=document.querySelector('.registration-form');
//         form.style.display='none';
//     });
// }