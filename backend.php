<?php
require 'config.php';
$id = $_SESSION['id'];

extract($_POST);

if(isset($_POST['readrecord']))
{
    $data = '<table class="table table-bordered table-striped">
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Edit Action</th>
                <th>Delete Action</th>
            </tr>';

    $display_query = " SELECT * FROM crudtable WHERE user_id = $id ";
    
    $result = mysqli_query($conn,$display_query);

    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_array($result))
        {
            $data .= '<tr>
                    <td>'.$number.'</td>
                    <td>'.$row['firstname'].'</td>
                    <td>'.$row['lastname'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['mobile'].'</td>
                    <td>
                        <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                    </td>
                    <td>
                        <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                    </td>
            </tr>';
            $number++;
        }
    }
    $data .= '</table>';
    echo $data;
}


if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile']))
{
    $insert_query = " INSERT INTO `crudtable`(`user_id`, `firstname`, `lastname`, `email`, `mobile`) VALUES ('$id', '$firstname','$lastname','$email','$mobile') ";

    mysqli_query($conn,$insert_query);
}


if(isset($_POST['deleteid']))
{
    $userid = $_POST['deleteid'];
    $delete_query = " DELETE FROM `crudtable` WHERE id = '$userid' ";
    mysqli_query($conn,$delete_query);
}

if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    $user_id = $_POST['id'];
    $query = " SELECT * FROM `crudtable` WHERE id = '$user_id' ";
    if (!$result = mysqli_query($conn,$query)) 
    {
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data Not Found !!!";
    }
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request !!!";
}

if(isset($_POST['hidden_user_idUpdate']))
{
    $hidden_user_idUpdate = $_POST['hidden_user_idUpdate'];
    $firstnameUpdate = $_POST['firstnameUpdate'];
    $lastnameUpdate = $_POST['lastnameUpdate'];
    $emailUpdate = $_POST['emailUpdate'];
    $mobileUpdate = $_POST['mobileUpdate'];

    $update_query = " UPDATE `crudtable` SET `firstname`='$firstnameUpdate',`lastname`='$lastnameUpdate',`email`='$emailUpdate',`mobile`='$mobileUpdate' WHERE id = '$hidden_user_idUpdate' ";

    mysqli_query($conn,$update_query);

}

?>