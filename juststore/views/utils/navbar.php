
<nav class="navbar navbar-expand-md navbar-light bg-light custom-navbar">
    <div class="container">
    <a class="navbar-brand" href="/juststore">JustStore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form action="" method="GET" class="form-inline my-2 my-lg-0 flex-grow-1 mr-2">
        <div class="input-group w-100">
            <input type="text" class="form-control" name="search" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
        </form>

        <?php if($isLogin){ ?>
            
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="?page=cart" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>
            <li class="nav-item dropdown custom-dropdown">

                <div class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php if($user['profile']){echo $user['profile'];} else{ echo 'assets/profile/unknown.jpg';} ?>" class="avatar" alt="">
                    <span> <?php echo $user['name'] ?> </span>
                </div>
                    
                <div class="dropdown-menu r-0" aria-labelledby="navbarDropdownMenuLink">
                    <?php if($user['role'] == 'Customer'){ ?>
                        <a class="dropdown-item" href="?page=cart&tab=history">Shopping History</a>
                    <?php }else if($user['role'] == 'Admin' || $user['role'] == 'Staff'){ ?>
                        <a class="dropdown-item" href="?page=admin">Dashboard</a>
                    <?php } ?>
                        <a class="dropdown-item" href="?page=account">Account Setting</a>
                        <hr class="dropdown-line">
                        <a class="dropdown-item" href="user/logout.php">Logout</a>
                </div>
                
            </li>
        </ul>

        <?php 
            }else{ 
            include("views/utils/login.php");
        ?>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="btn btn-primary mr-2" id="btn-login" data-toggle="modal" data-target="#login">Login</a>
            </li>
            <li class="nav-item">
                <a href="" class="btn btn-outline-primary" id="btn-register" data-toggle="modal" data-target="#register">Register</a>
            </li>
        </ul>

        <?php } ?>
    </div>
    </div>

</nav>