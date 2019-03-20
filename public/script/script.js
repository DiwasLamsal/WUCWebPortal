window.onload = function(){

  // Timeout just to test the function
  setTimeout(function(){
    document.getElementsByClassName('load')[0].style.display = "none";
  }, 10);


  var dropdown = document.getElementById('dropdown');
  dropdown.addEventListener('click', function(){
    document.getElementById("myDropdown").classList.toggle("show");
  });

}


//-------------------------------------------------------------------------------------//

function checkPassword(){
  var pass = document.getElementById('password');
  var passChecker = document.getElementById('passtest');
  var submit = document.getElementById('submission');
  var confirmPass = document.getElementById('confirmpassword');
  var confirmPassChecker = document.getElementById('confirmpasstest');

  submit.disabled = true;
  if(pass.value != confirmPass.value){
    confirmPassChecker.style.color = "red";
    confirmPassChecker.innerHTML = "Passwords do not match.";
    submit.disabled = true;
    submit.style.background="grey";
  }

  if(pass.value.length<9){
    passtest.style.color = "red";
    passtest.innerHTML = "Password too short.";
  }
  else if(pass.value.length > 8 && pass.value.length < 17){
    passtest.style.color = "green";
    passtest.innerHTML = "Valid password!";
  }

  if(pass.value == confirmPass.value){
    confirmPassChecker.style.color = "green";
    confirmPassChecker.innerHTML = "Passwords Match!";
  }

  if(confirmPass.value == " " || confirmPass.value == "" || pass.value ==""){
    confirmPassChecker.innerHTML = "<br>";
    submit.disabled = true;
    submit.style.background="grey";
  }

  if(passtest.style.color == "green" && confirmPassChecker.style.color == "green"){
    submit.disabled = false;
    submit.style.background="#8075B6";
  }
}

//-------------------------------------------------------------------------------------//
