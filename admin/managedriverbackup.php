<?php
@include "include/config.php";


// Pagination Logic
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch Cars with Limit and Offset
$sql = "SELECT * FROM driver LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Total Cars for Pagination Count
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM driver");
$total_row = mysqli_fetch_assoc($total_result);
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);
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
            /* overflow: hidden; */
            min-height: 100vh; /* Ensure full viewport height */
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 95%; /* Occupy most of the container width */
            max-width: 1200px;
                        /* overflow: hidden; */

            overflow-x: auto; /* Enable horizontal scrolling if needed*/
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 10px;
            text-align: right; /* Align search to the right */
        }

        .search-container input {
            padding: 8px;
            font-size: 14px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Include padding in width */
            max-width: 100%; /* Prevent search bar from overflowing */
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            /* overflow: hidden; */
            table-layout: fixed; /* Important for responsive table */
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word; /* Allow text to wrap within cells */
            overflow: hidden; /* Hide overflowing text */
            text-overflow: ellipsis; /* Add ellipsis for overflowing text */
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
            display: inline-block; /* Prevent wrapping issues */
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
            display: inline-block; /* Prevent icons from stacking */
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
            .container {
                padding: 10px; /* Reduce padding on smaller screens */
            }

            h1 {
                font-size: 1.5em; /* Reduce heading size */
            }

            .search-container input {
                width: 100%; /* Make search bar full width */
            }

            table {
                font-size: 0.8em; /* Reduce font size in table */
            }

            th, td {
                padding: 8px; /* Reduce cell padding */
                display: block; /* Stack table cells vertically */
                width: 100%; /* Make cells full width */
                box-sizing: border-box; /* Include padding in cell width */
                text-align: left; /* Align text to the left */
            }

            thead {
                display: none; /* Hide table header */
            }

            td:before {
                content: attr(data-label) ": "; /* Add data-label as prefix */
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            td img {
                width: 40px;
                height: 40px;
            }

             .edit, .delete {
                font-size: 14px; /* Reduce icon size */
                padding: 3px 6px; /* Reduce icon padding */
            }
        }
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
      
         .pagination a {
        padding: 8px 12px;
        margin: 0 4px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        background-color: white;
        transition: background-color 0.3s ease;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
        font-weight: bold;
    }

    .pagination a:hover {
        background-color: #f0f0f0;
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
                        <td>₹<?php echo $row['hprice'] ?></td>
                        <td>₹<?php echo $row['dprice'] ?></td>
                        <td><?php echo $row['type_licence'] ?></td>
                        <td><?php echo $row['adhar_pdf'] ?></td>
                        <td><?php echo $row['licence_pdf'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                    
                                <?php if($row['status']==0)
                                        {
                                            echo "<td>'Available'</td>";
                                        }
                                        elseif($row['status']==1)
                                        {
                                            echo "<td>'Not Available '</td>";
                                        }
                                ?>
                            
                        
                        
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
            <div class="d-flex">
                <div>Showing <?php echo $start + 1; ?> to <?php echo min($start + $limit, $total_entries); ?> of <?php echo $total_entries; ?> entries</div>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>" class="page-link">Previous</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" class="page-link <?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>" class="page-link">Next</a>
                    <?php endif; ?>
                </div>
            </div>
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
