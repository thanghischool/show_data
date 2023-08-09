<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <?php session_start();

    ?>
    <div class="main">
        <div class="form-parent">
            <form class="form-child" action="upload.php" method="post" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Tên sản phẩm"><br>
                <input type="text" name="price" placeholder="Giá"> <br>
                <input type="text" name="star" placeholder="Đánh giá (theo sao)"> <br>
                <input type="text" name="status" placeholder="Status"> <br>
                <label style="margin: 10px" for="fileInput">Chọn ảnh từ máy tính:</label> <br>
                <input type="file" id="fileInput" name="fileInput"> <br>

                <input type="submit" value="Thêm sản phẩm" name="submit"> <br>

            </form>

        </div>
        <div class="product_1">
            <div class="sub-product_1">
                <h1>* NỔI BẬT NHẤT * </h1>
                <?php
                if (isset($_SESSION['product-1'])) {
                    echo '<div class="container">';
                    echo '<div class="row">';
                    foreach ($_SESSION['product-1'] as $product) {
                        echo '<div class="card col-4 mx-3" style="width: 18rem;">';
                        echo '<img class="card-img-top" src="' . $product[4] . '" alt="' . $product[3] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $product[0] . '</h5>';
                        echo '<p class="card-text text-danger">' . $product[1] . 'đ' . '</p>';
                        for ($i = 1; $i <= $product[2]; $i++) {
                            echo '<p class="card-text" style="display: inline-block">' . '&#11088;' . '</p>';
                        }
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

    </div>
    </div>
    <div class="product_2">
        <h1>* SẢN PHẨM MỚI *</h1>
        <div class="sub-product_2">
            <?php
            if (isset($_SESSION['product-2'])) {
                echo '<div class="container">';
                echo '<div class="row">';
                foreach ($_SESSION['product-2'] as $product) {
                    echo '<div class="card col-5 mx-3" style="width: 18rem;">';
                    echo '<img class="card-img-top" src="' . $product[4] . '" alt="' . $product[3] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $product[0] . '</h5>';
                    echo '<p class="card-text text-danger">' . $product[1] . 'đ' . '</p>';
                    for ($i = 1; $i <= $product[2]; $i++) {
                        echo '<p class="card-text" style="display: inline-block">' . '&#11088;' . '</p>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
    </div>


</body>

</html>