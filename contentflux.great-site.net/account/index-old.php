<?php

include "../header.php";

// }
if ($signinStatus == 1) {
?>

    <div class="bg-light border-bottom mt-5 p-5">
        <div class="row p-1">
            <div class="col-md-2 m-1">
                <div class="py-5 bg-white rounded-3">
                    <nav class="nav flex-column">
                        <a class="nav-link fw-bold text-dark my-1 active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab"><i class="bi bi-person-circle"></i> Details</a>

                        <a class="nav-link fw-bold text-dark my-1" id="subscriptions-tab" data-bs-toggle="tab" data-bs-target="#subscriptions" type="button" role="tab"><i class="bi bi-credit-card-fill"></i> Subscriptions</a>

                        <a class="nav-link fw-bold text-dark my-1" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab"><i class="bi bi-list-stars"></i> Saved Items</a>

                        <a class="nav-link fw-bold text-dark my-1" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab"><i class="bi bi-gear"></i> Settings</a>

                        <a class="nav-link fw-bold text-dark my-1" id="accounts-tab" data-bs-toggle="tab" data-bs-target="#accounts" type="button" role="tab">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wordpress" viewBox="0 0 16 16">
                                <path d="M12.633 7.653c0-.848-.305-1.435-.566-1.892l-.08-.13c-.317-.51-.594-.958-.594-1.48 0-.63.478-1.218 1.152-1.218.02 0 .039.002.058.003l.031.003A6.838 6.838 0 0 0 8 1.137 6.855 6.855 0 0 0 2.266 4.23c.16.005.313.009.442.009.717 0 1.828-.087 1.828-.087.37-.022.414.521.044.565 0 0-.371.044-.785.065l2.5 7.434 1.5-4.506-1.07-2.929c-.369-.022-.719-.065-.719-.065-.37-.022-.326-.588.043-.566 0 0 1.134.087 1.808.087.718 0 1.83-.087 1.83-.087.37-.022.413.522.043.566 0 0-.372.043-.785.065l2.48 7.377.684-2.287.054-.173c.27-.86.469-1.495.469-2.046zM1.137 8a6.864 6.864 0 0 0 3.868 6.176L1.73 5.206A6.837 6.837 0 0 0 1.137 8z" />
                                <path d="M6.061 14.583 8.121 8.6l2.109 5.78c.014.033.03.064.049.094a6.854 6.854 0 0 1-4.218.109zm7.96-9.876c.03.219.047.453.047.706 0 .696-.13 1.479-.522 2.458l-2.096 6.06a6.86 6.86 0 0 0 2.572-9.224z" />
                                <path fill-rule="evenodd" d="M0 8c0-4.411 3.589-8 8-8 4.41 0 8 3.589 8 8s-3.59 8-8 8c-4.411 0-8-3.589-8-8zm.367 0c0 4.209 3.424 7.633 7.633 7.633 4.208 0 7.632-3.424 7.632-7.633C15.632 3.79 12.208.367 8 .367 3.79.367.367 3.79.367 8z" />
                            </svg>
                            Linked accounts
                        </a>

                        <a class="nav-link fw-bold text-dark my-1" id="share-tab" data-bs-toggle="tab" data-bs-target="#share" type="button" role="tab"><i class="bi bi-share-fill"></i> Share</a>

                        <a class="nav-link fw-bold text-dark my-1" href="<?php echo $base_url; ?>/dashboard"><i class="bi bi-speedometer"></i> Go to playground</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-9 rounded-3">
                <h3 id="title" class="ms-4 fw-bold">My Account</h3>
                <div class="row py-2 rounded-3">
                    <div class="tab-content" id="menuTabContent">
                        <div class="tab-pane fade show active mt-3" id="details" role="tabpanel" aria-labelledby="details-tab">

                            <div class="row row-cols-1 row-cols-md-2 text-center container-fluid mt-3 mb-5 py-2">
                                <!-- Deluxe -->
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
                                            <button class="mt-3 mb-2 btn rounded-4 btn-primary bg-gradient" id="pwd_reset_btn" onclick="popResetPwdEmailEntryModal();">
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
                                <!-- End Deluxe -->

                                <!-- Parakeet -->
                                <div class="col">
                                    <div class="card border-0 mb-4 rounded-3 shadow-sm">
                                        <form class="row px-2 py-3 rounded-3 needs-validation" action="" method="POST" id="editUserDetailsForm" novalidate>
                                            <div class="form-floating col-sm-6 mb-3">
                                                <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["username"]; ?>" name="edit_username" id="edit_username" placeholder="First name" autocomplete="off" maxlength="50" required>
                                                <label class="text-muted" for="edit_username">First name</label>
                                                <span id="edit_username_err" class="invalid-tooltip"></span>
                                            </div>
                                            <div class="form-floating col-sm-6 mb-3">
                                                <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["lname"]; ?>" name="edit_lname" id="edit_lname" placeholder="Last name" autocomplete="off" maxlength="50">
                                                <label class="text-muted" for="edit_lname">Last name</label>
                                                <span id="edit_lname_err" class="invalid-tooltip"></span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["email"]; ?>" name="edit_user_email" id="edit_user_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
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
                                            <button class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-outline-dark" onclick="popResetPwdEmailEntryModal('edit_user_email');">
                                                <span>Change account password</span>
                                            </button>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End parakeet -->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="subscriptions" role="tabpanel" aria-labelledby="subscriptions-tab">
                        <div class="row row-cols-1 row-cols-md-2 text-center container-fluid mt-3 mb-5 py-2">
                            <!-- Deluxe -->
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
                                        <button class="mt-3 mb-2 btn rounded-4 btn-primary bg-gradient" id="pwd_reset_btn" onclick="popResetPwdEmailEntryModal();">
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
                            <!-- End Deluxe -->

                            <!-- Parakeet -->
                            <div class="col">
                                <div class="card border-0 mb-4 rounded-3 shadow-sm">
                                    <form class="row px-2 py-3 rounded-3 needs-validation" action="" method="POST" id="editUserDetailsForm" novalidate>
                                        <div class="form-floating col-sm-6 mb-3">
                                            <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["username"]; ?>" name="edit_username" id="edit_username" placeholder="First name" autocomplete="off" maxlength="50" required>
                                            <label class="text-muted" for="edit_username">First name</label>
                                            <span id="edit_username_err" class="invalid-tooltip"></span>
                                        </div>
                                        <div class="form-floating col-sm-6 mb-3">
                                            <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["lname"]; ?>" name="edit_lname" id="edit_lname" placeholder="Last name" autocomplete="off" maxlength="50">
                                            <label class="text-muted" for="edit_lname">Last name</label>
                                            <span id="edit_lname_err" class="invalid-tooltip"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["email"]; ?>" name="edit_user_email" id="edit_user_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
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
                                        <button class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-outline-dark" onclick="popResetPwdEmailEntryModal('edit_user_email');">
                                            <span>Change account password</span>
                                        </button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="items" role="tabpanel" aria-labelledby="items-tab">
                        <div class="row row-cols-1 row-cols-md-2 text-center container-fluid mt-3 mb-5 py-2">
                            <!-- Deluxe -->
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
                                        <button class="mt-3 mb-2 btn rounded-4 btn-primary bg-gradient" id="pwd_reset_btn" onclick="popResetPwdEmailEntryModal();">
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
                            <!-- End Deluxe -->

                            <!-- Parakeet -->
                            <div class="col">
                                <div class="card border-0 mb-4 rounded-3 shadow-sm">
                                    <form class="row px-2 py-3 rounded-3 needs-validation" action="" method="POST" id="editUserDetailsForm" novalidate>
                                        <div class="form-floating col-sm-6 mb-3">
                                            <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["username"]; ?>" name="edit_username" id="edit_username" placeholder="First name" autocomplete="off" maxlength="50" required>
                                            <label class="text-muted" for="edit_username">First name</label>
                                            <span id="edit_username_err" class="invalid-tooltip"></span>
                                        </div>
                                        <div class="form-floating col-sm-6 mb-3">
                                            <input type="text" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["lname"]; ?>" name="edit_lname" id="edit_lname" placeholder="Last name" autocomplete="off" maxlength="50">
                                            <label class="text-muted" for="edit_lname">Last name</label>
                                            <span id="edit_lname_err" class="invalid-tooltip"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control edit-user-form-inputs rounded-4 border-top-0 border-start-0 border-end-0 border rounded-0" value="<?php echo $row_user["email"]; ?>" name="edit_user_email" id="edit_user_email" placeholder="name@example.com" autocomplete="off" maxlength="50" required>
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
                                        <button class="mt-3 mb-2 btn btn-sm rounded-4 py-2 btn-outline-dark" onclick="popResetPwdEmailEntryModal('edit_user_email');">
                                            <span>Change account password</span>
                                        </button>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <div class="row row-cols-3 g-2 mt-4">
                            Drinks
                        </div>
                    </div>
                    <div class="tab-pane fade" id="accounts" role="tabpanel" aria-labelledby="accounts-tab">
                        <div class="row row-cols-3 g-2 mt-4">
                            Extras
                        </div>
                    </div>
                    <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">
                        <div class="row row-cols-3 g-2 mt-4">
                            Accompaniments
                        </div>
                    </div>
                    <div class="tab-pane fade" id="beers" role="tabpanel" aria-labelledby="beers-tab">
                        <div class="row row-cols-3 g-2 mt-4">
                            Beers
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
                                // confirmButtonText: '<span data-bs-toggle="modal" data-bs-target="#newRegistrationModal">New registration <i class="bi bi-arrow-right"></i></span>',                    
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
    echo '<script type="text/javascript">window.location.href = history.back();</script>';
    exit;
}

include "../footer.php";

?>