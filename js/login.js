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
    dataType:"json",
    data: {
    email: email,
    password: password
    },
    cache: false,
    success: function(response) {
        if(response.message == 'success') {
            localStorage.setItem("usermail",response.usermail);
            window.location.href = 'profile.html';
            alert(response.usermail);
        } else {
            alert('Invalid login credentials!');
        }
    },
    });
});
});
