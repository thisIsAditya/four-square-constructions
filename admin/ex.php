<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN | EDIT COURSE</title>

  <?php
  if (!isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION['is_admin_login'])) {
    header('location:../index.php');
  }


  include('./admininclude/header.php');
  include('../dbConnection.php');

  if (isset($_REQUEST['courseUpdateBtn'])) {
  //checking for empty feild
  // echo "clicked";
  if (($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "") || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_origional_price'] == "") || ($_REQUEST['course_price'] == "")) {
  $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } else {
  $cid = $_REQUEST['course_id'];
  $cname = $_REQUEST['course_name'];
  $cdesc = $_REQUEST['course_desc'];
  $cauthor = $_REQUEST['course_author'];
  $cduration = $_REQUEST['course_duration'];
  $corigionalprice = $_REQUEST['course_origional_price'];
  $cprice = $_REQUEST['course_price'];
  $cimg = '../image/courseimg/' . $_FILES['course_img']['name'];

  $sql = "UPDATE course SET course_id='$cid',course_name='$cname',course_desc='$cdesc',course_author='$cauthor',course_img='$cimg',course_duration='$cduration',course_price='$cprice',course_origional_price='$corigionalprice'
  WHERE course_id = '$cid'";
  if ($conn->query($sql) == TRUE) {
  $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Course Updated Successfully....!</div> ';
  } else {
  $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update....!</div> ';
  }
  }
  }


  ?>


  <div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update New Course</h3>

    <?php

    if (isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM course WHERE  course_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }

    ?>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="course_id">Course Id</label>
        <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if (isset($row['course_id'])) {
                                                                                          echo $row['course_id'];
                                                                                        } ?>" readonly>
      </div>

      <div class="form-group">
        <label for="course_name">Course Name</label>
        <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if (isset($row['course_name'])) {
                                                                                              echo $row['course_name'];
                                                                                            } ?>">
      </div>
      <div class="form-group">
        <label for="course_desc">Course Description</label>
        <textarea type="text" class="form-control" id="course_desc" name="course_desc" row="2"><?php if (isset($row['course_desc'])) {
                                                                                                  echo $row['course_desc'];
                                                                                                } ?></textarea>
      </div>
      <div class="form-group">
        <label for="course_author">Course Author</label>
        <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if (isset($row['course_author'])) {
                                                                                                  echo $row['course_author'];
                                                                                                } ?>">
      </div>
      <div class="form-group">
        <label for="course_duration">Course Duration</label>
        <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if (isset($row['course_duration'])) {
                                                                                                      echo $row['course_duration'];
                                                                                                    } ?>">
      </div>

      <div class="form-group">
        <label for="course_origional_price">Course Origional Price</label>
        <input type="text" class="form-control" id="course_origional_price" name="course_origional_price" value="<?php if (isset($row['course_origional_price'])) {
                                                                                                                    echo $row['course_origional_price'];
                                                                                                                  } ?>">
      </div>
      <div class="form-group">
        <label for="course_price">Course Selling Price</label>
        <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if (isset($row['course_price'])) {
                                                                                                echo $row['course_price'];
                                                                                              } ?>">
      </div>
      <div class="form-group">
        <label for="course_img">Course Image</label>
        <img src="<?php if (isset($row['course_img'])) {
                    echo $row['course_img'];
                  } ?>" class="img-thumbnail"></img>
        <input type="file" class="form-control-file" id="course_img" name="course_img">
      </div>

      <div class="text_center">
        <button type="submit" class="btn btn-danger" id="courseUpdateBtn" name="courseUpdateBtn">Update</button>
        <a href="courses.php" class="btn btn-secondary">Close</a>
      </div>
      <?php
      if (isset($msg)) {
        echo $msg;
      }
      ?>
    </form>
  </div>

  </div>
  </div>
  <?php
  include('./admininclude/footer.php'); ?>
  </body>

</html>