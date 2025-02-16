<?php
@include "include/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <!-- <link rel="stylesheet" href="css/managebrand.css"> -->
    <!-- <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            margin: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: left;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .card {
            border: 1px solid #333;
            border-radius: 5px;
            overflow: hidden;
        }

        .card-header {
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            background-color: rgb(220, 80, 92);
            color: white;
            border-radius: 5px 5px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            text-align: left;
            background-color: #f8f4ed;
        }

        th,
        td {
            border: 1px solid #ddd;

            padding: 10px;
        }

        /* th {
            background-color: #007bff;
            color: white;
        } */
        .add {
            margin-top: 30px;
            padding-left: 420pt;
            margin-bottom: 15px;
        }

        .btn {
            width: 100px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #333;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
        }

        .btn a {
            text-decoration: none;
            color: #000;
        }

        .btn:hover {
            background-color: #e63946;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            text-decoration: none;
            background: #fff;
            color: #000;
            border-radius: 5px;
            border: 1px solid #333;
        }

        .pagination a:hover {
            background: #e63946;
            color: #fff;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .search-container input {
            padding: 5px;
            width: 200px;
            height: 25px;
            font-size: 17px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .link-dark1 {
            margin-right: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Brands</h1>
        <div class="add">
            <button class="btn"><a href="createbrand.php">+ ADD</a></button>
        </div>
        <div class="card">
            <div class="card-header">LISTED BRANDS</div>
            <div class="card-body">
                <div class="search-container">
                    <input type="text" id="search" placeholder="Search..." onkeyup="searchTable()">
                </div>
                <table id="brandTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Brand Name</th>
                            <th>Creation Date</th>
                            <th>Updation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $query = "SELECT * FROM brands";
                        $exquery = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($exquery)) {
                        ?>
                            <tr>
                                <td><?php echo $n; ?></td>
                                <td><?php echo $row["bname"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                                <td><?php echo $row["updated_at"]; ?></td>
                                <td>
                                    <a href="updatebrand.php?bid=<?php echo $row["bid"] ?>" class="link-dark1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="delete.php?bid=<?php echo $row["bid"] ?>" class="link-dark"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $n++;
                        } ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <span>Showing 1 to 7 of 7 entries</span>
                    <div>
                        <a href="#">Previous</a>
                        <a href="#">1</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let rows = document.querySelectorAll("#brandTable tbody tr");
            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
</body>

</html>