
<?php  

  $error = isset($_SESSION['error']['register']) ? $_SESSION['error']['register'] : '';
  $value = isset($_SESSION['value']['register']) ? $_SESSION['value']['register'] : '';
  $errorLogin = isset($_SESSION['error']['login']) ? $_SESSION['error']['login'] : '';
  $valueLogin = isset($_SESSION['value']['login']) ? $_SESSION['value']['login'] : '';

?>

<!-- LOGIN -->

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModal">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php if(isset($_SESSION['isRegister'])){ ?>
            <div class="alert alert-primary" role="alert">
              Registration success, login to continue
            </div>
          <?php } ?>
        <form action="user/login.php" method="POST">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control <?php echo isset($errorLogin['email']) ? 'is-invalid' : '' ?>" value=" <?php echo isset($valueLogin['email']) ? $valueLogin['email'] : '' ?>" placeholder="Enter email" id="email" aria-describedby="email">
            <?php if(isset($errorLogin['email'])){ ?>
              <div class="invalid-feedback"><?php echo $errorLogin['email']; ?></div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control <?php echo isset($errorLogin['password']) ? 'is-invalid' : '' ?>" placeholder="Enter password" id="password">
            <?php if(isset($errorLogin['password'])){ ?>
              <div class="invalid-feedback"><?php echo $errorLogin['password']; ?></div>
            <?php } ?>
          </div>
            <small class="float-right mr-2 mb-2">
              <a href="">Forgot password ?</a>
            </small>
            <small class="">
            Don't have an account?<a href="#register" data-toggle="modal" data-target="#register">Register</a>
            </small>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- REGISTER -->

<div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModal">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/register.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" value="<?php echo isset($value['name']) ? $value['name'] : '' ?>" placeholder="Enter name" id="name" aria-describedby="name">
            <?php if(isset($error['name'])){ ?>
              <div class="invalid-feedback"><?php echo $error['name'] ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label class="d-block">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($value['gender']) && $value['gender'] == 'Male' ? 'checked' : '' ?> type="radio" name="gender" id="male" value="Male">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($value['gender']) && $value['gender'] == 'Female' ? 'checked' : '' ?> type="radio" name="gender" id="female" value="Female">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="female">Female</label>
            </div>
            <?php if(isset($error['gender'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['gender']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control <?php echo isset($error['address']) ? 'is-invalid' : '' ?>" name="address" id="address" rows="1" placeholder="Enter address"><?php echo isset($value['address']) ? $value['address'] : '' ?></textarea>
            <?php if(isset($error['address'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['address']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control <?php echo isset($error['phone']) ? 'is-invalid' : '' ?>" value="<?php echo isset($value['phone']) ? $value['phone'] : '' ?>" name="phone" placeholder="Enter phone" id="phone" aria-describedby="phone">
            <?php if(isset($error['phone'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['phone']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control <?php echo isset($error['email']) ? 'is-invalid' : '' ?>" value="<?php echo isset($value['email']) ? $value['email'] : '' ?>" name="email" placeholder="Enter email" id="email" aria-describedby="emailHelp">
            <?php if(isset($error['email'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['email']; ?></div>
            <?php } ?>
          </div>
  
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?php echo isset($error['password']) ? 'is-invalid' : '' ?>" name="password" placeholder="Enter password" id="password">
            <?php if(isset($error['password'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['password']; ?></div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="conpassword">Confirm Password</label>
            <input type="password" class="form-control <?php echo isset($error['confirm-password']) ? 'is-invalid' : '' ?>" name="confirm-password" placeholder="Confirm password" id="conpassword">
            <?php if(isset($error['confirm-password'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['confirm-password']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="profile">Profile picture</label>
            <input type="file" name="profile" class="form-control-file" id="profile">
            <?php if(isset($error['profile'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['profile']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
