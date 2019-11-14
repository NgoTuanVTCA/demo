<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="<?php echo IMG_URL . 'images/banner-wedding.jpg' ?>" class="d-block w-100" alt="..." width="100%" height="auto">
        </div>
        <div class="carousel-item">
            <img src="<?php echo IMG_URL . 'images/banner-travel.jpg' ?>" class="d-block w-100" alt="..." width="100%" height="auto">
        </div>
        <div class="carousel-item active">
            <img src="<?php echo IMG_URL . 'images/banner-banquest.jpg' ?>" class="d-block w-100" alt="..." width="100%" height="auto">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
    <section>
        <div class="navbar navbar-dark bg-dark mt-5">
            <span class="text-light">VEST</span>
        </div>
        <div class="row mt-3 mb-3">
            <?php foreach ($products as $product) : ?>
                <div class="col-sm">
                    <div class="card">
                        <p><img class="card-img-top" src="<?php echo IMG_URL . $product['image'] ?>" alt="" srcset=""></p>
                        <div class="card-body">
                            <h4 class="card-title text-center"><a href="<?php echo base_url("product/show&id={$product['id']}") ?>"><?php echo $product['name'] ?></a></h4>
                            <p class="card-text text-center"><?php echo $product['price'] ?> VND</p>
                        </div>
                    </div>
                    <br>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>