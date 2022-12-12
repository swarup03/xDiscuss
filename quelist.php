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
    <!-- fatching data frm category table -->
    <?php
            
            $id =$_GET['catid'];
            $sql ="SELECT * FROM `categories`WHERE category_id=$id";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                
                $catname =$row['category_name'];
                $catdesc = $row['category_description'];
            }
        ?>
    <!-- submiting question -->
    <?php
            $alert = false;
            $id =$_GET['catid'];
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == 'POST'){
                $que_tit = $_POST['que_title'];
                //replacing > and <
                $que_tit = str_replace("<","&lt;",$que_tit);
                $que_tit = str_replace(">","&gt;",$que_tit);
                $q_data = $_POST['que_desc'];
                $q_data = str_replace("<","&lt;",$q_data);
                $q_data = str_replace(">","&gt;",$q_data);

                $u_id=$_SESSION['userid'];
                $sql = "INSERT INTO `question` (`que_id`, `que_title`, `que_desc`, `que_user_id`, `que_cat_id`, `date`) VALUES (NULL, '$que_tit', '$q_data', '$u_id', '$id', current_timestamp())";
                $result = mysqli_query($conn,$sql);
                $alert = true;
                if($alert){
                    echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Congrulation!</strong> Question added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        ?>
    <div class="container mb-5">
        <h1 class="display-5 m-3"><?php echo $catname; ?> Questions</h1>

        <?php 
        
        if (isset($_SESSION['login']) && $_SESSION['login']=='true') {
            echo '
            <form action="'. $_SERVER['REQUEST_URI'] .'" method="POST"
        class=" border border-Dark p-3 m-5 border-opacity-75">
        <p class="display-6">Add your Question</p>
        <div class="form-floating my-3">
            <input type="text" name="que_title" id="que_title" class="form-control" placeholder="Disabled input"
                required>
            <label for="que_title">Title for your Question</label>
        </div>
        <div class="form-floating my-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="que-desc" name="que_desc"
                style="height: 100px" required></textarea>
            <label for="que-desc">Describe your Question</label>
        </div>
        <button type="submit" class="btn btn-danger my-3">Add Question</button>
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
        <!-- //question viewing -->
        <p class="display-6">Questions :</p>
        <?php
        $data = false;
            $id =$_GET['catid'];
            $sql ="SELECT * FROM `question`WHERE que_cat_id='$id' ORDER BY `date` DESC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $data = true;
                $qtit =$row['que_title'];
                $qdesc = $row['que_desc'];
                $qid = $row['que_id'];
                $qdate = $row['date'];
                $q_user_id = $row['que_user_id'];
                $sql2= "SELECT `uname` FROM `users` WHERE sno='$q_user_id'";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '
                <div class="d-flex align-items-center my-3  p-3" style="background-color: #e8e6e9;">
                    <div class="flex-shrink-0">
                        <img src="user.png" width="50px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p  class="float-end">'.$qdate.'</p>
                        <h5 class="fw-semibold"><a class="text-dark text-decoration-none" href="profile.php?uid='.$q_user_id.'">'.$row2["uname"].'</a></h5>
                        <h6 class="mb-0"><a class="text-danger" href="answer.php?qid='.$qid.'" >'.$qtit.'</a></h6>
                        <p>'.$qdesc.'</p>
                    </div>
                </div>
                ';
            }if (!$data) {
                echo '<div class="alert" style="background-color: #e8e6e9;" role="alert">
                <h4 class="alert-heading">oops! No question found.</h4>
                <p>Be the first person to ask the question.</p>
                </div>';
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