
function validateUser()
{   
    var regName =/^[A-Za-z]+$/;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phoneno=/^\d{10}$/;

    var Name= document.getElementById("name").value;
    var Email = document.getElementById("email").value;
    var Phone = document.getElementById("phoneNo").value;
    var Password = document.getElementById("password").value;
    var ConfirmPassword = document.getElementById("confirm_password").value;
    // console.log(FirstName); debugger;
    if(!regName.test(Name)){
        alert('Please enter your first name which does not include numbers and special character');
        document.getElementById('name').focus();
        return false;
    }
    if(!mailformat.test(Email)){
        alert('Please enter correct mail id');
        document.getElementById('email').focus();
        return false;
    }
    if(!phoneno.test(Phone) || Phone.length != 10){
        alert('Please enter correct Contact Number');
        document.getElementById('phoneNo').focus();
        return false;
    }
    // if(document.getElementById("male").checked==false)
    // {
    //     alert('select your gender');
    //     document.getElementById('male').focus();
    //     return false;
    // }
    if(Password != ConfirmPassword){
        alert('Password and ConfirmPassword must be same hello');
        document.getElementById('password').focus();
        return false;
    }
}