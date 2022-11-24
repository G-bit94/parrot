<?php

include "../header.php";

// if ($signinStatus !== 1) {
//     echo '<script>window.location.href = "../";</script>';
// }

// if ($signinStatus == 1) {
//     if ($v_status != 1) {
//         echo '<script type="text/javascript">window.location.href = base_url + "/pricing";</script>';
//     }
// } else {
//     echo '<script type="text/javascript">window.location.href = "' . $base_url . '"</script>';
//     exit;
// }
?>

<!-- Custom styles for the page -->
<style>
    /* saved templates */
    .saved_templates {
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
        .saved_templates {
            padding-top: 15px;
        }

        .saved_templates a {
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
        ;
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

    /* Placeholder color on offcanvas */
    .dash-search::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: rgb(248, 249, 250);
        opacity: 1;
        /* Firefox */
    }
</style>

<div class="mt-5 mb-2 py-3">
    <div class="container-fluid">
        <div class="row my-2">
            <!-- Content type -->
            <div class="col-md-2">

                <div class="offset-md-1 text-start mt-3">
                    <h5 class="fw-bold" data-step="1" data-title="You'll start from here" data-intro="Click on any of the options below to select what you would like ParrotAI to help with">Content type</h5>
                </div>

                <div class="list-group list-group-radio border-0 w-auto row">
                    <div class="position-relative mt-3">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="auto_complete" id="list-group-auto_complete">
                        <label class="list-group-item pe-1" for="list-group-auto_complete">
                            <i class="bi bi-robot"></i>
                            <!-- <i class="bi bi-pen"></i> -->
                            <small>Text completion</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="paraphrase" id="list-group-paraphrase">
                        <label class="list-group-item pe-1" for="list-group-paraphrase">
                            <i class="bi bi-pencil-square"></i>
                            <small>Paraphrasing</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="blog_outline" id="list-group-blog-outline">
                        <label class="list-group-item pe-1" for="list-group-blog-outline">
                            <i class="bi bi-justify"></i>
                            <small>Blog outline</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="blog_body" id="list-group-blog-body">
                        <label class="list-group-item pe-1" for="list-group-blog-body">
                            <i class="bi bi-file-text"></i>
                            <small>Blog body</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="product_description" id="list-group-product">
                        <label class="list-group-item pe-1" for="list-group-product">
                            <i class="bi bi-phone"></i>
                            <small>Product description</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="youtube_captions" id="list-group-youtube-captions">
                        <label class="list-group-item pe-1" for="list-group-youtube-captions">
                            <i class="bi bi-youtube"></i>
                            <small>YouTube captions</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="youtube_description" id="list-group-youtube-youtube-description">
                        <label class="list-group-item pe-1" for="list-group-youtube-description">
                            <i class="bi bi-text-paragraph"></i>
                            <small>YouTube description</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="email_subject" id="list-group-email-subject">
                        <label class="list-group-item pe-1" for="list-group-email-subject">
                            <i class="bi bi-card-heading"></i>
                            <small>Email subject</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="general_email" id="list-group-email-body">
                        <label class="list-group-item pe-1" for="list-group-email-body">
                            <i class="bi bi-envelope-at"></i>
                            <small>Email body</small>
                        </label>
                    </div>

                    <div class="position-relative">
                        <input class="form-check-input position-absolute top-50 end-0 me-3 content-selection" type="radio" name="contentTypeListGroup" value="ads_copy" id="list-group-ads">
                        <label class="list-group-item pe-1" for="list-group-ads">
                            <i class="bi bi-badge-ad"></i>
                            <small>Ad copy</small>
                        </label>
                    </div>
                </div>
            </div>


            <div class="col-md-3 border-start border-end border-bottom py-3 px-4 overflow-auto" style="height: 650px;">
                <!-- Reusable container -->
                <div id="reusable-container" class="mt-4"></div>

                <!-- Options -->
                <div class="p-1">
                    <div class="mt-3">
                        <p class="fw-bold">Options</p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="temperature">
                            <small>Creativity&nbsp;
                                <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Try higher values for more creative applications, and lower values for prompts with a well-defined factual response. We recommend the default value (0.5)."></i>
                            </small>
                        </label>
                        <input type="range" class="form-range context-params" min="0" max="1" step="0.05" id="temperature" en_text" type="button" oninput="getSliderValue('temperature')">
                        <small class="fw-bold" id="temperature_show"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="length">
                            <small>Max length&nbsp;
                                <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Maximum number of characters in generated response."></i>
                            </small>
                        </label>
                        <?php if ($active_sub == 1) { ?>
                            <input type="range" class="form-range context-params" min="64" max="1088" step="128" id="length" oninput="getSliderValue('length')">
                        <?php } elseif ($active_sub == 2) { ?>
                            <input type="range" class="form-range context-params" min="64" max="2112" step="256" id="length" oninput="getSliderValue('length')">
                        <?php } ?>
                        <small class="fw-bold" id="length_show"></small>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="rem_input" checked>
                            <label class="form-check-label d-flex" for="rem_input">
                                <small>Remove prompt from response&nbsp;
                                    <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Choose whether to include prompt in response or not."></i>
                                </small>
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="highlight" checked>
                            <label class="form-check-label d-flex" for="highlight">
                                <small>Highlight output&nbsp;
                                    <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Choose whether to highlight output or not."></i>
                                </small>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-2 rounded-3">
                    <div class="col-md">
                        <div class="p-1 rounded-3">
                            <small class="mt-2 fw-bold">Tip</small>
                            <div class="list-group border-0">
                                <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1" aria-current="true">
                                    <p><img src="../assets/img/tab-key.png" alt="" /></p>
                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <p class="mb-0">Press <kbd>tab</kbd> once to generate more text</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Canvas -->
            <div class="col-md-7">
                <div class="mt-2" id="canvas-wrapper">
                    <div class="p-1 d-flex justify-content-between align-items-center border-bottom">
                        <h2 id="title" class="lead fs-5 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="The Canvas is where you get to craft your masterpiece to perfection">Canvas</h2>
                        <div class="dropdown">
                            <span class="btn btn-white border-secondary btn-sm mx-2 dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                Sample prompts
                            </span>
                            <div class="dropdown-menu pt-0 mx-0 rounded-3 shadow overflow-hidden" aria-labelledby="dropdownMenu2" style="width: 380px;">
                                <ul class="list-unstyled mb-0">
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'news');">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <strong>News article</strong><br>
                                                <small class="mb-0" id="news_context">In a recent press release, the company, through its spokesperson, has said that it will no longer</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'blog');">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <strong>Regular blog article</strong><br>
                                                <small class="mb-0" id="blog_context">Working from home is great because</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'essay');">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <strong>Essay</strong><br>
                                                <small class="mb-0" id="essay_context">Gun control has been a controversial issue for years</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'copy');">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <strong>Marketing copy</strong><br>
                                                <small class="mb-0" id="copy_context">Are you still struggling with content creation and writing?</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'story');">
                                        <div class="d-flex gap-2 w-100 justify-content-between">
                                            <div>
                                                <strong>Tell a story</strong><br>
                                                <small class="mb-0" id="story_context">He had just started watching a movie when</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-1 truncated" type="button" onclick="completeUserPrompt('sample', 'auto_complete', 'code');">
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
                                <span id="speech-wrapper" class="mx-2">
                                    <i id="text-to-speech" type="button" class="bi bi-volume-down fs-4" onclick="TextToSpeech('speak')"></i>
                                </span>
                            <?php } ?>
                            <img src="../assets/img/copy.png" alt="" data-edit="copy" class="mx-2" type="button" />
                            <i class="bi bi-suit-heart-fill mx-2 fs-5 text-danger opacity-75" data-bs-toggle="tooltip" data-bs-placement="top" title="Save template" id="save" type="button"></i>
                            <i class="bi bi-list-stars mx-2 fs-4" onclick="fetchSavedTemplates(current_page, 'list')" type="button" title="View saved templates" data-bs-toggle="offcanvas" data-bs-target="#savedTemplatesCmpnt"></i>
                        </div>
                    </div>
                    <div class="my-2">
                        <!-- <div class="form-group mb-3">
                    <textarea class="form-control border border-teal border-2 mb-4" rows="15" placeholder="Talk to the Parrot..." maxlength="10000" id="outputarea"></textarea>
                </div> -->

                        <style>
                            .btn-controls {
                                border-color: #fff;
                            }

                            .editButtons span {
                                display: inline-block;
                                /* white-space: nowrap; */
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

                                /* Deal with line breaks  */
                                white-space: pre-line;
                            }

                            #outputarea:focus {
                                outline: 0px solid transparent;
                            }

                            /* Floating toolbar */
                            /* ul.floating-toolbar {
                        list-style: none;
                        box-shadow: 0px 0px 4px rgba(0, 0, 0, .5);
                        position: absolute;
                    } */

                            #canvas-actions-bar {
                                /* position: fixed;
                                bottom: 50px;
                                left: 50px;
                                width: 50px;
                                height: 50px;
                                background-color: #fff;
                                border-radius: 50%;
                                box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1); */
                            }

                            .floating-toolbar {
                                position: absolute;
                                height: 40px;
                                border-radius: 2px;
                                background-color: #212121;
                                text-align: center;
                            }

                            .floating-toolbar::before {
                                position: absolute;
                                content: '';
                                border-top: 10px solid black;
                                border-left: 10px solid transparent;
                                border-right: 10px solid transparent;
                                left: 155px;
                                top: 40px;
                                text-align: center;
                            }

                            .floating-toolbar li {
                                height: 32px;
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: 70%;
                            }

                            .toolbar-item {
                                color: #F5F5F5;
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

                                        color-stop(0.44, rgb(122, 153, 217)),
                                        color-stop(0.72, rgb(73, 125, 189)),
                                        color-stop(0.86, rgb(28, 58, 148)));
                            }
                        </style>

                        <div class="d-flex justify-content-between shadow-sm border-bottom">
                            <div class="editButtons">
                                <span title="STYLES">
                                    <button class="toolbar-edit btn" data-edit="bold"><i class="bi bi-type-bold"></i></button>
                                    <button class="toolbar-edit btn" data-edit="italic"><i class="bi bi-type-italic"></i></button>
                                    <button class="toolbar-edit btn" data-edit="underline"><i class="bi bi-type-underline"></i></button>
                                    <button class="toolbar-edit btn" data-edit="strikeThrough"><i class="bi bi-type-strikethrough"></i></button>
                                </span>

                                <span title="TEXT FORMAT">
                                    <button class="toolbar-edit btn" data-edit="formatBlock:p"><i class="bi bi-blockquote-left"></i></button>
                                    <button class="toolbar-edit btn" data-edit="formatBlock:H1"><i class="bi bi-type-h1"></i></button>
                                    <button class="toolbar-edit btn" data-edit="formatBlock:H2"><i class="bi bi-type-h2"></i></button>
                                    <button class="toolbar-edit btn" data-edit="formatBlock:H3"><i class="bi bi-type-h3"></i></button>
                                </span>

                                <span title="FONT SIZE">
                                    <button class="toolbar-edit btn" data-edit="fontSize:1">&#8613;s</button>
                                    <button class="toolbar-edit btn" data-edit="fontSize:3">&#8613;M</button>
                                    <button class="toolbar-edit btn" data-edit="fontSize:5">&#8613;L</button>
                                </span>

                                <span title="LISTS">
                                    <button class="toolbar-edit btn" data-edit="insertUnorderedList"><i class="bi bi-list-ul"></i></button>
                                    <button class="toolbar-edit btn" data-edit="insertOrderedList"><i class="bi bi-list-ol"></i></button>
                                </span>

                                <span title="ALIGNMENT">
                                    <button class="toolbar-edit btn" data-edit="justifyLeft"><i class="bi bi-justify-left"></i></button>
                                    <button class="toolbar-edit btn" data-edit="justifyCenter"><i class="bi bi-justify"></i></button>
                                    <button class="toolbar-edit btn" data-edit="justifyRight"><i class="bi bi-justify-right"></i></button>
                                </span>

                                <span title="CLEAR FORMATTING">
                                    <button class="toolbar-edit btn" data-edit="removeFormat"><i class="bi bi-x"></i></button>
                                </span>

                                <span title="CONTROLS">
                                    <button class="toolbar-edit btn" id="undo" data-edit="undo" title="UNDO"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    <button class="toolbar-edit btn" id="redo" data-edit="redo" title="REDO"><i class="bi bi-arrow-clockwise"></i></button>
                                </span>

                                <!-- <span title="UNDO/REDO">
                            <button class="toolbar-edit btn" onclick="undo()"><i class="bi bi-arrow-counterclockwise"></i></button>
                            <button class="toolbar-edit btn" onclick="redo()"><i class="bi bi-arrow-clockwise"></i></button>
                        </span> -->
                            </div>

                            <div class="d-flex justify-content-between mx-1 mt-2">
                                <span title="Post to WordPress">
                                    <button class="btn btn-sm fw-bold" onclick="popWpModal('gen_text', <?php echo $active_sub; ?>)">
                                        <img src="<?php echo $base_url; ?>/assets/img/wordpress.png" />
                                    </button>
                                </span>
                                <span title="Share">
                                    <button class="btn btn-sm fw-bold mt-1">
                                        <i class="bi bi-share-fill"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div id="outputarea-wrapper">
                            <div class="overflow-auto" id="outputarea" contenteditable></div>
                        </div>

                        <ul class="list-inline floating-toolbar text-light rounded-3 p-1 shadow" style="display: none;">
                            <li class="list-inline-item toolbar-item" onclick="completeUserPrompt('toolbar', 'auto_complete', '')"><span>Continue</span></li>
                            <li class="list-inline-item vr"><span class="vr"></span></li>
                            <li class="list-inline-item toolbar-item" onclick="completeUserPrompt('toolbar', 'paraphrase', '')"><span>Paraphrase</span></li>
                            <li class="list-inline-item vr"><span class="vr"></span></li>
                            <li class="list-inline-item toolbar-item" onclick="completeUserPrompt('toolbar', 'execute', '')"><span>Run command</span></li>
                        </ul>

                        <script type="text/javascript">
                            // Static toolbar above contenteditable
                            var canvas = Id("outputarea");

                            // document.querySelectorAll("[data-edit]").forEach(btn => {
                            //     try {
                            //         btn.addEventListener("click", edit)
                            //     } catch (e) {
                            //         console.error('error caught:', e);
                            //     }
                            // });

                            function edit(ev) {
                                ev.preventDefault();
                                const cmd_val = this.getAttribute("data-edit").split(":");
                                document.execCommand(cmd_val[0], false, cmd_val[1]);
                            }

                            // Floating toolbar                    
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

                            // function setCaretPosition(element, position) {

                            //     // Creates range object
                            //     var setpos = document.createRange();

                            //     // Creates object for selection
                            //     var set = window.getSelection();

                            //     // Set start position of range
                            //     setpos.setStart(element.childNodes[0], position);

                            //     // Collapse range within its boundary points
                            //     // Returns boolean
                            //     setpos.collapse(true);

                            //     // Remove all ranges set
                            //     set.removeAllRanges();

                            //     // Add range with respect to range object.
                            //     set.addRange(setpos);

                            //     // Set cursor on focus
                            //     element.focus();
                            //     console.log(position)
                            // }

                            // function createRange(node, chars, range) {
                            //     if (!range) {
                            //         range = document.createRange()
                            //         range.selectNode(node);
                            //         range.setStart(node, 0);
                            //     }

                            //     if (chars.count === 0) {
                            //         range.setEnd(node, chars.count);
                            //     } else if (node && chars.count > 0) {
                            //         if (node.nodeType === Node.TEXT_NODE) {
                            //             if (node.textContent.length < chars.count) {
                            //                 chars.count -= node.textContent.length;
                            //             } else {
                            //                 range.setEnd(node, chars.count);
                            //                 chars.count = 0;
                            //             }
                            //         } else {
                            //             for (var lp = 0; lp < node.childNodes.length; lp++) {
                            //                 range = createRange(node.childNodes[lp], chars, range);

                            //                 if (chars.count === 0) {
                            //                     break;
                            //                 }
                            //             }
                            //         }
                            //     }

                            //     return range;
                            // }

                            // function setCaretPosition(element, chars) {
                            //     if (chars >= 0) {
                            //         var selection = window.getSelection();

                            //         range = createRange(element.parentNode, {
                            //             count: chars
                            //         });


                            //         if (range) {
                            //             range.collapse(false);
                            //             selection.removeAllRanges();
                            //             selection.addRange(range);
                            //         }
                            //     }
                            // }

                            function showFloatingToolbar() {
                                var selectedText = x.Selector.getSelected();
                                if (selectedText != '') {
                                    x.selectionCaretStart = getSelectionCharacterOffsetWithin(canvas).start
                                    x.selectionCaretEnd = getSelectionCharacterOffsetWithin(canvas).end;
                                    let selection = t;
                                    let rect = selection.getRangeAt(0).getBoundingClientRect();
                                    var element = document.querySelectorAll(".floating-toolbar")[0];
                                    element.style.top = `calc(${rect.top}px - 48px)`;
                                    element.style.left = `calc(${rect.left}px + calc(${rect.width}px / 2) - 40px)`;
                                    $('.floating-toolbar').fadeIn(200);
                                } else {
                                    $('.floating-toolbar').fadeOut(200);
                                }
                            }

                            // $('#outputarea').bind("mouseup scroll input", () => {
                            //     showFloatingToolbar();
                            // });

                            ['mouseup', 'keyup', 'scroll'].forEach((e) => {
                                canvas.addEventListener(e, showFloatingToolbar);
                            });

                            ['mousedown', 'keydown'].forEach((e) => {
                                pageX = e.pageX;
                                pageY = e.pageY;
                            });

                            // canvas.addEventListener("input", (e) => {
                            //     pageX = e.pageX;
                            //     pageY = e.pageY;
                            // }, false);
                        </script>
                        <div class="mt-2 mx-2" id="canvas-actions-bar">
                            <div class="d-flex justify-content-between border rounded-pill shadow-sm p-1">
                                <div class="col-md-5">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div id="gen-spinner" style="display: none;">
                                            <?php echo $spinner; ?>
                                        </div>
                                        <span class="btn btn-primary rounded-pill fw-bold shadow-sm" onclick="completeUserPrompt('canvas', 'auto_complete', '')" type="button">
                                            <span id="gen-text">Generate text</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-md-7 d-flex justify-content-end align-items-center">
                                    <button type="button" class="btn btn-sm btn-warning rounded-pill btn-controls" onclick='editCanvas("retry");'>Try again</button>
                                    <button type="button" class="btn btn-sm btn-warning rounded-pill btn-controls" onclick='editCanvas("prompt");'>Remove prompt</button>
                                    <button type="button" class="btn btn-sm btn-warning rounded-pill btn-controls" onclick='editCanvas("gen_text");'>Remove generated text</button>
                                    <button type="button" class="btn btn-sm btn-warning rounded-pill btn-controls" onclick='editCanvas("clear");'>Clear</button>
                                    <!-- <button type="button" class="btn btn-sm btn-warning rounded-pill btn-controls" onclick='editCanvas("restore");'>Restore</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content types -->
        <div class="p-1"><?php include('templates.php'); ?></div>
        <!-- End content types -->

        <!-- Offcanvas -->

        <div id="savedTemplatesCmpnt" class="offcanvas offcanvas-end rounded-start" data-bs-scroll="true" tabindex="-1">
            <div class="rounded-start border-bottom shadow py-2 px-2 shadow bg-primary text-white">
                <h6 class="fw-bold mb-1 offcanvas-title">Recent templates</h6>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-5 d-flex justify-content-between">
                        <input type="search" oninput="fetchSavedTemplates(current_page, 'search')" placeholder="Search..." class="form-control form-control-sm border-top-0 border-start-0 border-end-0 rounded-0 col-6 bg-transparent text-light dash-search" id="temp_search_term" autocomplete="off" maxlength="50">
                        <i class="bi bi-search mt-2" onclick="fetchSavedTemplates(current_page, 'search')"></i>
                    </div>
                    <small class="btn btn-sm btn-light border" onclick=''>
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


            // $("#signinModal").on('hide.bs.modal', function() {
            //     $('#signinModal').modal('show');
            // });

            // use this
            $("#signinModal").on('hidden.bs.modal', function() {
                $('#signinModal').modal('show');
            });
        }
    });

    Id('outputarea').focus();

    //  Levenshtein Distance
    String.prototype.LevenshteinDistance = function(s2) {
        var array = new Array(this.length + 1);
        for (var i = 0; i < this.length + 1; i++)
            array[i] = new Array(s2.length + 1);

        for (var i = 0; i < this.length + 1; i++)
            array[i][0] = i;
        for (var j = 0; j < s2.length + 1; j++)
            array[0][j] = j;

        for (var i = 1; i < this.length + 1; i++) {
            for (var j = 1; j < s2.length + 1; j++) {
                if (this[i - 1] == s2[j - 1]) array[i][j] = array[i - 1][j - 1];
                else {
                    array[i][j] = Math.min(array[i][j - 1] + 1, array[i - 1][j] + 1);
                    array[i][j] = Math.min(array[i][j], array[i - 1][j - 1] + 1);
                }
            }
        }
        return array[this.length][s2.length];
    };

    function string_similarity(s1, s2) {
        var longer = s1;
        var shorter = s2;
        if (s1.length < s2.length) {
            longer = s2;
            shorter = s1;
        }
        var longerLength = longer.length;
        if (longerLength == 0) {
            return 1.0;
        }
        return (longerLength - longer.LevenshteinDistance(shorter)) / longerLength;
    }

    var container = $("#reusable-container");

    // Hide sections initially
    $(".content-type").hide();
    container.hide();

    // Content type selection
    var content_types = document.getElementsByClassName('content-selection');
    Array.prototype.slice.call(content_types)
        .forEach((el) => {
            el.addEventListener("click", () => {
                renderSelection(el.value);
            });
        });

    function renderSelection(type) {
        var elem = document.querySelector('input[value="' + type + '"]');
        elem.checked = true;

        var cmpnt = Id(type + "_cmpnt");

        var container = $("#reusable-container");

        container.html(cmpnt.innerHTML);
        container.fadeIn(400, () => {

            // On DOM change
            // Product category selection    

            var product_cats = document.getElementsByClassName("yt-captions-category");

            Array.prototype.slice.call(product_cats)
                .forEach(function(el) {
                    el.addEventListener("click", () => {

                        Id("prod-disp-wrapper").style.display = "block";
                        Id("prod-disp-text").textContent = el.innerText;
                    })
                });
            setCookie("dash_content_type", type, 365);
        });
    }

    /**
     * I stored some cookies for you - have 'em
     */
    // Get slider value from stored cookies
    const param_cookies = ['length', 'temperature'];
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
        renderSelection('auto_complete');

    // Complete prompt on tab key press
    window.addEventListener("keydown", (evt) => {
        if (signinStatus == 1 && evt.keyCode == "9" && document.activeElement.id == "outputarea") {
            evt.preventDefault(); //prevent changing focus to other elements
            completeUserPrompt("canvas", "auto_complete", "");
        }
    }, false);

    // content holders
    let prompt_holder, resp_holder;

    // Copy text to clipboard
    function copyToClipboard(id) {
        /* Get the text field */
        var copyText = Id(id);
        var text = copyText.innerHTML;

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

    // Complete use prompt
    // Object to store previous request details for use in retry attempt
    var previousRequest = {};

    function completeUserPrompt(source, command, element) {

        // Keep selection highklighted
        setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd)

        const outputarea = $("#outputarea");
        temp = $("#temperature").val();
        length = $("#length").val() ?? 1088;
        rem_input = Id("rem_input").checked;
        highlight = Id("highlight").checked;

        var sendInfo = {
            "csrf_token": csrf_token,

            // API v2 - G                
            "temperature": temp,
            "max_tokens": length,
            "command": command,
            "stop": "<|endoftext|>"
        };

        // Handle context
        switch (source) {
            case "sidebar":
                switch (command) {
                    case "auto_complete":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                    case "blog_outline":
                        if (Id("blog_outline_title").value !== "") {
                            sendInfo.blog_outline_title = Id("blog_outline_title").value;
                            keywords = Id("blog_outline_keywords").value;
                            sendInfo.blog_outline_keywords = keywords.split(",");
                        } else
                            context = "";
                        break;
                    case "blog_body":
                        if (Id("blog_body_title").value !== "") {
                            sendInfo.blog_body_title = Id("blog_body_title").value;
                            keywords = Id("blog_body_keywords").value;
                            sendInfo.blog_body_keywords = keywords.split(",");
                        } else
                            context = "";
                        break;
                    case "product_description":
                        if (Id("product_name").value !== "") {
                            sendInfo.product_name = Id("product_name").value;
                            sendInfo.brand_name = Id("brand_name").value;
                            features = Id("product_features").value;
                            sendInfo.product_features = features.split(",");
                        } else
                            context = "";
                        break;
                    case "youtube_captions":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                    case "youtube_description":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                    case "email_subject":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                    case "general_email":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                    case "ads_copy":
                        if (Id("starter_context").value !== "")
                            context = Id("starter_context").value;
                        else
                            context = "";
                        break;
                }
                break;
            case "sample":
                context = Id(element + "_context").innerText;
                rem_input = false;
                break;
            case "canvas":
                context = outputarea.text()
                break;
            case "toolbar":
                if (x.selectedText !== "") {
                    switch (command) {
                        case "auto_complete":
                            context = x.selectedText;
                            break;
                        case "execute": //Run command

                            var strings = [
                                'Blog post article',
                                'Outline',
                                'Paraphrase rewrite',
                                'Email',
                                'Instagram description'
                            ];

                            var str_templates = [
                                'blog_body',
                                'blog_outline',
                                'paraphrase',
                                'general_email',
                                'instagram_caption'
                            ];

                            /**
                             * Return the case with the highest similarity to the subject string
                             * Loop through strings array and return template of string with highest similarity
                             */

                            function get_template_context(subject) {

                                subject = subject.toLowerCase();

                                // Get template                            
                                var sims = [];

                                // Loop
                                for (var i in strings) {
                                    var s = strings[i].toLowerCase();

                                    // String index in templates array
                                    var string_index = strings.indexOf(s);

                                    // Similarity to subject
                                    var sim = string_similarity(s, subject);

                                    // Push similarity to similarities array                                   
                                    sims.push(Math.round(sim * 100));

                                }

                                /**
                                 * Get string template with highest similarity.
                                 * Default 20: seems somewhat arbitrary but there's
                                 * only a 1/5 chance of selecting any one template 
                                 * if done randomly.
                                 */

                                const highest_sim = Math.max(...sims);

                                console.log(highest_sim)

                                str_index = sims.indexOf(highest_sim);

                                // Since templates index = strings index
                                tmplte = str_templates[str_index];

                                if (highest_sim >= 20) {
                                    tmplte = 'auto_complete';
                                }

                                // Get context

                                str_search = x.selectedText;
                                str_search = str_search.toLowerCase();
                                str_search = str_search.replace(/write/i, '');
                                str_search = str_search.replace(/ on /i, ' ');
                                str_search = str_search.replace(/ a /i, ' ');

                                space_index = str_search.indexOf(' ');

                                // Replace the space at the beginning (hacky, I know)
                                str_search = str_search.split('');
                                str_search[space_index] = '';
                                str_search = str_search.join('');

                                str_remove = strings[str_index].toLowerCase();

                                strs_arr = str_remove.split(" ")
                                cntxt = str_search;
                                for (i = 0; i < strs_arr.length; i++) {
                                    cntxt = cntxt.replace(strs_arr[i], '');
                                }

                                cntxt_words_arr = cntxt.split(" ");

                                if (cntxt_words_arr.length > 1 && tmplte == "blog_body") {

                                    sendInfo.blog_body_keywords = cntxt_words_arr;

                                }

                                return {
                                    template: tmplte,
                                    context: cntxt
                                };
                            }

                            var result_obj = get_template_context(x.selectedText);
                            command = result_obj.template;
                            context = result_obj.context;
                            break;
                    }
                } else
                    rem_input = true;
                break;
            default:
                context = x.selectedText ?? outputarea.html() ?? outputarea.text()
        }

        if (typeof context !== 'undefined' && context !== null && context != "") {

            prompt_holder = context;
            $("#gen-spinner").show();
            $("#gen-text").html("Getting the juice...");

            sendInfo.command = command;

            // API v1 - E
            sendInfo.rem_input = rem_input

            // API v2 - G
            sendInfo.prompt = context


            $.ajax({
                type: 'POST',
                url: 'completion/',
                data: JSON.stringify(sendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: (data) => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html("Generate text");
                    resp_holder = data;
                    if (data !== null) {
                        if (data.status != 'hash_error') {
                            $('.floating-toolbar').fadeOut(200);

                            data = data.replace('<|endoftext|>', '');

                            //Store request details
                            previousRequest.source = source;
                            previousRequest.command = command;
                            previousRequest.element = element;
                            previousRequest.body = sendInfo;

                            // Write result to outputarea 
                            try {
                                // outputarea.focus();
                                // Cursor position
                                if (command === 'auto_complete') {
                                    // setCaretPosition(canvas, x.selectionCaretEnd);
                                    setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd)
                                    // outputarea.focus();
                                } else if (command === "paraphrase") {
                                    // setCaretPosition(canvas, x.selectionCaretEnd);
                                    document.execCommand("delete", false, "");
                                    // setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd)
                                } else {
                                    outputarea.focus();
                                }

                                // Include/exclude prompt in text and write response
                                if (rem_input === true) {
                                    pasteHtmlAtCaret(data, highlight);
                                } else {
                                    pasteHtmlAtCaret(context + ' ' + data, highlight);
                                }
                            } catch (e) {
                                console.error('error caught:', e);
                            }
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
                    $("#gen-text").html("Generate text");
                    showToastMessage("Dang! Somethings went wrong.", "danger");
                }

            });
        } else {
            showToastMessage("Please enter some text into the prompt area", "primary");
        }
    }

    // var gen_text = substr(response, gen_text_start, gen_text_end);

    function editCanvas(type) {
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

            // clear
            if (type === "clear") {
                Id("outputarea").innerHTML = "";
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

    // Text to speech    
    function TextToSpeech(action) {
        var text = Id("outputarea").innerHTML;
        var speech = new SpeechSynthesisUtterance();

        if (text !== "") {
            speech.text = text;
            speech.rate = 1;
            speech.volume = 1;
            speech.pitch = 1;

            speech.lang = 'en-US';

            var element = Id("text-to-speech");
            var wrapper = Id("speech-wrapper");

            if (action == 'speak') {
                element.remove();
                wrapper.innerHTML = '<i id="text-to-speech" class="bi bi-volume-mute fs-4 mx-2" type="button" onclick="TextToSpeech(' + "'mute'" + ')"></i>';
                speechSynthesis.speak(speech);
            } else if (action == 'mute') {
                wrapper.innerHTML = '<i id="text-to-speech" class="bi bi-volume-down fs-4 mx-2" type="button" onclick="TextToSpeech(' + "'speak'" + ')"></i>';
                speechSynthesis.cancel(speech);
            }
        } else {
            showToastMessage("Enter text to read out in the Canvas", "primary");
            Id('outputarea').focus();
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
    $('#outputarea').bind('blur keyup keydown paste input', function(e) {
        save_history();
        localStorage.dash_canvas_content = $('#outputarea').html();
    });
    $('#undo').click(function(e) {
        history_undo();
    });
    $('#redo').click(function(e) {
        history_redo();
    });

    // hide sidebar
    // Id("close_saved_templates").onclick = () => {
    //     Id("savedTemplatesCmpnt").style.width = "0px";
    // }

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
                url: 'saved_templates/',
                data: JSON.stringify(templatedata),
                contentType: "application/json; charset=utf-8",
                success: (json) => {
                    var data = JSON.parse(json);
                    if (data.status === "SUCCESS") {
                        showToastMessage("Template saved successfully", "primary");
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
            showToastMessage("Sorry. Can't save a blank template", "primary");
        }
    }
</script>

<?php
include "../footer.php";
?>