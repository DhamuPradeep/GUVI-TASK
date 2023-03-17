$(document).ready(function() {
 
    $("#submit").click(function() {
    var firstName = $("#firstname").val();
    var lastName = $("#lastname").val();
    var email = $("#email").val();
    var phonenumber = $("#phonenumber").val();
    var password = $("#password").val();
    var confirmpassword =  $("#confirmpassword").val();
    
    if(firstName=='' || lastName=='' ||email==''||password=='' || phonenumber=='') {
        alert("Please fill all fields.");
        return false;
    }
    
    if(password != confirmpassword){
      alert("Both the password must be password");
    }

    $.ajax({
    type: "POST",
    url: "php/register.php",
    data: {
    firstName: firstName,
    lastName: lastName,
    email: email,
    phonenumber:phonenumber,
    password: password
    },
    cache: false,
    success: function(response) {
      if(response==="User Details Added Successfully"){
        window.location.href = 'login.html';
      }else{
        alert('Could not able to add your details');
      }
    },
    error: function(xhr, status, error) {
    console.error(xhr);
    }
    });
  });
});
