
<!--This code is for Registration as user-->
<?php
    include "conn.php";
    session_start();


    if(isset($_POST['reg'])){

        $fullname=$_POST['fullname'];
        $address=$_POST['address'];
        $course=$_POST['course'];
        $contactnumber=$_POST['contactnumber'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $stud_num=$_POST['stud_num'];

        $validate=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        $val_num=mysqli_num_rows($validate);

        if($val_num <= 0){

            $insertusers=mysqli_query($conn, "INSERT INTO users VALUES ('0','$email','$pass','$stud_num','$fullname','$address','$course','$contactnumber')");

            if($insertusers == TRUE){
                ?>
                <script>
                    alert("Successfully Registered");
                    window.location.href="index.php";
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert("Error! Registration Failed Please try again!!");
                    window.location.href="index.php";
                </script>
                <?php
            }
        }else{
            ?>
                <script>
                    alert("Email or ID number is Already Used! Try another email");
                    window.location.href="index.php";
                </script>
                <?php
        }


    }


//login for admin

if(isset($_POST['login_admin'])){

    $id_number=$_POST['id_number'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $check_login = mysqli_query($conn, "SELECT * FROM admin1 WHERE email='$email' AND password='$pass'");
    $n = mysqli_num_rows($check_login);

    if($n <= 0){
        
        ?> <script>
            alert("Wrong Email or password!");
            window.location.href="index.php";
        </script>
        <?php
    }else{
        $_SESSION['email']=$email;
        ?> <script>
            alert("Welcome Admin!");
            window.location.href="admindashboard/adminhome.php";
        </script>
        <?php
    }

}

//end of admin login


//login for user

if(isset($_POST['login_user'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    


    $check_login = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    $n = mysqli_num_rows($check_login);

    if($n <= 0){
        ?> <script>
            alert("Wrong Email or password");
            window.location.href="index.php";
        </script>
        <?php
    }else{
        ?> <script>
            alert("Welcome User!");
            window.location.href="userdashboard/userhome.php";
        </script>
        <?php
    }

}
//end of login user








 if(isset($_POST['items'])){
    
    $pic = $_FILES['item_pic']['name'];
    $picTmpName =  $_FILES['item_pic']['tmp_name'];
    
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_desc'];
    $date_found = $_POST['date'];
    $item_status = $_POST['item_status'];
    
    $insert = mysqli_query($conn,"INSERT INTO items VALUES('0', '$user_email', '$pic','$item_name','$item_desc','$date_found','$item_status','','','','')");
    if($insert == true){
        move_uploaded_file($picTmpName,'uploads/'.$pic);
        
        /*
        ?>
            <script>
                alert("Item Posted Successfully!");
                window.location.href='additems.php';
            </script>
        <?php
        */
    }else{
        ?>
        <script>
            alert("Error Posting Item!");
            window.location.href='additems.php';
        </script>
    <?php 
    }
    


 }
 //end of adding for user
?>