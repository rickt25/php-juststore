<?php

  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $user = new User($database);
  $data = $user->findUser($id);

  $error = isset($_SESSION['error']['edit']) ? $_SESSION['error']['edit'] : '';
  $value = isset($_SESSION['value']['edit']) ? $_SESSION['value']['edit'] : '';
  $success = isset($_SESSION['success']) ? $_SESSION['success'] : false;

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
      </div>
      <?php if($success){ ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo $success; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php } ?>
        
      <!-- <h4>Section title</h4> -->
      <form action="user/editUser.php" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" value="<?php echo isset($data['name']) ? $data['name'] : '' ?>" placeholder="Enter name" id="name" aria-describedby="name">
            <?php if(isset($error['name'])){ ?>
              <div class="invalid-feedback"><?php echo $error['name']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label class="d-block">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($data['gender']) && $data['gender'] == 'Male' ? 'checked' : '' ?> type="radio" name="gender" id="male" value="Male">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" <?php echo isset($data['gender']) && $data['gender'] == 'Female' ? 'checked' : '' ?> type="radio" name="gender" id="female" value="Female">
              <label class="form-check-label <?php echo isset($error['gender']) ? 'radio-label-invalid' : '' ?>" for="female">Female</label>
            </div>
            <?php if(isset($error['gender'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['gender']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control <?php echo isset($error['address']) ? 'is-invalid' : '' ?>" name="address" id="address" rows="1" placeholder="Enter address"><?php echo isset($data['address']) ? $data['address'] : '' ?></textarea>
            <?php if(isset($error['address'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['address']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control <?php echo isset($error['phone']) ? 'is-invalid' : '' ?>" value="<?php echo isset($data['phone']) ? $data['phone'] : '' ?>" name="phone" placeholder="Enter phone" id="phone" aria-describedby="phone">
            <?php if(isset($error['phone'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['phone']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control <?php echo isset($error['email']) ? 'is-invalid' : '' ?>" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>" name="email" placeholder="Enter email" id="email" aria-describedby="emailHelp">
            <?php if(isset($error['email'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['email']; ?></div>
            <?php } ?>
          </div>

          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
      </form>
      </div>
    </main>

