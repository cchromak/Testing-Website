function ValidateEmail() 
{
    var email = document.getElementById('email').value
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
  {
    return (true)
    
  }
    alert("You have entered an invalid email address!")
    returnToPreviousPage();
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
