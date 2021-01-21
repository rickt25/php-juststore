<?php

function validateLogin($email,$password){
    $error = array();
    $value = array();

    if(empty($email)){
        $error['email'] = 'Email is required to login';
    }else{
        $value['email'] = $email;
    }

    if(empty($password)){
        $error['password'] = 'Password is required to login';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['login'] = $error;
        $_SESSION['value']['login'] = $value;
        header("Location: http://localhost/juststore");
        die();
    }
}


function validateRegister($name,$gender,$address,$phone,$email,$password,$confirm_password,$profile_size,$imageFileType){
    $error = array();
    $value = array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }else{
        $value['name'] = $name;
    }

    if(empty($gender)){
        $error['gender'] = 'Gender is required';
    }else{
        $value['gender'] = $gender;
    }

    if(empty($address)){
        $error['address'] = 'Address is required';
    }else if(strlen($address) < 10){
        $error['address'] = 'Address is too short';
    }else{
        $value['address'] = $address;
    }

    if(empty($phone)){
        $error['phone'] = 'Phone is required';
    }else if(strlen($phone) < 10){
        $error['phone'] = 'Phone is too short';
    }else if(!is_numeric(substr($phone, 1))){
        if(substr($phone, 0, 1) != '+' || !is_numeric(substr($phone,0,1))){
            $error['phone'] = 'Invalid phone number format';
        }
    }else{
        $value['phone'] = $phone;
    }

    if(empty($email)){
        $error['email'] = 'Email is required';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Invalid email format';
    }else{
        $value['email'] = $email;
    }

    if(empty($password)){
        $error['password'] = 'Password is required';
    }else if(strlen($password) < 6){
        $error['password'] = 'Password is too short';
    }

    if(empty($confirm_password)){
        $error['confirm-password'] = 'Confirm password is requried';
    }else if($confirm_password != $password){
        $error['confirm-password'] = 'Password and confirm password is different';
    }

    if($profile_size){
        if(!in_array($imageFileType, array("jpg","png","jpeg"))){
            $error['profile'] = 'Invalid image extension';
        }
        else if($profile_size > 2000000){
            $error['profile'] = 'Image size is too big';
        }
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['register'] = $error;
        $_SESSION['value']['register'] = $value;
        return false;
    }

    return true;
}

function validateAddUser($name,$gender,$address,$phone,$email,$password,$profile_size,$imageFileType){
    $error = array();
    $value = array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }else{
        $value['name'] = $name;
    }

    if(empty($gender)){
        $error['gender'] = 'Gender is required';
    }else{
        $value['gender'] = $gender;
    }

    if(empty($address)){
        $error['address'] = 'Address is required';
    }else if(strlen($address) < 10){
        $error['address'] = 'Address is too short';
    }else{
        $value['address'] = $address;
    }

    if(empty($phone)){
        $error['phone'] = 'Phone is required';
    }else if(strlen($phone) < 10){
        $error['phone'] = 'Phone is too short';
    }else if(!is_numeric(substr($phone, 1))){
        if(substr($phone, 0, 1) != '+' || !is_numeric(substr($phone,0,1))){
            $error['phone'] = 'Invalid phone number format';
        }
    }else{
        $value['phone'] = $phone;
    }

    if(empty($email)){
        $error['email'] = 'Email is required';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Invalid email format';
    }else{
        $value['email'] = $email;
    }

    if(empty($password)){
        $error['password'] = 'Password is required';
    }else if(strlen($password) < 6){
        $error['password'] = 'Password is too short';
    }

    if($profile_size){
        if(!in_array($imageFileType, array("jpg","png","jpeg"))){
            $error['profile'] = 'Invalid image extension';
        }
        else if($profile_size > 2000000){
            $error['profile'] = 'Image size is too big';
        }
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['addUser'] = $error;
        $_SESSION['value']['addUser'] = $value;
        return false;
    }

    return true;
}

function validateEditUser($name,$gender,$address,$phone,$email){
    $error = array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }else{
        $value['name'] = $name;
    }

    if(empty($gender)){
        $error['gender'] = 'Gender is required';
    }else{
        $value['gender'] = $gender;
    }

    if(empty($address)){
        $error['address'] = 'Address is required';
    }else if(strlen($address) < 10){
        $error['address'] = 'Address is too short';
    }else{
        $value['address'] = $address;
    }

    if(empty($phone)){
        $error['phone'] = 'Phone is required';
    }else if(strlen($phone) < 10){
        $error['phone'] = 'Phone is too short';
    }else if(!is_numeric(substr($phone, 1))){
        if(substr($phone, 0, 1) != '+' || !is_numeric(substr($phone,0,1))){
            $error['phone'] = 'Invalid phone number format';
        }
    }else{
        $value['phone'] = $phone;
    }

    if(empty($email)){
        $error['email'] = 'Email is required';
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Invalid email format';
    }else{
        $value['email'] = $email;
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['edit'] = $error;
        return false;
    }

    return true;
}

function validateProfilePicture($profile_name,$profile_size,$imageFileType){

    if(empty($profile_name)){
        $error = 'Insert image';
    }
    else if(!in_array($imageFileType, array("jpg","png","jpeg"))){
        $error = 'Invalid image extension';
    }
    else if($profile_size > 2000000){
        $error = 'Image size is too big';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['profile'] = $error;
        return false;
    }
    return true;
}

function validateAddSlider($name,$hyperlink,$start,$end,$sequence,$image_name,$image_size,$imageFileType){
    $error= array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 5){
        $error['name'] = 'Name is too short';
    }

    if(empty($sequence)){
        $error['sequence'] = 'Sequence is required';
    }else if($sequence < 1){
        $error['sequence'] = 'Sequence must be positive number';
    }

    if(empty($start)){
        $error['start'] = 'Start date is required';
    }

    if($end){
        $startdt = new DateTime($start);
        $enddt = new DateTime($end);
        if($startdt > $enddt){
            $error['end'] = 'End date must be after start date';
        }
    }

    if(empty($image_name)){
        $error['image'] = 'Image is required';
    }else if(!in_array($imageFileType, array("jpg","png","jpeg","gif"))){
        $error['image'] = 'Invalid image extension';
    }else if($image_size > 5000000){
        $error['image'] = 'Image size is too big';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['slider'] = $error;
        return false;
    }
    return true;
}

function validateAddCourier($name,$cost,$image_name,$image_size,$imageFileType){
    $error= array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }

    if(empty($cost)){
        $error['cost'] = 'Cost is required';
    }else if($cost < 5000){
        $error['cost'] = 'Minimal cost 5000';
    }

    if(empty($image_name)){
        $error['icon'] = 'Icon is required';
    }else if(!in_array($imageFileType, array("jpg","png","jpeg","gif","svg"))){
        $error['icon'] = 'Invalid icon extension';
    }else if($image_size > 2000000){
        $error['icon'] = 'Icon size is too big';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['courier'] = $error;
        return false;
    }
    return true;
}

function validateAddCategory($name,$image_name,$image_size,$imageFileType){
    $error= array();

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }

    if(empty($image_name)){
        $error['icon'] = 'Icon is required';
    }else if(!in_array($imageFileType, array("jpg","png","jpeg","gif","svg"))){
        $error['icon'] = 'Invalid icon extension';
    }else if($image_size > 2000000){
        $error['icon'] = 'Icon size is too big';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['category'] = $error;
        return false;
    }
    return true;
}

function validateAddProduct($name,$description,$price,$stock,$category,$images){
    $error= array();
    

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }

    if(empty($description)){
        $error['description'] = 'Description is required';
    }else if(strlen($description) < 10){
        $error['description'] = 'Description is too short';
    }

    if(empty($price)){
        $error['price'] = 'Price is required';
    }else if($price < 10000){
        $error['price'] = 'Minimal price is 10000';
    }

    if(empty($stock)){
        $error['stock'] = 'Stock is required';
    }else if($stock < 0){
        $error['stock'] = 'Stock cant be negative';
    }

    if(empty($category)){
        $error['category'] = 'Select at least one category';
    }

    $index=1;
    foreach($images['name'] as $i){
        $ext = strtoLower(pathinfo($i,PATHINFO_EXTENSION));
        if(!in_array($ext, array("jpg","png","jpeg"))){
            $error['image'] = 'Image '. $index .' invalid extension. must be jpg/jpeg/png';
        }
        $index++;
    }
    $index=1;
    foreach($images['size'] as $i){
        if($i > 2000000){
            $error['image'] = 'Image '. $index+1 .' size must be lower than 2 mb';
        }
        $index++;
    }

    if(count($error) > 0){
        
        session_start();
        $_SESSION['error']['product'] = $error;
        return false;
    }
    return true;
}

function validateEditProduct($name,$description,$price,$stock,$category){
    $error= array();
    

    if(empty($name)){
        $error['name'] = 'Name is required';
    }else if(strlen($name) < 3){
        $error['name'] = 'Name is too short';
    }

    if(empty($description)){
        $error['description'] = 'Description is required';
    }else if(strlen($description) < 10){
        $error['description'] = 'Description is too short';
    }

    if(empty($price)){
        $error['price'] = 'Price is required';
    }else if($price < 10000){
        $error['price'] = 'Minimal price is 10000';
    }

    if(empty($stock)){
        $error['stock'] = 'Stock is required';
    }else if($stock < 0){
        $error['stock'] = 'Stock cant be negative';
    }

    if(empty($category)){
        $error['category'] = 'Select at least one category';
    }

    if(count($error) > 0){
        
        session_start();
        $_SESSION['error']['product'] = $error;
        return false;
    }
    return true;
}

function validateEditGallery($images){
    $error = array();
    $index=1;
    foreach($images['name'] as $i){
        $ext = strtoLower(pathinfo($i,PATHINFO_EXTENSION));
        if(!in_array($ext, array("jpg","png","jpeg"))){
            $error['image'] = 'Image '. $index .' invalid extension. must be jpg/jpeg/png';
        }
        $index++;
    }
    $index=1;
    foreach($images['size'] as $i){
        if($i > 2000000){
            $error['image'] = 'Image '. $index+1 .' size must be lower than 2 mb';
        }
        $index++;
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['product'] = $error;
        return false;
    }
    return true;
}

function validateCheckOut($address,$courier,$phone){
    $error= array();

    if(empty($address)){
        $error['address'] = 'Address is required';
    }
    if(empty($courier)){
        $error['courier'] = 'Please pick a courier';
    }
    if(empty($phone)){
        $error['phone'] = 'Please fill phone number';
    }

    if(count($error) > 0){
        session_start();
        $_SESSION['error']['transaction'] = $error;
        return false;
    }
    return true;
}

?>