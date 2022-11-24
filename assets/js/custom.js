/**
 * Custom functions with project-wide usage/scope
 */

// Show/hide navbar shadow on scroll
window.onscroll = () => {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    Id("navbar").classList.add("shadow-sm");
  } else {
    Id("navbar").classList.remove("shadow-sm");
  }
}

// If signed in or not, show respective elements
if (signinStatus === 1) {
  $("#profile_cmpnt").show();
  $("#demo_btn").hide();
  $("#pricing_btn").hide();
  $("#upgrade_btn").show();
  $("#start_btn").hide();
} else {
  $("#profile_cmpnt").hide();
  $("#demo_btn").show();
  $("#pricing_btn").show();
  $("#upgrade_btn").hide();
  $("#start_btn").show();
}

//Empty link handling for unobtrusive JS design
jQuery(function ($) {
  $(".empty-link").on("click", function (event) {
    event.preventDefault();
  });
});

// Enable tooltips everywhere
var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Enable popovers everywhere
var popoverTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl);
});

/* Dynamic page title */
function changePageTitle() {
  newPageTitle = Id("title").textContent;
  document.title = "ParrotAI | " + newPageTitle;
}

/* Onload */
window.onload = function () {
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
Array.prototype.slice.call(formCollection).forEach(function (form) {
  form.addEventListener(
    "submit",
    function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      // Apply custom Bootstrap validation styles to all the forms
      form.classList.add("was-validated");
    },
    false
  );
});
// end form validation

function signinUser() {
  $("#signinForm").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
    e.stopImmediatePropagation(); // prevent multiple submission of the form.

    var form = $(this);
    var url = form.attr("action");

    $.ajax({
      type: "POST",
      url: base_url + "/signin/",
      data: form.serialize(), // serializes the form's elements.
      success: function (data) {
        if (data === "SIGNIN_SUCCESS") {
          clearInputs();
          $("#signinModal").modal("hide");

          // $("#signinStatus").val(1);
          signinStatus = 1;
          // $('#profile_cmpnt').show();

          setTimeout(function () {
            window.location.href = base_url + "/dashboard";
          }, 1200);

          Swal.fire({
            title: '<strong class="text-dark">Success</strong>',
            icon: "success",
            toast: true,
            position: "top-end",
            html: '<p class="text-dark">You are now signed in</p>',
            showConfirmButton: false,
            // confirmButtonText: '<span data-bs-toggle="modal" data-bs-target="#newRegistrationModal">New registration <i class="bi bi-arrow-right"></i></span>',
            // showCancelButton: true,
            // cancelButtonText: 'Close'
          });
        } else if (data === "INVALID_PASSWORD") {
          $("#password_err").show();
          $("#password_err").html("Your password is incorrect");
        } else if (data === "EMAIL_BLANK") {
          $("#email_err").show();
          $("#email_err").html("Please enter your email");
        } else if (data === "EMAIL_INEXISTENT") {
          $("#email_err").show();
          $("#email_err").html(
            "We couldn't find any account connected to that email"
          );
        }
      },
      error: function () {
        Swal.fire({
          title: '<strong class="text-dark">Oops!</strong>',
          icon: "error",
          toast: true,
          position: "top-end",
          html: '<p class="text-dark">An error occurred while attempting to sign you in.</p>',
          confirmButtonText: "Try again",
        });
      },
    });
  });
}

function signupUser() {
  $("#signupForm").submit(function (e) {
    e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
    e.stopImmediatePropagation(); // prevent multiple submission of the form.

    $("#signup-spinner").show();
    $("#signup-button-text").html("");

    fetch(geoLocAPI)
      .then((response) => {
        return response.json();
      })
      .then((geodata) => {
        // user info
        const ip = geodata.ip;
        const useragent =
          geodata.user_agent.name + " " + geodata.user_agent.version;
        const device = geodata.user_agent.device.name;
        const platform =
          geodata.user_agent.os.name + " " + geodata.user_agent.os.version;
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
          $("#signup-button-text").html("Sign up");
        }

        $.ajax({
          type: "POST",
          url: base_url + "/signup/",
          data: formData,
          success: function (json) {
            var data = JSON.parse(json);
            if (data.status == "SIGNUP_SUCCESS") {
              // MailChimp
              var sendInfo = {
                u: "a3bd3895f8bbb8916d7064682",
                id: "0eacf4ab73",
                MERGE1: Id("usernamesignup").value,
                MERGE2: Id("lname").value,
                MERGE0: Id("emailsignup").value,
              };

              $.ajax({
                type: "POST",
                url: "https://gmail.us21.list-manage.com/subscribe/post",
                data: sendInfo,
                dataType: "jsonp",
                contentType: "application/json; charset=utf-8",
                success: function (resp) {
                  var resp_data = JSON.parse(resp);
                  showToastMessage(
                    "MailChimp request result: " + resp_data.result,
                    "danger"
                  );
                },
              });

              if (getCredentials()) {
                clearSignupInputs();
              }

              $("#signupModal").modal("hide");
              Swal.fire({
                title: '<strong class="text-dark">Success</strong>',
                icon: "success",
                toast: true,
                position: "top-end",
                html: '<p class="text-dark">Your account was created successfully</p>',
                confirmButtonText:
                  '<span onclick="popSigninModal();">Proceed to sign in <i class="bi bi-arrow-right"></i></span>',
              });
            } else if (data.status == "USERNAME_BLANK") {
              $("#username_err").show();
              $("#username_err").html("Your first name is required");
              hideSpinner();
            } else if (data.status == "EMAIL_BLANK") {
              $("#emailexists_err").show();
              $("#emailexists_err").html("Your email address is required");
              hideSpinner();
            } else if (data.status == "EMAIL_EXISTS") {
              $("#emailexists_err").show();
              $("#emailexists_err").html("That email is already taken");
              hideSpinner();
            } else if (data.status == "TEMP_EMAIL") {
              $("#emailexists_err").show();
              $("#emailexists_err").html("Please use a valid email");
              hideSpinner();
            } else if (data.status == "EMPTY_PASS") {
              $("#signup_pwd_err").show();
              $("#signup_pwd_err").html("Password is required");
              hideSpinner();
            } else if (data.status == "PASSWORD_MISMATCH") {
              $("#mismatch_err").show();
              $("#mismatch_err").html("Password mismatch");
              hideSpinner();
            } else if (data.status == "ERROR") {
              Swal.fire({
                title: '<strong class="text-dark">Oops!</strong>',
                icon: "error",
                toast: true,
                position: "top-end",
                html: '<p class="text-dark">An error occurred while attempting to save your information.</p>',
                confirmButtonText: "Try again",
              });
              hideSpinner();
            }
          },
          error: function () {
            Swal.fire({
              title: '<strong class="text-dark">Oops!</strong>',
              icon: "error",
              toast: true,
              position: "top-end",
              html: '<p class="text-dark">An error occurred while attempting to sign you up.</p>',
              confirmButtonText: "Try again",
            });
            hideSpinner();
          },
        });
      });
  });
}

function getCredentials() {
  //signup credentials
  var email = Id("emailsignup").value;
  var pwd = Id("pwdsignup").value;

  // move credentials to signin form
  $("#useremail").val(email);
  $("#password").val(pwd);
}

function handleStartBtn() {
  // new user
  if (signinStatus === 1) {
    // verified users
    if (v_status === 1) {
      window.location.href = base_url + "/dashboard";
    } else {
      window.location.href = base_url + "/pricing";
    }
  } else {
    $("#signupModal").modal("hide");
    $("#signinModal").modal("show");
    Id("login-title").innerHTML = "Let's get you signed in";
  }
}

function popSignupModal() {
  $("#signinModal").modal("hide");
  $("#resetPwdEmailEntryModal").modal("hide");
  $("#signupModal").modal("show");
}

function popSigninModal() {
  $("#signupModal").modal("hide");
  $("#signinModal").modal("show");
  Id("login-title").innerHTML = "Sign in";
}

function popResetPwdEmailEntryModal(elem) {
  $("#signinModal").modal("hide");
  $("#resetPwdEmailEntryModal").modal("show");
  if (elem !== "") {
    var email = $("#" + elem).val();
    if (typeof email !== "undefined" && email !== null && email != "") {
      // If user is signed in
      Id("reset_signup_prompt").style.display = "none";
      Id("reset_email").value = email;
    }
  }
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
  var filterarea = Id("filtersarea");

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
  var str = Id("search_term").value;
  var sb = Id("user_cmpnt").innerText;
  var adm = Id("adm_cmpnt").innerText;

  // encode
  // sb = encodeURIComponent(sb);

  $.post(base_url + "/admin/search/", {
    search_term: str,
    sb: sb,
    adm: adm,
  }).done(function (response) {
    var search_component = Id("search_component");

    if ((search_component.style.display = "none")) {
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
var liveToast = Id("liveToast");
var toast = new bootstrap.Toast(liveToast);

function showToastMessage(message, bgcolor) {
  let textcolor;
  switch (bgcolor) {
    case "danger":
      bgcolor = "#dc3545";
      break;
    case "primary":
      bgcolor = "#7434fc";
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
 * Saved templates
 */

// fetch single template
function fetchSingleItem(template) {
  $("#templateDetailsModal").modal("show");
  $("#template-details-spinner").show();
  $.ajax({
    type: 'POST',
    url: base_url + '/dashboard/saved_templates/',
    data: JSON.stringify({
      "template": template,
      "fetch_single": true,
      "csrf_token": csrf_token
    }),
    contentType: "application/json; charset=utf-8",
    success: (json) => {
      $("#template-details-spinner").hide();
      var data = JSON.parse(json);
      if (data.status === "SUCCESS") {
        Id("template_uid").innerHTML = data.uid;
        Id("template_summary").innerHTML = data.title;
        Id("template_details").innerHTML = data.text;
        Id("template_category").innerHTML = data.category;
        Id("date").innerText = data.date;
        Id("time").innerText = data.time;
      } else if (data.status === "ERROR") {
        $("#template_details").html(data.error);
      }
    },
    error: () => {
      $("#template-details-spinner").hide();
      showToastMessage("Oops! Couldn't fetch details", "primary");
    }

  });
}

// Fetch saved templates
function fetchSavedTemplates(page, intent) {
  var str = Id('temp_search_term').value;

  post_data = {
    "user": user,
    "csrf_token": csrf_token,
    "page": page
  }

  if (intent === 'search') {
    post_data.search_term = str;
    if (str === '') {
      post_data.intent = 'list';
    }
  }

  post_data.intent = intent;

  $.ajax({
    type: 'POST',
    url: base_url + '/dashboard/saved_templates/',
    data: JSON.stringify(post_data),
    contentType: "application/json; charset=utf-8",
    success: (data) => {
      $("#fetch-spinner").hide();
      $("#saved_templates_list").html(data);
      $("#show_saved").show();
    },
    error: () => {
      $("#fetch-spinner").hide();
      $("#show_saved").show();
      showToastMessage("Oops! Couldn't fetch templates", "primary");
    }

  });
}


// use saved template as prompt
Id("use_prompt").onclick = () => {
  // Id("outputarea").innerHTML = Id("template_details").innerHTML;
  // $("#templateDetailsModal").modal("hide");
  // $('#outputarea').focus();
  setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd)
  pasteHtmlAtCaret(Id("template_details").innerHTML, true);
  $("#templateDetailsModal").modal("hide");
  Id("savedTemplatesCmpnt").style.width = "0px";
}

Id("copy_template").onclick = () => {
  var txt = $("#template_details").html();

  if (text !== null && text !== "") {
    /* Copy the text inside the text field */
    var text = txt.split("<br>");
    var str = text.join('\n');
    // document.write(str);

    navigator.clipboard.writeText(str);
    showToastMessage("Text copied", "primary");
  } else {
    showToastMessage("Nothing to copy", "primary");
  }
}

// delete single template
function deleteSavedTemplates(type) {
  $("#deleteConfirm").show();

  Id("cancel_deletion").onclick = () => {
    $("#deleteConfirm").hide();
  }

  if (type === "single") {
    const template = Id("template_uid").innerText;
    var payload = {
      "template": template,
      "delete": "single",
      "csrf_token": csrf_token
    }
  } else if (type === "clear") {
    var payload = {
      "delete": "clear",
      user: user,
      "csrf_token": csrf_token
    }
  }

  Id("confirm_deletion").onclick = () => {
    // Id("deleteConfirm").hide();
    $.ajax({
      type: 'POST',
      url: base_url + '/dashboard/saved_templates/',
      data: JSON.stringify(payload),
      contentType: "application/json; charset=utf-8",
      success: (json) => {
        var data = JSON.parse(json);
        if (data.status === "SUCCESS") {
          $("#templateDetailsModal").modal("hide");
          $("#deleteConfirm").hide();
          fetchSavedTemplates(current_page, 'list');
          showToastMessage("Deleted successfully", "danger");
        } else if (data.status === "ERROR") {
          $("#delete_error").html(data.error);
        }
      },
      error: () => {
        showToastMessage("Oops! Couldn't delete template. Please try again", "danger");
      }

    });
  }
}

/**
 * WordPress
 */

// Posting to WordPress
function popWpModal(type, subscription) {
  if (type === 'gen_text') {
    content = Id('outputarea').innerHTML;
  } else if (type === 'saved') {
    content = Id('template_details').innerHTML;
  }
  if (subscription == 2) {
    $('#publishToWordPressModal').modal('show');
    var link = document.createElement('link');
    link.href = 'https://cdn.quilljs.com/1.3.6/quill.snow.css';
    link.rel = 'stylesheet';
    link.type = 'text/css';
    document.getElementsByTagName("head")[0].appendChild(link);

    // load Quill script
    var s = document.createElement('script');
    s.setAttribute('src', 'https://cdn.quilljs.com/1.3.6/quill.min.js');
    document.head.insertBefore(s, document.head.firstElementChild);

    // The activated editor functions
    var toolbarOptions = [
      ['bold', 'italic'],
      [{
        'list': 'ordered'
      }, {
        'list': 'bullet'
      }],
      ['link', 'underline', 'blockquote', 'image'],
      [{
        'header': '3'
      }],
      [{
        size: ['small', false, 'large', 'huge']
      }]
    ];

    // Quill configuration
    var options = {
      modules: {
        toolbar: toolbarOptions
      },
      placeholder: 'Edit your post here',
      readOnly: false,
      theme: 'snow'
    };

    s.onload = () => {
      // remove previous toolbar instances
      var toolbars = document.querySelectorAll(".ql-toolbar");

      Array.prototype.slice.call(toolbars)
        .forEach(function (toolbar) {
          toolbar.remove();
        });

      // The quill instance
      var editor = new Quill('#wp-content', options);

      editor.root.innerHTML = content;

      document.getElementsByClassName("ql-header")[0].innerText = "Style";
    }

  } else {
    $('#premiumSignup').modal('show');
  }
}

// Submit WordPress post and get response
function publishToWordPress() {
  var status;

  if (Id("wp-status").checked == true) {
    status = 'publish'
  } else {
    status = 'draft';
  }

  $("#wp-spinner").show();
  $("#wp-button-text").html("Sending...");
  Id('wp-submit-btn').disabled = true;

  if (Id("wp-title").value !== "" && Id("wp-url").value !== "" && Id("wp-username").value !== "" && Id("wp-pass").value !== "") {

    tags_arr = [];
    var tags = Id("wp-tags").value;
    var tags_arr = tags.split(", ");

    var postData = {
      "title": Id("wp-title").value,
      "status": status,
      "content": Id("wp-content").innerHTML,
      "cat": Id("wp-cat").value,
      "author": Id("wp-author").value,
      "excerpt": Id("wp-excerpt").value,
      "tags": tags_arr,
      "csrf_token": csrf_token,
      "url": Id("wp-url").value,
      "username": Id("wp-username").value,
      "pass": Id("wp-pass").value
    };

    if (Id("remWPCred").checked) {
      postData.rem_wp = true;
      postData.user = user;
    }

    $.ajax({
      type: 'POST',
      url: base_url + '/dashboard/wordpress/',
      data: JSON.stringify(postData),
      contentType: "application/json; charset=utf-8",
      traditional: true,
      success: (data) => {
        // var data = JSON.parse(json);
        if (data !== "") {
          if (data.status == 'SUCCESS') {
            showToastMessage('Article "' + data.title + '" posted successfully on your blog', "success");
            $("#wp-spinner").hide();
            $("#wp-button-text").html("Post");
            Id('wp-submit-btn').disabled = false;
          } else {
            showToastMessage("Something went wrong. Please try again", "danger");
          }
        } else {
          showToastMessage("Request failed. Please try again", "danger");
        }
        $("#wp-spinner").hide();
        $("#wp-button-text").html("Post");
        Id('wp-submit-btn').disabled = false;
      },
      error: () => {
        $("#wp-spinner").hide();
        $("#wp-button-text").html("Post");
        Id('wp-submit-btn').disabled = false;
        showToastMessage("Couldn't connect. Please re-check your URL and credentials", "danger");
      }
    });
  } else {
    showToastMessage("Please fill out all required * fields", "primary");
    $("#wp-spinner").hide();
    $("#wp-button-text").html("Post");
    Id('wp-submit-btn').disabled = false;
  }
}

/**
 * End custom functions
 */
