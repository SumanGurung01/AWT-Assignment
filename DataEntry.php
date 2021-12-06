<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Entry</title>

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Varela+Round&display=swap" rel="stylesheet">
  </head>
  <body>

    <header align="center" style="background-color:white; border-radius:9px; padding:9px; font-size:30px; font-family: 'Cantarell', sans-serif;">
      Student Data Entry
    </header>

    <br>

    <div class="login_page">
      <form class="form" align="center" action="DataEntry.php" method="post">

        <br>
        Registration Number <br><input type="text" name="reg" placeholder="Registration Number" required>
        <br><br>
        Name <br><input type="text" name="name" placeholder="Name" required>
        <br><br>
        Marks (0ut of 100)
        <br><input type="number" name="Mark1" placeholder="Mark 1" required>
        <br>
        <br><input type="number" name="Mark2" placeholder="Mark 2" required>
        <br>
        <br><input type="number" name="Mark3" placeholder="Mark 3" required>
        <br>
        <br><br>
        <input type="submit" class="submit_btn" value="Save Record" name="addrecord">
        <br>

        <?php

          if(array_key_exists('addrecord', $_POST))
          {
              addrec();
          }

          function addrec()
          {
              $reg_no = $_POST['reg'];
              $name = $_POST['name'];
              $m1 = $_POST['Mark1'];
              $m2 = $_POST['Mark2'];
              $m3 = $_POST['Mark3'];


              $conn = new mysqli('localhost','root','','logindetails');
              $sql = "select * from studentdetail where RegistrationNumber='$reg_no'";

              $result = mysqli_query($conn,$sql) or die(mysqli_error());
              $num = mysqli_num_rows($result);

              if($num==0)
              {
                $sql = "insert into studentdetail(RegistrationNumber,Name,Mark1,Mark2,Mark3) values('$reg_no','$name','$m1','$m2','$m3')";

                $result = mysqli_query($conn,$sql) or die(mysqli_error());

                echo "Record Saved" ;

              }
              else
              {
                echo "Record Already Exist";
              }
          }
        ?>
      </form>

    </div>


  </body>
</html>
