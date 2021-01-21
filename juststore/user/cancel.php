<?php

    session_start();

    if(isset($_SESSION['error'])){ unset($_SESSION['error']); }

    header("Location: ". $_SERVER['HTTP_REFERER']);

?>