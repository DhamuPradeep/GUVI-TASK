$(document).ready(function() {
 
    $("#loginsubmit").click(function(e) {
    e.preventDefault();
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
    success: function(response) {
        if(response == 'success') {
            window.location.href = 'profile.html';
        } else {
            alert('Invalid login credentials!');
        }
    },
    });
});
});
