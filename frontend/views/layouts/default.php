
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var API_SUCCESS = <?php echo API_SUCCESS ?>;
        var API_ERROR = <?php echo API_ERROR ?>;
    </script>
    <link rel="stylesheet" href="<?php echo CSS_URL . 'home.css' ?>">
    <link rel="shortcut icon" href="<?php echo IMG_URL . 'images/Logo-VTCS.png' ?>" type="image/jpg">
    <title>VTC Store</title>
</head>

<body>
    <div class="sticky-top bg-light">
        <header class=" container navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand pl-3" href="<?php echo base_url("home/index") ?>"><img src="<?php echo IMG_URL . 'images/Logo-VTCS.png' ?>" alt="" width="50px" height="auto"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse pr-5" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a id="contact" class="nav-item nav-link mr-3 active" href="#">Liên hệ<span class="sr-only">(current)</span></a>
                    <form class="form-inline">
                        <div class="form-group">
                            <input id="form-hf" type="text" class="form-control" placeholder="Nhập sản phẩm...">
                            <button type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                    <?php if (!$_SESSION['name']) : ?>
                        <a id="login" class="nav-item nav-link ml-2 active" href="<?php echo base_url('home/login') ?>"><img class="mb-1" src="<?php echo IMG_URL . 'images/user.png' ?>" alt="" height="auto"></a>
                    <?php else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['name'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('home/show') ?>">Thông tin cá nhân</a>
                                <a class="dropdown-item" href="#">Lịch sử giao dịch</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('home/handle_logout') ?>">Đăng xuất</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    <a id="cart" class="nav-item nav-link active" href="#"><img src="<?php echo IMG_URL . 'images/cart.png' ?>" alt="" height="auto"></a>
                </div>
            </div>
        </header>
        <div class="border-top"></div>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active dropdown">
                        <a class="nav-link mx-auto dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">VEST</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">VEST CÔNG SỞ</a>
                            <a class="dropdown-item" href="#">VEST CƯỚI</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link mx-auto dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PHỤ KIỆN VEST</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">CARAVAT</a>
                            <a class="dropdown-item" href="#">NƠ</a>
                            <a class="dropdown-item" href="#">KHĂN CÀI VEST</a>
                        </div>
                    </li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SƠ MI</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">SƠ MI HÈ</a>
                            <a class="dropdown-item" href="#">SƠ MI DÀI TAY CAO CẤP</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">ÁO PHÔNG</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">QUẦN ÂU</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">GIÀY DA</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="border-bottom"></div>
    </div>

    <article>
        <?php echo $content ?>
    </article>

    <div class="border-top"></div>

    <footer class="container">
        <div class="row mx-auto">
            <div class="card border-0">
                <div class="card-body">
                    <p class="text-center"><a href="<?php echo base_url("home/index") ?>"><img src="<?php echo IMG_URL . 'images/Logo-VTCS.png' ?>" alt="" width="100px" height="auto"></a></p>
                    <p><img src="<?php echo IMG_URL . 'images/call.png' ?>" alt="" width="12px" height="auto" style="padding-bottom: 3px;"><span>19008198</span></p>
                    <p><img src="<?php echo IMG_URL . 'images/email.png' ?>" alt="" width="12px" height="auto"><span>namdeptrai@vodoi.com</span></p>
                </div>
            </div>
            <div class="col-sm">
                <div class="row mx-auto">
                    <div class="col-sm border-0 m-0">
                        <div class="card-body">
                            <h5 class="card-title "><b>Dịch vụ khách hàng</b></h5>
                            <a href="#">
                                <p class="card-text text-dark">News</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">Khuyến mại</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">VTCS và báo chí</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">Ưu đãi đối tác VTCS</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">Sao Việt và Khách Hàng</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">VTCS Videos</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm border-0 m-0">
                        <div class="card-body">
                            <h5 class="card-title "><b>Nhóm sản phẩm</b></h5>
                            <a href="#">
                                <p class="card-text text-dark">VEST</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">PHỤ KIỆN</p>
                            </a>
                            <a href="#">
                                <p class=" card-text text-dark">SƠ MI</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">ÁO PHÔNG</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">QUẦN ÂU</p>
                            </a>
                            <a href="#">
                                <p class="card-text text-dark">GIÀY DA</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm text-center">
                <div class="receive">
                    <div class="card border-0">
                        <div class="card-body">
                            <h5 class="card-title"><b>LIKE VTCS TRÊN MẠNG XÃ HỘI</b></h5>
                            <div class="row">
                                <div class="col-12">
                                    <img class="text-center" src="<?php echo IMG_URL . 'images/facebook.png' ?>" alt="" width="36px" height="auto">
                                    <img class="text-center" src="<?php echo IMG_URL . 'images/youtube.png' ?>" alt="" width="36px" height="auto">
                                </div>
                            </div>
                            <br>
                            <div class="border-bottom"></div>
                            <br>
                            <h5><b>ĐĂNG KÝ NHẬN THÔNG TIN MỚI <br> TỪ VTC STORE</b></h5>
                            <form class="form-inline" method="post">
                                <div class="form-group mr-auto ml-auto">
                                    <input id="form-hf" type="text" class="form-control" placeholder="Nhập Email...">
                                    <button type="button">Đăng Ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-bottom"></div>
        </div>
    </footer>

    <div id="bottom">
        <div style="text-align: center;">Copyrights © <?php echo date("Y"); ?> by VTC Store.</div>
    </div>
</body>

</html>