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

    <div class="container">
        <h1 class="display-5 m-3">Search Result for <?php echo $_GET['search'] ?></h1>
        <?php
        $ser = $_GET['search'];
            $data = false;
            $sql ="SELECT * FROM `question` WHERE MATCH (`que_title`,`que_desc`) against ('$ser');";
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
                <div class="d-flex align-items-center my-3 p-3" style="background-color: #e8e6e9;">
                    <div class="flex-shrink-0">
                        <img src="user.png" width="50px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p  class="float-end">'.$qdate.'</p>
                        <h5 class="fw-semibold my-0"><a class="text-dark text-decoration-none" href="#">'.$row2["uname"].'</a></h5>
                        <h6><a class="text-danger" href="answer.php?qid='.$qid.'" >'.$qtit.'</a></h6>
                        <p>'.$qdesc.'</p>
                    </div>
                </div>
                ';
            }if (!$data) {
                echo '<div class="alert" style="background-color: #e8e6e9;" role="alert">
                <h4 class="alert-heading">oops! No solution found.</h4>
                <p class="lead mb-0">Suggestion</p>
                <ul>
                    <li>make shore all words are correct </li>
                    <li>Try different keyword</li>
                </ul>
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