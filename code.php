<?php include('dbconfig.php'); ?>
<?php 
    
    // add data 
    if(isset($_POST['register_btn'])){
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone_number'];

        $query = "INSERT INTO register (fname,lname,email,password,phone) VALUES ('$fname','$lname','$email','$password','$phone')";
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            // echo "Registerd Successfully";
            $_SESSION['status'] = "Registerd/Inserted Successfully"; 
            $_SESSION['status_code'] = "success"; 
            header('Location:index.php');   
        }else{
            // echo "Someting Want Wrong";
            $_SESSION['status'] = "Data Not Registerd/Inserted"; 
            $_SESSION['status_code'] = "error"; 
            header('Location:register.php');
        }
    }

    // update data 
    if(isset($_POST['register_update_btn'])){
        $update_id = $_POST['edit_id'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone_number'];

        $query_update = "UPDATE register SET fname='$fname',lname='$lname',email='$email',password='$password',phone='$phone' WHERE id='$update_id'";
        $query_update_run = mysqli_query($conn, $query_update);
        
        if($query_update_run){
            // echo "Data Updated";
            $_SESSION['status'] = "Data Updated Successfully"; 
            $_SESSION['status_code'] = "success";
            header("Location:index.php");
        }else{
            // echo "Data Not Updated";
            $_SESSION['status'] = "Data Not Updated"; 
            $_SESSION['status_code'] = "error";
            header("Location:index.php");
        }

    }
    // delete data 
    if(isset($_POST['register_delete_btn'])){
        $delete_id = $_POST['delete_id'];

        $reg_query = "DELETE FROM register WHERE id='$delete_id'";
        $reg_query_run = mysqli_query($conn, $reg_query);

        if($reg_query_run){
            // echo "Data Deleted";
            $_SESSION['status'] = "Data Deleted Successfully"; 
            $_SESSION['status_code'] = "success";
            header("Location:index.php");
        }else{
            // echo "Data Not Deleted";
            $_SESSION['status'] = "Data Not Deleted Successfully";  
            $_SESSION['status_code'] = "error";
            header("Location:index.php");
        }
    }

    // delete confirm 
    if(isset($_POST['delete_btn_set'])){
        $del_id = $_POST['delete_id'];

        $reg_query = "DELETE FROM register WHERE id='$del_id'";
        $reg_query_run = mysqli_query($conn, $reg_query);
    }
?>