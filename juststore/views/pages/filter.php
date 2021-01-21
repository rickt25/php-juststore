<?php
    $database = new Database();
    $conn = $database->getConnection();

    $cat = new Category($database);
    $cate = $cat->getCategory();

    $stmt = $conn->prepare("SELECT * FROM `product_category` AS c JOIN `products` AS p ON c.product_id=p.id JOIN `product_gallery` AS g ON p.id=g.product_id WHERE c.category_id=:id GROUP BY g.product_id");
    $stmt->bindParam(':id',$category);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>

<div class="container">
    <div class="row mt-4">
        <div class="col col-md-3">
        <ul class="list-group custom-links">
            <?php foreach($cate as $c){ ?>
            <a href="?category=<?= $c['id'] ?>"><li class="list-group-item custom-hover"><img src="assets/category/<?= $c['icon'] ?>" alt=""><?= $c['name'] ?></li></a>
            <?php } ?>
        </ul>
        </div>
        <div class="col col-md-9 d-flex flex-wrap">
            <?php 
            foreach($product as $p): 
            $stmt = $conn->prepare("SELECT AVG(rating) AS rating FROM `review` WHERE product_id=:id");
            $stmt->bindParam(':id',$p['id']);
            $stmt->execute();
            $review = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="col col-md-4 mb-4">
            <a href="?page=detail&id=<?= $p['product_id'] ?>" class="card-link">
                <div class="card">
                <div class="card-img">
                    <img src="<?= $p['image'] ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5><?= $p['name'] ?></h5>
                    <p><strong> Rp. <?= number_format($p['price']); ?></strong></p>
                    <p><strong>Rating : </strong><?= number_format($review['rating'],1,'.','    ') ?></p>
                </div>
                </div>
            </a>
        </div>
        <?php endforeach ?>
        </div>
    </div>
    
</div>

