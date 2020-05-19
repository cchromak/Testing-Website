function checkValid(){
  var input = document.getElementById("title");
  if(input.value == ""){
    document.getElementById("titleSubmit").disabled = true;
  }
  else{
    document.getElementById("titleSubmit").disabled = false;
  }
}