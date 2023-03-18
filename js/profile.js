

window.onload = function() {
    alert("let's go!");
    email = localStorage.getItem("usermail")
    $.ajax({
    type: "POST",
    url: "php/profile.php",
    dataType:"json",
    data: {
        email:email
    },
    cache: false,
    success: function(response) {
        console.log("displayed");
        if(response.message == "success"){
            $('#firstName').html(response.firstName);
            $('#lastName').html(response.secondName);
            $('#email').html(response.email);  
            $('#phonenumber').html(response.phonenumber);  
            console.log("displayed");
        }else{
            alert("Something went wrong");
        }
    },
    });
}  



$(document).ready(function() {

    $("#update").click(function(e) {
        e.preventDefault();
    })
    $("#logout").click(function() {
        localStorage.removeItem('usermail');
        window.location.replace("index.html");    
    })
});
