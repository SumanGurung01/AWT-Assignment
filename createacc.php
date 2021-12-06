<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Account</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Varela+Round&display=swap" rel="style">
  </head>
  <body>

  <div align="center" class="login_page">

    <form class="form" action="createacc.php" method="post">
      <h1>Create Account</h1>
      <br>
      User ID <br><input type="text" name="new_userid" id="new_userid" placeholder="Registration Number" required>
      <br><br>
      Password <br><input type="password" name="new_pass" id="new_pass" placeholder="Password" required>
      <br><br>
      <input type="submit" class="submit_btn" value="Create Account" name="new_submit">
      <br>
    </form>
    <?php

      if(array_key_exists('new_submit', $_POST))
      {
          createacc();
      }

      function createacc()
      {
        $new_reg_no = $_POST['new_userid'];
        $new_pass = $_POST['new_pass'];

        $conn = new mysqli('localhost','root','','logindetails');
        $sql = "select *from validuser where registration='$new_reg_no'";
        $result = mysqli_query($conn,$sql) or die(mysqli_error());
        $num = mysqli_num_rows($result);

        if($num==0)
        {
          $sql = "insert into validuser(registration,password) values('$new_reg_no','$new_pass')";

          $result = mysqli_query($conn,$sql) or die(mysqli_error());

          header('location:index.php');
        }
        else
        {
          echo "This Username is already Taken" ;
        }
      }

    ?>

  </div>
  </body>
</html>
