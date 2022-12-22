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
    <form class="row g-3 my-5 mx-4">
        <div class="col-md-6">
            <label for="fname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fname" placeholder="First name" aria-label="First name">
        </div>
        <div class="col">
            <label for="lname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lname" placeholder="Last name" aria-label="Last name">
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="eg@mail.com" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Phone No.</label>
            <input type="number" class="form-control" placeholder="+91xxxxxxxxxx" id="inputPassword4">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Ishu</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
    </form>
    <?php
            require 'footer.php';
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>