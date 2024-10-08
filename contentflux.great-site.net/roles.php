<?php

error_reporting(0);

$user_email = $_SESSION["email"] ?? '';

$_SESSION['csrf_token'] = bin2hex(random_bytes(24));

$active_sub = '';

// if ($user_email) {

$sql_user = "SELECT id, email, username, l_name, admin, super_adm, verified, created_at FROM users WHERE users.email = '$user_email'";
$rs_user = $mysqli->query($sql_user);
$row_user = $rs_user->fetch_assoc();

$user_id = $row_user['id'];
$username = $row_user['username'];
$adm_access = $row_user["admin"];
$superadm_access = $row_user["super_adm"];
$v_status = $row_user["verified"];

$sql_sub = "SELECT users.id, users.verified, 
            users.monthly_token_usage, 
            subscriptions.plan, 
            subscriptions.status, 
            subscription_plans.name plan_name,
            subscription_plans.monthly_token_limit 
            FROM users 
            LEFT OUTER JOIN subscriptions ON users.id = subscriptions.user
            LEFT OUTER JOIN subscription_plans ON subscriptions.plan = subscription_plans.id
            WHERE users.id = '$user_id' AND users.verified <> '0' AND subscriptions.status = '1' ORDER BY subscriptions.id";
$rs_sub = $mysqli->query($sql_sub);
$row_sub = $rs_sub->fetch_assoc();

if ($row_sub['plan'] == 1) {
  $active_sub = 1; //deluxe
} elseif ($row_sub['plan'] == 2) {
  $active_sub = 2; //express --best
}

$monthly_token_limit = $row_sub['monthly_token_limit'];
$monthly_token_usage = $row_sub['monthly_token_usage'];

class AccessLevel
{

  function isVerified()
  {
    global $v_status;
    if ($v_status === 1) {
      return true;
    } else {
      return false;
    }
  }

  function isAdmin()
  {
    global $adm_access;
    if ($adm_access == 1) {
      return true;
    } else {
      return false;
    }
  }

  function isSuperAdmin()
  {
    global $superadm_access;
    if ($superadm_access == 1) {
      return true;
    } else {
      return false;
    }
  }
}
// } else
//   $user_id = "";

$errorMessage = '
<div class="modal modal-sheet position-static d-block py-2 mt-5" tabindex="-1" role="dialog" id="modalSheet">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-6 shadow">
      <div class="modal-header custom-green-bg text-white card-header border-bottom-0">
        <h5 class="modal-title fw-bold">Blimey!</h5>        
      </div>
      <div class="modal-body py-0">
      <p class="p-1 fs-5">It seems you do not have the authorization required to do that. <br></p>
      </div>
      <div class="modal-footer flex-column border-top-0">        
        <a href="javascript:history.go(-1)"><button class="btn btn-dark"> &laquo Back</button></a>        
      </div>
    </div>
  </div>
</div>';


function barred()
{
  global $errorMessage;
  echo $errorMessage;
  exit;
}
