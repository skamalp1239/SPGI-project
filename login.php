<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="verify.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group">
                    <p>Please select the images that contain a cat:</p>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="1"><img src="images/cat1.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="2"><img src="images/cat5.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="3"><img src="images/cat3.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="4"><img src="images/cat4.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="5"><img src="images/cat2.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="6"><img src="images/cat6.jpg">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="7"><img src="images/cat7.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="8"><img src="images/cat8.jpg">
                        </div>
                        <div class="col-xs-4">
                            <input type="checkbox" name="cat_images[]" value="9"><img src="images/cat3.jpg">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cat_question">What is your favourite car model?</label>
                    <input type="text" class="form-control" name="cat_question_answer" required>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i
                                class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="password_forgot.php">I forgot my password</a><br>
            <a href="signup.php" class="text-center">Register a new membership</a><br>
            <a href="index.php"><i class="fa fa-home"></i> Home</a>
        </div>

    </div>

    <?php include 'includes/scripts.php' ?>
</body>

</html>