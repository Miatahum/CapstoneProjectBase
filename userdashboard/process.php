<?php 

 include '../conn.php';

 if(isset($_POST['items'])){

    $pic = $_FILES['item_pic']['name'];
    $picTmpName =  $_FILES['item_pic']['tmp_name'];
    $user_email = $_POST['user_email'];
    $item_name = $_POST['item_name'];
    $item_desc = $_POST['item_desc'];
    $date_found = $_POST['date'];
    $item_status = $_POST['item_status'];

    $insert = mysqli_query($conn,"INSERT INTO items VALUES('0','$pic', '$item_name','$item_desc','$date_found','$item_status','','','','','$user_email')");
    if($insert == true){
        move_uploaded_file($picTmpName,'../uploads/'.$pic);
        
        ?>
            <script>
                alert("Item Posted Successfully!");
                window.location.href='userupload.php';
            </script>
        <?php

    }else{
        ?>
        <script>
            alert("Error Posting Item!");
            window.location.href='userupload.php';
        </script>
    <?php 
    }
    


 }

?>