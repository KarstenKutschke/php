<?php

use App\View\RegisterView;

include('./template/navbar.php'); 
require_once('./app/view/RegisterView.php');
 $registerView = new RegisterView();
 $registerView->validateUserPost();
 $userExist = $registerView->checkIfUserExisted();
 //var_dump($userExist);
 
 if(!$userExist)
 {  
  $registerView->register();  
 }
?>

<div class="container pt-3">
    <h3>Registration</h3>
</div>

<div class="card flex m-5 p-5 bg-secondary bg-opacity-10">

<form  method="post" target="_self">
<?=$registerView->component?>
  <div class="form-group">

    <label for="exampleInputEmail1">E-Mail address</label>
    <input  name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input  name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" minlength="4">
  </div>

  <br>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

<?php include('./template/footer.php'); ?>