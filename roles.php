<?php
// error_reporting(0);

$user_email = $_SESSION["email"] ?? '';

class User
{
  public $id;
  public $email;
  public $username;
  public $verified;
  public $admin;
  public $superAdmin;

  public function __construct($email, $mysqli)
  {
    $sql = "SELECT id, email, username, l_name, admin, super_adm, verified, created_at FROM users WHERE users.email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $this->id = $user['id'];
    $this->email = $user['email'];
    $this->username = $user['username'];
    $this->verified = (bool) $user['verified'];
    $this->admin = (bool) $user['admin'];
    $this->superAdmin = (bool) $user['super_adm'];
  }
}

class Subscription
{
  public $activeSubscription;
  public $monthlyTokenLimit;
  public $monthlyTokenUsage;

  public function __construct($userId, $mysqli)
  {
    $sql = "SELECT users.id, users.verified, 
                users.monthly_token_usage, 
                subscriptions.plan, 
                subscriptions.status, 
                subscription_plans.name plan_name,
                subscription_plans.monthly_token_limit 
            FROM users 
            LEFT OUTER JOIN subscriptions ON users.id = subscriptions.user
            LEFT OUTER JOIN subscription_plans ON subscriptions.plan = subscription_plans.id
            WHERE users.id = ? AND users.verified <> '0' AND subscriptions.status = '1' ORDER BY subscriptions.id";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $subscription = $result->fetch_assoc();

    $this->activeSubscription = $subscription['plan'] == 1 ? 'deluxe' : ($subscription['plan'] == 2 ? 'express' : '');
    $this->monthlyTokenLimit = $subscription['monthly_token_limit'];
    $this->monthlyTokenUsage = $subscription['monthly_token_usage'];
  }
}

class AccessLevel
{
  private bool $verified;
  private bool $admin;
  private bool $superAdmin;

  public function __construct(User $user)
  {
    $this->verified = $user->verified;
    $this->admin = $user->admin;
    $this->superAdmin = $user->superAdmin;
  }

  public function isVerified(): bool
  {
    return $this->verified;
  }

  public function isAdmin(): bool
  {
    return $this->admin;
  }

  public function isSuperAdmin(): bool
  {
    return $this->superAdmin;
  }
}

if ($user_email) {
  $user = new User($user_email, $mysqli);
  $subscription = new Subscription($user->id, $mysqli);
  $access = new AccessLevel($user);

  // Store user and access level information in session
  $_SESSION['user'] = [
    'verified' => $user->verified,
    'admin' => $user->admin,
    'superAdmin' => $user->superAdmin
  ];
  $_SESSION['access_level'] = [
    'verified' => $access->isVerified(),
    'admin' => $access->isAdmin(),
    'superAdmin' => $access->isSuperAdmin()
  ];
} else {
  $user_id = "";
}

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