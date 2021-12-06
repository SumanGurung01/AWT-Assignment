<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Retrival</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cantarell&family=Varela+Round&display=swap" rel="stylesheet">
  </head>

  <body style="background-color:#433d3d;" >

    <header align="center" style="background-color:white; border-radius:9px; padding:9px; font-size:30px; font-family: 'Cantarell', sans-serif;">
      Student Data Retrival
    </header>

    <br>

    <div align="center" style="background-color:white; margin-left:30%; margin-right:30%; padding:19px; border-radius:9px;">

          <form class="form" action="DataRetrival.php" method="post">
            Registration Number <br><input type="text" id="reg" name="reg" placeholder="Registration Number" required>
            <br><br><input type="submit" name="seeresult" value="View Detail">
            <br><br><input type="submit" name="update" value="Update">
            <br><br><input type="submit" name="average" value="Average">

          </form>

          <br>

          <div style="font-family: 'Cantarell', sans-serif;">

            <?php

            if(array_key_exists('seeresult', $_POST))
            {
                see();
            }

            if(array_key_exists('update', $_POST))
            {
                update();
            }

            if(array_key_exists('average', $_POST))
            {
                avg();
            }

              function see()
              {
                $reg_no = $_POST['reg'];
                //
                $conn = new mysqli('localhost','root','','logindetails');
                $sql = "select * from studentdetail where RegistrationNumber='$reg_no'";
                //
                $result = mysqli_query($conn,$sql) or die(mysqli_error());
                $num = mysqli_num_rows($result);
                //
                if($num!=0)
                {
                   $detail = mysqli_fetch_assoc($result);
                   echo nl2br("Registration Number : ${detail['RegistrationNumber']}\n");
                   echo nl2br("Name : ${detail['Name']}\n");
                   echo nl2br("Mark 1 : ${detail['Mark1']}\n");
                   echo nl2br("Mark 2 : ${detail['Mark2']}\n");
                   echo nl2br("Mark 3 : ${detail['Mark3']}\n");
                }
                else
                {
                  echo "No Record Found";
                }
              }


              function avg()
              {
                $reg_no = $_POST['reg'];
                //
                $conn = new mysqli('localhost','root','','logindetails');
                $sql = "select * from studentdetail where RegistrationNumber='$reg_no'";
                //
                $result = mysqli_query($conn,$sql) or die(mysqli_error());
                $num = mysqli_num_rows($result);
                //
                if($num!=0)
                {
                   $detail = mysqli_fetch_assoc($result);
                   echo nl2br("Mark 1 : ${detail['Mark1']}\n");
                   echo nl2br("Mark 2 : ${detail['Mark2']}\n");
                   echo nl2br("Mark 3 : ${detail['Mark3']}\nAverage Marks : ");
                   echo ($detail['Mark1']+$detail['Mark2']+$detail['Mark3'])/3;
                }
                else
                {
                  echo "No Record Found";
                }
              }


              function update()
              {
                $reg_no = $_POST['reg'];
                //
                $conn = new mysqli('localhost','root','','logindetails');
                $sql = "delete from studentdetail where RegistrationNumber='$reg_no'";
                //
                $result = mysqli_query($conn,$sql) or die(mysqli_error());
                //$num = mysqli_num_rows($result);
                //
                if($result==True)
                {
                  header('location:DataEntry.php');
                }
                else
                {
                  echo "No Record Found";
                }
              }

             ?>

          </div>
        </div>

  </body>
</html>
