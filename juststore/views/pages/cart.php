<?php

$database = new Database();
$conn = $database->getConnection();

$cour = new Courier($database);
$courier = $cour->getCourier();

$error = isset($_SESSION['error']['transaction']) ? $_SESSION['error']['transaction'] : '';

$stmt = $conn->prepare("SELECT * FROM `transactions` WHERE user_id=:user_id");
$stmt->bindParam(':user_id',$user['id']);
$stmt->execute();
$transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT c.id,c.user_id,c.quantity,p.name,p.price,g.image FROM `cart` AS c JOIN `products` AS p ON c.product_id=p.id JOIN `product_gallery` AS g ON p.id=g.product_id WHERE c.user_id=:id GROUP BY g.product_id");
$stmt->bindParam(':id', $user['id']);
$stmt->execute();
$cart = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (!empty($cart)) {
  $item_price = 0;
  if (!empty($cart)) {
    foreach ($cart as $c) {
      $item_price = $item_price + ($c["price"] * $c["quantity"]);
    }
  }
}



?>


<div class="container mt-4">

  <ul class="nav nav-tabs nav-fill mb-4">
    <li class="nav-item">
      <a class="nav-link active" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="true">Cart</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="checkout-tab" data-toggle="tab" href="#checkout" role="tab" aria-controls="checkout" aria-selected="false">Checkout</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History Pembelanjaan</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">

    <!-- CART -->

    <div class="tab-pane fade show active" id="cart" role="tabpanel" aria-labelledby="cart-tab">
      <?php if (!empty($cart)) { ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Qty</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cart as $c) : ?>
              <tr>
                <td class="courier-custom-table"><img src="<?= $c['image']; ?>" class="courier-img-table" alt=""><?= $c['name']; ?></td>
                <td>Rp. <?= number_format($c['price']); ?></td>
                <td>
                  <div class="form-inline quantity">
                    <div class="btn btn-secondary" onClick="decrement_quantity(<?php echo $c["id"] . ',' . $c['price']; ?>)">-</div>
                    <input class="form-control" style="width: 40px;" id="input-quantity-<?php echo $c["id"]; ?>" value="<?php echo $c["quantity"]; ?>">
                    <div class="btn btn-secondary" onClick="increment_quantity(<?php echo $c["id"] . ',' . $c['price']; ?>)">+</div>
                  </div>
                </td>
                <td id="cart-price-<?= $c['id']; ?>">Rp. <?= $c['price'] * $c['quantity']; ?></td>
                <td>
                  <form action="user/deleteCart.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('confirm delete data?')">
                      <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-trash p-0" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" /></svg>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <hr>
        <div class="row mb-2 justify-content-end">
          <div class="col col-md-4 text-center">
            <h4 id="total-price">Total : Rp. <?= number_format($item_price); ?></h4>
            <hr>
          </div>
        </div>

        <div class="row justify-flex-end">
          <button class="btn btn-primary btn-block" id="checkout-tab" data-toggle="tab" href="#checkout" role="tab" aria-controls="home" aria-selected="true">Check Out</button>
        </div>
      <?php } else { ?>
        <div class="row mt-5">
          <div class="col col-md-6 offset-md-3">
            <img src="assets/empty-cart.png" alt="">
          </div>
        </div>
        <div class="row justify-content-center mt-2">
          <div class="col col-md-2">
            <a href="/juststore/" class="btn btn-outline-orange btn-block btn-lg">Shop now</a>
          </div>
        </div>
      <?php } ?>
    </div>



    <!-- CHECKOUT -->

    <div class="tab-pane fade" id="checkout" role="tabpanel" aria-labelledby="checkout-tab">
      <div class="row justify-content-center">

        <div class="col col-md-6">
          <form action="user/checkout.php" method="POST" class="mt-4">

            <div class="form-group">
              <label for="address">Address*</label>
              <textarea name="address" class="form-control <?php echo isset($error['address']) ? 'is-invalid' : '' ?>"></textarea>
              <?php if (isset($error['address'])) { ?>
                <div class="invalid-feedback"><?php echo $error['address']; ?></div>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="courier">Courier*</label>
              <select name="courier" id="courier" class="form-control">
                <?php foreach ($courier as $c) : ?>
                  <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
                <?php endforeach ?>
              </select>
              <?php if (isset($error['courier'])) { ?>
                <div class="invalid-feedback"><?php echo $error['courier']; ?></div>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="phone">Phone*</label>
              <input type="text" name="phone" class="form-control <?php echo isset($error['phone']) ? 'is-invalid' : '' ?>" placeholder="Enter phone">
              <?php if (isset($error['phone'])) { ?>
                <div class="invalid-feedback"><?php echo $error['phone']; ?></div>
              <?php } ?>
            </div>

            <div class="form-group">
              <label for="notes">Notes</label>
              <textarea name="notes" class="form-control <?php echo isset($error['notes']) ? 'is-invalid' : '' ?>"></textarea>
              <?php if (isset($error['notes'])) { ?>
                <div class="invalid-feedback"><?php echo $error['notes']; ?></div>
              <?php } ?>
            </div>
            <?php if (!empty($cart)) { ?>
            <div class="row mb-2 justify-content-end">
              <div class="col text-center">
                <h4 id="total-price2">Grand Total : Rp. <?= number_format($item_price); ?></h4>
                <hr>
              </div>
            </div>
            <?php } ?>
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Are you sure want to buy this products?')">Checkout</button>
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="tab-pane fade <?php if ($tab == 'history') {echo 'show active';} ?>" id="history" role="tabpanel" aria-labelledby="history-tab">
      <h2>Shopping History</h2>
      <?php 
        foreach($transaction as $trans):
        $stmt = $conn->prepare("SELECT * FROM `transaction_details` WHERE transaction_id=:transaction_id");
        $stmt->bindParam(':transaction_id',$trans['id']);
        $stmt->execute();
        $trans_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
        <div class="card mb-4">
        <div class="card-header">
          <span>Transaction ID : <?= $trans['transaction_id']; ?></span><br>
          <span>Transaction Date : <?= $trans['transaction_date']; ?></span>
        </div>
          
          <div class="card-body">
            <span><strong>Courier Name </strong>: <?= $trans['courier_name']; ?></span> <br>
            <span><strong>Courier Cost </strong>: Rp. <?= number_format($trans['courier_cost']); ?></span> <br>
            <span><strong>Address </strong>: <?= $trans['address']; ?></span> <br>
            <span><strong>Phone </strong>: <?= $trans['phone']; ?></span> <br>
            <span><strong>Notes </strong>: <?= $trans['notes']; ?></span> <br>

            <table class="table mt-4">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Price</th>
                  <th scope="col">Review</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($trans_detail as $t){ ?>
                <tr>
                  <td><?= $t['product_name'] ?></td>
                  <td><?= $t['quantity'] ?></td>
                  <td>Rp. <?= number_format($t['price']); ?></td>
                  <td><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#review<?= $t['id'] ?>">Give Review</button></td>
                </tr>
                <div class="modal fade" id="review<?= $t['id'] ?>" tabindex="-1" aria-labelledby="reviewModal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        
                      <form action="user/review.php" method="POST">
                      <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" min="1" max="5" onkeydown="return false" name="rating" class="form-control <?php echo isset($error['rating']) ? 'is-invalid' : '' ?>" placeholder="Enter rating" id="rating">
                        <?php if(isset($error['rating'])){ ?>
                          <div class="invalid-feedback"><?php echo $error['rating']; ?></div>
                        <?php } ?>
                      </div>

                      <div class="form-group">
                        <label for="review">Review</label>
                        <input type="text" name="review" class="form-control <?php echo isset($error['review']) ? 'is-invalid' : '' ?>" placeholder="Enter review" id="review">
                        <?php if(isset($error['review'])){ ?>
                          <div class="invalid-feedback"><?php echo $error['review']; ?></div>
                        <?php } ?>
                      </div>
                          <input type="hidden" name="id" value="<?= $t['product_id'] ?>">
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                      </form>

                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </tbody>
            </table>

            <h4>Grand Total : Rp. <strong><?= number_format($trans['total']); ?></strong></h4>
          </div>
        </div>
      </div>
      <?php endforeach ?>
  </div>
</div>

