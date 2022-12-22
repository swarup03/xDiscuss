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
    <!-- fatching data from the question table -->
    <?php
            $id =$_GET['qid'];
            $sql ="SELECT * FROM `question`WHERE que_id=$id";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $qtit =$row['que_title'];
                $qdesc = $row['que_desc'];
                $qdate = $row['date'];
            }
        ?>
    <!-- submiting the answer writen  -->
    <?php
            $alert = false;
            $id =$_GET['qid'];
            $method = $_SERVER['REQUEST_METHOD'];
            if($method == 'POST'){
                $a_sol = $_POST['a_sol'];
                $a_sol = str_replace("<","&lt;",$a_sol);
                $a_sol = str_replace(">","&gt;",$a_sol);
                $u_id=$_SESSION['userid'];
                $sql = "INSERT INTO `answer` (`ans_id`, `ans_data`, `ans_que_id`, `date`,`ans_user_id`) VALUES (NULL, '$a_sol', '$id', current_timestamp(),'$u_id')";
                $result = mysqli_query($conn,$sql);
                $alert = true;
                if($alert){
                    echo '
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>👍!</strong> Solution added successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
        ?>
    <div class="container md-5">
        <p class="mx-3 float-end"><?php echo $qdate ?></p>
        <h1 class="display-5 m-3"><?php echo $qtit ?></h1>
        <p class="mx-3"><?php echo $qdesc ?></p>
        <?php 
        
        if (isset($_SESSION['login']) && $_SESSION['login']=='true') {
            echo '
            <form action="'.$_SERVER['REQUEST_URI'] .'" method="POST"
        class=" border border-Dark p-3 m-5 border-opacity-75">
        <p class="display-6">Add your Solution</p>
        <div class="form-floating my-3">
            <textarea class="form-control" placeholder="Leave a comment here" id="a_sol" name="a_sol"
                style="height: 100px" required></textarea>
            <label for="a_sol">Describe your Solution</label>
        </div>
        <button type="submit" class="btn btn-danger my-3">Add Solution</button>
        </form>
        ';
        }else{
        echo '
        <div class="alert alert-dark" role="alert">
            Request to login to add your Solution.
        </div>
        ';
        }

        ?>
        <p class="display-6">Solutions :</p>
        <!-- printing the answer present in a table -->
        <?php
        $data = false;
            $id =$_GET['qid'];
            $sql ="SELECT * FROM `answer`WHERE ans_que_id=$id ORDER BY `date` DESC";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $data = true;
                $a_data =$row['ans_data'];
                $a_date = $row['date'];
                $a_user_id = $row['ans_user_id'];
                $sql2= "SELECT `uname` FROM `users` WHERE sno=$a_user_id";
                $result2 = mysqli_query($conn,$sql2);
                $row2 = mysqli_fetch_assoc($result2);
                echo '
                <div class="d-flex align-items-center my-3 p-3" style="background-color: #e8e6e9;">
                <div class="flex-shrink-0">
                    <img src="user.png" id="usm-img" width="50px" alt="...">
                </div>
                <div class="flex-grow-1 ms-3">
                <p  class="float-end">'.$a_date.'</p>
                    <h5 class="fw-semibold my-0"><a class="text-dark text-decoration-none"  href="profile.php?uid='.$a_user_id.'">'.$row2['uname'].'</a></h5>
                    <p>'.$a_data.'</p>
                    
                </div>
            </div>
                ';
            }if (!$data) {
                echo '<div class="alert" style="background-color: #e8e6e9;" role="alert">
                <h4 class="alert-heading">oops! No solution found.</h4>
                <p>You can add your answer in above form.</p>
                </div>';
            }
        ?>
        <!-- footer -->
        <?php
            require 'footer.php';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>