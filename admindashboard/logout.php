<?php 

    session_start();
    session_destroy();

?>
<script>
    alert("Logout Thank you for visiting FindIt!");
    window.location.href='../index.php';
</script>