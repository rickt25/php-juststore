<?php

    $error = isset($_SESSION['error']['edit']) ? $_SESSION['error']['edit'] : '';
    $errorProfile = isset($_SESSION['error']['profile']) ? $_SESSION['error']['profile'] : '';
    $errorPass = isset($_SESSION['error']['change']) ? $_SESSION['error']['change'] : '';
?>
<div class="container">
<div class="row">
    <div class="col text-center">
        <div class="profile-wrapper">
            <a href="" data-toggle="modal" data-target="#editPicture">
              <img class="profile-img" src="<?php if($user['profile']){ echo $user['profile']; } else{ echo 'assets/profile/unknown.jpg';} ?>">
              <div class="profile-icon">
                  <i class="fas fa-pencil-alt"></i>
              </div>
            </a>
            
        </div>
    </div>
</div>
<hr class="w-75">
<div class="row">
    <div class="col-md-6 m-auto">
    <?php if($success){ ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo $success; ?>
          <a href="user/clear.php" class="close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
      <?php } ?>
    <form action="user/editUser.php" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" value="<?php echo isset($user['name']) ? $user['name'] : '' ?>" placeholder="Enter name" id="name" aria-describedby="name">
            <?php if(isset($error['name'])){ ?>
              <div class="invalid-feedback"><?php echo $error['name']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label class="d-block">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($user['gender']) && $user['gender'] == 'Male' ? 'checked' : '' ?> type="radio" name="gender" id="male" value="Male">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($user['gender']) && $user['gender'] == 'Female' ? 'checked' : '' ?> type="radio" name="gender" id="female" value="Female">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="female">Female</label>
            </div>
            <?php if(isset($error['gender'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['gender']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control <?php echo isset($error['address']) ? 'is-invalid' : '' ?>" name="address" id="address" rows="1" placeholder="Enter address"><?php echo isset($user['address']) ? $user['address'] : '' ?></textarea>
            <?php if(isset($error['address'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['address']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control <?php echo isset($error['phone']) ? 'is-invalid' : '' ?>" value="<?php echo isset($user['phone']) ? $user['phone'] : '' ?>" name="phone" placeholder="Enter phone" id="phone" aria-describedby="phone">
            <?php if(isset($error['phone'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['phone']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control <?php echo isset($error['email']) ? 'is-invalid' : '' ?>" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>" name="email" placeholder="Enter email" id="email" aria-describedby="emailHelp">
            <?php if(isset($error['email'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['email']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="email">Change password</label>
            <a class="btn btn-outline-primary form-control" id="btn-changepass" data-toggle="modal" data-target="#changepass">Change</a>
          </div>

          <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
      </form>
      </div>
</div>
</div>

<div class="modal fade" id="editPicture" tabindex="-1" aria-labelledby="editPicture" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPictureModal">Edit Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/editProfile.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="profilePicture">Profile Picture</label>
            <input type="file" name="profile" class="form-control" id="profilePicture">
            <?php if(isset($_SESSION['error']['profile'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $errorProfile; ?></div>
            <?php } ?>
          </div>
          
          <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
          <button type="submit" class="btn btn-primary btn-block">Change profile</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="changepass" tabindex="-1" aria-labelledby="changepass" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPictureModal">Change password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/changePass.php" method="POST">
          <div class="form-group">
            <label for="current">Current Password</label>
            <input type="password" name="current" placeholder="Current password" class="form-control" id="current">
          </div>

          <div class="form-group">
            <label for="new">New Password</label>
            <input type="password" name="new" placeholder="New password" class="form-control" id="new">
          </div>

          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" name="confirm" placeholder="Confirm password" class="form-control" id="confirm">
            <?php if(isset($errorPass)){ ?>
              <div class="invalid-feedback d-block"><?php echo $errorPass; ?></div>
            <?php } ?>
          </div>
          
          <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
          <button type="submit" class="btn btn-primary btn-block">Change Password</button>
          <a href="user/cancel.php" class="btn btn-danger btn-block">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>