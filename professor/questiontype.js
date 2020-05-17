function checkType(){
  if(document.getElementById("mc").checked){
    document.getElementById("mcChoices").style.display = "block";
  }
  else{
    document.getElementById("choice1").value = "";
    document.getElementById("choice2").value = "";
    document.getElementById("choice2").disabled = true;
    document.getElementById("choice3").value = "";
    document.getElementById("choice3").disabled = true;
    document.getElementById("choice4").value = "";
    document.getElementById("choice4").disabled = true;
    document.getElementById("mcChoices").style.display = "none";
  }
}

function enableFields(){
  if(document.getElementById("choice1").value != ""){
    document.getElementById("choice2").disabled = false;
  }
  if(document.getElementById("choice2").value != ""){
    document.getElementById("choice3").disabled = false;
  }
  if(document.getElementById("choice3").value != ""){
    document.getElementById("choice4").disabled = false;
  }
}