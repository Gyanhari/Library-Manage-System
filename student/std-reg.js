// const width  = document.querySelector("#login-form").style.height;
// document.querySelector("#log-Button").addEventListener("click", function () {
//   document.querySelector("#login").style.display = "block";
//   document.querySelector("#register").style.display = "none";
//   document.querySelector("#login-form").style.height = "420px";
// });
// document.querySelector("#reg-Button").addEventListener("click", function () {
//   document.querySelector("#register").style.display = "block";
//   document.querySelector("#login").style.display = "none";
//   document.querySelector("#login-form").style.height = "650px";
// });
// console.log(width);

// document.querySelector(".close").addEventListener("click", function () {
//   document.querySelector(".lgn-box").style.display = "none";
// });
// document.querySelector(".Lgn-button").addEventListener("click", function () {
//   document.querySelector(".lgn-box").style.display = "block";
// document.querySelector("#login-form").style.height = "530px";
// });
// function load() {
// document.querySelector(".lgn-box").style.display = "none";
// }
// function validat() {
//   var x = document.getElementById("Email").value;
//   console.log(x);
// var atpos = x.indexOf('@');
// var dotpos = x.lastIndexOf('.');
// if ((document.getElementById("Email").value == "") || (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)) {
//   alert("Please Enter Valid Email")
//   document.querySelector("#Email").focus();
//   return false;
// }
// }



const contactForm = document.getElementById('contactForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');
const fileInput = document.getElementById('photo');

contactForm.addEventListener('submit', function (event) {
  event.preventDefault();

  // Validate the form fields
  if (validateForm()) {
    // If validation is successful, submit the form
    this.submit();
  }
});

function validateForm() {
  const fname = std_fnameInput.value;
  const name = std_lnameInput.value;
  const email = emailInput.value;
  // const message = messageInput.value;

  // Perform validation checks
  if (name.trim() === '' || email.trim() === '' || message.trim() === '') {
    alert('Please fill in all fields.');
    return false;
  }

  if (!validateEmail(email)) {
    alert('Please enter a valid email address.');
    return false;
  }

  const file = fileInput.files[0];
  if (!file) {
    alert('Please select a file.');
    return false;
  }

  if (!validateFile(file)) {
    alert('Please select a valid file (JPG, JPEG, PNG, or GIF).');
    return false;
  }

  return true;
}

function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function validateFile(file) {
  const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
  const fileExtension = file.name.split('.').pop().toLowerCase();
  return allowedExtensions.includes(fileExtension);
}
