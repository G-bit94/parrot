<?php

include "../header.php";

// if ($signinStatus !== 1) {
//     echo '<script>window.location.href = "../";</script>';
// }
if ($signinStatus == 1) {
    if ($v_status != 1) {
        echo '<script type="text/javascript">window.location.href = base_url + "/pricing";</script>';
    }
}
?>

<!-- Custom styles for the page -->
<style>
    /* saveditems */
    .saveditems {
        height: 90%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0);
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 39px;
        /* opacity: 0; */
    }

    @media screen and (max-height: 450px) {
        .saveditems {
            padding-top: 15px;
        }

        .saveditems a {
            font-size: 18px;
        }
    }

    /* End saveditems */

    /* Truncate saved items in list */
    /* On desktop */
    @media (min-width: 576px) {
        /* .truncated {
            display: block;
            white-space: nowrap; */
        /* forces text to single line */
        /* overflow: hidden;
            text-overflow: ellipsis;
        } */
    }
</style>

<div class="container-fluid mt-5 mb-5 py-3">
    <div class="row">
        <div class="col-md-2 mt-4 rounded-3">
            <div id="listingsDesktopFilter" class="col-md">
                <small class="mt-3 mb-1 text-muted text-uppercase">Action!</small>
                <p class="mt-2 p-1">
                    ParrotAI responds with a completion that matches the context you provided.
                </p>

                <small class="mt-3 fw-bold">Tip</small>

                <div class="list-group border-0">
                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1" aria-current="true">
                        <p><img src="../assets/img/tab-key.png" alt="" /></p>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="mb-0">Press <img src="../assets/img/tab-text.png" alt="Tab" /> once to generate more text</p>
                            </div>
                        </div>
                    </div>
                </div>

                <small class="mt-3 fw-bold">KEEP IN MIND</small>

                <div class="list-group border-0 py-2">
                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                        <i class="bi bi-bezier2"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="mb-0">Not the response you expected? Retry to craft your masterpiece to perfection</p>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                        <i class="bi bi-chat-left"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                <p class="mb-0">You can always get in touch in case of any problems</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4 border-start border-end">
            <div class="p-1 d-flex justify-content-between align-items-center shadow-sm rounded-3">
                <h2 id="title" class="lead fs-5 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="The Playground is where you get to have fun getting the Parrot to generate content for you">Playground</h2>

                <div class="dropdown">
                    <span class="btn btn-white border-secondary btn-sm mx-2 mt-1 dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Sample prompts
                    </span>
                    <div class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-hidden" aria-labelledby="dropdownMenu2" style="width: 380px;">
                        <ul class="list-unstyled mb-0">
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('news');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>News article</strong><br>
                                        <small class="mb-0" id="news_context">In a recent press release, the company, through its spokesperson, has said that it will no longer</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('blog');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>Regular blog article</strong><br>
                                        <small class="mb-0" id="blog_context">Working from home is great because</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('essay');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>Essay</strong><br>
                                        <small class="mb-0" id="essay_context">Gun control has been a controversial issue for years</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('copy');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>Marketing copy</strong><br>
                                        <small class="mb-0" id="copy_context">Are you still struggling with content creation and writing?</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('story');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>Tell a story</strong><br>
                                        <small class="mb-0" id="story_context">He had just started watching a movie when</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('code');">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <strong>Code</strong> <sup class="text-muted">Beta</sup><br>
                                        <small class="mb-0" id="code_context">const unfold = (f, seed) => {
                                            const go = (f, seed, acc) => {
                                            const res = f(seed)</small>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <!-- <span id="clear" class="btn btn-sm btn-outline-white border border-2 border-light mx-1"><i class="bi bi-x-circle"></i> Clear</span> -->
                    <!-- <i id="redo" type="button" class="bi bi-arrow-counterclockwise fs-5 mx-1"></i> -->
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <img src="../assets/img/copy.png" alt="" onclick="copyToClipboard('outputarea')" class="mx-2" type="button" />
                    <img src="../assets/img/save.png" alt="" id="save" class="mx-2" type="button" />
                    <i class="bi bi-list-stars mx-1 fs-4" onclick="fetchSavedItems()" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Saved items"></i>
                </div>
            </div>
            <div class="my-2">
                <div class="form-group mb-3">
                    <textarea class="form-control border border-teal border-2 mb-4" rows="15" placeholder="Talk to the Parrot..." maxlength="1536" id="outputarea"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-start mt-1">
                        <?php echo $spinner; ?>
                        <div class="gap-2">
                            <span class="btn btn-sm btn-primary rounded-pill mt-1 p-2" onclick="completeUserPrompt()" type="button">
                                <span id="gen-text">Generate text</span>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center mt-1">
                        <div class="btn-group" role="group" aria-label="Default button group">
                            <button type="button" class="btn btn-sm btn-outline-dark" onclick='removeText("prompt");'>Remove prompt</button>
                            <button type="button" class="btn btn-sm btn-outline-dark" onclick='removeText("gen_text");'>Remove generated text</button>
                            <button type="button" class="btn btn-sm btn-outline-dark" onclick='removeText("clear");'><i class="bi bi-x-circle"></i> Clear</button>
                            <button type="button" class="btn btn-sm btn-outline-dark" onclick='removeText("restore");'>Restore</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 mt-3 p-3">
            <div class="mt-5">
                <p class="fw-bold fs-5">Options</p>
            </div>
            <div class="form-group mb-3">
                <label for="temperature">
                    <small>Creativity&nbsp;
                        <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Try higher values for more creative applications, and lower values for prompts with a well-defined factual response. We recommend the default value (0.75)."></i>
                    </small>
                </label>
                <input type="range" class="form-range" min="0" max="1.5" step="0.05" id="temperature" en_text" type="button" oninput="getSliderValue('temperature')">
                <small class="fw-bold" id="temperature_show"></small>
            </div>
            <div class="form-group mb-3">
                <label for="length">
                    <small>Max length&nbsp;
                        <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Maximum number of characters in generated response."></i>
                    </small>
                </label>
                <input type="range" class="form-range" min="64" max="256" step="32" id="length" oninput="getSliderValue('length')">
                <small class="fw-bold" id="length_show"></small>
            </div>
            <div class="form-group mb-3">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="rem_input">
                    <label class="form-check-label d-flex" for="rem_input">
                        <small>Remove prompt from response&nbsp;
                            <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Choose whether to include prompt in response or not."></i>
                            </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="savedItemsCmpnt" class="saveditems mt-5 rounded-3">
    <div class="bg-white rounded-3 border border-1 border-teal">
        <div class="bg-light rounded-3 border-bottom py-2 px-1 d-flex justify-content-between align-items-center">
            <p class="fw-bold my-2">Saved items</p>
            <small class="btn btn-sm btn-light border" onclick='deleteSavedItems("clear")' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete all saved items">
                Clear list
            </small>
            <i class="bi bi-caret-right-fill" id="close_saved_items" type="button"></i>
        </div>
        <div class="p-1">
            <div class="d-flex justify-content-center">
                <img src="../assets/img/loader-bars.png" alt="" id="fetch-items-spinner" style="display: none;" class="loader mx-3" />
            </div>
            <ul class="list-unstyled mb-0" id="saved_items_list" style="height: 450px; overflow-y: auto;"></ul>
        </div>
    </div>
</div>

<div style="background-color: #180c3c;" class="text-light">
    <div class="container px-4 py-5" id="services">
        <h1 class="display-5 fw-bold">ParrotAI is for you</h1>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3">
                    <div class="feature-icon">
                        <img src="../assets/img/typing.png" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Writers</h4>
                    <p>Submit that essay without the nail-biting anguish of having to overcome writer's block
                    </p>
                </div>
            </div>
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3">
                    <div class="feature-icon">
                        <img src="../assets/img/digital-marketing.png" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Marketers</h4>
                    <p>Are you an SEO or copywriter? Transform your ideas into engaging content and irresistible copy</p>
                </div>
            </div>
            <div class="feature col" type="button">
                <div class="border rounded-3 pt-5 px-3 pb-3 ">
                    <div class="feature-icon">
                        <img src="../assets/img/developer.png" />
                    </div>
                    <h4 class="fw-bold mt-4 mb-0">Developers</h4>
                    <p>Here's your wingman. Autocomplete code in whatever language you choose</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contactus -->

<div class="px-4 text-center py-2" id="contactus">
    <p class="fs-3 mb-5 fw-bold"><strong>Facing a problem? We'd love to help. Seriously</strong></p>
    <div class="row row-cols-1 row-cols-md-3 my-5">
        <div class="col my-5">
            <div class="col mr-auto text-center">
                <p class="fs-5">Talk to one of our customer support representatives right away.</p>
                <button class="btn btn-lg btn-dark my-5" onclick="startChat()"><i class="bi bi-chat-left"></i> &nbsp;Start chat</button>
            </div>
        </div>
        <div class="col my-5">
            <p class="fs-2">OR</p>
        </div>
        <div class="col my-5">
            <p class="fs-5">Drop us a line and we'll talk — or get back to you as soon as we can.</p>
            <div class="col mr-auto text-center">
                <a class="btn btn-outline-dark my-5" href="mailto:info.parrot-ai@gmail.com">
                    <i class="bi bi-envelope-open"></i>&nbsp;info.parrot-ai@gmail.com
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Contactus -->

<!-- Item details modal -->
<div class="modal modal-signin py-5 fade" tabindex="-1" role="dialog" id="itemDetailsModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-3 pb-2 border-bottom-0">
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <div class="d-flex justify-content-between border-bottom p-2">
                    <span id="item_uid" style="display: none;"></span>
                    <div>
                        <h6 id="item_summary" class="fw-bold mb-0 mt-1"></h6><br>
                        <small id="date"></small><br>
                        <small id="time"></small>
                    </div>
                    <span class="mt-1" id="controls">
                        <!-- <img src="../assets/img/copy.png" alt="" onclick="copyItemToClipboard()" class="mx-2 mb-2" type="button" />                 -->
                        <button class="btn btn-sm btn-light border mx-2" id="copy_item">
                            Copy
                        </button>
                        <button class="btn btn-sm btn-light border mx-2" id="use_prompt">
                            Use as prompt
                        </button>
                        <button class="btn btn-sm btn-light border mx-2" onclick='deleteSavedItems("single")'>
                            <i type="button" class="bi bi-trash mx-2 text-danger"></i> Delete
                        </button>
                    </span>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="../assets/img/loader-bars.png" alt="" id="item-details-spinner" style="display: none;" class="loader mx-3" />
                </div>
                <div id="item_details" style="height: 350px;" class="mt-1 overflow-auto"></div>
                <div class="border-bottom mt-1"></div>
            </div>
        </div>
    </div>
</div>
<!-- End item details modal -->

<!-- Delete confirmation toast -->
<div class="position-fixed top-0 end-0 p-3 rounded-3" style="z-index: 9999;">
    <div id="deleteConfirm" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header bg-white text-dark">
            Sure to permanently delete the item(s)?
        </div>
        <div class="toast-body bg-white">
            <div id="delete_error"></div>
            <div class="pt-2">
                <button type="button" id="cancel_deletion" class="btn btn-white border btn-sm" data-bs-dismiss="toast">No, keep</button>
                <button type="button" id="confirm_deletion" class="btn btn-danger btn-sm mx-2">Yes, delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Complete prompt on tab key press
    window.addEventListener("keydown", (evt) => {
        if (signinStatus == 1) {
            if (evt.keyCode == "9") {
                evt.preventDefault(); //prevent changing focus to other elements
                completeUserPrompt();
            }
        }
    }, false);

    // content holders
    let prompt_holder, resp_holder;

    // Copy text to clipboard
    function copyToClipboard(id) {
        /* Get the text field */
        var copyText = Id(id);
        var text = copyText.value;

        /* Select the text field */
        // copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        if (text !== null && text !== "") {
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(text);
            showToastMessage("Text copied", "primary");
        } else {
            showToastMessage("Nothing to copy", "primary");
        }
    }

    // Complete use prompt
    function completeUserPrompt(type) {

        var outputarea = $("#outputarea");
        var context = outputarea.val();

        if (typeof type !== 'undefined' && type !== null && type != "") {
            var context = Id(type + "_context").innerText;
        }

        var temp = $("#temperature").val();
        var length = $("#length").val();
        // var rem_input = $('#rem_input').is(":checked");
        var rem_input = Id("rem_input").checked;

        if (typeof context !== 'undefined' && context !== null && context != "") {

            prompt_holder = context;
            $("#gen-spinner").show();
            $("#gen-text").html("Getting the juice...");

            var SendInfo = {
                "context": context,
                "top_p": 0.9,
                "temp": temp,
                "response_length": length,
                "remove_input": rem_input,
                "csrf_token": csrf_token
            };

            $.ajax({
                type: 'POST',
                url: 'prompt.php',
                data: JSON.stringify(SendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: (data) => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html("Generate text");
                    resp_holder = data[0].generated_text;
                    outputarea.val(data[0].generated_text);
                },
                error: () => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html("Generate text");
                    Swal.fire({
                        title: "Dang! Connection failed",
                        icon: 'warning',
                        toast: true,
                        position: 'top-end',
                        timer: 7000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        width: '25rem',
                        padding: '0.75rem',
                        html: '<p class="text-dark">Could you try that again?</p>',
                    });
                }

            });
        } else {
            Swal.fire({
                icon: 'warning',
                toast: true,
                position: 'top-end',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                width: '28rem',
                padding: '0.75rem',
                title: '<p>Enter something into the prompt area</p>',
            });
        }
    }

    // var gen_text = substr(response, gen_text_start, gen_text_end);

    function removeText(type) {
        var prompt_start = 0;
        var prompt = prompt_holder;

        var prompt_end = prompt.length;

        var response = resp_holder;

        var gen_text_start = prompt_end + 1;
        var gen_text_end = response.length;

        // remove prompt
        if (type === "prompt") {
            Id("outputarea").value = response.substr(gen_text_start, gen_text_end); //generated text
        }

        // remove generated text
        if (type === "gen_text") {
            Id("outputarea").value = prompt;
        }

        // clear
        if (type === "clear") {
            Id("outputarea").value = "";
        }

        // restore
        if (type === "restore") {
            Id("outputarea").value = prompt + ' ' + response.substr(gen_text_start, gen_text_end);
        }
    }

    // Save/show/delete items
    var sidebar = document.getElementById("savedItemsCmpnt");
    sidebar.style.width = "0px";

    // show/hide items
    function fetchSavedItems() {
        // document.getElementById("savedItemsCmpnt").style.width = "225px";


        // Hide sidebar
        if (sidebar.style.width == "225px") {
            sidebar.style.width = "0px";
        }

        // Show sidebar
        else if (sidebar.style.width == "0px") {
            sidebar.style.width = "225px";

            // fetch items
            $("#fetch-items-spinner").show();
            $("#show_saved").hide();

            $.ajax({
                type: 'POST',
                url: 'saved_items.php',
                data: JSON.stringify({
                    "user": user,
                    "fetch_all": true,
                    "csrf_token": csrf_token
                }),
                contentType: "application/json; charset=utf-8",
                success: (data) => {
                    $("#fetch-items-spinner").hide();
                    $("#saved_items_list").html(data);
                    $("#show_saved").show();
                },
                error: () => {
                    $("#fetch-items-spinner").hide();
                    $("#show_saved").show();
                    showToastMessage("Oops! Couldn't fetch items", "primary");
                }

            });
        }
    }


    function updateItemsList() {
        // fetch items
        $("#fetch-items-spinner").show();
        $("#show_saved").hide();

        $.ajax({
            type: 'POST',
            url: 'saved_items.php',
            data: JSON.stringify({
                "user": user,
                "fetch_all": true,
                "csrf_token": csrf_token
            }),
            contentType: "application/json; charset=utf-8",
            success: (data) => {
                $("#fetch-items-spinner").hide();
                $("#saved_items_list").html(data);
                $("#show_saved").show();
            },
            error: () => {
                $("#fetch-items-spinner").hide();
                $("#show_saved").show();
                showToastMessage("Oops! Couldn't fetch items", "primary");
            }

        });
    }


    // fetch single item
    function fetchSingleItem(item) {
        $("#itemDetailsModal").modal("show");
        $("#item-details-spinner").show();
        $.ajax({
            type: 'POST',
            url: 'saved_items.php',
            data: JSON.stringify({
                "item": item,
                "fetch_single": true,
                "csrf_token": csrf_token
            }),
            contentType: "application/json; charset=utf-8",
            success: (json) => {
                $("#item-details-spinner").hide();
                var data = JSON.parse(json);
                if (data.status === "SUCCESS") {
                    Id("item_uid").innerText = data.uid;
                    Id("item_summary").innerText = data.title;
                    Id("item_details").innerText = data.text.replace(/\\n/g, '<br>'); //format to display space and \n correctly                    
                    Id("date").innerText = data.date;
                    Id("time").innerText = data.time;
                } else if (data.status === "ERROR") {
                    $("#item_details").html(data.error);
                }
            },
            error: () => {
                $("#item-details-spinner").hide();
                showToastMessage("Oops! Couldn't fetch details", "primary");
            }

        });
    }

    // delete single item
    function deleteSavedItems(type) {
        $("#deleteConfirm").show();

        Id("cancel_deletion").onclick = () => {
            $("#deleteConfirm").hide();
        }

        if (type === "single") {
            const item = Id("item_uid").innerText;
            var payload = {
                "item": item,
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
                url: 'saved_items.php',
                data: JSON.stringify(payload),
                contentType: "application/json; charset=utf-8",
                success: (json) => {
                    var data = JSON.parse(json);
                    if (data.status === "SUCCESS") {
                        $("#itemDetailsModal").modal("hide");
                        $("#deleteConfirm").hide();
                        updateItemsList();
                        showToastMessage("Deleted successfully", "danger");
                    } else if (data.status === "ERROR") {
                        $("#delete_error").html(data.error);
                    }
                },
                error: () => {
                    showToastMessage("Oops! Couldn't delete item. Please try again", "danger");
                }

            });
        }
    }

    // use saved item as prompt
    Id("use_prompt").onclick = () => {
        Id("outputarea").value = Id("item_details").innerText;
        $("#itemDetailsModal").modal("hide");
    }
    // function useItemAsPrompt() {

    // }

    Id("copy_item").onclick = () => {
        var txt = $("#item_details").html();

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

    // hide sidebar
    Id("close_saved_items").onclick = () => {
        Id("savedItemsCmpnt").style.width = "0px";
    }

    // save item to db
    Id("save").onclick = () => {

        var text = Id("outputarea").value;

        if (typeof text !== 'undefined' && text !== null && text != "") {

            var itemdata = {
                "user": user,
                "text": text,
                "new_item": true,
                "csrf_token": csrf_token
            };

            $.ajax({
                type: 'POST',
                url: 'saved_items.php',
                data: JSON.stringify(itemdata),
                contentType: "application/json; charset=utf-8",
                success: (json) => {
                    var data = JSON.parse(json);
                    if (data.status === "SUCCESS") {
                        showToastMessage("Saved successfully", "success");
                        updateItemsList();
                    } else if (data.status === "ITEM_EXISTS") {
                        showToastMessage("Item is already saved", "primary");
                    } else if (data.status === "") {
                        showToastMessage("Dang! Something went wrong", "primary");
                    } else if (data.status === "ERROR") {
                        showToastMessage("Dang! Something went wrong", "primary");
                    }
                },
                error: () => {
                    showToastMessage("Oops! Connection lost");
                }
            });
        } else {
            showToastMessage("Sorry. Can't save a blank item", "primary");
        }
    }

    // Authentication
    window.addEventListener('DOMContentLoaded', (event) => {
        if (signinStatus !== 1) {
            // window.location.href = '../';

            $('#signinModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            $('#signinModal').modal('show');
            Id("login-title").innerHTML = "Sign in to get started with ParrotAI";

            $('#signupModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            Id("dismiss-signin").style.display = "none";
            Id("dismiss-signup").style.display = "none";


            // $("#signinModal").on('hide.bs.modal', function() {
            //     $('#signinModal').modal('show');
            // });

            // use this
            $("#signinModal").on('hidden.bs.modal', function() {
                $('#signinModal').modal('show');
            });

        }
    });
</script>

<?php
include "../footer.php";
?>