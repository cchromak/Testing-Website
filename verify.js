function checkFields(){
    document.getElementsByClassName('submitReg').disabled = true;
    var user = document.getElementById('userName').value;
    var first = document.getElementById('firstName').value;
    var last = document.getElementById('lastName').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var conPassword = document.getElementById('conPassword').value;
    ValidateEmail();
    checkPass();
    if(ValidateEmail() && checkPass() && user != "" && first != "" && last != "" && email != "" && password != "" && conPassword != ""){
        console.log("ready");
        document.getElementById('submitS').disabled = false;
        document.getElementById('submitP').disabled = false;
    }
    else{
        document.getElementById('submitS').disabled = true;
        document.getElementById('submitP').disabled = true;
    }
}

function checkPass(){
    var pass = document.getElementById('password');
    var confirm = document.getElementById('conPassword');
    if(pass.value != confirm.value){
        if(pass.value != null && pass.value != "" && confirm.value != null && confirm.value != ""){
            pass.setAttribute("style", "border: 1px solid red");
            confirm.setAttribute("style", "border: 1px solid red");
        }
        return false;
    }
    pass.setAttribute("style", "1px solid #ced4da");
    confirm.setAttribute("style", "1px solid #ced4da");
    return true;
}

function ValidateEmail() 
{
    var email = document.getElementById('email');
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
    {
        email.setAttribute("style", "1px solid #ced4da");
        return (true)    
    }
    if(email.value != "" && email.value != null){
        email.setAttribute("style", "border: 1px solid red;");
    }
    else{
        email.setAttribute("style", "1px solid #ced4da");
    }
    return (false)
}



function CheckPasswordStudent() 
{ 
    var pword = document.getElementById('password').value
    var email = document.getElementById('email').value
    
    location.href='student.html';
    
// if(pword.match(passw)) 
// { 
// return true;
// }
// else
// { 
// alert('Password can only contain letters, max size 10')
// return false;
// }
}

function CheckPasswordProf() 
{ 
    var pword = document.getElementById('password').value
    var email = document.getElementById('email').value
    
    if(pword == 'abc'){

    location.href='professor.html';
    }else{
        alert('Incorrect Password')
        return false
    }
}
