<?php
    $tab = isset($_GET['tab']) ? $_GET['tab'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
?>

<div class="container-fluid">
<div class="row">

<?php 
    include("sidebar.php");
    if($tab=='user' && $user['role']=='admin'){
        if($id){
            include("edituser.php");
        }else{
            include("user.php");
        }
    }else if($tab=='slider' && $user['role']=='admin'){
        include("slider.php");
    }else if($tab=='courier'){
        include("courier.php");
    }else if($tab=='category'){
        include("category.php");
    }else{
        if($id){
            include('productDetail.php');
        }else{
            include('product.php');
        }
    }
?>

</div>
</div>