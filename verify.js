
/*This is the main function for registering for an account
What it basically does is it checks to make sure that all
the fields are filled out before the user is able to submit
the form, this prevents incorrect input on the client side,
this way we don't go to the server if we already know that 
something is missing or wrong
*/

function checkFields(){
  var user = document.getElementById('userName').value;
  var first = document.getElementById('firstName').value;
  var last = document.getElementById('lastName').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('password').value;
  var conPassword = document.getElementById('conPassword').value;
  ValidateEmail();                                                //this function makes sure the email is a valid format
  checkPass();                                                    //this function matches the password against the confirm password

  //if the email is valid, the passwords match, and every single field has at least one character, the user can push the submit button
  if(ValidateEmail() && checkPass() && user != "" && first != "" && last != "" && email != "" && password != "" && conPassword != ""){
    console.log("ready");
    document.getElementById('submitS').disabled = false;
    document.getElementById('submitP').disabled = false;
    document.getElementById('submitS').classList.add("btn", "btn-outline-primary");
    document.getElementById('submitP').classList.add("btn", "btn-outline-primary");
  }
  //if something is wrong or missing, the user cannot submit
  else{
    document.getElementById('submitS').disabled = true;
    document.getElementById('submitP').disabled = true;
  }
}

//We must check to make sure that what is entered can be classified as an email, has @ and .
function ValidateEmail() 
{
  var email = document.getElementById('email');
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value))
  {
    email.setAttribute("style", "1px solid #ced4da");                     //if the email fits the requirements, return the border to
    return true;                                                          //the original color and return true that email is valid
  }

  if(email.value != "" && email.value != null){                           //Since we are here, we know that the email didn't pass the 
    email.setAttribute("style", "border: 1px solid red;");                //check, so if the email field is not blank, we make it red to
  }                                                                       //indicate error
  else{                                                                   //if the email is blank, we don't indicate an error and let
    email.setAttribute("style", "1px solid #ced4da");                     //the user try again
  }
  return false;
}

//We must check to make sure the password and confirm password fields match
function checkPass(){
  var pass = document.getElementById('password');
  var confirm = document.getElementById('conPassword');
  if(pass.value != confirm.value){
    if(pass.value != null && pass.value != "" && confirm.value != null && confirm.value != ""){     //if the two password fields don't
      pass.setAttribute("style", "border: 1px solid red");                                          //match and neither of the fields are
      confirm.setAttribute("style", "border: 1px solid red");                                       //empty, make the border of the fields
    }                                                                                               //red to indicate an error
    return false;                                                                                   //return false, pass doesn't match
  }
  pass.setAttribute("style", "1px solid #ced4da");                                                  //if the two pass fields match,
  confirm.setAttribute("style", "1px solid #ced4da");                                               //change the border to the original
  return true;                                                                                      //color and return true
}

//This function checks to make sure all fields are filled before the user can attempt to log in
function checkLoginFields(){
  var user = document.getElementById('userName').value;
  var password = document.getElementById('password').value;
  if(user != "" && password != ""){
    document.getElementById('loginB').disabled = false;
    document.getElementById('loginB').classList.add("btn", "btn-outline-primary");
  }
  else{
    document.getElementById('loginB').disabled = true;
  }
}
