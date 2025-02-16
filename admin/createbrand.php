<?php
@include "include/config.php";


if (isset($_POST['add'])) {

    $bname = $_POST['brand-name'];
    if ($bname != "") {
        $query = "insert into brands(bname)values('$bname');";
        $exquery = mysqli_query($conn, $query);
        if ($exquery) {
            echo "<script>alert('inserted')</script>";
        } else {
            echo "<script>alert(' not inserted')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Brand</title>
    <!-- <link rel="stylesheet" href="css/createbrand.css"> -->
    <style>
        @font-face {
    font-family: 'pop-regular';
    src: url('../font/Poppins-Regular.ttf');
}

body {
    font-family: 'pop-regular';
    margin: 0;
    padding: 0;
    background-color: rgb(221, 224, 227);
    color: #000;
    margin-right: 50px;
    padding-right: 20px;
}

.container {
    width: 80%;
    margin: 50px 70px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border: 2px solid black;
}

h1 {
    text-align: left;
    font-size: 30px;
    margin-bottom: 20px;
}

.card {
    border: 1px solid #eaeaea;
    border-radius: 5px;
    overflow: hidden;
}

.card-header {
    background-color: #f8f4ed;
    padding: 10px 15px;
    font-size: 16px;
    font-weight: bold;
    border-bottom: 1px solid #eaeaea;
}

.card-body {
    border: 1px solid black;
    border-radius: 4px;
    padding: 20px;
    margin-bottom: 50px;
}

.alert {
    padding: 10px 15px;
    margin-bottom: 15px;
    border-radius: 3px;
}

.alert.success {
    background-color:#bac1bd;
    color: #000;
    border-left: 5px solid red;
}

.danger {
    padding: 10px 15px;
    margin-bottom: 15px;
    border-radius: 3px;
    background-color: white;
    color: red;
    border-left: 5px solid #a72844;
}



.form-group {
    margin-bottom: 20px;
}

label {
    font-size: 23px;
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    height: 45px;
    padding: 8px;
    font-size: 18px;
    border: 1px solid black;
    border-radius: 3px;
    box-sizing: border-box;
}

.btn {
    display: block;
    width: 140px;
    height: 43px;
    padding: 7px;
    text-align: center;
    background-color: #d23d49;
    color: #fff;
    font-size: 25px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}


/* .btn:hover {
    background-color: red;
} */
    </style>
</head>

<body>
    <div class="container">
        <h1>Create Brand</h1>
        <div class="card">
            <!-- <div class="card-header">
                CREATE BRAND
            </div> -->
            <div class="card-body">
                <?php if (isset($_POST['add']) && !empty($_POST['brand-name'])): ?>
                    <div class="alert success">
                        <strong>SUCCESS:</strong> Brand Created successfully
                    </div>


                <?php endif; ?>
                <?php if (isset($_POST['add']) && empty($_POST['brand-name'])): ?>
                    <div class="danger">
                        <strong>FAIL:</strong> Brand not Created successfully
                    </div>
                <?php endif; ?>

                <form action="" method="POST">
                    <div class="form-group">
                        <label for="brand-name">Brand Name</label>
                        <input type="text" id="brand-name" name="brand-name" placeholder="Enter brand name">
                    </div>
                    <button type="submit" class="btn" name="add">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>