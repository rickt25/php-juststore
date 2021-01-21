<?php
    session_start();

    include('model/User.php');
    include('model/Slider.php');
    include('model/Courier.php');
    include('model/Category.php');
    include('model/Product.php');
    include('database/Database.php');

    $database = new Database();

    $isLogin = isset($_SESSION['isLogin']) ? true : false;  // true atau false
    $user = isset($_SESSION['user']) ? $_SESSION['user'] : false;
    $success = isset($_SESSION['success']) ? $_SESSION['success'] : false;

    $page = isset($_GET['page']) ? $_GET['page'] : '';
    $tab = isset($_GET['tab']) ? $_GET['tab'] : '';
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if($page == 'admin' && !($user['role'] == 'Admin' || $user['role'] == 'Staff')){
        header('Location: http://localhost/juststore');
    }else if($page == 'Account' && !$isLogin){
        header('Location: http://localhost/juststore');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustStore</title>
    <script src="https://kit.fontawesome.com/709c2275fc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="stylesheet" href="assets/tokenize/tokenize.css">

</head>
<body>
    <?php 
        include("views/utils/navbar.php");
    ?>

    <!-- CONTENT -->
    
    <?php 
        if($page == 'admin'){
            include("views/pages/dashboard.php");
        }else if($page == 'account'){
            include("views/pages/account.php");
        }else if($page == 'detail'){
            include("views/pages/detail.php");
        }else if($page == 'cart'){
                include("views/pages/cart.php");
        }else if($category){
            include("views/pages/filter.php");
        }else if($search){
            include("views/pages/search.php");
        }else{
            include("views/pages/landing.php");
        }
    ?>

    
`   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/tokenize/tokenize.js"></script>
    <script>
        <?php if(isset($_SESSION['error']['register'])){ ?>
            document.getElementById("btn-register").click();
        <?php }else if(isset($_SESSION['error']['login'])){ ?>
            document.getElementById("btn-login").click();
        <?php }else if(isset($_SESSION['error']['addUser'])){ ?>
            document.getElementById("btn-addUser").click();
        <?php }else if(isset($_SESSION['error']['slider'])){ ?>
            document.getElementById("btn-addslider").click();
        <?php }else if(isset($_SESSION['error']['courier'])){ ?>
            document.getElementById("btn-addcourier").click();
        <?php }else if(isset($_SESSION['error']['category'])){ ?>
            document.getElementById("btn-addcategory").click();
        <?php }else if(isset($_SESSION['error']['transaction'])){ ?>
            document.getElementById("cart-tab").click();
        <?php }else if(isset($_SESSION['error']['change'])){ ?>
            document.getElementById("btn-changepass").click();
        <?php } ?>

        <?php if(isset($tab) && $tab=='history'){ ?>
            document.getElementById("history-tab").click();
        <?php } ?>
        
        
        <?php if(isset($_SESSION['isRegister'])){ ?>
            document.getElementById("btn-login").click();
        <?php } ?>

        $('.category').tokenize2();

        function number_format (number, decimals, decPoint, thousandsSep) { 
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

            var toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
                .toFixed(prec)
            }

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
            if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
            }
            if ((s[1] || '').length < prec) {
            s[1] = s[1] || ''
            s[1] += new Array(prec - s[1].length + 1).join('0')
            }

            return s.join(dec)
        }

        function increment_quantity(cart_id,price) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            var newQuantity = parseInt($(inputQuantityElement).val())+1;
            var newPrice = newQuantity * price;
            save_to_db(cart_id, newQuantity, newPrice);
        }

        function decrement_quantity(cart_id,price) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            if($(inputQuantityElement).val() > 1) 
            {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            var newPrice = newQuantity * price;
            save_to_db(cart_id, newQuantity, newPrice);
            }
        }

        function save_to_db(cart_id, new_quantity, newPrice) {
            var inputQuantityElement = $("#input-quantity-"+cart_id);
            var priceElement = $("#cart-price-"+cart_id);
            $.ajax({
                url : "user/updateQty.php",
                data : "cart_id="+cart_id+"&qty="+new_quantity,
                type : 'post',
                success : function(response) {
                    $(inputQuantityElement).val(new_quantity);
                    $(priceElement).text("Rp. "+newPrice);
                    var totalQuantity = 0;
                    $("input[id*='input-quantity-']").each(function() {
                        var cart_quantity = $(this).val();
                        totalQuantity = parseInt(totalQuantity) + parseInt(cart_quantity);
                    });
                    $("#total-quantity").text(totalQuantity);
                    var totalItemPrice = 0;
                    $("td[id*='cart-price-']").each(function() {
                        var cart_price = $(this).text().replace("Rp. ","");
                        totalItemPrice = parseInt(totalItemPrice) + parseInt(cart_price);
                    });
                    console.log(totalItemPrice);
                    $("#total-price").text('Total : Rp. '+number_format(totalItemPrice));
                    $("#total-price2").text('Total : Rp. '+number_format(totalItemPrice));
                }
            });
        }
        

    </script>
</body>
</html>

