<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user.png" alt="">
                <h2>Heading</h2>
                <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                    first column.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user.png" alt="">
                <h2>Heading</h2>
                <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                    column.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="user.png" 14lt="">
                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
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
                <img src="thum1.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    width="400" height="500" alt="">
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
                <img src="thum2.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    width="400" height="500" alt="">

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
                <img src="thum3.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    width="400" height="500" alt="">

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
                <img src="thum4.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    width="400" height="500" alt="">

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