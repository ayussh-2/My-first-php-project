function btnStt(state, btnId) {
  if (state == "active") {
    var text = "Unlike!";
    Swal.fire({
      timer: 1000,
      icon: "success",
      title: "Picture Liked!",
      // html: statusMsg,
      timerProgressBar: false,
      showConfirmButton: false,
    });
  } else {
    var text = "Like";
    Swal.fire({
      icon: "success",
      title: "Picture Unliked!",
      timer: 1000,
      timerProgressBar: false,
      showConfirmButton: false,
    });
  }
  $(btnId).text(text);
}

function likePics() {
  var imageId = event.target.value;
  // alert('Liked image with ID: ' + imageId);
  var userId = $("#userId").val(); // update karna hai user id!!!
  $.ajax({
    url: "./api/submitter.php",
    method: "POST",
    data: {
      like: true,
      id: imageId,
      userId: userId,
    },
    dataType: "json",
    success: function (response) {
      console.log("Server Response:", response);
      var buttonState = response.buttonState;
      // console.log(response.status);
      if (response.status === "success") {
        var buttonId = "#" + imageId;
        btnStt(buttonState, buttonId);
      } else {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Some error occurred!",
        });
      }
    },
    error: function (xhr, status, error) {
      console.error("Error:", xhr.responseText);
    },
  });
}
