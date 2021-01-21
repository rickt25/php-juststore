<?php

    session_start();

    if(isset($_SESSION['isLogin'])){ unset($_SESSION['isLogin']); }
    if(isset($_SESSION['user'])){ unset($_SESSION['user']); }

    header("Location: http://localhost/juststore");

?>