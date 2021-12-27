<?php
session_start();

if (isset($_SESSION['uid'])) {
  echo "";
} else {
  header('location: ../login.php');
}

?>
<html>

<head>
  <title>Update Record</title>
  <link rel="stylesheet" href="../css/updatemark.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Flamenco" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>

<body>
  <header>
    <nav>
      <div class="row clearfix">
        <ul class="main-nav" animate slideInDown>
          <li><a href="../index.php"><b>HOME</b></a></li>
          <li><a href="aboutus.php"><b>ABOUT</b></a></li>
          <li><a href="contactus.php"><b>CONTACT</b></a></li>
          <li class="logout"><a href="admindash.php"><b>DASHBOARD</b></a></li>

        </ul>
      </div>
    </nav>
    <div class="main-content-header">
      <form method="post" action="updatemark.php">
        <table class="table1">
          <h1 align="center">Update Marks</h1>
          <tr align="left">
            <th>Class : </th>
            <td><input type="text" name="class" class="box" /></td>

            <th style="padding-right: 5px;">Rollno : </th>
            <td><input type="text" name="rollno" class="box" /></td>

          </tr>
          <tr align="left">
            <th><input type="submit" value="Search" name="submit" class="submit" /></th>
          </tr>

        </table>
        <table class="table2" style="margin-left: 280px; margin-top:2em; color:gainsboro;">
          <tr>
            <th class="student_id">Id</th>
            <th class="student_class">Name</th>
            <th class="student_class">Father's Name</th>
            <th class="student_class">Address</th>
            <th class="student_class">Class</th>
            <th class="student_class">Roll No</th>
            <th class="student_edit">Edit</th>
          </tr>
          <?php
          if (isset($_POST['submit'])) {
            include('../dbcon.php');
            $class = $_POST['class'];
            $rollno = $_POST['rollno'];

            $sql = "SELECT * FROM `student_data` WHERE `u_class`='$class'  AND `u_rollno`='$rollno' ";
            $run = mysqli_query($con, $sql);
            if (mysqli_num_rows($run) < 0) {
          ?>
              <script>
                alert('No Record Found');
              </script>
              <?php
            } else {

              while ($data = mysqli_fetch_assoc($run)) {

              ?>
                <tr>
                  <th class="student_class2"> <?php echo $data['id'] . '<br>'; ?></th>
                  <th class="student_class2"> <?php echo $data['u_name'] . '<br>'; ?></th>
                  <th class="student_class2"> <?php echo $data['u_father'] . '<br>'; ?></th>
                  <th class="student_class2"> <?php echo $data['u_village'] . '<br>'; ?></th>
                  <th class="student_class2"> <?php echo $data['u_class'] . '<br>'; ?></th>
                  <th class="student_class2"> <?php echo $data['u_rollno'] . '<br>'; ?></th>
                  <th class="student_class2"><a href="updatemark_form.php?sid=<?php echo $data['u_rollno']; ?>">Edit</a></th>

                </tr>

          <?php
              }
            }
          }

          ?>
        </table>
      </form>
    </div>
  </header>

</body>

</html>