function viewPass() {
  var passInput = document.getElementById("pass");
  // var description = document.getElementById("desc");
  if (passInput.type === "password") {
    passInput.type = "text";
    desc.textContent = "Hide Password";
  } else {
    passInput.type = "password";
    desc.textContent = "Show Password";
  }
}
function registerUser() {
  var pass1 = $("pass").val();
  var pass2 = $("pass2").val();
  var name = $("#formInput[name='name']").val();
  var email = $("#formInput[name='email']").val();
  if (pass1 == "" || pass2 == "" || name == "" || email == "") {
    alert("PLease fill up the details!");
  } else {
    if (pass1 != pass2) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Passwords do not match!",
      });
    } else {
      // $("#newAcc").submit();
      var name = $("#formInput[name='name']").val();
      var email = $("#formInput[name='email']").val();
      var password = $("#pass").val();
      $.ajax({
        url: "../api/submitter.php",
        method: "POST",
        data:{
          checkDuplicateMail:true,
          email:email,
        },
        dataType:"json",
        success: function(response){
          console.log(response);
          if(response.status === "notFound"){
            $.ajax({
              url: "../api/submitter.php",
              method: "POST",
              data: {
                create: true,
                name: name,
                email: email,
                pass: password,
              },
              dataType: "json", // Specify that you expect a JSON response
              success: function (response) {
                // Handle the server response
                console.log("Server Response:", response);
      
                // Check the status field in the response to determine success/failure
                if (response.status === "success") {
                  Swal.fire({
                    icon: "success",
                    title: "Account created!",
                    text: "Redirecting to login....",
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                  }).then(() => {
                    window.location.href = "./";
                  });
      
                  var name = $("#formInput[name='name']").val("");
                  var email = $("#formInput[name='email']").val("");
                  var password = $("#pass").val("");
                  var pass2 = $("#pass2").val("");
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response.message,
                  });
                  var email = $("#formInput[name='email']").val("");
                }
              },
              error: function (xhr, status, error) {
                console.error("Error:", xhr.responseText);
              },
            });
          }else{
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Your email is already registered. Please use a different one.",
          })
        }
        },
      })
    }
  }
}

function loginUser() {
  var email = $(".email").val();
  var pass = $("#pass").val();
  console.log(email, pass);
  if (email == "" || pass == "") {
    alert("Please fill up the details");
  } else {
    $.ajax({
      url: "../api/submitter.php",
      method: "POST",
      data: {
        login: true,
        email: email,
        pass: pass,
      },
      dataType: "json", // Specify that you expect a JSON response
      success: function (response) {
        // Handle the server response
        console.log("Server Response:", response);

        if (response.status === "success") {
          Swal.fire({
            icon: "success",
            title: "Login Successfull!",
            text: "Redirecting to dashboard....",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
          }).then(() => {
            window.location.href = "../welcome.php";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: response.message,
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", xhr.responseText);
      },
    });
  }
}

function checkUser() {
  var email = $(".email").val();
  if (email == "") {
    alert("Input your email id!");
  } else {
    $.ajax({
      url: "../api/submitter.php",
      method: "POST",
      data: {
        forgotPass: true,
        email: email,
      },
      dataType: "json",
      success: function (response) {
        console.log("Server Response:", response);
        if (response.status === "success") {
          Swal.fire({
            icon: "success",
            title: "User found!!",
            text: "Redirecting....",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
          }).then(() => {
            $("#takeEmail").hide();
            $("#takePass").show();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "User not found!!",
            footer: "<a href='createAcc.php'>Create a new account</a>",
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", xhr.responseText);
      },
    });
  }
}
function changePassword() {
  var pass1 = $("#pass").val();
  var pass2 = $("#pass2").val();
  var email = $(".email").val();
  console.log(email);
  if (pass1 === pass2) {
    $.ajax({
      url: "../api/submitter.php",
      method: "POST",
      data: {
        changePass: true,
        password: pass1,
        email: email,
      },
      dataType: "json",
      success: function (response) {
        console.log("Server Response:", response);
        if (response.status === "success") {
          console.log(response.message);
          Swal.fire({
            icon: "success",
            title: "Password changed successfully!",
            text: "Redirecting to login....",
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
          }).then(() => {
            window.location.href = "./index.php";
          });
        }else if(response.status==="userNotFound"){
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "NOT AUTHORISED!",
            timer: 10000,
            timerProgressBar: true,
          }).then(() => {
            window.location.href = "./index.php";
          });

        }else {
          Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Some error occoured Try again!!",
            // timer: 2000,
            timerProgressBar: true,
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("Error:", xhr.responseText);
      },
    });
  } else {
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Passwords Mismatch",
      timer: 2000,
      timerProgressBar: true,
    });
  }
}



// Change border color and bottom border width on focus
var inputs = document.querySelectorAll(
  'input[type="text"], input[type="password"], input[type="email"]'
);
inputs.forEach((input) => {
  input.addEventListener("focus", () => {
    input.style.borderColor = "#000"; // Change the border color to black on focus
    input.style.borderBottomWidth = "2px"; // Change the bottom border width back to 2px on focus
  });
  input.addEventListener("blur", () => {
    input.style.borderColor = "#ccc"; // Change the border color back to grey on blur
    input.style.borderBottomWidth = "4px"; // Change the bottom border width to 4px on blur
  });
});
