<?php

require_once ("includes/header.php");

$the_message = '';
if ($session->is_signed_in()) {
  redirect("index.php");
}
if (isset($_POST['submit'])) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $user_found = User::verify_user($username, $password);

  if ($user_found) {
    $session->login($user_found);
    redirect("index.php");
  } else {
    $the_message = "Your password or username FAILED!";
  }
} else {
  $username = "";
  $password = "";
}
?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome to the BLOG!</h1>
                  </div>
                  <h5 style="color: red"><?php echo $the_message; ?></h5>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="username" placeholder="Enter your username here." value="<?php echo htmlentities($username); ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Enter your password here." value="<?php echo htmlentities($password); ?>">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" value="Login" class="btn btn-primary btn-user btn-block">
                    </div>
                  </form>
                </div>

                <?php require_once("includes/footer.php"); ?>