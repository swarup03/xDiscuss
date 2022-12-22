<?php
session_start();
    echo '
        <nav class="navbar /*fixed-top*/ navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">xDiscuss</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto justify-content-center mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories 
                            </a>
                            <ul class="dropdown-menu">';
                            $sql1 = "SELECT * FROM `categories` Limit 4";
                            $result = mysqli_query($conn,$sql1);
                            while ($row1 = mysqli_fetch_assoc($result)) {
                                echo '<li><a class="dropdown-item" href="quelist.php?catid='.$row1['category_id'].'">'.$row1['category_name'].'</a></li>';
                            }
                                
                                echo'
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="contect.html">Request</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contect.php">Contect us <span class="badge bg-primary">New</span></a>
                        </li>
                    </ul>';
                    if(isset($_SESSION['login']) && $_SESSION['login']=="true"){
                        $email = $_SESSION['email'];
                        $sql1 = "SELECT * FROM `users` WHERE `uname` ='$email'";
                            $result = mysqli_query($conn,$sql1);
                            $row1 = mysqli_fetch_assoc($result);
                            $u_id =$row1['sno'];
                        echo '
                        <form class="d-flex" role="search" methot="GET" action="search_result.php">
                        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                        <p style="font-family: garamond;" class="text-info fs-6 pb-0 mb-0 mx-4"> Hi,<a href="profile.php?uid='.$u_id.'" class="text-info text-decoration-none"> '.$email.'</a> </p>
                        <a class="btn btn-outline-danger mx-3" href="logout.php">Logout</a>
                    
                        ';
                    }else{ echo '
                    <form class="d-flex" role="search" methot="GET" action="search_result.php">
                        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                        <button class="btn btn-outline-danger mx-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
                    ';}
                echo'
                </div>
            </div>
        </nav>';// <!-- login modal -->
        require 'login.php';// <!-- signup modal -->
    require 'signup.php';
    if(isset($_GET['ssucce']) && $_GET['ssucce']=="true"){
        echo '
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>👍</strong> Account created successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    if(isset($_GET['ssucce']) && $_GET['ssucce']=="false"){
        $serrer = $_GET['serrer'];
        echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>oops!</strong>'.$serrer.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
    if(isset($_GET['lsucce']) && $_GET['lsucce']=="false"){
        $lerror = $_GET['lerrer'];
        echo '
        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>oops!</strong>'.$lerror.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
?>