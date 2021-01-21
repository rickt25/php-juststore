<?php
    
    $database = new Database();
    $conn = $database->getConnection();

    $cour = new Courier($database);
    $courier = $cour->getCourier();

?>



<div class="container mt-4">
    <ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Cart</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Checkout</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Review</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">History Pembelanjaan</a>
    </li>
    </ul>

    <div class="row justify-content-center">
        
        <div class="col col-md-6">
        <form action="user/login.php" method="POST" class="mt-4">

        <div class="form-group">
        <label for="address">Address*</label>
        <textarea name="address" class="form-control <?php echo isset($error['address']) ? 'is-invalid' : '' ?>"></textarea>
        <?php if(isset($errorLogin['email'])){ ?>
            <div class="invalid-feedback"><?php echo $errorLogin['email']; ?></div>
        <?php } ?>
        </div>

        <div class="form-group">
        <label for="courier">Courier</label>
        <select name="courier" id="courier" class="form-control">
            <?php foreach($courier as $c): ?>
                <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
            <?php endforeach ?>
        </select>
        <?php if(isset($errorLogin['email'])){ ?>
            <div class="invalid-feedback"><?php echo $errorLogin['email']; ?></div>
        <?php } ?>
        </div>

        <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control <?php echo isset($error['phone']) ? 'is-invalid' : '' ?>" placeholder="Enter phone">
        <?php if(isset($errorLogin['password'])){ ?>
            <div class="invalid-feedback"><?php echo $errorLogin['password']; ?></div>
        <?php } ?>
        </div>

        <div class="form-group">
        <label for="notes">Notes</label>
        <textarea name="notes" class="form-control <?php echo isset($error['notes']) ? 'is-invalid' : '' ?>"></textarea>
        <?php if(isset($errorLogin['email'])){ ?>
            <div class="invalid-feedback"><?php echo $errorLogin['email']; ?></div>
        <?php } ?>
        </div>

        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
    </form>
        </div>
    </div>

</div>