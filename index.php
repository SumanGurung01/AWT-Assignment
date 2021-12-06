<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>StudentLogin</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Varela+Round&display=swap" rel="stylesheet">

    </script>
  </head>
  <body>

    <div align="center" class="login_page">

      <form class="form" action="index.php" method="post">

        <h1>Login</h1>
        <br>
        User ID <br><input type="text" name="userid" id="userid" placeholder="Registration Number" required>
        <br><br>
        Password <br><input type="password" name="pwd" id="pass" placeholder="Password" required>
        <br>
        New User <a href="createacc.php">create account</a>
        <br><br>
        <input type="submit" class="submit_btn" value="Login" name="login_btn">
        <br>

        <?php
          if(array_key_exists('login_btn', $_POST))
          {
              @login();
          }

          function login()
          {
            $reg_no = $_POST['userid'];
            $pass = $_POST['pwd'];

            $conn = new mysqli('localhost','root','','logindetails');
            $sql = "select * from validuser where registration='$reg_no'";

            $result = mysqli_query($conn,$sql) or die(mysqli_error());

            $data = mysqli_fetch_assoc($result);
            $password = $data['password'];

            if($pass==$password)
            {
              header('location:Student.php');
            }

            echo "Invalid User ID or Password";

          }

        ?>

      </form>

    </div>

  </body>
</html>
