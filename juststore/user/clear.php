<?php

    session_start();

    if(isset($_SESSION['success'])){ unset($_SESSION['success']); }

    header("Location: ". $_SERVER['HTTP_REFERER']);

?>