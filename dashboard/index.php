<?php

include "../header.php";

// if ($signinStatus !== 1) {
//     echo '<script>window.location.href = "../";</script>';
// }

if ($signinStatus == 1) {
    // if ($v_status != 1) {
    //     echo '<script type="text/javascript">window.location.href = base_url + "/pricing";</script>';
    // }
} else {
    echo "<script type=\"text/javascript\">window.location.href = \"$base_url\"</script>";
    exit;
}

// Content types list
$result = $mysqli->query("SELECT * FROM content_types ORDER BY rank ASC");

?>

<!-- Custom styles for the page -->
<style>
    /* saved templates */
    .saved-templates {
        /* height: 100%; */
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
        .saved-templates {
            padding-top: 15px;
        }

        .saved-templates a {
            font-size: 18px;
        }
    }

    /* End saved templates */

    /* Content types */
    .list-group {
        max-width: 380px;
    }

    .form-check-input:checked+.form-checked-content {
        opacity: .5;
    }

    .form-check-input-placeholder {
        border-style: dashed;
    }

    [contenteditable]:focus {
        outline: 0;
    }

    .list-group-checkable .list-group-item {
        cursor: pointer;
    }

    .position-relative {
        margin: 0rem 0rem 0.5rem 0rem;
    }

    .list-group-item-check {
        position: absolute;
        clip: rect(0, 0, 0, 0);
    }

    .list-group-item-check:hover+.list-group-item {
        background-color: var(--bs-light);
    }

    .list-group-item-check:checked+.list-group-item {
        color: #fff;
        background-color: var(--bs-blue);
    }

    .list-group-item-check[disabled]+.list-group-item,
    .list-group-item-check:disabled+.list-group-item {
        pointer-events: none;
        filter: none;
        opacity: .5;
    }

    .list-group-radio .list-group-item {
        cursor: pointer;
        border-radius: .5rem;
        border: none;
    }

    .list-group-radio .form-check-input {
        z-index: 1;
        margin-top: -.5em;
    }

    .list-group-radio .list-group-item:hover,
    .list-group-radio .list-group-item:focus {
        background-color: var(--bs-light);
    }

    .list-group-radio .form-check-input:checked+.list-group-item {
        background-color: var(--bs-body);
        border-color: var(--bs-blue);
        box-shadow: 0 0 0 2px var(--bs-blue);
        font-weight: 600;
    }

    .list-group-radio .form-check-input[disabled]+.list-group-item,
    .list-group-radio .form-check-input:disabled+.list-group-item {
        pointer-events: none;
        filter: none;
        opacity: .5;
    }

    /* Animate text output */

    /* Truncate saved templates in list */
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

    #undo.disabled,
    #redo.disabled {
        color: #ccc;
    }

    /* Placeholder color on offcanvas */
    .dash-search::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: rgb(248, 249, 250);
        opacity: 1;
        /* Firefox */
    }

    /* shepherd styles */
    .shepherd-content {
        border-radius: 0.75rem 0.75rem 0rem 0rem !important;
    }

    .shepherd-header {
        background-color: #7434fc !important;
        opacity: 0.95 !important;
        padding: 0.5rem 0.5rem 0.5rem 0.5rem !important;
    }

    .shepherd-title {
        color: #fff !important;
        font-weight: bold !important;
    }

    .shepherd-arrow {
        position: absolute !important;
        top: 0px !important;
        transform: translate(0px, 150px) !important;
    }

    .shepherd-cancel-icon {
        color: #f5f5f5 !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/shepherd.js@10.0.1/dist/js/shepherd.min.js"></script>

<div class="mt-5 mb-2 py-3">
    <div class="container-fluid">
        <div class="row my-2">
            <!-- Content type -->
            <div class="col-md-2" id="content-tour-start">
                <div class="offset-md-1 text-start mt-3">
                    <h5 class="fw-bold">Content type</h5>
                </div>
                <div class="list-group list-group-radio border-0 w-auto row">
                    <div class="mb-3"></div>
                    <?php
                    foreach ($result as $row) {
                        ?>
                        <div class="position-relative">
                            <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection"
                                type="radio" name="contentTypeListGroup" value="<?php echo $row['type']; ?>"
                                id="list-group-<?php echo $row['type']; ?>">
                            <label class="list-group-item pe-1" for="list-group-<?php echo $row['type']; ?>">
                                <?php echo $row["icon"]; ?>
                                <small><?php echo $row["full_name"]; ?></small>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div id="content-tour-second" class="col-md-3 border-start border-end border-bottom py-3 px-4 overflow-auto"
                style="height: 650px;">
                <!-- Reusable container -->
                <div id="reusable-container" class="mt-4"></div>
                <!-- Options -->
                <div class="p-1">
                    <div class="mt-3">
                        <p class="fw-bold">Options</p>
                    </div>

                    <!-- Tone -->
                    <div class="form-group mb-3">
                        <small class="form-label">Tone</small>
                        <div class="row">
                            <div class="col-md-6 dropdown">
                                <span class="btn btn-white border-secondary btn-sm mt-1 dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    Select tone
                                </span>
                                <ul class="dropdown-menu pt-0 mx-0 rounded-3 p-2 shadow overflow-auto"
                                    style="width: 200px; height: 250px; cursor: pointer;">
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Formal
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Informal
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Humorous
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Joyful
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">
                                        Optimistic</li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Resigned
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Serious
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Curious
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Worried
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Sombre
                                    </li>
                                    <li class="list-group-item list-group-item-action border-0 py-1 text-tone">Horror
                                    </li>
                                </ul>
                            </div>

                            <span class="col-md-6 row btn btn-sm btn-light rounded-pill" id="text-tone-disp-wrapper">
                                <input class="col-8 border-0 bg-light content-type-input" id="text-tone-disp"
                                    readonly />
                                <span id="text-tone-disp-cancel" class="col-2">&times;</span>
                            </span>
                        </div>
                    </div>

                    <!-- Creativity -->
                    <div class="form-group mb-3">
                        <label for="creativity">
                            <small>Creativity&nbsp;
                                <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover"
                                    data-bs-trigger="hover"
                                    data-bs-content="Try higher values for more creative applications, and lower values for prompts with a well-defined factual response. We recommend the default value (0.5)."></i>
                            </small>
                        </label>
                        <input type="range" class="form-range context-params" min="0" max="1" step="0.05"
                            id="creativity" en_text" type="button" oninput="getSliderValue('creativity')">
                        <small class="fw-bold" id="creativity_show"></small>
                    </div>

                    <!-- Word count -->
                    <div class="form-group mb-3">
                        <label for="word_count">
                            <small>Word count&nbsp;
                                <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover"
                                    data-bs-trigger="hover"
                                    data-bs-content="Approximate maximum number of words in generated response."></i>
                            </small>
                        </label>
                        <?php if ($active_sub == 1) { ?>
                            <input type="range" class="form-range context-params" max="1000" step="5" id="word_count"
                                oninput="getSliderValue('word_count')">
                        <?php } else { ?>
                            <input type="range" class="form-range context-params" max="1600" step="5" id="word_count"
                                oninput="getSliderValue('word_count')">
                        <?php } ?>
                        <small class="fw-bold" id="word_count_show"></small>
                    </div>

                    <!-- Include prompt in response -->
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input content-type-input" type="checkbox" role="switch"
                                id="rem_input" checked>
                            <label class="form-check-label d-flex" for="rem_input">
                                <small>Remove prompt from response&nbsp;
                                    <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-content="Choose whether to include prompt in response or not."></i>
                                </small>
                            </label>
                        </div>
                    </div>

                    <!-- Highlight output -->
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input content-type-input" type="checkbox" role="switch"
                                id="highlight" checked>
                            <label class="form-check-label d-flex" for="highlight">
                                <small>Highlight output&nbsp;
                                    <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover"
                                        data-bs-trigger="hover"
                                        data-bs-content="Choose whether to highlight output or not."></i>
                                </small>
                            </label>
                        </div>
                    </div>

                    <!-- Enable web results -->
                    <!-- <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input content-type-input" type="checkbox" role="switch" id="web_results" checked>
                            <label class="form-check-label d-flex" for="web_results">
                                <small>Enable web results&nbsp;
                                    <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Choose whether to include results from the web."></i>
                                </small>
                            </label>
                        </div>
                    </div> -->

                </div>
            </div>

            <!-- Canvas -->
            <div class="col-md-7">
                <div class="mt-2">
                    <div id="canvas-header">
                        <div class="p-1 d-flex justify-content-between align-items-center border-bottom">
                            <h2 id="title" class="lead fs-5 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Paint a picture with words. Craft your masterpiece to perfection.">Canvas</h2>
                            <div class="dropdown">
                                <span class="btn btn-white border-secondary btn-sm mx-2 dropdown-toggle" type="button"
                                    id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Sample prompts
                                </span>
                                <div class="dropdown-menu pt-0 mx-0 rounded-3 p-2 shadow overflow-hidden"
                                    aria-labelledby="dropdownMenu2" style="width: 380px;">
                                    <ul class="list-unstyled mb-0">
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'news');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>News article</strong><br>
                                                    <small class="mb-0" id="news_context">In a recent press release, the
                                                        company, through its spokesperson, has said that it will no
                                                        longer</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'article');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>Regular blog article</strong><br>
                                                    <small class="mb-0" id="article_context">Working from home is great
                                                        because</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'essay');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>Essay</strong><br>
                                                    <small class="mb-0" id="essay_context">Gun control has been a
                                                        controversial issue for years</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'copy');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>Marketing copy</strong><br>
                                                    <small class="mb-0" id="copy_context">Are you still struggling with
                                                        content creation and writing?</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'story');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>Tell a story</strong><br>
                                                    <small class="mb-0" id="story_context">He had just started watching
                                                        a movie when</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated"
                                            type="button"
                                            onclick="completeUserPrompt('sample', 'auto_complete', 'code');">
                                            <div class="d-flex gap-2 w-100 justify-content-between">
                                                <div>
                                                    <strong>Code</strong> <sup class="text-muted border">Beta</sup><br>
                                                    <small class="mb-0" id="code_context">
                                                        function loadScript(src) {
                                                        return new Promise(function(resolve, reject) {
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <?php if ($active_sub == 2) { ?>
                                    <span id="speech-to-text-wrapper" class="mx-2">
                                        <i id="speech-to-text" type="button" class="bi bi-mic fs-5"
                                            onclick="handleSpeechRecognitionModal()"
                                            title="Speech input. Make sure to enable web speech recognition on your browser."></i>
                                    </span>
                                    <span id="text-to-speech-wrapper" class="mx-2">
                                        <i id="text-to-speech" type="button" class="bi bi-volume-down fs-4"
                                            onclick="textToSpeech('speak')" data-bs-toggle="tooltip"
                                            title="Read text out loud."></i>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <i class="bi bi-suit-heart-fill mx-2 fs-5 text-danger opacity-75"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Save template" id="save"
                                    type="button"></i>
                                <i class="bi bi-list-stars mx-2 fs-4"
                                    onclick="fetchSavedTemplates(current_page, 'list')" type="button"
                                    title="View saved templates" data-bs-toggle="offcanvas"
                                    data-bs-target="#savedTemplatesCmpnt"></i>
                            </div>
                        </div>
                        <div class="my-2">
                            <style>
                                .btn-controls {
                                    border-color: #fff;
                                }

                                .editButtons span {
                                    display: inline-block;
                                    margin-top: 8px;
                                    background: #fff;
                                }

                                .editButtons span button {
                                    font-size: 16px;
                                }

                                .toolbar-edit {
                                    float: left;
                                    border: 0;
                                    font: 12px/1 monospace;
                                    padding: 4px 8px;
                                }

                                .toolbar-edit:hover {
                                    background: #ddd;
                                }

                                #outputarea {
                                    padding: 4px 10px;
                                    height: 380px;
                                    overflow-y: scroll;

                                    /* Deal with line breaks  */
                                    white-space: pre-wrap;
                                }

                                #outputarea:focus {
                                    outline: 0px solid transparent;
                                }

                                /* Floating toolbar */
                                /* ul.floating-toolbar {
                                    list-style: none;
                                    box-shadow: 0px 0px 4px rgba(0, 0, 0, .5);
                                    position: absolute;
                                }

                                #canvas-actions-bar {
                                    position: fixed;
                                    bottom: 50px;
                                    left: 50px;
                                    width: 50px;
                                    height: 50px;
                                    background-color: #fff;
                                    border-radius: 50%;
                                    box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
                                } */

                                #floating-toolbar {
                                    position: absolute;
                                    /* height: 40px; */
                                    border-radius: 2px;
                                    /* background-color: #212121; */
                                    text-align: center;
                                }

                                #floating-toolbar::before {
                                    position: absolute;
                                    /* border-top: 10px solid black;
                                    border-left: 10px solid transparent;
                                    border-right: 10px solid transparent; */
                                    left: 155px;
                                    top: 40px;
                                    text-align: center;
                                }

                                #floating-toolbar li {
                                    height: 32px;
                                    background-repeat: no-repeat;
                                    background-position: center;
                                    background-size: 70%;
                                }

                                .toolbar-item {
                                    /* color: #F5F5F5; */
                                    padding: 1px;
                                }

                                .toolbar-item:hover {
                                    padding: 1px 3px 1px 3px;
                                    font-weight: 600;
                                    cursor: pointer;
                                }

                                /* Text highlight */
                                ::-moz-selection {
                                    /* Code for Firefox */
                                    /* background: #ffab00;   */
                                    color: #000;
                                    background: #FFEE58;
                                }

                                ::selection {
                                    color: #000;
                                    background: #FFEE58;
                                }

                                /* Custom scrollbar */
                                ::-webkit-scrollbar-track {
                                    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
                                    background-color: #F5F5F5;
                                    border-radius: 10px;
                                }

                                ::-webkit-scrollbar {
                                    width: 10px;
                                    background-color: #F5F5F5;
                                }

                                ::-webkit-scrollbar-thumb {
                                    border-radius: 10px;
                                    background-image: -webkit-gradient(linear,
                                            left top,
                                            left bottom,

                                            color-stop(0.44, rgb(116, 52, 252)),
                                            color-stop(0.72, rgb(73, 125, 189)),
                                            color-stop(0.86, rgb(28, 58, 148)));
                                }
                            </style>

                            <div class="d-flex justify-content-between shadow-sm border-bottom rounded-top-3 border">
                                <div class="editButtons">
                                    <span title="STYLES">
                                        <button class="toolbar-edit btn" data-edit="bold"><i
                                                class="bi bi-type-bold"></i></button>
                                        <button class="toolbar-edit btn" data-edit="italic"><i
                                                class="bi bi-type-italic"></i></button>
                                        <button class="toolbar-edit btn" data-edit="underline"><i
                                                class="bi bi-type-underline"></i></button>
                                        <button class="toolbar-edit btn" data-edit="strikeThrough"><i
                                                class="bi bi-type-strikethrough"></i></button>
                                    </span>

                                    <span title="TEXT FORMAT">
                                        <button class="toolbar-edit btn" data-edit="formatBlock:p"><i
                                                class="bi bi-blockquote-left"></i></button>
                                        <button class="toolbar-edit btn" data-edit="formatBlock:H1"><i
                                                class="bi bi-type-h1"></i></button>
                                        <button class="toolbar-edit btn" data-edit="formatBlock:H2"><i
                                                class="bi bi-type-h2"></i></button>
                                        <button class="toolbar-edit btn" data-edit="formatBlock:H3"><i
                                                class="bi bi-type-h3"></i></button>
                                    </span>

                                    <span title="FONT SIZE">
                                        <button class="toolbar-edit btn" data-edit="fontSize:1">&#8613;s</button>
                                        <button class="toolbar-edit btn" data-edit="fontSize:3">&#8613;M</button>
                                        <button class="toolbar-edit btn" data-edit="fontSize:5">&#8613;L</button>
                                    </span>

                                    <span title="LISTS">
                                        <button class="toolbar-edit btn" data-edit="insertUnorderedList"><i
                                                class="bi bi-list-ul"></i></button>
                                        <button class="toolbar-edit btn" data-edit="insertOrderedList"><i
                                                class="bi bi-list-ol"></i></button>
                                    </span>

                                    <span title="ALIGNMENT">
                                        <button class="toolbar-edit btn" data-edit="justifyLeft"><i
                                                class="bi bi-justify-left"></i></button>
                                        <button class="toolbar-edit btn" data-edit="justifyCenter"><i
                                                class="bi bi-justify"></i></button>
                                        <button class="toolbar-edit btn" data-edit="justifyRight"><i
                                                class="bi bi-justify-right"></i></button>
                                    </span>

                                    <span title="CLEAR FORMATTING">
                                        <button class="toolbar-edit btn" data-edit="removeFormat"><i
                                                class="bi bi-x"></i></button>
                                    </span>

                                    <span title="CONTROLS">
                                        <button class="toolbar-edit btn" id="undo" data-edit="undo" title="UNDO"><i
                                                class="bi bi-arrow-counterclockwise"></i></button>
                                        <button class="toolbar-edit btn" id="redo" data-edit="redo" title="REDO"><i
                                                class="bi bi-arrow-clockwise"></i></button>
                                    </span>

                                    <!-- <span title="UNDO/REDO">
                                    <button class="toolbar-edit btn" onclick="undo()"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    <button class="toolbar-edit btn" onclick="redo()"><i class="bi bi-arrow-clockwise"></i></button>
                                 </span> -->
                                </div>

                                <div class="d-flex justify-content-between mx-1">
                                    <span title="Post to WordPress">
                                        <button class="btn btn-sm fw-bold"
                                            onclick="popWpModal('gen_text', <?php echo $active_sub; ?>)">
                                            <i class="bi bi-wordpress text-primary fs-5"></i> <sup
                                                class="text-muted border">Beta</sup>
                                        </button>
                                    </span>
                                    <span title="Share">
                                        <button class="btn btn-sm fw-bold mt-1">
                                            <i class="bi bi-share-fill"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="outputarea-wrapper">
                        <div id="interim"
                            class="bg-info rounded mx-1 px-2 d-flex justify-content-center align-items-center"></div>
                        <!-- Interim speech holder -->
                        <div class="bg-white rounded" id="outputarea" contenteditable></div>
                        <ul id="floating-toolbar" class="dropdown-menu rounded-3 p-2 px-2 shadow"
                            style="display: none;">
                            <li class="list-group-item toolbar-item text-start border-0"
                                onclick="completeUserPrompt('toolbar', 'auto_complete', '')">
                                <i class="bi bi-robot"></i>
                                <small> Continue...</small>
                            </li>
                            <li class="list-group-item toolbar-item text-start border-0"
                                onclick="completeUserPrompt('toolbar', 'paraphrase', '')">
                                <i class="bi bi-pencil-square"></i>
                                <small> Paraphrase</small>
                            </li>
                            <li class="list-group-item toolbar-item text-start border-0"
                                onclick="completeUserPrompt('toolbar', 'execute', '')">
                                <i class="bi bi-terminal"></i>
                                <small> Run as command</small>
                            </li>
                            <hr class="w-100 my-1">
                            <li class="list-group-item toolbar-item text-start border-0"
                                onclick="completeUserPrompt('toolbar', 'expand', '')">
                                <i class="bi bi-chevron-expand fs-5"></i>
                                <small> Expand</small>
                            </li>
                            <li class="list-group-item toolbar-item text-start border-0"
                                onclick="completeUserPrompt('toolbar', 'expand', '')">
                                <i class="bi bi-pen"></i>
                                <small> Edit Grammar</small>
                            </li>
                            <hr class="w-100 my-1">
                            <li class="list-group-item toolbar-item text-start border-0 mt-2 my-1" data-edit="copy">
                                <i class="bi bi-clipboard2"></i>
                                <small> Copy</small>
                            </li>
                            <li class="list-group-item toolbar-item text-start border-0" data-edit="cut">
                                <i class="bi bi-scissors"></i>
                                <small> Cut</small>
                            </li>
                            <li class="list-group-item toolbar-item text-start border-0" data-edit="delete">
                                <i class="bi bi-eraser-fill"></i>
                                <small> Delete</small>
                            </li>
                            <!-- <hr class="w-100 my-1">
                            <li class="list-group-item toolbar-item text-start border-0 mt-2 my-1" data-edit="paste"><i class="bi bi-clipboard-check-fill"></i> Paste</li>
                            <li class="list-group-item toolbar-item text-start border-0" data-edit="paste:null"><i class="bi bi-clipboard-check"></i> Paste without formatting</li> -->
                        </ul>
                    </div>

                    <div class="mt-2 mx-2" id="canvas-actions-bar">
                        <div class="d-flex justify-content-between border rounded-4 shadow-sm p-1">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div id="gen-spinner" style="display: none;">
                                        <?php
                                        echo $spinner;
                                        ?>
                                    </div>
                                    <button class="btn btn-sm btn-primary rounded-4 fw-bold shadow-sm"
                                        onclick="completeUserPrompt('canvas', 'auto_complete', '')" type="button">
                                        <span id="gen-text"><i class="bi bi-play fs-5 py-1 px-2"></i></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-sm btn-warning rounded-3 btn-controls"
                                    onclick='completeUserPrompt("canvas", "retry");'><i class="bi bi-arrow-repeat"></i>
                                    Try again</button>
                                <button type="button" class="btn btn-sm btn-warning rounded-3 btn-controls"
                                    onclick='editCanvas("prompt")'>Remove prompt</button>
                                <button type="button" class="btn btn-sm btn-warning rounded-3 btn-controls"
                                    onclick='editCanvas("gen_text")'>Remove generated text</button>
                                <button type="button" class="btn btn-sm btn-warning rounded-3 btn-controls"
                                    onclick='editCanvas("clear")'>Clear</button>
                                <!-- <button type="button" class="btn btn-sm btn-warning rounded-3 btn-controls" onclick='editCanvas("restore");'>Restore</button> -->
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 p-2 ms-2 rounded-3 bg-light">
                        <i class="bi bi-info-circle-fill"></i>
                        <small class="fw-bold">Tip</small>
                        <div class="d-flex justify-content-start">
                            <span class="mb-0">Press <kbd>tab</kbd> once to generate more text</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Offcanvas -->

        <div id="savedTemplatesCmpnt" class="offcanvas offcanvas-end rounded-start ms-0" data-bs-scroll="true"
            tabindex="-1">
            <div class="rounded-start border-bottom shadow py-2 px-2 shadow bg-primary text-white">
                <h6 class="fw-bold mb-1 offcanvas-title">Recent templates</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-5 d-flex justify-content-between">
                        <input type="search" oninput="fetchSavedTemplates(current_page, 'search')"
                            placeholder="Search..."
                            class="form-control form-control-sm border-top-0 border-start-0 border-end-0 rounded-0 col-6 bg-transparent text-light dash-search"
                            id="temp_search_term" autocomplete="off" maxlength="50">
                        <i class="bi bi-search mt-2" onclick="fetchSavedTemplates(current_page, 'search')"></i>
                    </div>
                    <small class="btn btn-sm btn-light border" onclick="location.href=base_url + '/account#templates'">
                        View all
                    </small>
                    <i class="bi bi-caret-right-fill" type="button" class="btn-close" data-bs-dismiss="offcanvas"></i>
                </div>
            </div>

            <div class="offcanvas-body">
                <ul class="list-unstyled mb-0 overflow-auto" id="saved_templates_list"></ul>
            </div>
        </div>
    </div>
</div>

<!-- Contactus -->
<?php include '../contact/index.php'; ?>
<!-- Contactus -->

<script type="text/javascript">
    /************
     * MAIN STUFF - Page functions
     */

    /** 
     * Shepherd JS tour
     */
    // styles
    // var titles = Class("shepherd-title");
    // Array.prototype.slice.call(titles)
    //     .forEach((title) => {
    //         title.className = "bg-primary, text-white";
    //     });

    const tour = new Shepherd.Tour({
        useModalOverlay: true,
        defaultStepOptions: {
            classes: 'shadow',
            scrollTo: false,
            confirmCancel: true,
            confirmCancelMessage: "Sure you want to cancel the tour?",
            // exitOnEsc: false
        }
    });

    var steps = [];
    // step 1
    steps.push(['#content-tour-start right',
        'Welcome! Let\'s show you around real quick',
        `<p>Howdy, ${username}!</p>
        <p>
            You can click on any of the options here to select what you would like ${site_name}
            to help with.
        </p>
        <p>
            We'll use 'Product description' as an example for now.
        </p>`
    ]);

    // step 2
    steps.push(['#content-tour-second right-start',
        'Enter the necessary info',
        `<p>
            Now, key in these details and set appropriate values for the 
            optional parameters below to help us create a piece of your liking. 
        </p>
        <p>
            Once done, click the 'Go' button to set ${site_name}'s AI working.
        </p>`
    ]);

    // step 3
    steps.push(['#outputarea-wrapper left-start',
        'The Canvas',
        `<p>
            All generated text appears here. Edit, style and make 
            all the changes you want to here.
        </p> 
        <p>
            Highlight everything or a section of text here to show a toolbar 
            with more options.
        </p>`
    ]);

    // step 4
    steps.push(['#canvas-header left-start',
        'Almost there!',
        `<p>
            You will find all editing and text input options here. 
        </p>
        <p>
            You can save and view your custom templates from here as well.
            <ul>
                <li class="my-2">Click the <i class="bi bi-suit-heart-fill fs-5 text-danger opacity-75"></i> icon to save all text within the Canvas as a custom template.</li>
                <li class="my-2">Click the <i class="bi bi-list-stars fs-4"></i> icon to view a list of your custom templates.</li>
            </ul>
        </p>`
    ]);

    // step 5
    steps.push(['#canvas-actions-bar top',
        'You made it!',
        `<p>
            These options make your editing work easier.
            And that's all! Yeah, it's as easy as that.         
        </p>
        <p class="fw-bold">        
            Now paint your masterpiece to perfection!
        </p>
        <p>
            Need help? Don't hesitate to reach out.
        </p>`
    ]);

    for (i = 0; i < steps.length; i++) {
        buttons = [];
        // no back button at the start 
        if (i > 0) {
            buttons.push({
                text: '<i class="bi bi-caret-left-fill mt-1"></i> Back',
                classes: 'btn btn-sm rounded-3 text-white',
                action: () => {
                    return tour.back();
                }
            });
        }
        // no next button on last step 
        if (i != (steps.length - 1)) {
            buttons.push({
                text: 'Next <i class="bi bi-caret-right-fill mt-1"></i>',
                classes: 'btn btn-sm rounded-3 text-white',
                action: () => {
                    return tour.next();
                }
            });
        } else {
            buttons.push({
                text: 'Close',
                classes: 'btn btn-sm rounded-3 text-white',
                action: () => {
                    return tour.complete();
                }
            });
        }

        var attachTo = {};
        attachToArr = steps[i][0].split(" ");
        attachTo.element = attachToArr[0];
        attachTo.on = attachToArr[1];

        var cancelIcon = {};
        cancelIcon.enabled = true;
        cancelIcon.label = 'Cancel';

        tour.addStep({
            id: `step_${i + 1}`,
            classes: 'm-3 shadow-lg',
            attachTo: attachTo,
            title: steps[i][1],
            text: steps[i][2],
            buttons: buttons,
            cancelIcon: cancelIcon,
            onShow: () => {
                attachToArr[0].scrollIntoView();
            }
        }, i + 1);
    }

    var tour_close_events = ['complete', 'cancel', 'hide'];
    for (var i = 0; i < tour_close_events.length; i++) {
        var j = tour_close_events[i];
        tour.on(j, () => {
            console.log(j);
            setCookie("tour_status", j, 365);
        })
    }

    const tour_status = getCookie("tour_status");

    if (tour_status != "complete" && tour_status != "cancel" && tour_status != "hide")
        tour.start();


    // Authentication
    window.addEventListener('DOMContentLoaded', (event) => {
        if (signinStatus !== 1) {
            // window.location.href = '../';

            $('#signinModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            $('#signinModal').modal('show');
            Id("login-title").innerHTML = "Let's get you signed in first";

            $('#signupModal').modal({
                backdrop: 'static',
                keyboard: false
            });

            Id("dismiss-signin").style.display = "none";
            Id("dismiss-signup").style.display = "none";


            // $("#signinModal").on('hide.bs.modal', () => {
            //     $('#signinModal').modal('show');
            // });

            // use this
            $("#signinModal").on('hidden.bs.modal', () => {
                $('#signinModal').modal('show');
            });
        }
    });

    // On page load
    Id('outputarea').focus();

    // Static toolbar above contenteditable
    var canvas = Id("outputarea");

    document.querySelectorAll("[data-edit]").forEach(btn => {
        try {
            btn.addEventListener("click", edit);
        } catch (e) {
            console.error('error caught:', e);
        }
    });

    function edit(event) {
        setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd);
        event.preventDefault();
        // Id("floating-toolbar").style.display = "none";
        const cmd_val = this.getAttribute("data-edit").split(":");

        // if (cmd_val[0] == "paste") {

        //     // document.execCommand("delete");

        //     // setCaretPosition(canvas, x.selectionCaretStart);

        //     if (cmd_val[1] == "null") {
        //         // Paste without formatting
        //         // Create a hidden textarea element
        //         var hiddenTextarea = document.createElement("textarea");
        //         hiddenTextarea.style.position = "absolute";
        //         hiddenTextarea.style.left = "-9999px";
        //         document.body.appendChild(hiddenTextarea);

        //         // Focus the textarea so that the paste command will work
        //         hiddenTextarea.focus();

        //         // Execute the paste action
        //         document.execCommand("paste");

        //         // Wait for the paste to complete
        //         setTimeout(function() {
        //             // Get the pasted content
        //             var pastedContent = hiddenTextarea.value;

        //             // Insert the pasted content into the contenteditable div as plain text
        //             document.execCommand("insertText", false, pastedContent);

        //             // Remove the hidden textarea element
        //             document.body.removeChild(hiddenTextarea);
        //         }, 50);

        //     } else {
        //         // Create a hidden textarea element
        //         var hiddenTextarea = document.createElement("textarea");
        //         hiddenTextarea.style.position = "absolute";
        //         hiddenTextarea.style.left = "-9999px";
        //         document.body.appendChild(hiddenTextarea);

        //         // Focus the textarea so that the paste command will work
        //         hiddenTextarea.focus();

        //         // Execute the paste action
        //         document.execCommand("paste");

        //         // Wait for the paste to complete
        //         setTimeout(function() {
        //             // Get the pasted content
        //             var pastedContent = hiddenTextarea.value;

        //             // Insert the pasted content into the contenteditable div
        //             document.execCommand("insertHTML", false, pastedContent);

        //             // Remove the hidden textarea element
        //             document.body.removeChild(hiddenTextarea);
        //         }, 50);
        //     }
        // } else {
        document.execCommand(cmd_val[0], false, cmd_val[1]);
        // }

        // Retain highlight
        setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd);

        setCaretPosition(canvas, x.selectionCaretEnd);

        $("#floating-toolbar").fadeOut(200);
    }

    // Floating toolbar   
    // Cut, copy, paste

    // function toolbarCut() {
    //     // Check if the user has selected some text
    //     if (window.getSelection().toString()) {
    //         // Get the selected text
    //         var text = window.getSelection().toString();

    //         // Put the selected text in the clipboard
    //         event.clipboardData.setData("text/plain", text);

    //         // Delete the selected text
    //         document.execCommand("delete");
    //     }
    // }

    // function toolbarCopy() {
    //     // Check if the user has selected some text
    //     if (window.getSelection().toString()) {
    //         // Get the selected text
    //         var text = window.getSelection().toString();

    //         // Put the selected text in the clipboard
    //         event.clipboardData.setData("text/plain", text);
    //     }
    // }


    // floating action
    if (!window.x) {
        x = {};
    }

    x.Selector = {};
    var t = '';
    x.Selector.getSelected = () => {
        if (window.getSelection) {
            t = window.getSelection();
        } else if (document.getSelection) {
            t = document.getSelection();
        } else if (document.selection) {
            t = document.selection.createRange().text;
        }
        var txt = t.toString();
        x.selectedText = txt;
        return txt;
    }

    var pageX;
    var pageY;

    /**
     * Get selection start and end positions                     
     * https://stackoverflow.com/questions/4811822/get-a-ranges-start-and-end-offsets-relative-to-its-parent-container/4812022#4812022
     */

    function getSelectionCharacterOffsetWithin(element) {
        var start = 0;
        var end = 0;
        var doc = element.ownerDocument || element.document;
        var win = doc.defaultView || doc.parentWindow;
        var sel;
        if (typeof win.getSelection != "undefined") {
            sel = win.getSelection();
            if (sel.rangeCount > 0) {
                var range = win.getSelection().getRangeAt(0);
                var preCaretRange = range.cloneRange();
                preCaretRange.selectNodeContents(element);
                preCaretRange.setEnd(range.startContainer, range.startOffset);
                start = preCaretRange.toString().length;
                preCaretRange.setEnd(range.endContainer, range.endOffset);
                end = preCaretRange.toString().length;
            }
        } else if ((sel = doc.selection) && sel.type != "Control") {
            var textRange = sel.createRange();
            var preCaretTextRange = doc.body.createTextRange();
            preCaretTextRange.moveToElementText(element);
            preCaretTextRange.setEndPoint("EndToStart", textRange);
            start = preCaretTextRange.text.length;
            preCaretTextRange.setEndPoint("EndToEnd", textRange);
            end = preCaretTextRange.text.length;
        }
        return {
            start: start,
            end: end
        };
    }


    /**
     * Set caret position                    
     * https://stackoverflow.com/questions/6249095/how-to-set-the-caret-cursor-position-in-a-contenteditable-element-div                     
     */

    function getTextNodesIn(node) {
        var textNodes = [];
        if (node.nodeType == 3) {
            textNodes.push(node);
        } else {
            var children = node.childNodes;
            for (var i = 0, len = children.length; i < len; ++i) {
                textNodes.push.apply(textNodes, getTextNodesIn(children[i]));
            }
        }
        return textNodes;
    }

    function setSelectionRange(element, start, end) {
        if (document.createRange && window.getSelection) {
            var range = document.createRange();
            range.selectNodeContents(element);
            var textNodes = getTextNodesIn(element);
            var foundStart = false;
            var charCount = 0,
                endCharCount;

            for (var i = 0, textNode; textNode = textNodes[i++];) {
                endCharCount = charCount + textNode.length;
                if (!foundStart && start >= charCount &&
                    (start < endCharCount ||
                        (start == endCharCount && i <= textNodes.length))) {
                    range.setStart(textNode, start - charCount);
                    foundStart = true;
                }
                if (foundStart && end <= endCharCount) {
                    range.setEnd(textNode, end - charCount);
                    break;
                }
                charCount = endCharCount;
            }

            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
        } else if (document.selection && document.body.createTextRange) {
            var textRange = document.body.createTextRange();
            textRange.moveToElementText(element);
            textRange.collapse(true);
            textRange.moveEnd("character", end);
            textRange.moveStart("character", start);
            textRange.select();
        }
    }


    // function setCaretPosition(target, position) {
    //     if (target.contentEditable === 'true') {
    //         var sel = window.getSelection();
    //         var range = document.createRange();
    //         range.setStart(target.childNodes[0], position);
    //         range.collapse(true);
    //         sel.removeAllRanges();
    //         sel.addRange(range);
    //     } else {
    //         target.focus();
    //         target.setSelectionRange(position, position);
    //     }

    //     console.log(position);
    // }


    function setCaretPosition(target, position) {
        if (target.contentEditable === 'true') {
            var sel = window.getSelection();
            var range = document.createRange();
            if (target.childNodes.length > 0) {
                range.setStart(target.childNodes[0], position);
            } else {
                range.setStart(target, position);
            }
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
        } else {
            target.focus();
            target.setSelectionRange(position, position);
        }

        console.log(position);
    }


    function setCaretToEnd(target) {
        var sel = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(target);
        range.setEndAfter(target.lastChild);
        range.collapse(false);
        sel.removeAllRanges();
        sel.addRange(range);
    }


    function getCaretPosition(element) {
        var caretOffset = 0;

        if (window.getSelection) {
            var range = window.getSelection().getRangeAt(0);
            var preCaretRange = range.cloneRange();
            preCaretRange.selectNodeContents(element);
            preCaretRange.setEnd(range.endContainer, range.endOffset);
            caretOffset = preCaretRange.toString().length;
        } else if (document.selection && document.selection.type != "Control") {
            var textRange = document.selection.createRange();
            var preCaretTextRange = document.body.createTextRange();
            preCaretTextRange.moveToElementText(element);
            preCaretTextRange.setEndPoint("EndToEnd", textRange);
            caretOffset = preCaretTextRange.text.length;
        }

        return caretOffset;
    }

    /**
     * Function to insert text at cursor position and select/highlight it
     * https://stackoverflow.com/questions/6690752/insert-html-at-caret-in-a-contenteditable-div
     * Updated answer by Tim Down
     */
    function pasteHtmlAtCaret(html, selectPastedContent) {
        var sel, range;
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();

            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(),
                node, lastNode;
            while ((node = el.firstChild)) {
                lastNode = frag.appendChild(node);
            }
            var firstNode = frag.firstChild;
            range.insertNode(frag);

            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                if (selectPastedContent) {
                    range.setStartBefore(firstNode);
                    showFloatingToolbar();
                } else {
                    range.collapse(true);
                }
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    }


    function onlySpaces(str) {
        return str.trim().length === 0;
    }


    function showFloatingToolbar() {
        const floating = document.querySelector('#floating-toolbar');

        var selectedText = x.Selector.getSelected();
        if (!onlySpaces(selectedText)) {
            var selectionCaretPos = getSelectionCharacterOffsetWithin(canvas);
            x.selectionCaretStart = selectionCaretPos.start
            x.selectionCaretEnd = selectionCaretPos.end;
            let selection = t;
            let rect = selection.getRangeAt(0).getBoundingClientRect();

            floating.style.top = `calc(${rect.top}px - 48px)`;
            floating.style.left = `calc(${rect.left}px + calc(${rect.width}px / 2) - 40px)`;

            $('#floating-toolbar').fadeIn(200);
        } else {
            $('#floating-toolbar').fadeOut(200);
        }
    }


    ['mouseup', 'keyup', 'scroll'].forEach((e) => {
        canvas.addEventListener(e, showFloatingToolbar);
    });

    // ['mousedown', 'keydown'].forEach((e) => {
    //     pageX = e.pageX;
    //     pageY = e.pageY;
    // });

    // var container = $("#reusable-container");

    // Hide sections initially
    // $(".content-type").hide();
    // container.hide();

    // Content type selection
    var content_types = Class('content-selection');
    Array.prototype.slice.call(content_types)
        .forEach((el) => {
            el.onclick = () => {
                renderSelection(el.value);
            }
        });

    // Tone selection    
    if (getCookie("text-tone-disp") == "") {
        Id("text-tone-disp-wrapper").style.display = "none";
    }

    var tones = Class("text-tone");

    Array.prototype.slice.call(tones)
        .forEach((el) => {
            el.onclick = () => {
                Id("text-tone-disp-wrapper").style.display = "block";
                Id("text-tone-disp").value = el.innerText;
                setCookie("text-tone-disp", el.innerText, 365);
            }
        });

    const text_tone_cancel = Id("text-tone-disp-cancel");
    text_tone_cancel.onclick = () => {
        Id('text-tone-disp-wrapper').style.display = "none";
        Id('text-tone-disp').value = '';
        setCookie("text-tone-disp", "", 365);
    }

    // Render content type selection
    function renderSelection(type) {
        var elem = document.querySelector('input[value="' + type + '"]');
        elem.checked = true;

        var container = $("#reusable-container");

        $(document).ready(() => {
            container.load(`content-types/ #${type}_cmpnt`, () => { //callback

                // On DOM change
                // Store cookies on input value change
                setCookie("dash_content_type", type, 365);

                var ctype_inputs = Class("content-type-input");

                Array.prototype.slice.call(ctype_inputs)
                    .forEach((el) => {
                        el.oninput = () => {
                            if (el.type == "checkbox")
                                setCookie(el.id, el.checked, 365);
                            else
                                setCookie(el.id, el.value, 365);
                        }
                        if (el.value == "")
                            el.value = getCookie(el.id);
                        if (el.type == "checkbox") {
                            el.checked = JSON.parse(getCookie(el.id));
                        }
                    });
            });
        });


        // var container = $("#reusable-container");

        // $(document).ready(() => {
        //     container.load(`content-types/ #${type}_cmpnt`)
        //         .then(() => {

        //             // On DOM change
        //             // Store cookies on input value change
        //             setCookie("dash_content_type", type, 365);

        //             var ctype_inputs = Class("content-type-input");

        //             Array.prototype.slice.call(ctype_inputs)
        //                 .forEach((el) => {
        //                     el.oninput = () => {
        //                         if (el.type == "checkbox")
        //                             setCookie(el.id, el.checked, 365);
        //                         else
        //                             setCookie(el.id, el.value, 365);
        //                     }
        //                     if (el.value == "")
        //                         el.value = getCookie(el.id);
        //                     if (el.type == "checkbox") {
        //                         el.checked = JSON.parse(getCookie(el.id));
        //                     }
        //                 });
        //         })
        //         .catch((error) => {
        //             console.error(error);
        //         });
        // });




        // $(document).ready(() => {
        //     container.load(`content-types/ #${type}_cmpnt`);
        // });

        // container.fadeIn(1000, () => {

        //     // On DOM change
        //     // Store cookies on input value change
        //     setCookie("dash_content_type", type, 365);

        //     var ctype_inputs = Class("content-type-input");

        //     Array.prototype.slice.call(ctype_inputs)
        //         .forEach((el) => {
        //             el.oninput = () => {
        //                 if (el.type == "checkbox")
        //                     setCookie(el.id, el.checked, 365);
        //                 else
        //                     setCookie(el.id, el.value, 365);
        //             }
        //             if (el.value == "")
        //                 el.value = getCookie(el.id);
        //             if (el.type == "checkbox") {
        //                 el.checked = JSON.parse(getCookie(el.id));
        //             }

        //         });
        // });
    }

    /**
     * I stored some cookies for you - have 'em
     */
    // Content type inputs

    // Get slider value from stored cookies
    const param_cookies = ['word_count', 'creativity'];
    for (var i = 0; i < param_cookies.length; i++) {
        cookie = getCookie("dash_" + param_cookies[i]);
        Id(param_cookies[i]).value = cookie;
    }

    // Content type
    const dash_content_type = getCookie("dash_content_type");
    if (dash_content_type !== null && dash_content_type !== "") {
        renderSelection(dash_content_type);

        var dash_canvas_content = localStorage.dash_canvas_content;
        if (dash_canvas_content != "" && typeof dash_canvas_content != "undefined")
            Id('outputarea').innerHTML = localStorage.dash_canvas_content;
    } else
        renderSelection('product_description');


    // End Cookies.

    // Complete prompt on tab key press
    window.addEventListener("keydown", (evt) => {

        if (signinStatus == 1) {

            // Complete prompt on tab key press
            if (evt.key == "Tab" && document.activeElement.id == "outputarea") {
                evt.preventDefault();
                completeUserPrompt("canvas", "auto_complete", "");
            }

            // Hide Canvas floating toolbar
            if (evt.key == "Escape") {
                if (Id("floating-toolbar").style.display == "block" || x.selectedText != "") {
                    $("#floating-toolbar").hide();
                    setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd);
                }
            }
        }
    }, false);

    // content holders
    let prompt_holder, resp_holder;

    // Copy text to clipboard
    function copyToClipboard(id) {
        /* Get the text field */
        var copyText = Id(id);
        var text = copyText.innerText;

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
    // Object to store previous request details for use in retry attempt
    if (typeof sendInfo !== "undefined" && sendInfo !== null && sendInfo !== "")
        var previousRequest = sendInfo;

    function completeUserPrompt(source, command, element) {

        // https://ddg-webapp-aagd.vercel.app/search?max_results=3&q=QD-OLED
        // https://github.com/G-bit94/chatgpt-advanced-qunash/blob/main/src/content-scripts/api.ts
        // https://www.postman.com/api-evangelist/workspace/search/documentation/35240-757748f8-766b-4132-a453-18d766054556

        const outputarea = $("#outputarea");
        creativity = $("#creativity").val();
        word_count = $("#word_count").val();
        rem_input = Id("rem_input").checked;
        highlight = Id("highlight").checked;

        var sendInfo = {
            "csrf_token": csrf_token,

            // API v2 - G                
            "creativity": creativity,
            "word_count": word_count,
            "command": command
        };

        var context = "";

        // Handle context
        switch (source) {
            case "sidebar":
                switch (command) {
                    case "auto_complete":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else {
                            context = canvas.innerText;
                        }
                        break;
                    case "article_outline":
                        if (Id("article_outline_title").value !== "") {
                            sendInfo.article_outline_title = Id("article_outline_title").value;
                            keywords = Id("article_outline_keywords").value;
                            sendInfo.article_outline_keywords = keywords;
                            switch (element) {
                                case 1:
                                    context = sendInfo.article_outline_title;
                                    if (context == "")
                                        showToastMessage("warning", "Please enter the article's title/topic");
                                    else
                                        sendInfo.article_outline_step = 1;
                                    break;
                                case 2:
                                    context = canvas.innerHTML;
                                    if (context == "") {
                                        showToastMessage("warning", "Generate an outline or type yours in the Canvas first");
                                    } else {
                                        sendInfo.article_outline_context = canvas.innerText;
                                        sendInfo.article_outline_step = 2;
                                    }
                                    break;
                            }
                        }
                        break;
                    case "paraphrase":
                        context = canvas.innerText;
                        break;
                    case "article_body":
                        if (Id("article_body_title").value !== "") {
                            sendInfo.article_body_title = Id("article_body_title").value;
                            context = sendInfo.article_body_title;
                            if (context == "")
                                showToastMessage("warning", "Please enter the article's title/topic")
                            keywords = Id("article_body_keywords").value;
                            sendInfo.article_body_keywords = keywords;
                        }
                        break;
                    case "product_description":
                        context = Id("product_name").value;
                        if (context !== "") {
                            var inputs = Class("product-description");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value; //[] - Used to create dynamic object key from input element id
                            }
                        }
                        break;
                    case "youtube_caption":
                        context = Id("yt_caption_video_title").value;
                        if (context !== "") {
                            var inputs = Class("yt-caption");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value;
                            }
                        }
                        break;
                    case "youtube_description":
                        context = Id("yt_description_video_title").value;
                        if (context !== "") {
                            var inputs = Class("yt-description");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value;
                            }
                        }
                        break;
                    case "email_subject":
                        context = Id("email_subject_keywords").value;
                        if (context !== "") {
                            var inputs = Class("email-subject");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value;
                            }
                        }
                        break;
                    case "email_body":
                        context = Id("email_body_intent").value;
                        if (context !== "") {
                            var inputs = Class("email-body");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value;
                            }
                        }
                        break;
                    case "ad_copy":
                        context = Id("ad_product_name").value;
                        if (context !== "") {
                            var inputs = Class("ad-copy");
                            for (var i = 0; i < inputs.length; i++) {
                                sendInfo[inputs[i].id] = inputs[i].value;
                            }
                        }
                        break;
                }
                break;
            case "sample":
                context = Id(element + "_context").innerText;
                rem_input = false; //Don't remove prompt
                break;
            case "canvas":
                if (command == "retry")
                    // sendInfo = previousRequest.body;
                    console.log(sendInfo)
                else
                    context = canvas.innerText;

            case "toolbar":
                // Keep selection highlighted        
                setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd);
                if (x.selectedText !== "") {
                    switch (command) {
                        case "auto_complete":
                            context = x.selectedText;
                            break;
                        case "execute": //Run command
                            context = x.selectedText;
                            break;
                        case "paraphrase":
                            context = x.selectedText;
                            break;
                    }
                } else
                    rem_input = true;
                break;
            default:
                context = x.selectedText ?? outputarea.text();
        }

        if (context !== "" && context != "\n" && !onlySpaces(context)) {

            if (command == "retry") {
                sendInfo = JSON.parse(localStorage.previousRequest);
                context = sendInfo.prompt;
                command = sendInfo.command;
                sendInfo.creativity = creativity;
                sendInfo.word_count = word_count;
                sendInfo.rem_input = rem_input;
            }

            prompt_holder = context;
            $("#gen-spinner").show();
            $("#gen-text").html("Crunching...");
            sendInfo.command = command;

            // API v1 - E
            sendInfo.rem_input = rem_input;

            // API v2 - G
            sendInfo.prompt = context;

            // Tone
            var tone = Id('text-tone-disp').value;
            if (tone !== "")
                sendInfo.tone = tone;
            else
                sendInfo.tone = "semi-formal";

            // Store request params for retry attempt
            localStorage.previousRequest = JSON.stringify(sendInfo);

            $.ajax({
                type: 'POST',
                url: 'completion/',
                data: JSON.stringify(sendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: (data) => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html('<i class="bi bi-play fs-5 py-1 px-2"></i>');
                    resp_holder = data;
                    if (data !== null) {
                        if (data.status != 'hash_error') {

                            // If shepherd tour is active
                            if (tour.isActive())
                                if (tour.getCurrentStep().id == "step_2")
                                    tour.next();

                        } else {
                            $("#signinNotifModal").modal("show");
                        }
                    }
                    // else if (data.status !== '') {
                    //     showToastMessage("Please check your internet connection and try again", "danger");
                    // }
                },
                error: () => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html('<i class="bi bi-play fs-5 py-1 px-2"></i>');
                    showToastMessage(`<i class="bi bi-emoji-neutral fs-5"></i> Oops! Looks like your connection to ${site_name} dropped the ball`);
                }

            });

            $('#floating-toolbar').fadeOut(200);

            // if (command === "paraphrase")
            //     if (x.selectedText !== "")
            // document.execCommand("delete", false, "");

            // Stream response
            const evt_source = new EventSource("stream/");

            let prevChars = ""; // declare and initialize prevChars
            let prevCharsSub = "";
            count = 0;
            const counter = Math.floor(Math.random() * 20) + 1;

            evt_source.onmessage = (event) => {

                // canvas.focus();

                $("#gen-spinner").show();
                $("#gen-text").html("Crunching...");

                count++;

                // get cursor position
                if (count == 1) {
                    x.streamTextStart = getCaretPosition(canvas);
                    if (rem_input !== true) {
                        setCaretToEnd(canvas);
                        pasteHtmlAtCaret(context + ' ', false);
                    }
                }

                if (event.data === '[DONE]') {
                    evt_source.close();

                    x.streamTextEnd = getCaretPosition(canvas);

                    console.log(x.streamTextStart, x.streamTextEnd);

                    if (Id("highlight").checked) {
                        if (!onlySpaces(canvas.textContent)) {
                            // highlight streamed text
                            setSelectionRange(canvas, x.streamTextStart, x.streamTextEnd);
                            showFloatingToolbar()
                        }
                    }

                    console.log("*********************[DONE]*********************");
                    count = 0;

                    $("#gen-spinner").hide();
                    $("#gen-text").html('<i class="bi bi-play fs-5 py-1 px-2"></i>');
                } else {

                    // outputarea.focus();

                    var finish_reason = JSON.parse(event.data).choices[0].finish_reason;

                    if (finish_reason == "stop") {
                        text = " ";
                    } else {
                        text = JSON.parse(event.data).choices[0].text;

                        prevChars += text;

                        var canvas_content = canvas.textContent;

                        // if text contains /r or /n
                        if (/\r\n|\r|\n/.test(text)) {
                            prevCharsSub += text;
                            // remove large spacing
                            if (prevCharsSub === "\r\n\r\n" || prevCharsSub === " \r\n\r\n" || prevCharsSub === "\r\n\r\n\r\n" || prevCharsSub === " \r\n\r\n\r\n") {

                                if (canvas_content.length < 5) {
                                    // set caret position at start position of canvas if empty
                                    setCaretPosition(canvas, 0);
                                    text = "";
                                } else {
                                    // if canvas contains any text, set caret position to the very end for first stream event
                                    if (count == 1) {
                                        text = " ";
                                        if (!onlySpaces(selectedText)) {
                                            // setSelectionRange(canvas, canvas_content.length, canvas_content.length);
                                            // setCaretPosition(canvas, x.selectionCaretEnd);
                                        } else {
                                            setCaretPosition(canvas, canvas_content.length);
                                        }
                                    } else {
                                        // subsequent streams                                        
                                        text = "\n";
                                    }

                                }

                                text = text.replace(/\n/, "");

                                console.log("*********************[SPACING]*********************");
                            }

                            // if (prevCharsSub == "\r\n\r\n" || prevCharsSub == "\n\r\n\r") {
                            //     text = "\n";
                            // }
                        }

                    }

                    // Random spacing
                    if (count == counter) {
                        text = text + " ";
                        console.log("*********************[RANDOM]*********************");
                    }

                    // Auto scroll to bottom
                    Id("outputarea").scrollTop = Id("outputarea").scrollHeight;

                    // Write result to outputarea 

                    // Cursor position
                    if (command === 'auto_complete') {
                        if (source === "canvas") {
                            setCaretToEnd(canvas);
                            // setCaretPosition(canvas, canvas_content.length);
                        }

                    } else if (command === "paraphrase") {

                        if (count == 1) {
                            document.execCommand("delete", false, "");
                        }

                        setCaretToEnd(canvas);
                    }

                    // Include/exclude prompt in text and write response
                    if (rem_input === true) {
                        pasteHtmlAtCaret(text, false);
                    } else {
                        pasteHtmlAtCaret(context + ' ' + text, false);
                    }

                    x.response_text = prevChars;
                    resp_holder = prevChars;

                    // If shepherd tour is active
                    if (tour.isActive())
                        if (tour.getCurrentStep().id == "step_2")
                            tour.next();

                    console.log(event.data);
                }
            };

        } else {
            showToastMessage("<i class='bi bi-emoji-neutral fs-5'></i> Oops! Looks like you forgot to key in some details.", "primary");
        }
    }

    function editCanvas(type) {

        // clear
        if (type === "clear") {
            Id("outputarea").innerHTML = "";
        } else {

            var prompt = prompt_holder;
            // remove anyways
            if (typeof prompt == undefined || prompt == null) {
                Id("outputarea").innerHTML = "";
            } else {
                var prompt_start = 0;

                var prompt_end = prompt.length;

                var response = resp_holder;

                var gen_text_start = prompt_end + 1;
                var gen_text_end = response.length;

                // remove prompt
                if (type === "prompt") {
                    Id("outputarea").innerHTML = response.substr(gen_text_start, gen_text_end); //generated text
                }

                // remove generated text
                if (type === "gen_text") {
                    Id("outputarea").innerHTML = prompt;
                }

                // restore
                if (type === "restore") {
                    Id("outputarea").innerHTML = prompt + ' ' + response.substr(gen_text_start, gen_text_end);
                }

                if (type === "retry") {
                    Id("outputarea").innerHTML = prompt;
                    completeUserPrompt(previousRequest.source, previousRequest.command, previousRequest.element);
                }
            }
        }
    }



    /**
     * UNDO/REDO
     * https://stackoverflow.com/questions/28217539/allowing-contenteditable-to-undo-after-dom-modification
     * Answer by Alexander Istomin
     */

    //array to store canvas objects history
    canvas_history = [];
    s_history = true;
    cur_history_index = 0;
    DEBUG = true;

    //store every modification of canvas in history array
    function save_history(force) {
        //if we already used undo button and made modification - delete all forward history
        if (cur_history_index < canvas_history.length - 1) {
            canvas_history = canvas_history.slice(0, cur_history_index + 1);
            cur_history_index++;
            $('#redo').addClass("disabled");
        }
        var cur_canvas = JSON.stringify($('#outputarea').html());
        //if current state identical to previous don't save identical states
        if (cur_canvas != canvas_history[cur_history_index] || force == 1) {
            canvas_history.push(cur_canvas);
            cur_history_index = canvas_history.length - 1;
        }

        // DEBUG && console.log('saved ' + canvas_history.length + " " + cur_history_index);

        $('#undo').removeClass("disabled");
    }


    function history_undo() {
        if (cur_history_index > 0) {
            s_history = false;
            canv_data = JSON.parse(canvas_history[cur_history_index - 1]);
            $('#outputarea').html(canv_data);
            cur_history_index--;
            // DEBUG && console.log('undo ' + canvas_history.length + " " + cur_history_index);
            $('#redo').removeClass("disabled");
        } else {
            $('#undo').addClass("disabled");
        }
    }

    function history_redo() {
        if (canvas_history[cur_history_index + 1]) {
            s_history = false;
            canv_data = JSON.parse(canvas_history[cur_history_index + 1]);
            $('#outputarea').html(canv_data);
            cur_history_index++;
            // DEBUG && console.log('redo ' + canvas_history.length + " " + cur_history_index);
            $('#undo').removeClass("disabled");
        } else {
            $('#redo').addClass("disabled");
        }
    }

    $('#outputarea').bind('blur keyup keydown paste input', function (e) {
        save_history();
        localStorage.dash_canvas_content = $('#outputarea').html();
    });
    $('#undo').click(function (e) {
        history_undo();
    });
    $('#redo').click(function (e) {
        history_redo();
    });

    function useCreatedEmailSubject() {

        renderSelection("email_body");

        var subject_fields = Class("common-email-field");
        for (var i = 0; i < subject_fields.length; i++) {
            subject_id = subject_fields[i].id;
            body_id = subject_id.replace("subject", "body");
            Id(body_id).value = subject_fields[i].value;
            setCookie(body_id, subject_fields[i].value, 365);
        }

        const id = "email_body_subject";
        const elem = Id(id);
        var val = Id("outputarea").textContent;
        val = val.replace('"', ''); //Replace opening quotes in generated email subject
        val = val.replace('"', ''); //Replace closing quotes in generated email subject
        val = val.trim();
        setCookie(id, val, 365);
        elem.value = val;

        console.log(getCookie(id));

        Id("email_body_from").focus();

    }

    // save template to db
    Id("save").onclick = () => {

        var text = Id("outputarea").innerHTML;

        // Get the content type
        var type = document.querySelector('input[name="contentTypeListGroup"]:checked').value;

        if (typeof text !== 'undefined' && text !== null && text != "") {

            var templatedata = {
                "user": user,
                "text": text,
                "type": type,
                "new_template": true,
                "csrf_token": csrf_token
            };

            $.ajax({
                type: 'POST',
                url: 'saved-templates/',
                data: JSON.stringify(templatedata),
                contentType: "application/json; charset=utf-8",
                success: (json) => {
                    var data = JSON.parse(json);
                    if (data.status === "SUCCESS") {
                        showToastMessage("Template saved successfully", "primary");
                    } else if (data.status === "ITEM_EXISTS") {
                        showToastMessage("Item is already saved", "primary");
                    } else if (data.status === "") {
                        showToastMessage(`<i class="bi bi-emoji-neutral fs-5"></i> Dang! For some reason, we can't reach ${site_name}`);
                    } else if (data.status === "ERROR") {
                        showToastMessage(`<i class="bi bi-emoji-neutral fs-5"></i> Dang! For some reason, we can't reach ${site_name}`);
                    }
                },
                error: () => {
                    showToastMessage("Oops! Connection lost");
                }
            });
        } else {
            showToastMessage("Sorry. Can't save a blank template", "primary");
        }
    }
</script>

<?php
include "../footer.php";
?>