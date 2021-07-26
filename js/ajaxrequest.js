$(document).ready(function () {
  //AJAX CALL FROM ALREDY EXIST EMAIL VARIFICATION
  $("#email").on("blur", function () {
    var email = $("#email").val();
    var type = $("#usertype").val();
    // console.log(email);
    // console.log(type);
    $.ajax({
      url: 'addcustomer/addcustomer.php',
      method: 'POST',
      data: {
        email: email,
        type: type,
      },
      success: function (data) {
        // console.log(data);
        if (data != 0) {
          $("#statusMsg3").html('<small style="color:red;">Email Already Registered !</small>');
          $("#regBtn").attr("disabled", true)
        }
        else if (data == 0) {
          $("#statusMsg3").html('<small style="color:green;">  </small>');
          $("#regBtn").attr("disabled", false)
        }
      },
    });
  });
});

function addCustomer()
{
  var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var usertype = $("#usertype").val();
  var fname = $("#fname").val();
  var lname = $("#lname").val();
  var email = $("#email").val();
  var password = $("#password").val();


  if (fname.trim() == "") {
    $("#statusMsg1").html('<small style="color:red;"> Please Enter Your First Name</small>');
    $("#fname").focus();
    return false;
  }
  else if (lname.trim() == "") {
    $("#statusMsg2").html('<small style="color:red;"> Please Enter Your Last Name</small>');
    $("#lname").focus();
    return false;
  }
  else if (email.trim() == "") {
    $("#statusMsg3").html('<small style="color:red;"> Please Enter Your Email</small>');
    $("#email").focus();
    return false;
  }else if (email.trim() != "" && !reg.test(email))
  {
    $("#statusMsg3").html('<small style="color:red;"> Please Enter valid Email eg. example@xyz.com</small>');
    $("#email").focus();
    return false;
  }
  else if (password.trim() == "") {
    $("#statusMsg4").html('<small style="color:red;"> Please Enter Your Password</small>');
    $("#password").focus();
    return false;
  }else{
  $.ajax(
    {
      url:'addcustomer/addcustomer.php',
      method: 'POST',
      dataType: "json",
      data: {
        usertype: usertype,
        fname: fname,
        lname: lname,
        email: email,
        password: password,
      },
      success:function(data){
        console.log(data)
        if (data == "OK") {
          // $("#successMsg").html("<span class='alert alert-success'> Registration Sucessful !</span>");
          clearRegField()
          $("#successMsg").html('<span class ="spinner-border text-success" role="status"></span>');
          setTimeout(() => {
            window.location.href = "index.php";
          }, 1000)
        }
        else if (data == "FAILED") {
          $("#successMsg").html("<span class='alert alert-danger'> Registration Failed !</span>");
        }
      }
    }
  )
}
}

//EMPTY FORM FIELDS
function clearRegField() {
  $("#RegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
  $("#statusMsg4").html(" ");
}

//Customer Login
function loginCustomer()
{
  var logUsertype = $("#logUsertype").val();
  var logEmail = $("#logEmail").val(); 
  var logPassword= $("#logPassword").val();
  $.ajax(
    {
      url:'addcustomer/addcustomer.php',
      method: 'POST',
      data: {
        logUsertype: logUsertype,
        logEmail: logEmail,
        logPassword: logPassword,
      },
      success: function(data)
      {
        console.log(data);
        if (data == 0) {
          $("#statusLogMsg").html('<small class ="alert alert-danger">Invalid Email ID or Password</small>');
          clearLoginField()
        }
        else if (data == 1) {
          $("#statusLogMsg").html('<div class ="spinner-border text-success" role="status"></div>');
          setTimeout(() => {
            window.location.href = "./index.php";
          }, 1000)
        }
      },
    }
  )
}
//EMpty login feild
function clearLoginField() {
  $("#loginForm").trigger("reset");
}