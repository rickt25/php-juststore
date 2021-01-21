<?php

    $database = new Database();
    $conn = $database->getConnection();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $prod = new Product($database);
    $product = $prod->getDetail($id);
    $gallery = $prod->getGallery($id);

    $stmt = $conn->prepare('SELECT * FROM `review` AS r JOIN `users` AS u ON r.user_id=u.id WHERE product_id=:id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $review = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-4">
    <div class="row">
        <div class="col col-md-5">
            <div class="big-img">
                <img src="<?= $gallery[0]['image'] ?>" alt="">
            </div>
            <div class="small-img">
                <div class="row">
                <?php foreach($gallery as $g): ?>
                    <div class="col">
                        <img src="<?= $g['image'] ?>" alt="">
                    </div>
                <?php endforeach ?>
                </div>      
            </div>
        </div>
        <div class="col col-md-7 mt-4">
            <h2><?= $product['name'] ?></h2>
            <h5>Rp. <?= number_format($product['price']) ?></h5>
            <p><?= $product['description'] ?></p>
            <div class="d-flex justify-space-between">
                <?php if($isLogin){ ?>
                    <form action="user/addToCart.php" method="POST">
                    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="product_id" value="<?= $id ?>">
                        <button type="submit" class="btn btn-primary">Add to cart</a>
                    </form>
                    
                <?php }else{ ?>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#login">Add to cart</button>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if(count($review) > 0){ ?>
    <div class="row mt-5">
        <?php foreach($review as $r): ?>
        <div class="col col-md-6">
            <div class="card mb-3" style="max-width: 540px;">
            <div class="row">
                <div class="col-md-4">
                <img src="<?php if($r['profile']){echo $r['profile'];}else{echo 'assets/profile/unknown.jpg';} ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $r['name'] ?></h5>
                    <h6>Rating : <strong><?= $r['rating'] ?></strong></h6>
                    <p class="card-text"><?= $r['review'] ?></p>
                    <p class="card-text"><small class="text-muted"><?= $r['date'] ?></small></p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    <?php } ?>
</div>