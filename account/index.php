<?php

include "../header.php";

// }
if ($signinStatus == 1) {
?>

    <div class="border-bottom mt-5 p-5">
        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-white border rounded-5 shadow-sm" id="pillNav2" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill active" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Contact</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill active" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill" id="contact-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false" tabindex="-1">Contact</button>
            </li>
        </ul>
        <div class="row p-1">
            <div class="col-md-2 m-1">
                <div class="py-5 bg-white rounded-3">
                    <nav class="nav flex-column">
                        <a class="nav-link text-dark fw-bold my-1 active" id="details-tab" data-bs-toggle="tab" href="#details" role="tab" aria-current="page"><i class="bi bi-person-circle me-2"></i> Details</a>

                        <a class="nav-link text-dark fw-bold my-1" id="subscriptions-tab" data-bs-toggle="tab" href="#subscriptions" role="tab"><i class="bi bi-credit-card-fill me-2"></i> Subscriptions</a>

                        <a class="nav-link text-dark fw-bold my-1" id="templates-tab" data-bs-toggle="tab" href="#templates" role="tab" onclick="fetchSavedTemplates(current_page, 'list')"><i class="bi bi-list-stars me-2"></i> My templates</a>

                        <a class="nav-link text-dark fw-bold my-1" id="settings-tab" data-bs-toggle="tab" href="#settings" role="tab"><i class="bi bi-gear me-2"></i> Settings</a>

                        <a class="nav-link text-dark fw-bold my-1" id="accounts-tab" data-bs-toggle="tab" href="#accounts" role="tab">
                            <i class="bi bi-wordpress"></i>
                            Linked accounts
                        </a>

                        <a class="nav-link text-dark fw-bold my-1" id="share-tab" data-bs-toggle="tab" href="#share" role="tab"><i class="bi bi-share-fill me-2"></i> Share</a>

                        <a class="nav-link text-dark fw-bold my-1" href="<?php echo $base_url; ?>/dashboard"><i class="bi bi-speedometer me-2"></i> Dashboard</a>
                    </nav>
                </div>
            </div>

            <div class="col-md-8 rounded-3">
                <h3 id="title" class="ms-4 fw-bold">My Account</h3>
                <div class="row py-2 rounded-3">
                    <div class="tab-content" id="menuTabContent">
                        <div class="tab-pane fade show active mt-3" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row row-cols-1 row-cols-md-2 container-fluid mt-3 mb-5 py-2">
                                <div class="col">
                                    <div class="card border-0 mb-4 rounded-3 shadow-sm p-3">
                                        <div class="d-flex justify-content-between">
                                            <div class="mx-2">
                                                <a href="javascript: void()" class="nav-link p-0 text-muted">
                                                    <img src="<?php echo $base_url ?>/assets/img/avatar.png" alt="Profile picture" width="50" height="50" class="profile-picture rounded-circle border border-light border-5" />
                                                </a>
                                            </div>
                                            <div class="mx-2">
                                                <div class="mt-3">
                                                    <p class="fw-bold"><?php echo $row_user["username"]; ?></p>
                                                </div>
                                                <div class="mt-3">
                                                    <p class="fw-bold"><?php echo $row_user["lname"]; ?></p>
                                                </div>
                                            </div>
                                            <button class="mt-3 mb-2 btn rounded-4 btn-primary bg-gradient" id="pwd_reset_btn" onclick="editUserDetails();">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </button>
                                        </div>

                                        <div class="mt-4 d-flex justify-content-between">
                                            <div class="">
                                                <p class="fw-bold"><?php echo $row_user["email"]; ?></p>
                                            </div>
                                            <div class="vr"></div>
                                            <div class="">
                                                <p>Joined: <?php echo date('d M Y', strtotime($row_user["created_at"])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card border-0 mb-4 rounded-3 shadow-sm">
                                        <form class="row px-2 py-3 rounded-3 needs-validation" action="" method="POST" id="editUserDetailsForm" novalidate>
                                            <div class="form-floating col-sm-6 mb-3">
                                                <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["username"]; ?>" name="edit_username" id="edit_username" placeholder="First name" autocomplete="off" maxlength="50" required readonly>
                                                <label class="text-muted" for="edit_username">First name</label>
                                                <span id="edit_username_err" class="invalid-tooltip"></span>
                                            </div>
                                            <div class="form-floating col-sm-6 mb-3">
                                                <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["lname"]; ?>" name="edit_lname" id="edit_lname" placeholder="Last name" autocomplete="off" maxlength="50" required readonly>
                                                <label class="text-muted" for="edit_lname">Last name</label>
                                                <span id="edit_lname_err" class="invalid-tooltip"></span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["email"]; ?>" name="edit_user_email" id="edit_user_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required readonly>
                                                <label class="text-muted" for="edit_user_email">Email address</label>
                                                <span id="edit_user_email_err" class="invalid-tooltip"></span>
                                            </div>
                                            <input type="hidden" name="user" value="<?php echo $user_id; ?>">
                                            <div class="text-center">
                                                <button class="w-50 mt-3 mb-2 btn rounded-4 py-2 btn-primary" id="pwd_reset_btn" onclick="editUserDetails();">
                                                    <span id="reset-pwd-spinner" style="display: none;">
                                                        <span class="spinner-border spinner-border-sm text-white" role="status"></span>
                                                    </span>
                                                    <span id="reset-pwd-text">Submit</span>
                                                </button>
                                                <br>
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <button class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-outline-primary" onclick="popResetPwdEmailEntryModal('edit_user_email');">
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
                                    <div class="card border-0 mb-4 rounded-3 shadow-sm p-3">
                                        <div class="card-header bg-white border-bottom">
                                            <span class="fw-bold card-title">Current Subscription</span>
                                        </div>

                                        <div class="mt-4 d-flex justify-content-between bg-light">
                                            <div class="">
                                                <p class="fw-bold"><?php echo $row_sub["plan_name"]; ?></p>
                                                <p><?php echo $row_sub["duration"]; ?></p>
                                            </div>
                                            <div class="vr"></div>
                                            <div class="">
                                                <p>Renewed on: <?php echo date('d M Y', strtotime($row_sub["date"])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="templates" role="tabpanel" aria-labelledby="templates-tab">
                            <div class="card bg-white shadow-sm">
                                <div class="col-md-8 d-flex justify-content-center p-3">
                                    <input class="form-control rounded-pill me-2" id="temp_search_term" oninput="fetchSavedTemplates(current_page, 'search')" type="search" placeholder="Search here..." autocomplete="off">

                                    <select class="form-select form-select-sm bg-outline-white rounded-pill ms-2 w-50" name="type">
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
                                            <option value="<?php echo $row['type'] ?>>"><?php echo $row['full_name']; ?></option>
                                        <?php } ?>
                                    </select>

                                    <div class="d-flex justify-content-center align-items-center ms-3">
                                        <input type="hidden" name="filter" value="true">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button class="btn btn-primary btn-sm rounded-pill mt-1">Filter</button>
                                            <?php if (isset($_GET['filter'])) : ?>
                                                <a href="<?php echo $base_url . '/account'; ?>" class="btn btn-sm btn-white shadow-sm m-1"><i class="bi bi-arrow-return-left fw-bold"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white border-0 mb-4 rounded-3 shadow-sm p-3" id="saved_templates_list"></div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="row row-cols-3 g-2 mt-4">
                                Settings
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                            <div class="row row-cols-3 g-2 mt-4">
                                Linked accounts
                            </div>
                        </div>
                        <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">
                            <div class="row row-cols-3 g-2 mt-4">
                                Don't keep us to yourself
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function editUserDetails() {
            $("#editUserDetailsForm").submit(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form when submit button is clicked.
                e.stopImmediatePropagation(); // prevent multiple submission of the form.

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: base_url + "/signin/",
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
                                // confirmButtonText: '<span data-bs-toggle="modal" href="#newRegistrationModal">New registration <i class="bi bi-arrow-right"></i></span>',                    
                                // showCancelButton: true,
                                // cancelButtonText: 'Close'
                            });

                        } else if (data === "INVALID_PASSWORD") {
                            $("#password_err").show();
                            $("#password_err").html("Your password is incorrect");
                        } else if (data === "EMAIL_INEXISTENT") {
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
    </script>

<?php
} else {
    echo '<script type="text/javascript">window.location.href = "' . $base_url . '"</script>';
    exit;
}

include "../footer.php";

?>