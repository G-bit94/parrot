<?php

include "../header.php";

// if ($signinStatus !== 1) {
//     echo '<script>window.location.href = "../";</script>';
// }
if ($signinStatus == 1) {
    if ($v_status != 1) {
        echo '<script type="text/javascript">window.location.href = base_url + "/pricing";</script>';
    }
} else {
    echo '<script type="text/javascript">window.location.href = history.back();</script>';
    exit;
}
?>

<!-- Custom styles for the page -->
<style>
    /* saved templates */
    .saved_templates {
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
        .saved_templates {
            padding-top: 15px;
        }

        .saved_templates a {
            font-size: 18px;
        }
    }

    /* End saved templates */

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
</style>

<div class="container-fluid mt-5 mb-5 py-3">
    <div class="row">
        <div class="col-md-2 mt-4 rounded-3">
            <div class="col-md">
                <small class="mt-3 mb-1 text-muted text-uppercase">Have fun!</small>
                <p class="mt-2 p-1">
                    ParrotAI responds with a completion that matches the context you provided.
                </p>

                <div class="p-1 rounded-3">
                    <small class="mt-2 fw-bold">Tip</small>

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

                    <small class="fw-bold">KEEP IN MIND</small>

                    <div class="list-group border-0 py-1">
                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                            <i class="bi bi-bezier2"></i>
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <p class="mb-0">Not the response you expected? Retry to craft your masterpiece to perfection.</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-action border-0 d-flex gap-3 py-2 bg-light" aria-current="true">
                            <i class="bi bi-chat-left"></i>
                            <div class="d-flex gap-2 w-100 justify-content-between">
                                <div>
                                    <p class="mb-0">You can always get in touch in case of anything. Just <a onclick="startChat();" class="fw-bold" type="button">click here.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-4 border-start border-end">
            <div class="p-1 d-flex justify-content-between align-items-center border-bottom">
                <h2 id="title" class="lead fs-5 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="The Canvas is where you get to craft your masterpiece to perfection">Canvas</h2>
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
                        <span id="speech-wrapper">
                            <i id="text-to-speech" type="button" class="bi bi-volume-down fs-4" onclick="TextToSpeech('speak')"></i>
                        </span>
                    <?php } ?>
                    <img src="../assets/img/copy.png" alt="" data-edit="copy" class="mx-2" type="button" />
                    <img src="../assets/img/save.png" alt="" id="save" class="mx-2" type="button" />
                    <i class="bi bi-list-stars mx-1 fs-4" onclick="fetchSavedTemplates()" type="button" data-bs-toggle="tooltip" data-bs-placement="right" title="Saved templates"></i>
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
                        /* font: 12px/1 monospace; */
                        padding: 4px 8px;
                        /* background: #ddd; */
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
                        left: 100px;
                        top: 40px;
                        text-align: center;
                    }

                    .floating-toolbar li {
                        height: 36px;
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: 70%;
                    }

                    /* .floating-toolbar:hover li {
                        font-weight: bold;
                    } */


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
                </style>

                <div class="d-flex justify-content-between shadow-sm border-bottom">
                    <div class="editButtons">
                        <span title="STYLES">
                            <button class="toolbar-edit" data-edit="bold"><i class="bi bi-type-bold"></i></button>
                            <button class="toolbar-edit" data-edit="italic"><i class="bi bi-type-italic"></i></button>
                            <button class="toolbar-edit" data-edit="underline"><i class="bi bi-type-underline"></i></button>
                            <button class="toolbar-edit" data-edit="strikeThrough"><i class="bi bi-type-strikethrough"></i></button>
                        </span>

                        <span title="TEXT FORMAT">
                            <button class="toolbar-edit" data-edit="formatBlock:p"><i class="bi bi-blockquote-left"></i></button>
                            <button class="toolbar-edit" data-edit="formatBlock:H1"><i class="bi bi-type-h1"></i></button>
                            <button class="toolbar-edit" data-edit="formatBlock:H2"><i class="bi bi-type-h2"></i></button>
                            <button class="toolbar-edit" data-edit="formatBlock:H3"><i class="bi bi-type-h3"></i></button>
                        </span>

                        <span title="FONT SIZE">
                            <button class="toolbar-edit" data-edit="fontSize:1">&#8613;s</button>
                            <button class="toolbar-edit" data-edit="fontSize:3">&#8613;M</button>
                            <button class="toolbar-edit" data-edit="fontSize:5">&#8613;L</button>
                        </span>

                        <span title="LISTS">
                            <button class="toolbar-edit" data-edit="insertUnorderedList"><i class="bi bi-list-ul"></i></button>
                            <button class="toolbar-edit" data-edit="insertOrderedList"><i class="bi bi-list-ol"></i></button>
                        </span>

                        <span title="ALIGNMENT">
                            <button class="toolbar-edit" data-edit="justifyLeft"><i class="bi bi-justify-left"></i></button>
                            <button class="toolbar-edit" data-edit="justifyCenter"><i class="bi bi-justify"></i></button>
                            <button class="toolbar-edit" data-edit="justifyRight"><i class="bi bi-justify-right"></i></button>
                        </span>

                        <span title="CLEAR FORMATTING">
                            <button class="toolbar-edit" data-edit="removeFormat"><i class="bi bi-x"></i></button>
                        </span>

                        <span title="CONTROLS">
                            <button class="toolbar-edit" id="undo" data-edit="undo" title="UNDO"><i class="bi bi-arrow-counterclockwise"></i></button>
                            <button class="toolbar-edit" id="redo" data-edit="redo" title="REDO"><i class="bi bi-arrow-clockwise"></i></button>
                        </span>

                        <!-- <span title="UNDO/REDO">
                            <button class="toolbar-edit" onclick="undo()"><i class="bi bi-arrow-counterclockwise"></i></button>
                            <button class="toolbar-edit" onclick="redo()"><i class="bi bi-arrow-clockwise"></i></button>
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


                <div class="overflow-auto" id="outputarea" contenteditable></div>

                <ul class="list-inline floating-toolbar text-light rounded-3 p-1" style="display: none;">
                    <li class="mx-1 list-inline-item toolbar-item" onclick="completeUserPrompt('selection')"><span>Continue</span></li>
                    <li class="mx-1 list-inline-item vr"><span class="vr"></span></li>
                    <li class="mx-1 list-inline-item toolbar-item" onclick="completeUserPrompt('paraphrase')"><span>Paraphrase</span></li>
                    <li class="mx-1 list-inline-item vr"><span class="vr"></span></li>
                    <li class="mx-1 list-inline-item toolbar-item" data-edit="copy"><span>Run command</span></li>
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

                    // canvas.addEventListener("mouseup", (e) => {
                    //     showFloatingToolbar();
                    // });

                    ['mouseup', 'keyup', 'scroll'].forEach((e) => {
                        canvas.addEventListener(e, showFloatingToolbar);
                    });

                    ['mousedown', 'keydown'].forEach((e) => {
                        pageX = e.pageX;
                        pageY = e.pageY;
                    });

                    // canvas.onmoousedown = (e) => {

                    // }

                    // canvas.addEventListener("input", (e) => {
                    //     pageX = e.pageX;
                    //     pageY = e.pageY;
                    // }, false);
                    // $('#outputarea').on("mousedown", (e) => {

                    // });
                </script>
                <div class="p-1">
                    <div class="row border border-info rounded-pill row pb-2">
                        <div class="col-md-3 d-flex justify-content-start mt-1">
                            <div id="gen-spinner" style="display: none;">
                                <?php echo $spinner; ?>
                            </div>
                            <div class="gap-1">
                                <span class="btn btn btn-primary rounded-pill fw-bold" onclick="completeUserPrompt('complete')" type="button">
                                    <span id="gen-text">Generate text</span>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-9 d-flex justify-content-end align-items-end mt-1">
                            <button type="button" class="m-1 btn btn-sm btn-info rounded-pill btn-controls" onclick='editCanvas("retry");'>Try again</button>
                            <button type="button" class="m-1 btn btn-sm btn-info rounded-pill btn-controls" onclick='editCanvas("prompt");'>Remove prompt</button>
                            <button type="button" class="m-1 btn btn-sm btn-info rounded-pill btn-controls" onclick='editCanvas("gen_text");'>Remove generated text</button>
                            <button type="button" class="m-1 btn btn-sm btn-info rounded-pill btn-controls" onclick='editCanvas("clear");'>Clear</button>
                            <button type="button" class="m-1 btn btn-sm btn-info rounded-pill btn-controls" onclick='editCanvas("restore");'>Restore</button>
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
                        <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Try higher values for more creative applications, and lower values for prompts with a well-defined factual response. We recommend the default value (0.5)."></i>
                    </small>
                </label>
                <input type="range" class="form-range" min="0" max="1" step="0.05" id="temperature" en_text" type="button" oninput="getSliderValue('temperature')">
                <small class="fw-bold" id="temperature_show"></small>
            </div>
            <div class="form-group mb-3">
                <label for="length">
                    <small>Max length&nbsp;
                        <i tabindex="0" class="bi bi-question-circle" role="button" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="Maximum number of characters in generated response."></i>
                    </small>
                </label>
                <?php if ($active_sub == 1) { ?>
                    <input type="range" class="form-range" min="64" max="1088" step="128" id="length" oninput="getSliderValue('length')">
                <?php } elseif ($active_sub == 2) { ?>
                    <input type="range" class="form-range" min="64" max="2112" step="256" id="length" oninput="getSliderValue('length')">
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
    </div>
</div>

<div id="savedTemplatesCmpnt" class="saved_templates mt-5 rounded-3">
    <div class="bg-white rounded-3 border border-1 border-teal">
        <div class="bg-light rounded-top border-bottom py-2 d-flex justify-content-between align-items-center">
            <p class="fw-bold my-2 ps-1">Saved templates</p>
            <small class="btn btn-sm btn-light border" onclick='deleteSavedTemplates("clear")' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete all saved templates">
                Clear list
            </small>
            <i class="bi bi-caret-right-fill" id="close_saved_templates" type="button"></i>
        </div>
        <div class="d-flex justify-content-center">
            <div id="fetch-spinner" style="display: none;" class="loader mx-3"><?php echo $spinner; ?></div>
        </div>
        <ul class="list-unstyled mb-0" id="saved_templates_list" style="height: 450px; overflow-y: auto;"></ul>
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
<div class="modal modal-signin py-2 fade" tabindex="-1" role="dialog" id="templateDetailsModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-3 pb-2 border-bottom-0">
                <button id="dismiss-signin" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5 pt-0">
                <div class="d-flex justify-content-between border-bottom p-2">
                    <span id="template_uid" style="display: none;"></span>
                    <div>
                        <h6 id="template_summary" class="fw-bold mb-0 mt-1"></h6><br>
                        <small id="date"></small><br>
                        <small id="time"></small>
                    </div>
                    <span class="mt-1" id="controls">
                        <!-- <img src="../assets/img/copy.png" alt="" onclick="copyItemToClipboard()" class="mx-2 mb-2" type="button" />                 -->
                        <button class="btn btn-sm btn-light border mx-2" id="copy_template">
                            Copy
                        </button>
                        <button class="btn btn-sm btn-light border mx-2" id="use_prompt">
                            Use as prompt
                        </button>
                        <button class="btn btn-sm btn-outline-teal border mx-2" onclick="popWpModal('saved', <?php echo $active_sub; ?>)">
                            <img src="<?php echo $base_url; ?>/assets/img/wordpress.png" /> Post to WordPress
                        </button>
                        <button class="btn btn-sm btn-outline-danger border mx-2" onclick='deleteSavedTemplates("single")'>
                            <i type="button" class="bi bi-trash mx-2"></i> Delete
                        </button>
                    </span>
                </div>
                <div class="d-flex justify-content-center" style="white-space: pre-line;">
                    <div id="template-details-spinner" style="display: none;" class="loader mx-3"><?php echo $spinner; ?></div>
                </div>
                <div id="template_details" style="height: 350px; white-space:pre-line;" class="mt-1 overflow-auto"></div>
                <div class="border-bottom mt-1"></div>
            </div>
        </div>
    </div>
</div>
<!-- End template details modal -->

<!-- Publish to WordPress modal -->
<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="publishToWordPressModal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-body p-4 pt-0">
                <div class="d-flex justify-content-between align-items-center border-bottom p-2 mb-2">
                    <div class="fw-bold fs-6"><img src="<?php echo $base_url; ?>/assets/img/wordpress.png" class="m-1" />Post to WordPress</div>
                    <button class="btn btn-sm btn-dark" data-bs-dismiss="modal" aria-label="Close">
                        Back
                    </button>
                </div>
                <div class="d-flex justify-content-center my-2">
                    <img src="../assets/img/loader-bars.png" alt="" id="wp-template-details-spinner" style="display: none;" class="loader mx-3" />
                </div>
                <?php if ($active_sub == 2) { ?>
                    <!-- Post details -->
                    <small class="fw-bold">Post details</small>
                    <div class="row row-cols-3 mb-3">
                        <div class="col form-floating">
                            <input type="number" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="wp-cat" name="wp-cat" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-cat">Category <sup><small>Category ID (Number)</small></sup></label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="wp-title" name="wp-title" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-title">Post title *</label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="wp-tags" name="wp-tags" autocomplete="off" placeholder="" maxlength="50">
                            <label class="text-muted" for="wp-tags">Tags <sup><small>Comma separated</small></sup></label>
                        </div>
                        <div class="col form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="wp-excerpt" name="wp-excerpt" autocomplete="off" placeholder="" maxlength="100">
                            <label class="text-muted" for="wp-excerpt">Excerpt<small class="m-1 text-muted"></small></label>
                        </div>
                    </div>
                    <small class="fw-bold">Post body</small>
                    <div class="my-2">
                        <div id="wp-content"></div> <!-- content to be appended to form dynamically -->
                    </div>
                    <!-- WP credentials -->
                    <div class="col-md my-2">
                        <span class="fw-bold mt-2">Enter your WordPress credentials below
                            <small tabindex="0" role="button" type="button" data-bs-toggle="popover" data-bs-html="true" title="" data-bs-content="                                                                
                                <p>Your password is used to verify your WordPress identity. We do not store your credentials (unless you want us to by checking the box below) and we only need them to authenticate requests to your
                                    WordPress account.</p>

                                <p>We use the XML-RPC API thus ensure it is enabled on your WordPress site and server. XML-RPC is usually enabled by default. Not sure? Follow
                                    <a href='https://codex.wordpress.org/XML-RPC_Support'
                                target='_blank' class='link-dark fw-bold'>this guide</a> to enable it.</p>" data-bs-original-title="Please note">
                                <span class="text-muted">Please note <i class="bi bi-info-circle-fill"></i></span>
                            </small>
                        </span>

                    </div>
                    <div class="row">
                        <div class="col-md-6 form-floating">
                            <input type="url" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="wp-url" id="wp-url" placeholder="" autocomplete="off" maxlength="100" required>
                            <label class="text-muted" for="wp-url"><i class="bi bi-globe"></i> Site URL<sup><small>eg https://example.com</small></sup> *</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="number" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="wp-author" id="wp-author" placeholder="" autocomplete="off" maxlength="50">
                            <label class="text-muted" for="wp-author">Post Author <sup><small>Author ID (Number)</small></sup></label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="text" class="form-control border-top-0 border-start-0 border-end-0 border-secondary rounded-0" name="wp-username" id="wp-username" placeholder="" autocomplete="off" maxlength="50" required>
                            <label class="text-muted" for="wp-username">Username/Email *</label>
                        </div>
                        <div class="col-md-4 form-floating">
                            <input type="password" class="form-control pass-input border-top-0 border-start-0 border-end-0 border-secondary rounded-0" id="wp-pass" name="wp-pass" autocomplete="off" placeholder="" maxlength="50" required>
                            <label class="text-muted" for="wp-pass">WordPress password *</label>
                        </div>
                        <div class="d-flex justify-content-start my-3">
                            <div class="form-check mx-2">
                                <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitch">
                                <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                    Show password
                                </label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" name="rem_wp" type="checkbox" id="remWPCred">
                                <label class="form-check-label text-dark text-sm" for="flexCheckDefault">
                                    Remember WordPress credentials
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="py-3">
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="" id="wp-status">
                            <label class="form-check-label" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Check this box to directly publish the post to WordPress, otherwise it will be saved as a draft in your account" for="flexCheckChecked">
                                Publish to WordPress publicly
                            </label>
                        </div>
                        <div class="col-md-2 mb-1">
                            <button id="wp-submit-btn" class="w-100 my-2 btn rounded-4 btn-dark" onclick='publishToWordPress()'>
                                <span id="wp-spinner" style="display: none;">
                                    <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                                </span>
                                <span id="wp-button-text">Post</span>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End publish to WordPress modal -->

<!-- Modal prompting user to sign up for premium account  -->
<div class="modal modal-signin py-2 fade" id="premiumSignup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-custom-primary text-light">
            <div class="modal-header">
                <h6 class="modal-title fs-5" id="modal-title">Become a Parakeet Premium member!</h6>
                <button class="btn btn-sm btn-outline-light" data-bs-toggle="modal" data-bs-target="#templateDetailsModal">
                    Back
                </button>
            </div>
            <div class="modal-body">
                <div class="card mb-4 border-0 rounded-3 shadow-sm ">
                    <div class="card-body bg-custom-primary">
                        <div class="list-group border-0 p-1 bg-custom-primary">
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <p class="mb-0 text-light">Save <strong>unlimited</strong> templates</p>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div class="text- text-light">
                                        <strong>Up to 2000 characters of generated text in a single run</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div>
                                        <p class="mb-0 text-light">Publish directly to <strong>WordPress</strong>.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item border-0 d-flex gap-3 py-3 bg-custom-primary">
                                <i class="bi bi-star-fill text-warning"></i>
                                <div class="d-flex gap-2 w-100 justify-content-start">
                                    <div>
                                        <p class="mb-0 text-light">Enjoy audio playback</strong>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $base_url; ?>/pricing" style="background-color: #6610f2;" class="w-100 btn btn-lg btn-primary sub-btn">Get started</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete confirmation toast -->
<div class="position-fixed top-0 end-0 p-3 rounded-3" style="z-index: 9999;">
    <div id="deleteConfirm" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header bg-white text-dark">
            Sure to permanently delete the template(s)?
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

    function completeUserPrompt(type) {

        // Keep selection highklighted
        setSelectionRange(canvas, x.selectionCaretStart, x.selectionCaretEnd)

        const outputarea = $("#outputarea");
        temp = $("#temperature").val();
        length = $("#length").val() ?? 1088;
        rem_input = Id("rem_input").checked;
        highlight = Id("highlight").checked;
        context = outputarea.html();
        prompt = outputarea.text();
        url = "completion/";

        if (typeof type !== 'undefined' && type !== null && type != "") {
            if (type !== "selection") {
                if (Id(type + "_context")) {
                    prompt = Id(type + "_context").innerText;
                }
            }
            context = prompt;
            rem_input = false;
        }

        if (type === 'selection') {
            context = x.selectedText;
            prompt = x.selectedText;
            rem_input = true;
        }

        if (type === "paraphrase") {
            context = x.selectedText;
            prompt = x.selectedText;
            rem_input = true;
            url = "paraphrase/";
        }

        if (typeof prompt !== 'undefined' && prompt !== null && prompt != "") {

            prompt_holder = context;
            $("#gen-spinner").show();
            $("#gen-text").html("Getting the juice...");

            var sendInfo = {
                "csrf_token": csrf_token,

                // API v1 - E
                "rem_input": rem_input,

                // API v2 - G
                "prompt": prompt,
                "temperature": temp,
                "max_tokens": length,
                "stop": "<|endoftext|>"
            };

            $.ajax({
                type: 'POST',
                url: url,
                data: JSON.stringify(sendInfo),
                contentType: "application/json; charset=utf-8",
                traditional: true,
                success: (data) => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html("Generate text");
                    resp_holder = data;
                    if (data !== null) {
                        $('.floating-toolbar').fadeOut(200);

                        data = data.replace('<|endoftext|>', '');

                        //Store request details
                        previousRequest.type = type;
                        previousRequest.url = url;
                        previousRequest.body = sendInfo;

                        // Write result to outputarea 
                        try {
                            // outputarea.focus();
                            // Cursor position
                            if (type === 'selection') {
                                // setCaretPosition(canvas, x.selectionCaretEnd);
                                setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd)
                                // outputarea.focus();
                            } else if (type === "paraphrase") {
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
                    }
                    // else if (data.status !== '') {
                    //     showToastMessage("Please check your internet connection and try again", "danger");
                    // }
                },
                error: () => {
                    $("#gen-spinner").hide();
                    $("#gen-text").html("Generate text");
                    showToastMessage("Dang! Something went wrong.", "danger");
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
                completeUserPrompt(previousRequest.type);
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
            showToastMessage("Enter text to read out below", "primary");
            Id('outputarea').focus();
        }
    }


    // Save/show/delete templates
    var sidebar = document.getElementById("savedTemplatesCmpnt");
    sidebar.style.width = "0px";

    // show/hide templates
    function fetchSavedTemplates() {

        // Hide sidebar
        if (sidebar.style.width == "230px") {
            sidebar.style.width = "0px";
        }

        // Show sidebar
        else if (sidebar.style.width == "0px") {
            sidebar.style.width = "230px";

            // fetch templates
            $("#fetch-spinner").show();
            $("#show_saved").hide();

            $.ajax({
                type: 'POST',
                url: 'saved_templates/',
                data: JSON.stringify({
                    "user": user,
                    "fetch_all": true,
                    "csrf_token": csrf_token
                }),
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
    }


    function updateTemplatesList() {
        // fetch templates
        $("#fetch-spinner").show();
        $("#show_saved").hide();

        $.ajax({
            type: 'POST',
            url: 'saved_templates/',
            data: JSON.stringify({
                "user": user,
                "fetch_all": true,
                "csrf_token": csrf_token
            }),
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


    // fetch single template
    function fetchSingleItem(template) {
        $("#templateDetailsModal").modal("show");
        $("#template-details-spinner").show();
        $.ajax({
            type: 'POST',
            url: 'saved_templates/',
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
                    // Id("template_details").innerText = data.text.replace(/\\n/g, '<br>'); //format to display space and \n correctly                    
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
                url: 'saved_templates/',
                data: JSON.stringify(payload),
                contentType: "application/json; charset=utf-8",
                success: (json) => {
                    var data = JSON.parse(json);
                    if (data.status === "SUCCESS") {
                        $("#templateDetailsModal").modal("hide");
                        $("#deleteConfirm").hide();
                        updateTemplatesList();
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

    // use saved template as prompt
    Id("use_prompt").onclick = () => {
        // Id("outputarea").innerHTML = Id("template_details").innerHTML;
        // $("#templateDetailsModal").modal("hide");
        // $('#outputarea').focus();
        setSelectionRange(canvas, x.selectionCaretEnd, x.selectionCaretEnd)
        pasteHtmlAtCaret(Id("template_details").innerHTML, true);
        $("#templateDetailsModal").modal("hide");
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

    // Undo/Redo
    /**
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
            DEBUG && console.log('undo ' + canvas_history.length + " " + cur_history_index);
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
            DEBUG && console.log('redo ' + canvas_history.length + " " + cur_history_index);
            $('#undo').removeClass("disabled");
        } else {
            $('#redo').addClass("disabled");
        }
    }
    $('#outputarea').bind('blur keyup keydown paste input', function(e) {
        save_history();
    });
    $('#undo').click(function(e) {
        history_undo();
    });
    $('#redo').click(function(e) {
        history_redo();
    });

    // hide sidebar
    Id("close_saved_templates").onclick = () => {
        Id("savedTemplatesCmpnt").style.width = "0px";
    }

    // save template to db
    Id("save").onclick = () => {

        var text = Id("outputarea").innerHTML;

        if (typeof text !== 'undefined' && text !== null && text != "") {

            var templatedata = {
                "user": user,
                "text": text,
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
                        showToastMessage("Saved successfully", "success");
                        updateTemplatesList();
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
                    .forEach(function(toolbar) {
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
                url: 'wordpress/',
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