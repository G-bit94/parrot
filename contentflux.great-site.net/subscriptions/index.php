<?php

include '../header.php';

//Column sorting on column name
$orderBy = array('dealer_name', 'username', 'service_name', 'sales_region', 'serial_no', 'mobigo', 'created_at');
$order = 'subscriptions.id';
if (isset($_GET['order']) && in_array($_GET['order'], $orderBy)) {
    $order = $_GET['order'];
}

//Column sort order
$sortBy = array('ASC', 'DESC');
$sort = 'DESC';
if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
    if ($_GET['sort'] == 'ASC') {
        $sort = 'DESC';
    } else {
        $sort = 'ASC';
    }
}

$dealer = $mysqli->real_escape_string($_GET['dealer'] ?? '');
$reg_by = $mysqli->real_escape_string($_GET['reg_by'] ?? '');
$region = $mysqli->real_escape_string($_GET['region'] ?? '');
$date_from = $mysqli->real_escape_string($_GET['date_from'] ?? '');
$date_to = $mysqli->real_escape_string($_GET['date_to'] ?? '');
$date = $mysqli->real_escape_string($_GET['date'] ?? '');

$search = $mysqli->real_escape_string(trim($_GET['search']) ?? '');

$where = "users.verified = '1'";

if (isset($_GET['filter']) && $_GET['filter'] === "true") {
    $where = "WHERE registrations.id <> '0'";
}

if (!empty($_SESSION["email"])) {
    if (!$access->isAdmin()) {
        $where .= " AND users.id = '$user_id'";
    }
} else {
    $where = "WHERE registrations.id = '0'";
}

if (!empty($search)) {
    $where .= "AND CONCAT (dealers.name, 
       registrations.line,
       registrations.mobigo,
       registrations.line, 
       registrations.serial_no, 
       regions.region,
       users.username)
       LIKE '%" . $search . "%'";
}


if (!empty($dealer)) {
    $where .= " AND dealers.name = '$dealer'";
}

if (!empty($reg_by)) {
    $where .= " AND users.username = '$reg_by'";
}

if (!empty($region)) {
    $where .= " AND regions.region = '$region'";
}

if (!empty($date)) {
    $where .= " AND registrations.date = '$date'";
}

if (!empty($date_from)) {
    $where .= " AND registrations.date >= '$date_from'";
}

if (!empty($date_to)) {
    $where .= " AND registrations.date <= '$date_to'";
}

//Pagination
if (isset($_GET['pageno'])) {
    $pageno = $mysqli->real_escape_string($_GET['pageno']);
} else {
    $pageno = 1;
}

if (isset($_GET['numtablerows'])) {
    $numtablerows = $mysqli->real_escape_string($_GET['numtablerows']);
}

$offset = ($pageno - 1) * $numtablerows;

$sql_count_pages = "SELECT users.id AS user_id, users.username, subscription_plans.name, subscriptions.duration, subscription_plans.id AS plan_id, subscriptions.unique_id AS ref FROM `subscriptions`
INNER JOIN users ON subscriptions.user = users.id
INNER JOIN subscription_plans ON subscriptions.plan = subscription_plans.id
GROUP BY users.id $where ORDER BY $order $sort";

$sql_offset .= "LIMIT $offset, $numtablerows";

$sql = "$sql_count_pages $sql_offset";

$result = $mysqli->query($sql);

if ($result_count = $mysqli->query($sql_count_pages)) {
    $total_pages = ceil(($result_count->num_rows) / $numtablerows);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['keys_array'])) {
        $serials_array = $_POST["serials_array"];
        $lines_array = $_POST["lines_array"];
        $mobigos_array = $_POST["mobis_array"];
        $keys_array = $_POST["keys_array"];

        if ($access->isAdmin()) {
            foreach (array_combine($keys_array, $lines_array) as $item => $line) {
                $sql = "UPDATE registrations SET line = '$line' WHERE registrations.id = '$item' ";
                $mysqli->query($sql);
            }
            foreach (array_combine($keys_array, $serials_array) as $item => $serial) {
                $sql = "UPDATE registrations SET serial_no = '$serial' WHERE registrations.id = '$item' ";
                $mysqli->query($sql);
            }
            foreach (array_combine($keys_array, $mobigos_array) as $item => $mobigo) {
                $sql = "UPDATE registrations SET mobigo = '$mobigo' WHERE registrations.id = '$item' ";
                $mysqli->query($sql);
            }
            if ($mysqli->query($sql) === true) :
                // $state =  "<h5 class='col-8 p-2 text-success bg-light text-center rounded'>Updated successfully!</h5>";
                $state = 1;
                echo "<script>setTimeout(\"location.replace('');\",1500);</script>";
            else : $state = 0;
            endif;
        } else {
            barred();
        }
    }
}

?>

<div id="wrapper" class="container">
    <div class="col-md-12 mt-4 mb-4">
        <div class="card">
            <div class="card-header shadow-sm rounded d-flex justify-content-between">
                <span class="fs-5 fw-bold rounded-2" id="title">
                    <?php if (isset($_GET['filter'])) : ?>
                        <strong>Line activations</strong>
                    <?php else : ?>
                        <strong>Lines registered today | <?php echo date('d M Y'); ?></strong>
                    <?php endif; ?>
                </span>
                <span>
                    <a class="btn btn-sm btn-white shadow-sm m-1" href="<?php echo $base_url; ?>"> <i class="bi bi-grid"></i> Browse list </a>
                    <button class="btn btn-sm btn-outline-dark shadow-sm m-1" onclick="handleRegistrationBtn();"><i class="bi bi-plus-circle"></i> Add new</button>
                </span>
            </div>
        </div>

        <div class="d-flex justify-content-center col-md-10 m-2">
            <?php if ($state === 1) { ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                </svg>
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <strong>Successfully saved!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php }
            if ($state === 0) { ?>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <strong>Oops!&nbsp;</strong> Something went wrong. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
        </div>

        <?php if (!empty($_SESSION["email"])) : ?>
            <form class="border-bottom mt-3" action="" method="GET">
                <div id="filtersarea">
                    <span class="d-flex justify-content-start row px-3">
                        <div class="col-md-2 mb-2 p-1">
                            <select class="form-select btn-outline-dark rounded-pill" name="dealer">
                                <option disabled selected>
                                    <?php if (empty($dealer)) : echo "Dealer";
                                    else : echo "<strong>" . $dealer . "</strong>";
                                    endif ?>
                                </option>
                                <?php
                                $sql = "SELECT name FROM dealers ORDER BY name ASC";
                                $rs = $mysqli->query($sql);
                                foreach ($rs as $row) {
                                ?>
                                    <option><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php if ($access->isAdmin()) : ?>
                            <div class="col-md-2 mb-2 p-1">
                                <select class="form-select btn-outline-dark rounded-pill" name="reg_by">
                                    <option disabled selected>
                                        <?php if (empty($reg_by)) : echo "BA";
                                        else : echo "<strong>" . $reg_by . "</strong>";
                                        endif ?>
                                    </option>
                                    <?php
                                    $sql = "SELECT username FROM users WHERE super_adm <> '1' ORDER BY username ASC";
                                    $rs = $mysqli->query($sql);
                                    foreach ($rs as $row) {
                                    ?>
                                        <option><?php echo $row['username']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php endif ?>
                        <div class="col-md-2 mb-2 p-1">
                            <select class="form-select btn-outline-dark rounded-pill" name="region">
                                <option disabled selected>
                                    <?php if (empty($region)) : echo "Region";
                                    else : echo "<strong>" . $region . "</strong>";
                                    endif ?>
                                </option>
                                <?php
                                $sql = "SELECT region FROM regions ORDER BY region ASC";
                                $rs = $mysqli->query($sql);
                                foreach ($rs as $row) {
                                ?>
                                    <option><?php echo $row['region']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-5 mx-2 d-flex justify-content-between">
                            <div class="col-md-8 row rounded">
                                <div class="col-md p-1 bg-light rounded">
                                    <label class="form-label m-2">Date range <i class="bi bi-calendar-week-fill"></i></label>
                                    <span class="d-flex justify-content-between">
                                        <input class="form-control form-control-white m-2" type="text" placeholder="From" onfocus="(this.type='date')" onfocusout="(this.type='text')" name="date_from" autocomplete="off" value="<?php
                                                                                                                                                                                                                                    if (!empty($date_from)) : echo date("d M Y", strtotime($date_from));
                                                                                                                                                                                                                                    endif
                                                                                                                                                                                                                                    ?>">
                                        <input class="form-control form-control-white m-2" type="text" placeholder="To" onfocus="(this.type='date')" onfocusout="(this.type='text')" name="date_to" autocomplete="off" value="<?php
                                                                                                                                                                                                                                if (!empty($date_to)) : echo date("d M Y", strtotime($date_to));
                                                                                                                                                                                                                                endif
                                                                                                                                                                                                                                ?>">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4 row rounded">
                                <div class="col-md p-1 bg-light rounded">
                                    <label class="form-label m-2">Daily <i class="bi bi-calendar-week-fill"></i></label>
                                    <span class="d-flex justify-content-between">
                                        <input class="form-control form-control-white m-2" type="text" placeholder="Pick a date" onfocus="(this.type='date')" onfocusout="(this.type='text')" name="date" autocomplete="off" value="<?php
                                                                                                                                                                                                                                    if (!empty($date)) : echo date("d M Y", strtotime($date));
                                                                                                                                                                                                                                    endif
                                                                                                                                                                                                                                    ?>">
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center px-3">
                                <input type="hidden" name="filter" value="true">
                                <div class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-sm rounded-pill custom-green-bg text-white m-1"> Apply</button>
                                    <?php if (isset($_GET['filter'])) : ?>
                                        <a href="<?php echo $base_url; ?>" class="btn btn-sm btn-white shadow-sm m-1"><i class="bi bi-arrow-return-left fw-bold"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </span>
                </div>
            </form>
        <?php endif ?>
    </div>

    <?php if (!empty($_SESSION["email"])) : ?>
        <span class="d-flex justify-content-between">
            <?php if (!empty($result)) { ?>
                <span class="p-2 mb-3 shadow-sm bg-white btn btn-sm text-dark rounded">
                    <?php
                    echo "<span id='result_count'>" . $result_count->num_rows . "</span>" . " " . "results - Page " . $pageno . " of " . $total_pages;
                    ?>
                </span>
            <?php } ?>
            <span class="p-1">
                <div class="btn-group">
                    <button class="btn btn-white btn-sm dropdown-toggle shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        No of rows
                    </button>
                    <ul class="dropdown-menu shadow">
                        <?php
                        for ($x = 10; $x <= 100; $x += 10) {
                        ?>
                            <li><a class="dropdown-item active bg-dark" href="<?php echo $new_url . '&numtablerows=' . $x; ?>"><?php echo $x; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </span>
            <div class="form-check form-switch mt-3">
                <input class="form-check-input" type="checkbox" checked onclick="toggleFilters()">
                <label class="form-check-label" for="flexswitch">Filters</label>
            </div>
        </span>
    <?php endif ?>

    <form action="" method="POST">
        <span class="d-flex justify-content-between">
            <span class="d-flex justify-content-between mb-2">
                <div id="submitComponent" class="d-flex justify-content-end m-1"></div>
                <div id="discardComponent" class="d-flex justify-content-end m-1"></div>
            </span>
        </span>

        <div id="table-wrapper" class="table-responsive">
            <table class="table table-hover align-middle overflow-auto">
                <thead>
                    <tr class="text-white">
                        <th class="custom-green-bg rounded-start"></th>
                        <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=dealer_name&sort=' . $sort; ?>">User<i class='bi bi-sort-up'></i></a></th>
                        <?php if ($access->isAdmin() || $access->isSuperAdmin()) { ?>
                            <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=username&sort=' . $sort; ?>">Email<i class='bi bi-sort-up'></i></a></th>
                        <?php } ?>
                        <th class='custom-green-bg'>Phone</th>
                        <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=serial_no&sort=' . $sort; ?>">Plan<i class='bi bi-sort-up'></i></a></th>
                        <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=mobigo&sort=' . $sort; ?>">Duration<i class='bi bi-sort-up'></i></a></th>
                        <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=sales_region&sort=' . $sort; ?>">Verified<i class='bi bi-sort-up'></i></a></th>
                        <th class='custom-green-bg'><a class='text-white boring' href="<?php echo $script . '?&order=created_at&sort=' . $sort; ?>">Subscription Date/Time<i class='bi bi-sort-up'></i></a></th>
                        <th class="custom-green-bg rounded-end" colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows == 0) { ?>
                        <tr id="nil_records_row" class="text-center rounded-3 card-body shadow-sm">
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                            <?php if (empty($user_id)) { ?>
                                <td class="my-2 py-5 border-bottom-0 text-center">
                                    <strong>You're signed out</strong><br>
                                    <span class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#signinModal"> Signin</span>
                                </td>
                            <?php } else { ?>
                                <td id="no_results_cell" class="my-2 py-5 border-bottom-0 text-center">
                                    <strong><i class="bi bi-emoji-smile-upside-down"></i> No results found</strong>
                                </td>
                            <?php } ?>
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                            <td class="border-bottom-0"></td>
                        </tr>
                        <?php
                    } else {
                        $x = 1;
                        foreach ($result as $row) {
                        ?>

                            <tr class="spacer" style="height: 6px;"><input type="hidden" name="keys_array[]" value="<?php echo $row["regId"]; ?>" /></tr>
                            <tr class="rounded-3 card-body shadow-sm reg-rows">
                                <td class="p-1 border-end border-bottom-0 text-center counter">
                                    <?php
                                    echo $x;
                                    $x++;
                                    ?>
                                </td>
                                <td class="p-1 border-0"><?php echo $row["dealer_name"]; ?></td>
                                <?php if ($access->isAdmin() || $access->isSuperAdmin()) { ?>
                                    <td class="p-1 border-0">
                                        <input class="border-0 rounded" name="bas_array[]" autocomplete="off" value="<?php echo $row["username"]; ?>" readonly>
                                    </td>
                                <?php } ?>
                                <td class="p-1 border-0">
                                    <input class="border-0 rounded item-input" onclick="editRegEntry();" autocomplete="off" name="lines_array[]" value="<?php echo $row["line"]; ?>" readonly>
                                </td>
                                <td class="p-1 border-0">
                                    <input class="border-0 rounded item-input" onclick="editRegEntry();" autocomplete="off" name="serials_array[]" value="<?php echo $row["serial_no"]; ?>" readonly>
                                </td>
                                <td class="p-1 border-0">
                                    <input class="border-0 rounded item-input" onclick="editRegEntry();" autocomplete="off" name="mobis_array[]" value="<?php echo $row["mobigo"]; ?>" readonly>
                                </td>
                                <td class="p-1 border-0"><?php echo $row["sales_region"]; ?></td>
                                <td class="p-1 border-0">
                                    <small>
                                        <?php
                                        $reg_date = date("Y-m-d", strtotime($row["date"]));
                                        if ($reg_date === $today) {
                                            echo "Today";
                                        } else {
                                            echo date("d M", strtotime($row["date"]));
                                        }
                                        // echo date("d M", strtotime($row["date"])); 
                                        ?>
                                        <br>
                                        <?php echo date("H:i", strtotime($row["time"])); ?>
                                    </small>
                                </td>
                                <td class="p-1 rounded-end border-0">
                                    <div class="form-check">
                                        <input class="form-check-input position-static" onclick="" name="some_action[]" value="" data-bs-toggle="tooltip" title="Click to approve" type="checkbox">
                                    </div>
                                </td>
                                <!-- <td class="rejectable p-1 border-0"><span class="btn btn-sm border-danger text-danger req-status" onclick="location.href=''">Reject</span></td> -->
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="d-flex justify-content-between">
        <ul class="pagination shadow-sm m-2">
            <li class="page-item"><a class="page-link text-dark" href="<?php echo $new_url . '&pageno=1' ?>"><i class="bi bi-caret-left-square-fill"></i></a></li>
            <li class="page-item <?php if ($pageno <= 1) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link text-dark" href="<?php if ($pageno <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo $new_url . "&pageno=" . ($pageno - 1);
                                                        } ?>"><i class="bi bi-caret-left-fill"></i>
                </a>
            </li>
            <li class="page-item bg-dark">
                <a class="page-link bg-dark text-white" href="#"><?php echo $pageno ?></a>
            </li>
            <li class="page-item <?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link text-dark" href="<?php if ($pageno >= $total_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo $new_url . "&pageno=" . ($pageno + 1);
                                                        } ?>"><i class="bi bi-caret-right-fill"></i>
                </a>
            </li>
            <li class="page-item <?php if ($pageno >= $total_pages) {
                                        echo 'disabled';
                                    } ?>">
                <a class="page-link text-dark" href="<?php echo $new_url . '&pageno=' . $total_pages; ?>"><i class="bi bi-caret-right-square-fill"></i></a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    if (window.innerWidth < 767) {
        filtersarea.style.display = 'none';
    } else filtersarea.style.display = 'block';
</script>

<?php
include '../footer.php';
?>