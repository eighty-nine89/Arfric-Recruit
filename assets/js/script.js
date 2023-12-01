// let loginForm = document.querySelector(".my-form");

// loginForm.addEventListener("submit", (e) => {
//     e.preventDefault();
//     let email = document.getElementById("email");
//     let password = document.getElementById("password");

//     console.log('Email:', email.value);
//     console.log('Password:', password.value);
//     // process and send to API
// });

async function makeRequest(url, data, method = "POST") {
  try {
    return await fetch(url, {
      body: data,
      method: method,
    });
  } catch (err) {
    console.log("dlfkj");
    throw err;
  }
}

function signup(event) {
  event.preventDefault();
  const formData = new FormData(event.target);
  removeMessages();
  makeRequest("./../processors/auth_processor.php", formData)
    .then((res) => {
      res.json().then((data) => {
        console.log(data);
        if (data.length !== 0) {
          data.forEach(function (errorCode) {
            warn(errorCode);
          });
        } else {
          displaySuccessMessage(".success-field");
        }
      });
    })
    .catch((err) => {
      console.log(err);
    });
}

/**
 * function to handle error codes received from register requst
 * @param errorCode int list of registration error codes
 */
function warn(errorCode) {
  let formField = null;
  let errorFieldId = null;
  let message = null;

  switch (errorCode) {
    // case 1:
    //   message = "Invalid CSRF token";
    //   errorFieldId = "general-error";
    //   break;
    case 1:
      message = "Full name invalid. Full name can contain only letters";
      errorFieldId = "fullname-error-field";
      formField = "input[name='fullname']";
      break;
    case 2:
      message = "Email invalid. Email must be of the format example@domain.com";
      errorFieldId = "email-error-field";
      formField = "input[name='email']";
      break;
    case 3:
      message = "Email domain does not exist";
      errorFieldId = "email-error-field";
      formField = "input[name='email']";
      break;
    case 5:
      message =
        "Password must be more done 8 characters and must contain at least of, a lowercase letter, an uppercase letter, a number and a special character";
      errorFieldId = "password-error-field";
      formField = "input[name='password']";
      break;
    case 6:
      message = "Passwords must match";
      errorFieldId = "confirm-password-error-field";
      formField = "input[name='confirm-password']";
      break;
    case 7:
      message = "Email given is already being used";
      errorFieldId = "email-error-field";
      formField = "input[name='email']";
      break;
    case 8:
      message = "An unexpected error occured, please contact support";
      errorFieldId = "general-error";
      break;
    case 9:
      message = "No such email address exists";
      errorFieldId = "general-error";
      break;
    case 10:
      message = "Account is already active";
      errorFieldId = "general-error";
      break;
    case 11:
      message =
        "Maximum limit for account verification requests per day reached, Please try again after 24 hours";
      errorFieldId = "general-error";
      break;
    case 12:
      message = "Error making request, please contact support";
      errorFieldId = "general-error";
      break;
    case 13:
      message =
        "Error sending verification email to email account, please contact support";
      errorFieldId = "general-error";
      break;
    default:
      message = "An unexpected error occured, please contact support";
      errorFieldId = "general-error";
  }

  displayError(message, errorFieldId);

  if (formField) {
    formInputShake(formField);
  }
}

function displayError(message, id, html = false) {
  let errorField = document.getElementById(id);
  if (html) {
    errorField.innerHTML = message;
  } else {
    errorField.innerText = message;
  }

  errorField.style.display = "block";
}

/**
 * function to shake form input field with error
 * @param string selector Selector for form field to be passed into querySelector function
 * @return null
 */
function formInputShake(selector) {
  document.querySelector(selector).classList.add("field-shake");
  document
    .querySelector(selector)
    .addEventListener("animationend", function (event) {
      this.classList.remove("field-shake");
    });
}

function displaySuccessMessage(selector) {
  document.querySelector(selector).style.display = "block";
}

/**
 * function to remove all messages and shaking class from form input fields
 * @return null
 */
function removeMessages() {
  let errorFields = document.querySelectorAll(".error-field");
  errorFields.forEach(function (errorField) {
    errorField.style.display = "none";
  });
}
