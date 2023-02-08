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
  document.title = `${site_name} | ${newPageTitle}`;
}

/* Onload */
window.onload = function () {
  changePageTitle();
};

// Forms
function clearInputs() {
  var inputsCollection = Class("form-inputs");
  for (i = 0; i < inputsCollection.length; i++) {
    inputsCollection[i].value = "";
  }
}

function clearSignupInputs() {
  var inputsCollection = Class("signup-form-inputs");
  for (i = 0; i < inputsCollection.length; i++) {
    inputsCollection[i].value = "";
  }
}

function clearGenericFormInputs() {
  var inputsCollection = Class("generic-form-inputs");
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
    e.preventDefault();
    e.stopImmediatePropagation();

    const form = $(this);
    const url = form.attr("action");

    $.ajax({
      type: "POST",
      url: `${base_url}/signin/`,
      data: form.serialize(),
      success: (data) => {
        switch (data) {
          case "SIGNIN_SUCCESS":
            clearInputs();
            $("#signinModal").modal("hide");

            signinStatus = 1;
            setTimeout(() => {
              window.location.href = `${base_url}/dashboard`;
            }, 1200);

            Swal.fire({
              title: '<strong class="text-dark">Success</strong>',
              icon: "success",
              toast: true,
              position: "top-end",
              html: '<p class="text-dark">You are now signed in</p>',
              showConfirmButton: false,
            });
            break;

          case "INVALID_PASSWORD":
            $("#password_err").show();
            $("#password_err").html("Your password is incorrect");
            break;

          case "EMAIL_BLANK":
            $("#email_err").show();
            $("#email_err").html("Please enter your email");
            break;

          case "EMAIL_INEXISTENT":
            $("#email_err").show();
            $("#email_err").html(
              "We couldn't find any account connected to that email"
            );
            break;

          default:
            break;
        }
      },
      error: () => {
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
    e.preventDefault();
    e.stopImmediatePropagation();

    $("#signup-spinner").show();
    $("#signup-button-text").html("");

    fetch(geoLocAPI)
      .then((response) => response.json())
      .then((geodata) => {
        const { ip, user_agent, location, currency } = geodata;
        const useragent = `${user_agent.name} ${user_agent.version}`;
        const device = user_agent.device.name;
        const platform = `${user_agent.os.name} ${user_agent.os.version}`;
        const country = location.country.name;
        const city = location.city;
        const currencyCode = currency.code;

        const form = $(this);
        const formData = form.serializeArray();
        formData.push({ name: "browser", value: useragent });
        formData.push({ name: "device", value: device });
        formData.push({ name: "platform", value: platform });
        formData.push({ name: "ip", value: ip });
        formData.push({ name: "country", value: country });
        formData.push({ name: "city", value: city });

        const hideSpinner = () => {
          $("#signup-spinner").hide();
          $("#signup-button-text").html("Sign up");
        };

        $.ajax({
          type: "POST",
          url: `${base_url}/signup/`,
          data: formData,
          success: (json) => {
            const data = JSON.parse(json);
            switch (data.status) {
              case "SIGNUP_SUCCESS":
                const sendInfo = {
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
                  success: (resp) => {
                    const resp_data = JSON.parse(resp);
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
                break;
              case "USERNAME_BLANK":
                $("#username_err").show();
                $("#username_err").html("Your first name is required");
                hideSpinner();
                break;
              case "EMAIL_BLANK":
                $("#emailexists_err").show();
                $("#emailexists_err").html("Your email address is required");
                hideSpinner();
                break;
              case "EMAIL_EXISTS":
                $("#emailexists_err").show();
                $("#emailexists_err").html("That email is already taken");
                hideSpinner();
                break;
              case "TEMP_EMAIL":
                $("#emailexists_err").show();
                $("#emailexists_err").html("Please use a valid email");
                hideSpinner();
                break;
              case "EMPTY_PASS":
                $("#signup_pwd_err").show();
                $("#signup_pwd_err").html("Password is required");
                hideSpinner();
                break;
              case "PASSWORD_MISMATCH":
                $("#mismatch_err").show();
                $("#mismatch_err").html("Password mismatch");
                hideSpinner();
                break;
              case "ERROR":
                Swal.fire({
                  title: '<strong class="text-dark">Oops!</strong>',
                  icon: "error",
                  toast: true,
                  position: "top-end",
                  html: '<p class="text-dark">An error occurred while attempting to save your information.</p>',
                  confirmButtonText: "Try again",
                });
                hideSpinner();
                break;
            }
          },
          error: () => {
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
    // if (v_status === 1)
    window.location.href = base_url + "/dashboard";
    // else 
    //   window.location.href = base_url + "/pricing";    
  } else {
    $("#signupModal").modal("hide");
    $("#signinModal").modal("show");
    Id("login-title").innerHTML = "Let's get you signed in";
  }
}

function popSignupModal() {
  if (signinStatus !== 1) {
    $("#signinModal").modal("hide");
    $("#resetPwdEmailEntryModal").modal("hide");
    $("#signupModal").modal("show");
  }
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
  var inputsCollection = Class("new-reg-inputs");
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
  toastMessageCmpnt.innerHTML = message;
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
    url: base_url + '/dashboard/saved-templates/',
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

  if (Id("filter-reset")) {
    Id("filter-reset").style.display = "block";
  }

  post_data = {
    "user": user,
    "csrf_token": csrf_token,
    "page": page
  }

  if (Id("content-type-filter")) {
    const contentTypeFilter = Id("content-type-filter");
    const selectedOption = contentTypeFilter.options[contentTypeFilter.selectedIndex];
    if (!selectedOption.disabled) { //true
      post_data.type = Id("content-type-filter").value;
    }
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
    url: base_url + '/dashboard/saved-templates/',
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
      url: base_url + '/dashboard/saved-templates/',
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

      Class("ql-header")[0].innerText = "Style";
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

// Web speech

// Text to speech    
function textToSpeech(action) {
  var text = Id("outputarea").innerText;
  var speech = new SpeechSynthesisUtterance();

  if (text !== "") {
    speech.text = text;
    speech.rate = 1;
    speech.volume = 1;
    speech.pitch = 1;

    speech.lang = 'en-US';

    var element = Id("text-to-speech");
    var wrapper = Id("text-to-speech-wrapper");

    if (action == 'speak') {
      element.remove();
      wrapper.innerHTML = '<i id="text-to-speech" class="bi bi-volume-mute fs-4 mx-2" type="button" onclick="textToSpeech(' + "'mute'" + ')"></i>';
      speechSynthesis.speak(speech);
    } else if (action == 'mute') {
      wrapper.innerHTML = '<i id="text-to-speech" class="bi bi-volume-down fs-4 mx-2" type="button" onclick="textToSpeech(' + "'speak'" + ')"></i>';
      speechSynthesis.cancel(speech);
    }
  } else {
    showToastMessage("Enter text to read out in the Canvas", "primary");
    Id('outputarea').focus();
  }
}

// Speech to text
var langs = [
  ["Afrikaans", ["af-ZA"]],
  ["Bahasa Indonesia", ["id-ID"]],
  ["Bahasa Melayu", ["ms-MY"]],
  ["Català", ["ca-ES"]],
  ["Čeština", ["cs-CZ"]],
  ["Deutsch", ["de-DE"]],
  [
    "English",
    ["en-AU", "Australia"],
    ["en-CA", "Canada"],
    ["en-IN", "India"],
    ["en-NZ", "New Zealand"],
    ["en-ZA", "South Africa"],
    ["en-GB", "United Kingdom"],
    ["en-US", "United States"],
  ],
  [
    "Español",
    ["es-AR", "Argentina"],
    ["es-BO", "Bolivia"],
    ["es-CL", "Chile"],
    ["es-CO", "Colombia"],
    ["es-CR", "Costa Rica"],
    ["es-EC", "Ecuador"],
    ["es-SV", "El Salvador"],
    ["es-ES", "España"],
    ["es-US", "Estados Unidos"],
    ["es-GT", "Guatemala"],
    ["es-HN", "Honduras"],
    ["es-MX", "México"],
    ["es-NI", "Nicaragua"],
    ["es-PA", "Panamá"],
    ["es-PY", "Paraguay"],
    ["es-PE", "Perú"],
    ["es-PR", "Puerto Rico"],
    ["es-DO", "República Dominicana"],
    ["es-UY", "Uruguay"],
    ["es-VE", "Venezuela"],
  ],
  ["Euskara", ["eu-ES"]],
  ["Français", ["fr-FR"]],
  ["Galego", ["gl-ES"]],
  ["Hrvatski", ["hr_HR"]],
  ["IsiZulu", ["zu-ZA"]],
  ["Íslenska", ["is-IS"]],
  ["Italiano", ["it-IT", "Italia"], ["it-CH", "Svizzera"]],
  ["Magyar", ["hu-HU"]],
  ["Nederlands", ["nl-NL"]],
  ["Norsk bokmål", ["nb-NO"]],
  ["Polski", ["pl-PL"]],
  ["Português", ["pt-BR", "Brasil"], ["pt-PT", "Portugal"]],
  ["Română", ["ro-RO"]],
  ["Slovenčina", ["sk-SK"]],
  ["Suomi", ["fi-FI"]],
  ["Svenska", ["sv-SE"]],
  ["Türkçe", ["tr-TR"]],
  ["български", ["bg-BG"]],
  ["Pусский", ["ru-RU"]],
  ["Српски", ["sr-RS"]],
  ["한국어", ["ko-KR"]],
  [
    "中文",
    ["cmn-Hans-CN", "普通话 (中国大陆)"],
    ["cmn-Hans-HK", "普通话 (香港)"],
    ["cmn-Hant-TW", "中文 (台灣)"],
    ["yue-Hant-HK", "粵語 (香港)"],
  ],
  ["日本語", ["ja-JP"]],
  ["Lingua latīna", ["la"]],
];

let select_language = document.querySelector("#select_language");
let select_dialect = document.querySelector("#select_dialect");

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}

// select_language.selectedIndex = 6;
// updateDialect();
// select_dialect.selectedIndex = 6;

function updateDialect() {
  try {
    for (var i = select_dialect.options.length - 1; i >= 0; i--) {
      select_dialect.remove(i);
    }
  }
  catch (e) {
    console.log("D: " + e);
  }
  var list = langs[select_language.selectedIndex];

  console.log(list);

  try {
    for (var i = 1; i < list.length; i++) {
      select_dialect.options.add(new Option(list[i][1], list[i][0]));
    }
  } catch (e) {
    console.log("L: " + e);
  }
  select_dialect.style.visibility =
    list[1].length == 1 ? "hidden" : "visible";
}

var lang_arr = ["select_language", "select_dialect"];
var rem_lang = Id("rem_lang");
Array.prototype.slice.call(Class("lang-inputs"))
  .forEach((el) => {
    el.onclick = () => {
      if (rem_lang.checked == true) {
        for (var i = 0; i < lang_arr.length; i++) {
          setCookie(lang_arr[i], Id(lang_arr[i]).value, 365);
        }
        var checked = Id("rem_lang").checked;
        checked = checked.toString();
        console.log(checked);
        setCookie("rem_lang", checked, 365);
      }
    }
  })


function handleSpeechRecognitionModal() {
  for (var i = 0; i < lang_arr.length; i++) {
    Id(lang_arr[i]).value = getCookie(lang_arr[i]);
  }

  var rem_cookie = getCookie("rem_lang");
  if (rem_cookie == "true") {
    speechToText();
    rem_lang.checked = true;
  } else {
    $('#speechRecognitionModal').modal('show');
    updateDialect();
    rem_lang.checked = false;
  }
}

function speechToText() {

  $('#speechRecognitionModal').modal('hide');

  var element = Id("speech-to-text");
  var wrapper = Id("speech-to-text-wrapper");
  var recognition = new webkitSpeechRecognition();
  recognition.continuous = true;
  recognition.interimResults = true;
  recognition.lang = Id("select_dialect").value;
  // recognition.maxAlternatives = 1;

  recognition.start();

  element.remove();
  wrapper.innerHTML = '<i id="speech-to-text-stop" class="bi bi-stop-circle text-danger fs-5 mx-2" type="button" title="Stop voice input. Right click to edit language settings"></i>';

  var speech_stop = Id("speech-to-text-stop");
  speech_stop.oncontextmenu = (e) => {
    e.preventDefault();
    $('#speechRecognitionModal').modal('show');
  }


  function restore() {
    wrapper.innerHTML = '<i id="speech-to-text" class="bi bi-mic fs-5 mx-2" type="button" onclick="speechToText()" title="Speech input. Make sure to enable web speech recognition on your browser."></i>';
    Id("interim").innerHTML = "";
  }

  Id("speech-to-text-stop").onclick = () => {
    recognition.stop();
  }

  let final_transcript = "";

  recognition.onresult = (event) => {
    // Create the interim transcript string locally because we don't want it to persist like final transcript
    let interim_transcript = "";

    // Loop through the results from the speech recognition object.
    for (let i = event.resultIndex; i < event.results.length; ++i) {
      // If the result item is Final, add it to Final Transcript, Else add it to Interim transcript
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }

    setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd);

    canvas.innerHTML = final_transcript;
    Id("interim").innerHTML = `<div class="row p-1">
                                  <div class="col-md-2">
                                    <i class="bi bi-mic-fill fs-4 text-secondary"></i>
                                  </div>
                                  <div class="col-md-10">    
                                    ${interim_transcript}
                                  </div>
                                </div>`;

    // setSelectionRange(canvas);
    // pasteHtmlAtCaret(interim_transcript, true);
  }

  recognition.onspeechend = () => {
    recognition.stop();
    restore();
  }

  recognition.onnomatch = (event) => {
    showToastMessage("Sorry, I didn't recognise that word", "primary");
    restore();
  }

  recognition.onerror = (event) => {
    showToastMessage("Error occurred in recognition: " + event.error, "primary");
    restore();
  }
}

// End web speech

// Handle tour start button
if (Id("start-tour-btn")) {
  Id("start-tour-btn").onclick = () => {
    if (signinStatus == 1) {
      setCookie("dash_content_type", "product_description");
      if (current_page == "dashboard") {
        renderSelection("product_description");
        tour.start();
      } else {
        setCookie("tour_status", "show");
        location.href = `${base_url}/dashboard`;
      }

    } else {
      handleStartBtn();
    }
  }
}
/**
 * End custom functions
 */
