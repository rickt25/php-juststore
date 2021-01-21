<?php
  $cat = new Category($database);
  $category = $cat->getCategory();

  $prod = new Product($database);
  $product = $prod->getProduct();

  $error = isset($_SESSION['error']['product']) ? $_SESSION['error']['product'] : '';

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"  >
        <h1 class="h2">Products</h1>
      </div>

      <div class="row mb-2 justify-content-between">
            <div class="col-md-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct">+ Add Product</button>
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
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($product as $d){ ?>
                <tr>
                    <td class="courier-custom-table"><img src="<?= $d['image'] ?>" class="courier-img-table" alt=""><?php echo $d['name'] ?></td>
                    <td>Rp. <?= number_format($d['price']) ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td>
                        <form action="user/deleteProduct.php" method="POST">
                          <a class="btn btn-info" href="?page=admin&tab=product&id=<?php echo $d['product_id'] ?>">
                              <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                          </a>
                          <input type="hidden" name="id" value="<?= $d['product_id'] ?>">
                          <button type="submit" class="btn btn-danger" onclick="return confirm('confirm delete data?')">
                              <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-trash p-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                          </a>
                        </form>
                           
                    </td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
      </div>
    </main>

<!-- ADD PRODUCT MODAL -->

<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProduct">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="user/addProduct.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control <?php echo isset($error['name']) ? 'is-invalid' : '' ?>" placeholder="Enter name" id="name" aria-describedby="name">
          <?php if(isset($error['name'])){ ?>
            <div class="invalid-feedback"><?php echo $error['name']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
          <?php if(isset($error['description'])){ ?>
            <div class="invalid-feedback d-block"><?php echo $error['description']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control <?php echo isset($error['price']) ? 'is-invalid' : '' ?>" placeholder="Enter price" id="price">
          <?php if(isset($error['price'])){ ?>
            <div class="invalid-feedback"><?php echo $error['price']; ?></div>
          <?php } ?>
        </div>

        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" name="stock" class="form-control <?php echo isset($error['stock']) ? 'is-invalid' : '' ?>" placeholder="Enter stock" id="stock">
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
        </div>

        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image[]" class="form-control" multiple>
          <?php if(isset($error['image'])){ ?>
            <div class="invalid-feedback"><?= $error['image']; ?></div>
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