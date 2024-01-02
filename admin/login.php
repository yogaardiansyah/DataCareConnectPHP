<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" a href="img/login.png" type="image/gif">
  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    /* Font Family */
    body {
      font-family: "Roboto", sans-serif;
    }

    /* Font Weights */
    body {
      font-size: 14px;
      font-weight: 400;
      line-height: 1.6em;
    }

    /* Colors */
    body {
      background: linear-gradient(45deg, rgba(66, 183, 245, 0.8) 0%, rgba(66, 245, 189, 0.4) 100%);
      color: rgba(0, 0, 0, 0.6);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      display: none;
      background: rgba(0, 0, 0, 0.8);
      width: 100%;
      height: 100%;
    }

    .form {
      z-index: 15;
      position: relative;
      background: #FFFFFF;
      width: 600px;
      border-radius: 20px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
      box-sizing: border-box;
      margin: 150px auto 10px;
      overflow: hidden;
    }

    .form-toggle {
      z-index: 10;
      position: absolute;
      top: 60px;
      right: 60px;
      background: #FFFFFF;
      width: 60px;
      height: 60px;
      border-radius: 100%;
      transform-origin: center;
      transform: translate(0, -25%) scale(0);
      opacity: 0;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form-toggle:before,
    .form-toggle:after {
      content: '';
      display: block;
      position: absolute;
      top: 50%;
      left: 50%;
      width: 30px;
      height: 4px;
      background: #4285F4;
      transform: translate(-50%, -50%);
    }

    .form-toggle:before {
      transform: translate(-50%, -50%) rotate(45deg);
    }

    .form-toggle:after {
      transform: translate(-50%, -50%) rotate(-45deg);
    }

    .form-toggle.visible {
      transform: translate(0, -25%) scale(1);
      opacity: 1;
    }

    .form-group {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin: 0 0 20px;
    }

    .form-group:last-child {
      margin: 0;
    }

    .form-group label {
      display: block;
      margin: 0 0 10px;
      color: rgba(0, 0, 0, 0.6);
      font-size: 12px;
      font-weight: 500;
      line-height: 1;
      text-transform: uppercase;
      letter-spacing: .2em;
    }

    .form-group input {
      outline: none;
      display: block;
      background: rgba(0, 0, 0, 0.1);
      width: 100%;
      border: 0;
      border-radius: 4px;
      box-sizing: border-box;
      padding: 12px 20px;
      color: rgba(0, 0, 0, 0.6);
      font-family: inherit;
      font-size: inherit;
      font-weight: 500;
      line-height: inherit;
      transition: 0.3s ease;
    }

    .form-group input:focus {
      color: rgba(0, 0, 0, 0.8);
    }

    .form-group button {
      outline: none;
      background: #36B9CC;
      width: 100%;
      border: 0;
      border-radius: 4px;
      padding: 12px 20px;
      color: #FFFFFF;
      font-family: inherit;
      font-size: inherit;
      font-weight: 500;
      line-height: inherit;
      text-transform: uppercase;
      cursor: pointer;
    }

    .form-group.form-remember {
      font-size: 12px;
      font-weight: 400;
      letter-spacing: 0;
      text-transform: none;
    }

    .form-group.form-remember input[type='checkbox'] {
      display: inline-block;
      width: auto;
      margin: 0 10px 0 0;
    }

    .form-group.form-recovery {
      color: #4285F4;
      font-size: 12px;
      text-decoration: none;
    }

    .form-panel {
      padding: 60px calc(0% + 60px) 60px 60px;
      box-sizing: border-box;
    }

    .form-panel.one.hidden:before {
      content: '';
      display: block;
      opacity: 0;
      visibility: hidden;
      transition: 0.3s ease;
    }

    .form-header {
      margin: 0 0 40px;
    }

    .form-header h1 {
      padding: 4px 0;
      color: #4285F4;
      font-size: 24px;
      font-weight: 700;
      text-transform: uppercase;
    }

    .form-footer {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      width: 600px;
      margin: 20px auto 100px;
    }

    .form-footer a {
      color: #FFFFFF;
      font-size: 12px;
      text-decoration: none;
      text-shadow: 1px 2px 0 rgba(0, 0, 0, 0.1);
    }

    .form-footer a .material-icons {
      width: 12px;
      margin: 0 5px;
      vertical-align: middle;
      font-size: 12px;
    }

    .cp-fab {
      background: #FFFFFF !important;
      color: #4285F4 !important;
    }
  </style>

</head>

<body>
  <div class="overlay"></div>
  <div class="form">
    <div class="form-panel">
      <div class="form-header">
        <h1 class="text-info">Account Login</h1>
      </div>
      <div class="form-content">
        <!-- Make sure the action attribute is set to the correct URL for the login handler -->
        <form action="login_proses.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div class="form-group form-remember">
            <label>
              <input type="checkbox"> Remember Me
            </label>
            <a class="form-recovery text-info" href="#">Forgot Password?</a>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-secondary">Log In</button>
          </div>
        </form>
      </div>
    </div>


  </div>
  <?php
  if (isset($_GET['pesan'])) {
    $pesan = addslashes($_GET['pesan']);
    if ($pesan == "gagal") {

      echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
      echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
      echo "<p><center>Gagal Masuk Sebagai Admin</center></p>";
      echo   "</div>";
      echo "</div>";
    } else {
    }
  } else {
  }
  ?>
</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    var panelOne = $('.form-panel.two').height(),
      panelTwo = $('.form-panel.two')[0].scrollHeight;

    $('.form-panel.two').not('.form-panel.two.active').on('click', function(e) {
      e.preventDefault();

      $('.form-toggle').addClass('visible');
      $('.form-panel.one').addClass('hidden');
      $('.form-panel.two').addClass('active');
      $('.form').animate({
        'height': panelTwo
      }, 200);
    });

    $('.form-toggle').on('click', function(e) {
      e.preventDefault();
      $(this).removeClass('visible');
      $('.form-panel.one').removeClass('hidden');
      $('.form-panel.two').removeClass('active');
      $('.form').animate({
        'height': panelOne
      }, 200);
    });
  });
</script>

</body>

</html>