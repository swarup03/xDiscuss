<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>xDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="main.css">
</head>

<body id="back">
    <?php
            require 'dbConnect.php';
        ?>
    <?php
            require 'navbar.php';
        ?>
    <?php
    $alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        $que_tit = $_POST['que_title'];
        //replacing > and <
        $que_tit = str_replace("<","&lt;",$que_tit);
        $que_tit = str_replace(">","&gt;",$que_tit);
        $q_data = $_POST['que_desc'];
        $q_data = str_replace("<","&lt;",$q_data);
        $q_data = str_replace(">","&gt;",$q_data);
        $q_topic = $_POST['que_top'];

        $u_id=$_SESSION['userid'];
        $sql = "INSERT INTO `question` (`que_id`, `que_title`, `que_desc`, `que_user_id`, `que_cat_id`, `date`) VALUES (NULL, '$que_tit', '$q_data', '$u_id', '$q_topic', current_timestamp())";
        $result = mysqli_query($conn,$sql);
        $alert = true;
        if($alert){
            header('location: quelist.php?catid='.$q_topic.'');
            ob_end_flush();
        }
    }
?>
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="photo-1526374965328-7f61d4dc18c5.jpg" class="d-block w-100" alt="">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to xDiscussd</h5>
                    <p>Start lurning with xDiscuss.</p>
                    <button type="button" class="btn btn-primary mx-2">Explore</button>
                    <button type="button" class="btn btn-danger mx-2">Share</button>
                    <button type="button" class="btn btn-warning mx-2">Start</button>
                </div>
            </div>
            <!-- https://source.unsplash.com/1400x400/?darkcode -->
            <div class="carousel-item">
                <img src="photo-1615853053515-82b51535cde1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Work space of xDiscuss</h5>
                    <p>Lurn on our work space.</p>
                    <button type="button" class="btn btn-primary mx-2">Start</button>
                    <button type="button" class="btn btn-danger mx-2">Join</button>
                    <button type="button" class="btn btn-warning mx-2">Work</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="photo-1461749280684-dccba630e2f6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Follow xDiscuss</h5>
                    <p>Join us on several media.</p>
                    <a href="https://www.instagram.com" class="btn btn-primary mx-2">Facebook</a>
                    <a href="https://www.youtube.com" class="btn btn-danger mx-2">Toutube</a>
                    <a href="https://www.facebook.com" class="btn btn-warning mx-2">Instagram</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">xDiscuss</h1>
                    <?php 
                    if (isset($_SESSION['login']) && $_SESSION['login']=='true') {
                        echo '
                        <form action="'.$_SERVER['REQUEST_URI'].' " method="POST">
                        <select required class="form-select my-2" name="que_top" aria-label=".form-select-sm example">
                        <option value="">Select related topic</option>';
                        $sql1 = "SELECT * FROM `categories`";
                            $result = mysqli_query($conn,$sql1);
                            while ($row1 = mysqli_fetch_assoc($result)) {
                                echo "<option value=".$row1['category_id'].">".$row1['category_name']."</option>";
                            }
                        echo'
                    </select>
                        <div class="form-floating my-3">
                        <input type="text" name="que_title" id="que_title" class="form-control"
                            placeholder="Disabled input" required>
                        <label for="que_title">Title for your Question</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" name="que_desc"
                            id="floatingTextarea2" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Type your Question .......</label>
                    </div>
                    <button type="submit" class="btn btn-danger my-2">Add Question</button>
                    </form>
                    ';
                    }else{
                    echo '
                    <div class="alert alert-dark" role="alert">
                        Request to login to add your Query.
                    </div>
                    ';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>
    <div class="container mb-5">
        <?php
            $sql ="SELECT * FROM `categories`";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $categ = $row['category_name'];
                $desc = $row['category_description'];
                $catid = $row['category_id'];
                $type = $row['category_type'];
                $url =$row['inage_file'];
                $nsql = "SELECT * FROM `question` WHERE `que_cat_id` ='$catid'";
                $nresule =mysqli_query($conn,$nsql);
                $rows = mysqli_num_rows($nresule);
                echo'
                <div class=" my-3">
                    <div class="mx-auto card" style="width: 50rem;" id="card">
                        <img src="'.$url.'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$categ.'</h5>
                            <p class="card-text">'.substr( $desc,0,150).'...</p>
                            <strong class="d-inline-block mb-2 text-success">'.$rows.' Questions</strong><br>
                            <a href="quelist.php?catid='.$catid.'" class="btn btn-primary">View Question</a>
                        </div>
                    </div>
                </div>
                ';
            }
        ?>
    </div>

    <?php
        require 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>