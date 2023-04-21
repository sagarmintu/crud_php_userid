<?php
require 'config.php';
if(!empty($_SESSION["id"]))
{
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Record Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container lgout">
        <h4 class="welcome">Welcome <span class="name_user"><?php echo $row["name"]; ?><span>
          <a href="logout.php" class="btn btn-default btn-sm"><button><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</button></a>
      </h4>
    </div>

    <div class="container">

        <div class="mt-4">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
            Open modal
            </button>
        </div>

        <h2 class="text-danger d-flex justify-content-center">All Records</h2>
        <div id="record_contant">

        </div>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="addForm">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-group">
                      <label> Firstname: </label>
                      <input type="text" name="" id="firstname" class="form-control" placeholder="Enter FirstName">
                    </div>

                    <div class="form-group">
                      <label> Lastname: </label>
                      <input type="text" name="" id="lastname" class="form-control" placeholder="Enter LastName">
                    </div>

                    <div class="form-group">
                      <label> Email Id: </label>
                      <input type="email" name="" id="email" class="form-control" placeholder="Enter Email Id">
                    </div>

                    <div class="form-group">
                      <label> Mobile : </label>
                      <input type="text" name="" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal" onclick="addRecord()">Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </form>

                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal" id="update_modal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">AJAX CRUD OPERATION</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="editForm">
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="form-group">
                      <label> Firstname: </label>
                      <input type="text" name="" id="update_firstname" class="form-control" placeholder="Enter FirstName">
                    </div>

                    <div class="form-group">
                      <label> Lastname: </label>
                      <input type="text" name="" id="update_lastname" class="form-control" placeholder="Enter LastName">
                    </div>

                    <div class="form-group">
                      <label> Email Id: </label>
                      <input type="email" name="" id="update_email" class="form-control" placeholder="Enter Email Id">
                    </div>

                    <div class="form-group">
                      <label> Mobile : </label>
                      <input type="text" name="" id="update_mobile" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateUserDetails()">Update</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <input type="hidden" name="" id="hidden_user_id">
                  </div>
                </form>

                </div>
            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>

        $(document).ready(function()
        {
            readRecords();
        });

        function readRecords()
        {
            var readrecord = "readrecord";
            $.ajax({
                url: "backend.php",
                type: "post",
                data: { readrecord: readrecord },
                success: function(data,status){
                    $("#record_contant").html(data);
                }
            });
        }


        function addRecord()
        {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();

            $.ajax({
                url: "backend.php",
                type: "post",
                data: { firstname: firstname,
                    lastname: lastname,
                    email: email,
                    mobile: mobile
                },
                success: function(data,status){
                    readRecords();
                    $("#addForm")[0].reset();
                }
            });
        }

        function DeleteUser(deleteid)
        {
            var conf = confirm(" Are You Sure? ");
            if(conf == true)
            {
                $.ajax({
                    url: "backend.php",
                    type: "post",
                    data: { deleteid: deleteid },
                    success: function(data,status){
                        readRecords();
                    }
                });
            }
        }

        function GetUserDetails(id)
        {
            $("#hidden_user_id").val(id);

            $.post("backend.php", { id: id}, function(data,status){
                var user = JSON.parse(data);
                $("#update_firstname").val(user.firstname);
                $("#update_lastname").val(user.lastname);
                $("#update_email").val(user.email);
                $("#update_mobile").val(user.mobile);
            });

            $('#update_modal').modal("show");
        }

        function updateUserDetails()
        {
            var firstnameUpdate = $("#update_firstname").val();
            var lastnameUpdate = $("#update_lastname").val();
            var emailUpdate = $("#update_email").val();
            var mobileUpdate = $("#update_mobile").val();

            var hidden_user_idUpdate = $("#hidden_user_id").val();

            $.post("backend.php", 
                { 
                    hidden_user_idUpdate: hidden_user_idUpdate, 
                    firstnameUpdate: firstnameUpdate,
                    lastnameUpdate: lastnameUpdate,
                    emailUpdate: emailUpdate,
                    mobileUpdate: mobileUpdate,
                },
                function(data,status)
                {
                    $('#update_modal').modal("hide");
                    readRecords();
                    $("#editForm")[0].reset();
                }
            );
        }

    </script>

  </body>
</html>
