<?php

    $database = new Database();
    $conn = $database->getConnection();
    $cat = new Category($database);
    $category = $cat->getCategory();
    $prod = new Product($database);
    $product = $prod->getProduct();
    $slid = new Slider($database);
    $slider = $slid->getSlider();

?>
<div class="container">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner carousel-style d-flex">
        <?php 
            $index=1;
            foreach($slider as $s): 
        ?>
        <div class="carousel-item <?php if($index==1) echo "active"; ?>">
            <img src="<?= $s['image'] ?>" class="d-block" alt="">
        </div>
        <?php  
            $index++;
            endforeach 
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<hr>

<div class="row mb-4">
    <?php foreach($category as $c): ?>
    
    <a href="?category=<?= $c['id'] ?>" class="category-btn">
        <img src="assets/category/<?= $c['icon']; ?>" class="category-icon mr-2" alt="">
        <?= $c['name'] ?>
    </a>
    <?php endforeach ?>
</div>

<div class="row">
    
    <?php 
        foreach($product as $p): 
        $stmt = $conn->prepare("SELECT AVG(rating) AS rating FROM `review` WHERE product_id=:id");
        $stmt->bindParam(':id',$p['product_id']);
        $stmt->execute();
        $review = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="col col-md-3 mb-4">
        <a href="?page=detail&id=<?= $p['product_id'] ?>" class="card-link">
            <div class="card custom-card">
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