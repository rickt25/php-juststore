<?php
  $cat = new Category($database);
  $category = $cat->getCategory();
  
  $prod = new Product($database);
  $product = $prod->getDetail($id);
  $gallery = $prod->getGallery($id);

  $error = isset($_SESSION['error']['product']) ? $_SESSION['error']['product'] : ''; 

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom nav-margin">
        <h2 class="h4">Product Detail</h2>
      </div>

      <div class="col-md-9">
      <form action="user/editProduct.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" value="<?= $product['name'] ?>" placeholder="Enter name" id="name" aria-describedby="name">
          <?php if(isset($error['name'])){ ?>
            <div class="invalid-feedback"><?php echo $error['name']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" cols="30" rows="2"><?= $product['description'] ?>  </textarea>
          <?php if(isset($error['description'])){ ?>
            <div class="invalid-feedback d-block"><?php echo $error['description']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control <?php echo isset($error['price']) ? 'is-invalid' : '' ?>" value="<?= $product['price'] ?>" placeholder="Enter price" id="price">
          <?php if(isset($error['price'])){ ?>
            <div class="invalid-feedback"><?php echo $error['price']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" name="stock" class="form-control <?php echo isset($error['stock']) ? 'is-invalid' : '' ?>" value="<?= $product['stock'] ?>" placeholder="Enter stock" id="stock">
          <?php if(isset($error['stock'])){ ?>
            <div class="invalid-feedback"><?= $error['stock']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select name="category[]" class="form-control category" multiple>
            <?php foreach($category as $c): ?>
              <option value="<?= $c['id'] ?>"><?= $c['name']; ?></option>
            <?php endforeach ?>
          </select>
          <?php if(isset($error['category'])){ ?>
            <p style="color:red"><?= $error['category']; ?></p>
          <?php } ?>
        </div>
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </form>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom nav-margin">
        <h2 class="h4">Product Gallery</h2>
      </div>
            <?php if(count($gallery) < 5){ ?>
      <form action="user/addGallery.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image[]" class="form-control" multiple>
            <?php if(isset($error['image'])){ ?>
                <div class="invalid-feedback"><?= $error['image']; ?></div>
            <?php } ?>
        </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">

        <button type="submit" class="btn btn-primary btn-block my-4">Submit</button>
      </form>
      <?php } ?>

      <div class="card-deck flex-wrap">
      <?php foreach($gallery as $g){ ?>
        <div class="card text-center p-4">
            <img src="<?= $g['image'] ?>" class="card-img-top card-img">
            <div class="card-body">
                <form action="user/deleteGallery.php" method="POST">
                    <input type="hidden" name="id" value="<?= $g['id'] ?>">
                <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
      <?php } ?>
        </div>
    </main>
