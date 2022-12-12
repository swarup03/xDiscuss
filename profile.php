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
    <?php
        if(isset($_SESSION['login']) && $_SESSION['login']=="true"){
            $u_id=$_GET['uid'];
            $sql1 = "SELECT * FROM `users` WHERE `sno` ='$u_id'";
            $result = mysqli_query($conn,$sql1);
            $row1 = mysqli_fetch_assoc($result);
            $uname =$row1['uname'];
            echo '<div class="container mb-5">
            <div class="row my-3 p-3">
                <div class="col">
                    <h1 class="display-3 m-3 text-end">'. $uname .'</h1>
    </div>
    <div class="col">
        <img src="user.png" class="img-thumbnail" width="200px" alt="...">
    </div>
    </div>';

    echo '<p class="display-6">Your Questions:</p>';
    $data = false;
    $userid = $_SESSION['userid'];
    $sql ="SELECT * FROM `question`WHERE que_user_id='$u_id'ORDER BY `date` DESC";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    $data = true;
    $qtit =$row['que_title'];
    $qdesc = $row['que_desc'];
    $qid = $row['que_id'];
    $qdate = $row['date'];
    $q_user_id = $row['que_user_id'];
    echo '
    <div class="d-flex align-items-center my-3  p-3" style="background-color: #e8e6e9;">
        <div class="flex-shrink-0">
            <img src="user.png" width="50px" alt="...">
        </div>
        <div class="flex-grow-1 ms-3">
            <p class="float-end">'.$qdate.'</p>
            <h6 class="mb-0"><a class="text-danger" href="answer.php?qid='.$qid.'">'.$qtit.'</a></h6>
            <p class="mb-0">'.$qdesc.'</p>
        </div>
    </div>
    ';
    }if (!$data) {
    echo '<div class="alert" style="background-color: #e8e6e9;" role="alert">
        <h4 class="alert-heading">oops! No question found.</h4>
        <p>You didnt ask any question.</p>
    </div>';
    }
    echo '<p class="display-6">Your Solution:</p>';
    $data = false;
    $userid = $_SESSION['userid'];
    $sql ="SELECT * FROM `answer`WHERE ans_user_id='$u_id'ORDER BY `date` DESC";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    $data = true;
    $a_data =$row['ans_data'];
    $a_date = $row['date'];
    $a_que_id = $row['ans_que_id'];
    $sql1 = "SELECT * FROM `question`WHERE que_id='$a_que_id'";
    $result2 = mysqli_query($conn,$sql1);
    $row2 = mysqli_fetch_assoc($result2);
    $qid= $row2['que_id'];
    echo '
    <a class="text-decoration-none text-dark" href="answer.php?qid='.$qid.'">
        <div class="d-flex align-items-center my-3 p-3" style="background-color: #e8e6e9;">
            <div class="flex-shrink-0">
                <img src="user.png" width="50px" alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="float-end">'.$a_date.'</p>
                <p class="mb-0">'.$a_data.'</p>
            </div>
        </div>
    </a>
    ';
    }if (!$data) {
    echo '<div class="alert" style="background-color: #e8e6e9;" role="alert">
        <h4 class="alert-heading">oops! No solution found.</h4>
        <p>You didnt added any solution.</p>
    </div>';
    }
    }
    else{
        echo '<div class="container mt-5">
        <div class="alert alert-dark" role="alert">
        Requested to login to visit profile page.<a href="index.php" class="alert-link">Login --></a>click me. 
      </div></div>';
    }
    ?>


    <!-- // <a class="stretched-link link-success">View question -->
    </div>
    <?php
            require 'footer.php';
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>