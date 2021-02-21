const onPreviewSubmitForm = (event) => {
  event.preventDefault();
  const formData = document.getElementById("feedback-form");
  const name = formData.name.value;
  const email = formData.email.value;
  const text = formData.text.value;
  const file = formData.file.value;

  if (file) {
    const extension = file.split(".").pop();
    console.log(extension);
    const extensions = ["jpeg", "gif", "png"];
    if (!extensions.includes(extension)) {
      alert("wrong file extension, please use only jpeg,gif,png");
      return;
    }
  }
  console.log(name, email, text, file);
  year = new Date().getFullYear();
  month = new Date().getMonth() + 1;
  day = new Date().getDate();
  const date = day + "/" + month + "/" + year;

  let modalTitle = document.getElementById("modal-title");
  modalTitle.innerHTML = date;
  //add data to preview modal
  const previewCard =
    `
      <div class="card" style="width: 18rem;">
      ` +
    `<div class="card-body">
             <h6 class="card-title">Name: ` +
    name +
    `<br/> Email: ` +
    email +
    `</h6><p class="card-text">
    <p>Feedback Text:<p/>` +
    text +
    `</p>

     </div>
    </div>
  `;

  let modalBody = document.getElementById("modal-body");
  modalBody.innerHTML = previewCard;

  let myModal = new bootstrap.Modal(document.getElementById("previewModal"));
  myModal.show();
};

//loads file for preview before submition of the form
const loadFile = function (event) {
  let output = document.getElementById("image-preview");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src); // free memory
  };
};
