<?php
@include "include/config.php";

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$sql = "SELECT * FROM driver LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM driver");
$total_row = mysqli_fetch_assoc($total_result);
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024, initial-scale=1.0">
    <title>Manage Drivers</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
          @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            background: rgb(211, 217, 223);
            margin: 0;
            padding: 10px;
        }

        .container {
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 1400px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        .search-container {
            margin-bottom: 10px;
            text-align: right;
        }

        .search-container input {
            padding: 8px;
            width: 200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

       /* Profile Image */
       td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .edit, .delete {
            text-decoration: none;
            padding: 4px 8px;
            color: white;
            border-radius: 4px;
        }

        .edit { background-color: #28a745;
            margin-right: 5px; }
        .delete { background-color: #dc3545; }

        .pagination {
            margin-top: 15px;
            text-align: center;
        }

        .pagination a {
            margin: 0 4px;
            padding: 6px 12px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: black;
        }

        .pagination a.active { background-color: #007bff; color: white; }

        .btn-custom:hover {
            background-color: #bb2d3b;
        }
    </style>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
    <div class="container">
        <h1>Manage Drivers</h1>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search Drivers...">
        </div>
        <table id="driverTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Hour Price</th>
                    <th>Day Price</th>
                    <th>Licence Type</th>
                    <th>Aadhar</th>
                    <th>Licence</th>
                    <th>City</th>
                    <th>Status</th>
                    <th style="padding: 0px 20px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $n = $start + 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $n++; ?></td>
                        <td><img src="<?php echo $row['profile']; ?>" alt="Driver"></td>
                        <td><?php echo $row['dfname']; ?></td>
                        <td><?php echo $row['fnumber']; ?></td>
                        <td>₹<?php echo $row['hprice']; ?></td>
                        <td>₹<?php echo $row['dprice']; ?></td>
                        <td><?php echo $row['type_licence']; ?></td>
                        <td><?php echo $row['adhar_pdf']; ?></td>
                        <td><?php echo $row['licence_pdf']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['status'] == 0 ? 'Available' : 'Not Available'; ?></td>
                        <td>
                            <a href="updatedriver.php?did=<?php echo $row['did']; ?>" class="edit">                                    <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="delete.php?did=<?php echo $row['did']; ?>" class="delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"> <?php echo $i; ?> </a>
            <?php endfor; ?>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#driverTable tbody tr');
            rows.forEach(row => {
                let name = row.cells[2].textContent.toLowerCase();
                row.style.display = name.includes(filter) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
