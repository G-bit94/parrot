<?php

include "../header.php";

// }
if ($signinStatus == 1) {

    $sql_wp = "SELECT wp_url, wp_user, wp_pass FROM users WHERE users.email = '$user_email'";
    $rs_wp = $mysqli->query($sql_wp);
    $row_wp = $rs_wp->fetch_assoc();
?>

    <div class="border-bottom mt-5 p-5">
        <div class="mb-4 border-bottom">
            <h4 id="title" class="ms-4 fw-bold">My account</h4>
        </div>

        <div class="row p-1">
            <div class="col-md-2 m-1">
                <div class="py-5 bg-light rounded-4 shadow-sm">
                    <nav class="nav flex-column">
                        <a class="nav-link text-dark fw-bold my-1 active" id="details-tab" data-bs-toggle="tab" href="<?php echo $base_url; ?>/account#details" role="tab" aria-current="page"><i class="bi bi-person-circle me-2"></i> Details</a>

                        <a class="nav-link text-dark fw-bold my-1" id="subscriptions-tab" data-bs-toggle="tab" href="<?php echo $base_url; ?>/account#subscriptions" role="tab"><i class="bi bi-credit-card-fill me-2"></i> Subscriptions</a>

                        <a class="nav-link text-dark fw-bold my-1" id="templates-tab" data-bs-toggle="tab" href="<?php echo $base_url; ?>/account#templates" role="tab" onclick="fetchSavedTemplates(current_page, 'list')"><i class="bi bi-list-stars me-2"></i> My templates</a>

                        <a class="nav-link text-dark fw-bold my-1" id="accounts-tab" data-bs-toggle="tab" href="<?php echo $base_url; ?>/account#accounts" role="tab">
                            <i class="bi bi-wordpress me-2"></i>
                            WordPress
                        </a>

                        <a class="nav-link text-dark fw-bold my-1" id="share-tab" data-bs-toggle="tab" href="<?php echo $base_url; ?>/account#share" role="tab"><i class="bi bi-share-fill me-2"></i> Share</a>

                        <a class="nav-link text-dark fw-bold my-1" href="<?php echo $base_url; ?>/dashboard"><i class="bi bi-speedometer me-2"></i> Dashboard</a>
                    </nav>
                </div>
            </div>

            <div class="col-md-9 ps-3 border-start">
                <div class="rounded-4 shadow-sm">
                    <div class="row py-2 rounded-3">
                        <div class="tab-content" id="menuTabContent">
                            <div class="tab-pane fade show active mt-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row row-cols-1 row-cols-md-2 container-fluid mt-3 mb-5 py-2">
                                    <div class="col">
                                        <div class="card border mb-4 rounded-4 shadow-sm p-3">
                                            <div class="d-flex justify-content-between">
                                                <div class="mx-1">
                                                    <a href="javascript: void()" class="p-0 text-muted">
                                                        <img src="<?php echo $base_url ?>/assets/img/avatar.png" alt="Profile picture" width="50" height="50" class="profile-picture rounded-circle border border-light border-5" />
                                                    </a>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="mt-3">
                                                        <span class="fw-bold"><?php echo $row_user["username"]; ?></span>
                                                    </div>
                                                    <div class="mt-3 ms-1">
                                                        <span class="fw-bold"><?php echo $row_user["l_name"]; ?></span>
                                                    </div>
                                                </div>
                                                <button class="mt-3 mb-2 btn btn-sm rounded-3 btn-primary bg-gradient" id="edit-userdetails-btn">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                            </div>

                                            <div class="mt-4 d-flex justify-content-center">
                                                <span class="fw-bold"><?php echo $row_user["email"]; ?></span>
                                            </div>

                                            <div class="mt-4 d-flex justify-content-center">
                                                <span>Joined: <?php echo date('d M Y', strtotime($row_user["created_at"])); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="card border mb-4 rounded-4 shadow-sm">
                                            <form class="row px-2 py-3 rounded-4 needs-validation" action="<?php echo $base_url; ?>/account/user/" method="POST" id="editUserDetailsForm" novalidate>
                                                <div class="form-floating col-sm-6 mb-3">
                                                    <input type="text" class="form-control form-control-sm edit-user-form-inputs bg-white rounded-4 border-top-0 border-start-0 border-end-0" value="<?php echo $row_user["username"]; ?>" name="edit_username" id="edit_username" placeholder="First name" autocomplete="off" maxlength="50" required readonly>
                                                    <label class="text-muted" for="edit_username">First name</label>
                                                    <span id="edit_username_err" class="invalid-tooltip"></span>
                                                </div>
                                                <div class="form-floating col-sm-6 mb-3">
                                                    <input type="text" class="form-control form-control-sm edit-user-form-inputs bg-white rounded-4 border-top-0 border-start-0 border-end-0" value="<?php echo $row_user["l_name"]; ?>" name="edit_lname" id="edit_lname" placeholder="Last name" autocomplete="off" maxlength="50" required readonly>
                                                    <label class="text-muted" for="edit_lname">Last name</label>
                                                    <span id="edit_lname_err" class="invalid-tooltip"></span>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control form-control-sm edit-user-form-inputs bg-white rounded-4 border-top-0 border-start-0 border-end-0" value="<?php echo $row_user["email"]; ?>" name="edit_user_email" id="edit_user_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required readonly>
                                                    <label class="text-muted" for="edit_user_email">Email address</label>
                                                    <span id="edit_user_email_err" class="invalid-tooltip"></span>
                                                </div>
                                                <div class="text-center">
                                                    <button class="w-50 mt-3 mb-2 btn rounded-3 py-2 btn-primary" id="pwd_reset_btn" onclick="editUserDetails();">
                                                        <span id="reset-pwd-spinner" style="display: none;">
                                                            <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                                                        </span>
                                                        <span id="reset-pwd-text">Submit</span>
                                                    </button>
                                                    <br>
                                                </div>
                                            </form>
                                            <div class="text-center">
                                                <button class="mt-3 mb-2 btn btn-sm rounded-3 py-2 btn-outline-primary" onclick="popResetPwdEmailEntryModal('edit_user_email');">
                                                    <span>Change password</span>
                                                </button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="subscriptions" role="tabpanel" aria-labelledby="subscriptions-tab">
                                <div class="row row-cols-1 row-cols-md-2 container-fluid mt-3 mb-5 py-2">
                                    <div class="col">
                                        <div class="card border mb-4 rounded-3 shadow-sm p-3">
                                            <div class="card-header bg-white border-bottom">
                                                <span class="fw-bold card-title">Current subscription</span>
                                            </div>
                                            <div class="mt-4 p-2 d-flex justify-content-between border rounded-4">
                                                <div>
                                                    <span class="fw-bold"><?php echo $row_sub["plan_name"]; ?></span>
                                                    <span><?php echo $row_sub["duration"]; ?></span>
                                                </div>
                                                <div class="vr"></div>
                                                <div>
                                                    <span>
                                                        Renewal:
                                                        <?php
                                                        if ($row_sub["date"]) {
                                                            $renew_date = date('d M Y', strtotime($row_sub["date"])) ?? "";
                                                        } else {
                                                            $renew_date = "<strong>Pending</strong>";
                                                        }

                                                        echo $renew_date;
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php if ($active_sub != 2) { ?>
                                                <div class="mt-4 d-flex justify-content-start">
                                                    <div class="p-0">
                                                        <a class="btn btn-primary" href="<?php echo $base_url; ?>/pricing">Upgrade</a>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="mt-4 d-flex justify-content-start">
                                                    <div class="p-0">
                                                        <a class="btn btn-primary" href="<?php echo $base_url; ?>/pricing">Change plan</a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="templates" role="tabpanel" aria-labelledby="templates-tab">
                                <div class="card bg-white shadow-sm">
                                    <div class="col-md-8 d-flex justify-content-center p-3">
                                        <input class="form-control rounded-pill me-2" id="temp_search_term" oninput="fetchSavedTemplates(current_page, 'search')" type="search" placeholder="Search here..." autocomplete="off">

                                        <select class="form-select form-select-sm bg-outline-white rounded-pill ms-2 w-50" id="content-type-filter" oninput="fetchSavedTemplates(current_page, 'search')">
                                            <option disabled selected>
                                                <?php if (empty($type)) : echo "Category";
                                                else : echo "<strong>" . $type . "</strong>";
                                                endif ?>
                                            </option>
                                            <?php
                                            $sql = "SELECT * FROM content_types ORDER BY id ASC";
                                            $rs = $mysqli->query($sql);
                                            foreach ($rs as $row) {
                                            ?>
                                                <option value="<?php echo $row['type'] ?>"><?php echo $row['full_name']; ?></option>
                                            <?php } ?>
                                        </select>

                                        <div class="d-flex justify-content-center align-items-center ms-3">
                                            <input type="hidden" name="filter" value="true">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <button id="filter-reset" class="btn btn-primary btn-sm rounded-pill mt-1" onclick="fetchSavedTemplates(current_page, 'list')">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border-0 mb-4 rounded-3 p-3" id="saved_templates_list"></div>
                            </div>
                            <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                                <div class="row row-cols-1 row-cols-md-2 container-fluid mb-5 py-2">
                                    <div class="col">
                                        <div class="card border mb-4 rounded-3 shadow-sm p-3">
                                            <div class="card-header bg-white border-bottom d-flex justify-content-between">
                                                <span class="fw-bold card-title">Linked WordPress account</span>
                                                <span>
                                                    <i class="bi bi-pencil-square mx-4" data-bs-toggle="tooltip" title="Edit WordPress credentials." type="button" onclick="updateWpCreds()"></i>
                                                    <i class="bi bi-trash3-fill text-danger" data-bs-toggle="tooltip" title="Unlink WordPress account." type="button"></i>
                                                </span>
                                            </div>
                                            <div class="mt-4 p-2 d-flex justify-content-between">
                                                <?php
                                                if ($row_wp["wp_url"]) {
                                                ?>
                                                    <div class="row">
                                                        <div class="form-floating mb-2">
                                                            <input type="url" class="form-control form-control-sm edit-wp-creds bg-white rounded-4 border-top-0 border-start-0 border-end-0" value="<?php echo $row_wp["wp_url"]; ?>" autocomplete="off" maxlength="100" readonly>
                                                            <label class="text-muted" for="wp-url-acc"><i class="bi bi-globe"></i> Site URL<sup><small>eg https://example.com</small></sup> *</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input type="text" class="form-control form-control-sm edit-wp-creds bg-white rounded-4 border-top-0 border-start-0 border-end-0" value="<?php echo $row_wp["wp_user"]; ?>" autocomplete="off" maxlength="50" readonly>
                                                            <label class="text-muted" for="wp-username-acc">Username/Email *</label>
                                                        </div>
                                                        <div class="form-floating mb-2">
                                                            <input type="password" class="form-control form-control-sm edit-wp-creds pass-input bg-white rounded-4 border-top-0 border-start-0 border-end-0" autocomplete="off" value="<?php echo $row_wp["wp_pass"]; ?>" maxlength="50" readonly>
                                                            <label class="text-muted" for="wp-pass-acc">WordPress password *</label>
                                                        </div>
                                                        <div class="d-flex justify-content-start my-3">
                                                            <div class="form-check mx-2">
                                                                <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitchWp">
                                                                <small class="form-check-label text-dark text-sm" for="showPassSwitchWp">
                                                                    Show password
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else { ?>

                                                    <p>You haven't linked any WordPress account yet.</p>

                                                    <div class="p-0">
                                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#saveWordPressCredsModal"><i class="bi bi-plus-circle"></i> Add</button>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">
                                <div class="mt-4 text-center">
                                    <p class="lead">Don't keep us to yourself</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($site_url); ?>&quote=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: "); ?><?php echo urlencode($site_url); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-facebook fs-5"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($site_url); ?>&text=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: "); ?><?php echo urlencode($site_url); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-twitter fs-5"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode($site_url); ?>&summary=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: "); ?><?php echo urlencode($site_url); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-linkedin fs-5"></i>
                                        </a>
                                        <a href="whatsapp://send?text=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: " . $site_url); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-whatsapp fs-5"></i>
                                        </a>
                                        <a href="https://www.reddit.com/submit?url=<?php echo urlencode($site_url); ?>&title=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: "); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-reddit fs-5"></i>
                                        </a>
                                        <a href="https://www.instagram.com/sharer/sharer.php?u=<?php echo urlencode($site_url); ?>&text=Hey,%20<?php echo urlencode("\r\n It's " . $row_user['username'] . " here. \r\n I'm using the superb " . $site_name . " for text generation nowadays. \r\n You should totally check it out here: "); ?><?php echo urlencode($site_url); ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-instagram fs-5"></i>
                                        </a>
                                        <a href="mailto:?subject=Have you heard about <?php echo $site_name; ?>&body=Hey, %0D%0A It's <?php echo $row_user['username']; ?> here.%0D%0AI'm using the superb <?php echo $site_name; ?> for text generation nowadays.%0D%0AYou should totally check it out here: <?php echo $site_url; ?>" class="btn btn-light mx-1">
                                            <i class="bi bi-envelope fs-5"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- WP credentials Modal -->
    <div class="modal py-5 p-1 fade" tabindex="-1" role="dialog" id="saveWordPressCredsModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content py-3 p-3 rounded-5 shadow">
                <div class="modal-header border-bottom-0">
                    <h1 class="modal-title fw-bold fs-5">Link WordPress account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-0">
                    <div class="row">
                        <div class="form-floating mb-2">
                            <input type="url" class="form-control form-control-sm bg-white rounded-4 border-top-0 border-start-0 border-end-0" id="wp-url-acc" value="<?php echo $row_wp["wp_url"]; ?>" autocomplete="off" maxlength="100" required>
                            <label class="text-muted" for="wp-url-acc"><i class="bi bi-globe"></i> Site URL<sup><small>eg https://example.com</small></sup> *</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control form-control-sm bg-white rounded-4 border-top-0 border-start-0 border-end-0" id="wp-username-acc" value="<?php echo $row_wp["wp_user"]; ?>" autocomplete="off" maxlength="50" required>
                            <label class="text-muted" for="wp-username-acc">Username/Email *</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password" class="form-control form-control-sm pass-input bg-white rounded-4 border-top-0 border-start-0 border-end-0" id="wp-pass-acc" autocomplete="off" value="<?php echo $row_wp["wp_pass"]; ?>" maxlength="50" required>
                            <label class="text-muted" for="wp-pass-acc">WordPress password *</label>
                        </div>
                        <div class="my-2">
                            <small tabindex="0" role="button" type="button" data-bs-toggle="popover" data-bs-html="true" title="" data-bs-content="                                                                
                                <p>Your password is used to verify your WordPress identity. We do not store your credentials (unless you want us to by checking the box below) and we only need them to authenticate requests to your
                                    WordPress account.</p>

                                <p>We use the XML-RPC API thus ensure it is enabled on your WordPress site and server. XML-RPC is usually enabled by default. Not sure? Follow
                                    <a href='https://codex.wordpress.org/XML-RPC_Support'
                                target='_blank' class='link-dark fw-bold'>this guide</a> to enable it.</p>" data-bs-original-title="Please note">
                                <span class="text-muted">Please note <i class="bi bi-info-circle-fill"></i></span>
                            </small>
                        </div>
                        <div class="d-flex justify-content-start my-3">
                            <div class="form-check mx-2">
                                <input class="form-check-input pass-toggle" type="checkbox" id="showPassSwitchWp">
                                <small class="form-check-label text-dark text-sm" for="showPassSwitchWp">
                                    Show password
                                </small>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" name="rem_wp" type="checkbox" id="wpCredConsent">
                                <small class="form-check-label text-dark text-sm" for="wpCredConsent">
                                    Store my WordPress credentials
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-column border-top-0">
                    <button type="button" class="btn btn-primary w-50 mx-0 mb-2" onclick="updateWpCreds('add')">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End WP credentials Modal -->

    <script type="text/javascript">
        // Handle nav tabs
        $('.nav-link').click(function(e) {
            const href = $(this).attr('href');
            if (href == `${base_url}/dashboard`) {
                location.href = href;
            }
            e.preventDefault();
            history.pushState({}, '', href);
            console.log("HISTORY.PUSH")
        });

        var titles = Class("shepherd-title");
        Array.prototype.slice.call(titles)
            .forEach((title) => {
                title.className = "bg-primary, text-white";
            });

        Id("edit-userdetails-btn").onclick = () => {
            Array.prototype.slice.call(Class("edit-user-form-inputs"))
                .forEach((el) => {
                    el.readOnly = false;
                });
            Id("edit_username").focus();
        }

        function editUserDetails() {
            $("#editUserDetailsForm").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
                e.stopImmediatePropagation(); // prevent multiple submission of the form.

                const form = $(this);
                const url = form.attr('action');

                const formData = form.serializeArray();
                formData.push({
                    name: "user",
                    value: user
                });
                formData.push({
                    name: "csrf_token",
                    value: csrf_token
                });

                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    success: (json) => {
                        const data = JSON.parse(json);
                        if (data.status == "SUCCESS") {
                            showToastMessage(data.status, "success");
                            Array.prototype.slice.call(Class("edit-user-form-inputs"))
                                .forEach((el) => {
                                    el.readOnly = true;
                                });
                        } else {
                            showToastMessage(`${data.status}: ${data.message}`, "danger");
                        }
                    },
                    error: function(error) {
                        showToastMessage(`Error: ${error}`, "danger");
                    }
                });
            });
        }

        function updateWpCreds(action) {

            if ($('#saveWordPressCredsModal').is(':hidden')) {
                $('#saveWordPressCredsModal').modal('show');
            }

            var sendInfo = {
                action: action,
                url: Id("wp-url-acc").value,
                username: Id("wp-username-acc").value,
                pass: Id("wp-pass-acc").value,
                csrf_token: csrf_token,
                user: user
            }

            if (Id("wpCredConsent").checked) {
                $.ajax({
                    type: "POST",
                    url: `${base_url}/account/wordpress/`,
                    data: JSON.stringify(sendInfo),
                    contentType: "application/json; charset=utf-8",
                    traditional: true,
                    success: (json) => {
                        const data = JSON.parse(json);
                        if (data.status == "SUCCESS") {
                            showToastMessage(data.status, "success");
                            $("#saveWordPressCredsModal").modal("hide");
                            location.reload();
                        } else {
                            showToastMessage(`${data.status}: ${data.message}`, "danger");
                        }
                    }
                })
            } else
                Id("wpCredConsent").focus();
        }
    </script>

<?php
} else {
    echo '<script type="text/javascript">window.location.href = "' . $base_url . '"</script>';
    exit;
}

include "../footer.php";

?>

<script>
    // Navigate to relevant tab
    const hash = window.location.hash; // "#details"
    const hashWithoutSymbol = hash.substring(1); // "details"

    const tabElementId = `${hashWithoutSymbol}-tab`; // Append "-tab" to tabValue
    const tabElement = Id(tabElementId);
    if (tabElement) {
        tabElement.click();
    }
</script>