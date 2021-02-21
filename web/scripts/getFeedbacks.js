const initialAdminLoad = () => {
  getAdminFeedbacks("pending");
};

const getFeedbacks = (email) => {
  if (email) {
    $.ajax({
      url: "././functions/getFeedback.php",
      method: "POST",
      data: { EMAIL: email },
      dataType: "json",
      success: function (result) {
        if (result.length == 0) {
          raiseMessageGetFeedback(
            "There are no submitted feedbacks",
            "warning"
          );
        } else {
          printResultsByUser(result);
        }
      },
      error: function (error) {
        console.log(error);
        raiseMessage(
          "There was an error with your feedback, please try again later",
          "danger"
        );
      },
    });
  } else {
    $.ajax({
      url: "././functions/getFeedback.php",
      method: "POST",
      dataType: "json",
      success: function (result) {
        if (result.length == 0) {
          raiseMessageGetFeedback(
            "There are no submitted feedbacks",
            "warning"
          );
        } else {
          printAllResults(result);
        }
      },
      error: function (error) {
        console.log(error);
        raiseMessage(
          "There was an error with your feedback, please try again later",
          "danger"
        );
      },
    });
  }
};

const printResultsByUser = (results) => {
  const tableBody = document.getElementById("my-feedbacks-body");
  let printHtml = "";
  for (let i = 0; i < results.length; i++) {
    //loop results and create table lines
    let line = results[i];
    let id = line[5];
    let preview =
      '<a href="#" id="' +
      id +
      '"onClick="getImage(\'' +
      id +
      "')\">Preview</>";
    let image = line[4] == true ? preview : "No attachment";

    let status =
      line[2] > line[3]
        ? "Accepted"
        : line[2] < line[3]
        ? "Denied"
        : "In review";
    let htmltoAdd =
      ' <tr><th scope="row">' +
      line[1] +
      "</th><td>" +
      line[0] +
      "</td> <td>" +
      image +
      "</td><td>" +
      status +
      "</td> </tr>";

    printHtml += htmltoAdd;
  }
  tableBody.innerHTML = printHtml;
};

const printAllResults = (results) => {
  const tableBody = document.getElementById("all-feedbacks-body");

  let printHtml = "";
  for (let i = 0; i < results.length; i++) {
    //loop results and create table lines
    let line = results[i];
    let id = line[7];
    let preview =
      '<a href="#" id="' +
      id +
      '"onClick="getImage(\'' +
      id +
      "')\">Preview</>";
    let image = line[4] == true ? preview : "No attachment";
    //check type of line - accepted, in review or denied
    let status =
      line[2] > line[3]
        ? "Accepted"
        : line[2] <= line[3] && line[3] != "0000-00-00"
        ? "Denied"
        : "In review";
    let htmltoAdd =
      ' <tr><th scope="row">' +
      line[1] +
      "</th><td>" +
      line[6] +
      "</th><td>" +
      line[5] +
      "</th><td>" +
      line[0] +
      "</td> <td>" +
      image +
      "</td><td>" +
      status +
      "</td> </tr>";

    printHtml += htmltoAdd;
  }
  tableBody.innerHTML = printHtml;
};

const getImage = (id) => {
  $.ajax({
    url: "././functions/getImage.php",
    method: "POST",
    data: { ID: id },
    success: function (result) {
      console.log(result);
      let image_preview = document.getElementById("image-preview");
      image_preview.src = "data:image/jpeg;base64," + result;
      let myModal = new bootstrap.Modal(
        document.getElementById("previewModal")
      );
      myModal.show();
    },
    error: function (error) {
      console.log(error);
    },
  });
};
const getAdminFeedbacks = (type) => {
  $.ajax({
    url: "././functions/getFeedback.php",
    method: "POST",
    data: { ADMIN: type },
    dataType: "json",
    success: function (result) {
      if (result.length == 0) {
        raiseMessageGetFeedback("There are no pending feedbacks", "warning");
      } else {
        printAdminResults(result, type);
      }
    },
    error: function (error) {
      console.log(error);
      raiseMessageGetFeedback(
        "There was an error with your feedback, please try again later",
        "danger"
      );
    },
  });
};
const printAdminResults = (results, typeAdminFeedbacks) => {
  let tableBody = "";
  //get the table body for later append lines
  switch (typeAdminFeedbacks) {
    case "approved":
      tableBody = document.getElementById("approved-table-body");
      break;
    case "deleted":
      tableBody = document.getElementById("deleted-table-body");
      break;
    default:
      tableBody = document.getElementById("pending-table-body");
      break;
  }

  let printHtml = "";
  for (let i = 0; i < results.length; i++) {
    let line = results[i];
    let id = line[5];
    let preview =
      '<a href="#" id="' +
      id +
      '" onClick="getImage(\'' +
      id +
      "')\">Preview</>";
    let image = line[4] == true ? preview : "No attachment";
    let htmltoAdd =
      ' <tr><th scope="row">' +
      ' <input class="form-check-input" value="' +
      id +
      '" type="radio" name="radio" id="' +
      id +
      '"></th><td>' +
      line[1] +
      "</td><td>" +
      line[7] +
      "</td><td>" +
      line[6] +
      '</td><td id="text_' +
      id +
      '">' +
      line[0] +
      "</td><td>" +
      image +
      "</td></tr>";

    printHtml += htmltoAdd;
  }
  tableBody.innerHTML = printHtml;
};

const raiseMessageGetFeedback = (message, type) => {
  let alert = document.getElementById("alertGoesHere");
  alert.innerHTML =
    '<div class="alert alert-' +
    type +
    ' alert-dismissible fade show" role="alert">' +
    message +
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
    " </div>";
};
