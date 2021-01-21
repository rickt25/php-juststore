<?php
  
  $user = new User($database);
  $data = $user->getUser();

  $error = isset($_SESSION['error']['addUser']) ? $_SESSION['error']['addUser'] : '';
  $value = isset($_SESSION['value']['addUser']) ? $_SESSION['value']['addUser'] : '';
  $errorRole = isset($_SESSION['error']['role']) ? $_SESSION['error']['role'] : false;

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Staffs and Admin</h1>
      </div>
      <?php if($success){ ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <?php echo $success; ?>
          <a href="user/clear.php" class="close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
      <?php } ?>
        
      <!-- <h4>Section title</h4> -->
      <div class="row mb-2 justify-content-between">
            <div class="col-md-5">
                <button class="btn btn-primary" id="btn-addUser" data-toggle="modal" data-target="#adduser">+ Add Staff/Admin</button>
                <button class="btn btn-primary" id="btn-editRole" data-toggle="modal" data-target="#updaterole">Update Role</button>
            </div>
            <div class="col-md-4">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control w-75 mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
      <div class="table-responsive">
      <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                $no = 1;
                foreach($data as $d){
              ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $d['name'] ?></td>
                    <td><?php echo $d['gender'] ?></td>
                    <td><?php echo $d['phone'] ?></td>
                    <td><?php echo $d['email'] ?></td>
                    <td><?php echo $d['role'] ?></td>
                    <td>
                        <form action="user/deleteUser.php" method="POST">
                          <a class="btn btn-info" href="?page=admin&id=<?php echo $d['id'] ?>">
                              <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                          </a>
                          <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                          <button type="submit" class="btn btn-danger" onclick="return confirm('confirm delete data?')">
                              <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-trash p-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                          </a>
                        </form>
                        
                    </td>
                </tr>
                <?php $no++;} ?>
            </tbody>
    </table>
      </div>
    </main>


<!-- ADD STAFF MODAL -->

<div class="modal fade" id="adduser" tabindex="-1" aria-labelledby="addUserModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/addUser.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" value="<?php echo isset($value['name']) ? $value['name'] : '' ?>" placeholder="Enter name" id="name" aria-describedby="name">
            <?php if(isset($error['name'])){ ?>
              <div class="invalid-feedback"><?php echo $error['name']; ?></div>
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
            <label for="profile">Profile picture</label>
            <input type="file" name="profile" class="form-control-file" id="profile">
            <?php if(isset($error['profile'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['profile']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <label for="profile">Role</label>
            <select class="form-control" name="role">
              <option value="Staff">Staff</option>
              <option value="Admin">Admin</option>
            </select>
            <?php if(isset($error['role'])){ ?>
              <div class="invalid-feedback d-block"><?php echo $error['role']; ?></div>
            <?php } ?>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a href="user/cancel.php" class="btn btn-danger btn-block">Cancel</a>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="updaterole" tabindex="-1" aria-labelledby="updateRole" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModal">Update Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="user/editRole.php" method="POST">
          <div class="form-group">
            <label for="email">Role</label>
            <select class="form-control" name="role">
              <option value="Staff">Staff</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control <?php echo $errorRole ? 'is-invalid' : '' ?>" placeholder="Enter password" id="password">
            <?php if($errorRole){ ?>
              <div class="invalid-feedback d-block"><?php echo $errorRole; ?></div>
            <?php } ?>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a href="user/cancel.php" class="btn btn-danger btn-block">Cancel</a>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>


<!-- EDIT ROLE MODAL  -->
