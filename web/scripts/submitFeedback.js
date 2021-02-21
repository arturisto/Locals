const submitFeedback = (event) => {
  event.preventDefault();
  const file = document.getElementById("form-file").files[0];
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const feedback = document.getElementById("text").value;
  //if empty text, make an error
  if (!feedback) {
    raiseMessage("Please write you feedback", "danger");
    return;
  }
  let data = new FormData();
  data.append("name", name);
  data.append("email", email);
  data.append("feedback", feedback);

  //check file exstention
  if (file) {
    const extension = file["name"].split(".").pop();
    console.log(extension);
    const extensions = ["jpeg", "gif", "png"];
    if (!extensions.includes(extension)) {
      alert("wrong file extension, please use only jpeg,gif,png");
      return;
    }

    data.append("file", file, file.name);
  }

  $.ajax({
    type: "POST",
    url: "././functions/submitFeedback.php",
    enctype: "multipart/form-data",
    data: data,
    contentType: false,
    processData: false,
    success: function (response) {
      raiseMessage("Thank you for your feedback", "success");
    },
    error: function (error) {
      raiseMessage(
        "There was an error with your feedback, please try again later",
        "danger"
      );
    },
  });
};

const raiseMessage = (message, type) => {
  let alert = document.getElementById("alertGoesHere");
  alert.innerHTML =
    '<div class="alert alert-' +
    type +
    ' alert-dismissible fade show" role="alert">' +
    message +
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
    " </div>";
};
