const adminAction = (type) => {
  const selectedId = document.querySelector('input[name="radio"]:checked')
    .value;

  if (type !== "update") {
    makeAjaxCall(type, selectedId);
  } else {
    raiseUpdateModal(selectedId);
  }
};

const makeAjaxCall = (type, id) => {
  $.ajax({
    url: "././functions/adminActions.php",
    method: "POST",
    data: { ADMIN_ACTION: type, ID: id },
    dataType: "text",
    success: function (result) {
      raiseAdminMessage("Updated Successfully", "success");
    },
    error: function (error) {
      console.log(error);
      raiseAdminMessage(
        "There was an error with your feedback, please try again later",
        "danger"
      );
      return null;
    },
  });
};

//creates alert on admin page
const raiseAdminMessage = (message, type) => {
  let alert = document.getElementById("alertGoesHere");
  alert.innerHTML =
    '<div class="alert alert-' +
    type +
    ' alert-dismissible fade show" role="alert">' +
    message +
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
    " </div>";
};

const raiseUpdateModal = (selectedId) => {
  const text_id = "text_" + selectedId;
  let text = document.getElementById(text_id).innerHTML;
  document.getElementById("text-modal").value = text;
  let myModal = new bootstrap.Modal(document.getElementById("update-modal"));
  myModal.show();
};

const updateText = (event) => {
  event.preventDefault();

  let text = document.getElementById("text-modal").value;
  const selectedId = document.querySelector('input[name="radio"]:checked')
    .value;

  $.ajax({
    url: "././functions/adminActions.php",
    method: "POST",
    data: { ADMIN_ACTION: "update", ID: selectedId, TEXT: text },
    dataType: "text",
    success: function (result) {
      raiseAdminMessage("Updated Successfully", "success");
    },
    error: function (error) {
      console.log(error);
      raiseAdminMessage(
        "There was an error with your action, please try again later",
        "danger"
      );
    },
  });
  //hides modal and removes div added by bootstrap
  let modal = document.getElementById("update-modal");
  modal.style.display = "none";
  let backdrop = document.getElementsByClassName("modal-backdrop")[0];
  backdrop.remove();
};
