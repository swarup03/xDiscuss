<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php
            require 'dbConnect.php';
        ?>
    <?php
            require 'navbar.php';
        ?>
    <div class="container marketing">
        <div class="row my-5">
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user2.jfif" alt="">
                <h2>Harsh</h2>
                <p>He ws involved in development fase of this product and in the support group of the Web .</p>
                <p><a class="btn btn-success" href="#">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user1.jfif" alt="">
                <h2>Hena</h2>
                <p>He ws involved in development fase of this product and in the support group of the Web.</p>
                <p><a class="btn btn-success" href="#">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user3.jfif" alt="">
                <h2>Shubham</h2>
                <p>He ws involved in development fase of this product and in the support group of the Web .</p>
                <p><a class="btn btn-success" href="#">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <hr class="featurette-divider">
        <div class="row featurette d-flex justify-content-center align-items-center my-4">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                    prose here.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="thum1.jfif"
                    class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400"
                    height="500" alt="">
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette d-flex justify-content-center align-items-center my-4">
            <div class="col-md-7 order-md-1">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                    prose here.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="thum2.jfif"
                    class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400"
                    height="500" alt="">

            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette d-flex justify-content-center align-items-center my-4">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                    prose here.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img src="thum3.jfif"
                    class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400"
                    height="500" alt="">

            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette d-flex justify-content-center align-items-center my-4">
            <div class="col-md-7">
                <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                    prose here.</p>
            </div>
            <div class="col-md-5">
                <img src="thum4.jfif"
                    class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="400"
                    height="500" alt="">

            </div>
        </div>
    </div>
    <?php
            require 'footer.php';
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>