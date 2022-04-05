/**
 * Custom functions with project-wide scope
 */

// If signed in or not, show respective elements
if (signinStatus === 1) {
  $('#profile_cmpnt').show();
  $('#demo_btn').hide(); 
  $('#pricing_btn').hide();  
  $('#upgrade_btn').show();  
  $('#start_btn').hide();
} else {
  $('#profile_cmpnt').hide();
  $('#demo_btn').show();
  $('#pricing_btn').show();  
  $('#upgrade_btn').hide();  
  $('#start_btn').show();
}

  // Enable tooltips everywhere
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  // Enable popovers everywhere
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  });

 /* Dynamic page title */
 function changePageTitle() {
  newPageTitle = document.getElementById("title").textContent;
  document.title = "ParrotAI | " + newPageTitle;
}

/* Onload */
window.onload = function() {
  changePageTitle();
};

// Forms
  function clearInputs() {
    var inputsCollection = document.getElementsByClassName("form-inputs");
    for (i = 0; i < inputsCollection.length; i++) {
        inputsCollection[i].value = "";
    }
  }

  function clearSignupInputs() {
    var inputsCollection = document.getElementsByClassName("signup-form-inputs");
    for (i = 0; i < inputsCollection.length; i++) {
        inputsCollection[i].value = "";
    }
  }

  function clearGenericFormInputs() {
    var inputsCollection = document.getElementsByClassName("generic-form-inputs");
    for (i = 0; i < inputsCollection.length; i++) {
        inputsCollection[i].value = "";
    }
  }


// Form validation -- all important forms

// Disable form submission if there are invalid fields
var formCollection = document.querySelectorAll(".needs-validation");
Array.prototype.slice.call(formCollection)
.forEach(function(form) {
  form.addEventListener('submit', function(event) {
    if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }

    // Apply custom Bootstrap validation styles to all the forms
    form.classList.add('was-validated');
}, false);
});    
// end form validation



function signinUser() {
  $("#signinForm").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
      e.stopImmediatePropagation(); // prevent multiple submission of the form.

      var form = $(this);
      var url = form.attr('action');

      $.ajax({
          type: "POST",
          url: base_url + "/signin.php",
          data: form.serialize(), // serializes the form's elements.
          success: function(data) {
              if (data === "SIGNIN_SUCCESS") {
                  clearInputs();
                  $('#signinModal').modal('hide');
                  
                  // $("#signinStatus").val(1);
                  signinStatus = 1;
                  // $('#profile_cmpnt').show();

                  setTimeout(function() {
                    window.location.href = base_url + "/dashboard";
                  }, 1200);

                  Swal.fire({
                    title: '<strong class="text-dark">Success</strong>',
                    icon: 'success',
                    toast: true,
                    position: 'top-end',
                    html: '<p class="text-dark">You are now signed in</p>',
                    showConfirmButton: false
                    // confirmButtonText: '<span data-bs-toggle="modal" data-bs-target="#newRegistrationModal">New registration <i class="bi bi-arrow-right"></i></span>',                    
                    // showCancelButton: true,
                    // cancelButtonText: 'Close'
                });

              } else if (data === "INVALID_PASSWORD") {
                $("#password_err").show();
                $("#password_err").html("Your password is incorrect");
              }
              else if (data === "EMAIL_INEXISTENT") {
                $("#email_err").show();
                $("#email_err").html("We couldn't find any account connected to that email");
              }
          },
          error: function(error) {
              Swal.fire({
                  title: '<strong class="text-dark">Oops!</strong>',
                  icon: 'error',
                  toast: true,
                  position: 'top-end',
                  html: '<p class="text-dark">An error occurred while attempting to sign you in.</p>',
                  confirmButtonText: 'Try again'
              });
          }
      });
  });
}


function signupUser() {
  $("#signupForm").submit(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
      e.stopImmediatePropagation(); // prevent multiple submission of the form.

      $("#signup-spinner").show();
      $("#signup-button-text").html('');

      fetch(geoLocAPI)
      .then((response) => {
          return response.json();
      })
      .then((geodata) => {
          // user info
          const ip = geodata.ip;
          const useragent = geodata.user_agent.name + " " + geodata.user_agent.version;
          const device = geodata.user_agent.device.name;
          const platform = geodata.user_agent.os.name + " " + geodata.user_agent.os.version;
          const country = geodata.location.country.name;
          const city = geodata.location.city;
          const currencyCode = geodata.currency.code;
      

      var form = $(this);
      var formData = form.serializeArray();
      formData.push({ name: "browser", value: useragent });
      formData.push({ name: "device", value: device });
      formData.push({ name: "platform", value: platform });
      formData.push({ name: "ip", value: ip });
      formData.push({ name: "country", value: country });
      formData.push({ name: "city", value: city });

    function hideSpinner() {
      $("#signup-spinner").hide();
      $("#signup-button-text").html('Sign up'); 
    }

      $.ajax({
          type: "POST",
          url: base_url + "/signup.php",
          data: formData,
          success: function(data) {
              if (data === "SIGNUP_SUCCESS") {
                if (getCredentials()) {
                  clearSignupInputs();
                }
                  $('#signupModal').modal('hide');
                  Swal.fire({
                    title: '<strong class="text-dark">Success</strong>',
                    icon: 'success',
                    toast: true,
                    position: 'top-end',
                    html: '<p class="text-dark">Your account was created successfully</p>',
                    confirmButtonText: '<span onclick="popSigninModal();">Proceed to sign in <i class="bi bi-arrow-right"></i></span>'                    
                });   
              } else if (data === "USERNAME_BLANK") {
                $("#username_err").show();
                $("#username_err").html("Your first name is required");  
                hideSpinner();                       
              } 
              // else if (data === "LNAME_BLANK") {
              //   $("#lname_err").show();
              //   $("#lname_err").html("Last name cannot be blank");  
              //   hideSpinner();                       
              // } 
              else if (data === "EMAIL_BLANK") {
                $("#emailexists_err").show();
                $("#emailexists_err").html("Your email address is required");
                hideSpinner();
              } else if (data === "EMAIL_EXISTS") {
                $("#emailexists_err").show();
                $("#emailexists_err").html("That email is already taken");
                hideSpinner();
              }
              else if (data === "EMPTY_PASS") {
                $("#signup_pwd_err").show();
                $("#signup_pwd_err").html("Password is required");
                hideSpinner();
              }
              else if (data === "PASSWORD_MISMATCH") {
                $("#mismatch_err").html("Password mismatch");
                hideSpinner();
              }
              else if (data === "ERROR") {
                Swal.fire({
                  title: '<strong class="text-dark">Oops!</strong>',
                  icon: 'error',
                  toast: true,
                  position: 'top-end',
                  html: '<p class="text-dark">An error occurred while attempting to save your information.</p>',
                  confirmButtonText: 'Try again'
              });
              hideSpinner();   
              }
          },
          error: function(error) {
              Swal.fire({
                  title: '<strong class="text-dark">Oops!</strong>',
                  icon: 'error',
                  toast: true,
                  position: 'top-end',
                  html: '<p class="text-dark">An error occurred while attempting to sign you up.</p>',
                  confirmButtonText: 'Try again'
              });
              hideSpinner();
          }
      });
  });
})
}

function getCredentials() {

  //signup credentials
  var email = document.getElementById("emailsignup").value;
  var pwd = document.getElementById("pwdsignup").value;

  // move credentials to signin form
  $('#useremail').val(email);
  $('#password').val(pwd);
}

function handleStartBtn() {
  // new user
  if (signinStatus === 1) {
      // verified users
      if (v_status === 1) {
          window.location.href = base_url + "/dashboard"
      } else {
          window.location.href = base_url + "/pricing"
      }
  } else {
      $('#signupModal').modal('hide');
      $('#signinModal').modal('show');
      document.getElementById("login-title").innerHTML = "Sign in to proceed";
  }
}

function popSignupModal() {
  $('#signinModal').modal('hide');
  $('#signupModal').modal('show');
}

function popSigninModal() {
  $('#signupModal').modal('hide');
  $('#signinModal').modal('show');
  document.getElementById("login-title").innerHTML = "Sign in";
}

// clear form inputs
function clearInputs() {
  var inputsCollection = document.getElementsByClassName("new-reg-inputs");
  for (i = 0; i < inputsCollection.length; i++) {
      inputsCollection[i].value = "";
      inputsCollection[i].classList.remove("is-invalid");
  }
}
//End  clear form inputs

/* Toggle filters */
function toggleFilters() {
  var filterarea = document.getElementById("filtersarea");

  if (filterarea.style.display === "block") {
      filterarea.style.display = "none";
  } else {
      filterarea.style.display = "block";
  }
}

/* Toggle filters */

  // Search
  // global search
  function getGlobalSearch() {
    var str = document.getElementById("search_term").value;
    var sb = document.getElementById("user_cmpnt").innerText;
    var adm = document.getElementById("adm_cmpnt").innerText;
    
    // encode
    // sb = encodeURIComponent(sb);

    $.post(base_url + '/search.php', {
      search_term: str,
      sb: sb,
      adm: adm
    }).done(function(response) {
      var search_component = document.getElementById("search_component");

      if (search_component.style.display = "none") {
          search_component.style.display = "block";
      }
      if (str === "") {
          search_component.style.display = "none";
          return;
      }
      $(search_component).html(response);
      });
}
// global search
// End search


// Have some Toast
var toastMessageCmpnt = Id("toastMessageCmpnt");
var liveToast = Id('liveToast')
var toast = new bootstrap.Toast(liveToast)

function showToastMessage(message, bgcolor) {
    let textcolor;
    switch (bgcolor) {
        case "danger":
            bgcolor = "#dc3545";
            break;
        case "primary":
            bgcolor = "#0d6efd";
            break;
        case "success":
            bgcolor = "#198754";
            break;
        case "warning":
            bgcolor = "#ffc107";
            textcolor = "#000";
            break;
        case "teal":
            bgcolor = "#20c997";
            break;
        default:
            bgcolor = "#0d6efd";
    }

    liveToast.style.backgroundColor = bgcolor;
    liveToast.style.color = textcolor;
    toastMessageCmpnt.innerText = message;
    toast.show();
}

/**
 * End custom functions
 */