<?php
    include "conn.php";

    $ref_id = $_GET['id'];



    $delete = mysqli_query($conn, "DELETE FROM items WHERE id='$ref_id'");
    if($delete == true){    

    ?>
    <script>
        alert("Data is  Deleted!");
        window.location.href="additems.php";
    </script>
    <?php


    }else{
    ?>
        <script>
            alert("Error  in Deleting!");
            window.location.href="additems.php";
        </script>
        <?php
    }

?>