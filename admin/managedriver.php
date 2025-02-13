<?php
@include "include/config.php";

$sql = "SELECT * FROM driver";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Drivers</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Google Font */
/* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap'); */
@font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }
body {
    font-family: 'pop-regular';
    background: #f8f9fa;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 1200px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

/* Search Bar */
.search-container {
    margin-bottom: 10px;
    text-align: right;
}

.search-container input {
    padding: 8px;
    font-size: 14px;
    width: 250px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* Table Styling */
.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    text-align: center;
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: #007BFF;
    color: white;
    text-transform: uppercase;
}

tbody tr:hover {
    background: #f1f1f1;
    transition: 0.3s;
}

/* Profile Image */
td img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

/* Status Badge */
.status {
    padding: 5px 12px;
    border-radius: 20px;
    color: white;
    font-weight: bold;
}

.available {
    background: green;
}

.unavailable {
    background: red;
}

 /* Action Icons */
 .edit, .delete {
            margin: 0 5px;
            font-size: 16px;
            transition: 0.3s;
            padding: 5px 8px;
            border-radius: 5px;
            text-decoration: none;
        }

        .edit {
            background: #28a745;
            color: white;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .edit:hover {
            background: #218838;
        }

        .delete:hover {
            background: #c82333;
        }

/* Responsive Design */
@media screen and (max-width: 768px) {
    th, td {
        padding: 8px;
        font-size: 14px;
    }

    .search-container input {
        width: 100%;
    }

    td img {
        width: 40px;
        height: 40px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <h1>🚗 Manage Drivers</h1>
        <div class="search-container">
            <input type="text" placeholder="🔍 Search Drivers..." id="searchInput">
        </div>
        <div class="table-container">
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $n = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $profile = explode(",", $row['profile']);
                ?>
                    <tr>
                        <td><?php echo $n ?></td>
                        <td><img src="<?php echo $row['profile']; ?>" alt="Driver Profile"></td>
                        <td><?php echo $row['dfname'] ?></td>
                        <td><?php echo $row['fnumber'] ?></td>
                        <td>$<?php echo $row['hprice'] ?></td>
                        <td>$<?php echo $row['dprice'] ?></td>
                        <td><?php echo $row['type_licence'] ?></td>
                        <td><?php echo $row['adhar_pdf'] ?></td>
                        <td><?php echo $row['licence_pdf'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td>
                            <span class="status <?php echo strtolower($row['status']); ?>">
                                <?php echo $row['status']; ?>
                            </span>
                        </td>
                        <td>
                            <a  class="edit " href="updatedriver.php?did=<?php echo  $row['did'];  ?>"><i class="fa-solid fa-pen"></i></a>
                            <a   class="delete"  href="delete.php?did=<?php echo $row['did']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                $n++;
                }
                ?>
                </tbody>
            </table>
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
