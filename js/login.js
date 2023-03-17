$(document).ready(function() {
 
    $("#loginsubmit").click(function() {
    var email = $("#email").val();
    var password = $("#password").val();
    
    if(email==''||password=='') {
        alert("Please fill all fields.");
        return false;
    }
    
    $.ajax({
    type: "POST",
    url: "php/login.php",
    data: {
    email: email,
    password: password
    },
    cache: false,
    success: function(data) {
        if(response == 'success') {
            window.location.href = 'profile.html';
        } else {
            alert('Invalid login credentials!');
        }
    },
    });
});
});