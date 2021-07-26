<?php
if(!isset($_SESSION))
{
session_start();
}
include_once('../dbconnection.php');
//CHECK EMAIL ALREDY REGISTRED OR NOT

if (isset($_POST['email']) && (isset($_POST['type']))) {
  $email = $_POST['email']; 
  $type = $_POST['type'];
  if($type=="buyer"){
  $sql = "SELECT bu_email FROM buyer WHERE bu_email = '" . $email . "'";
  }
  else{
    $sql = "SELECT se_email FROM seller WHERE se_email = '" . $email . "'";
  }
  $result = $conn->query($sql);
  $row = $result->num_rows;
  echo ($row);
}


//Customer insertion
if(isset($_POST['usertype']) )
{
  $usertype = $_POST['usertype'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if($usertype=="buyer")
  {
    $sql = "INSERT INTO buyer(bu_fname, bu_lname, bu_email, bu_password)
    VALUES ('$fname','$lname','$email','$password')";
  }
  else
  {
    $sql = "INSERT INTO seller(se_fname, se_lname, se_email, se_password)
    VALUES ('$fname','$lname','$email','$password')";
  }
  
  if ($conn->query($sql) == TRUE) {
    echo json_encode("OK");
  } else {
    echo json_encode("FAILED");
  }
}

if (!isset($_SESSION['is_login'])) {
//Login Verification
  if (isset($_POST['logUsertype']) && isset($_POST['logEmail']) && isset($_POST['logPassword'])) {
    $logUsertype = $_POST['logUsertype'];
    $logEmail = $_POST['logEmail'];
    $logPassword = $_POST['logPassword'];
    if($logUsertype=="buyer"){
    $sql = "SELECT bu_email, bu_password FROM buyer WHERE bu_email = '" . $logEmail . "' AND bu_password = '" . $logPassword . "'";
    }
    else if($logUsertype=="seller"){
      $sql = "SELECT se_email, se_password FROM seller WHERE se_email = '" . $logEmail . "' AND se_password = '" . $logPassword . "'";
    }
    else if($logUsertype=="admin"){
      $sql = "SELECT admin_email, admin_password FROM administration WHERE admin_email = '" . $logEmail . "' AND admin_password = '" . $logPassword . "'";
      // echo ($sql);
    }
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if ($row === 1) {
      $_SESSION['is_login'] = true;
      if($logUsertype=="buyer"){
        
        $_SESSION['buyerEmail'] = $logEmail;
      }
      else if($logUsertype=="seller"){
        $_SESSION['sellerEmail'] = $logEmail;
      }
      else if($logUsertype=="admin"){
        $_SESSION['adminEmail'] = $logEmail;
      }
      echo json_encode($row);
      
    } else if ($row === 0) {
      echo json_encode($row);
    }
  }
}
?>