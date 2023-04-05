<?php 
require_once('./app/controller/UserController.php');
use App\Controller\UserController;
session_start();
if(!isset($_SESSION['user'])) {
    header('location:login.php');
    die;
}
include('./template/navbar.php');
?>
<div class="container pt-3">
    <h3>Welcome <?=$_SESSION['user']?> !</h3>
</div>

<div class="container pt-3">
    <h4>Please edit your profile!</h4>
</div>
<div class="card flex m-5 p-5 bg-secondary">
<?php
    if (isset($_POST["editProfile"])) {
        $userctr = new UserController();
        if (isset($_POST["password"])) {
            $userctr->updatePasswordByEmail($_SESSION['user'], $userctr->hashPassword($_POST["password"]));
            echo "Ihr Passwort wurde geändert.";
        }
    }
?>
<form method="post" target="_self" class="mb-2">
  <div class="form-group">
    <label for="exampleInputPassword1">Edit new password</label>
    <input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter new password" minlength="4">
  </div>

  <br>
  <button name="editProfile" type="submit" class="btn btn-primary">Save</button>
</form>
<form method="post" action="index.php">  
  <button name="deleteProfile" type="submit" class="btn btn-primary">Delete your profile</button>
</form>
</div>

<?php include('./template/footer.php'); ?>