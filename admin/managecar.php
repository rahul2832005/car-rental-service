<?php
@include "include/config.php";
// Pagination Logic
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch Cars with Limit and Offset
$sql = "SELECT * FROM car_list LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Total Cars for Pagination Count
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM car_list");
$total_row = mysqli_fetch_assoc($total_result);
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular';
            background: rgb(211, 217, 223);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* overflow: hidden; */
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            /* width: 100%; */
           
            text-align: center;
            margin-left: 170px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Search Bar */
        .search-container {
            margin-bottom: 15px;
            text-align: right;
        }

        .search-container input {
            padding: 8px;
            font-size: 14px;
            width: 250px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Table Styling */
        /* .table-container {
             overflow-x: auto; 
             overflow-y: auto; 

        }*/ 

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            margin-left: 10px;
        }

        th,
        td {
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

        /* Status Badge */
        .status {
            padding: 5px 12px;
            border-radius: 20px;
            color: #000;
        }

        .maintenance {
            background: orange;
        }

        .notavailable {
            background: gray;
        }

        /* Action Icons */
        .edit,
        .delete {
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

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-left: 35px;
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

        /* Responsive Design */
        @media screen and (max-width: 768px) {

            th,
            td {
                padding: 8px;
                font-size: 14px;
            }

            .search-container input {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🚗 Manage Cars</h1>
        <div class="search-container">
            <input type="text" id="search" placeholder="🔍 Search by car name..." autocomplete="off" onkeyup="searchTable()">
        </div>
        <div class="table-container">
            <table id="carTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Car Name</th>
                        <th>Hour Price</th>
                        <th>Day Price</th>
                        <th>No Plate</th>
                        <th>Brand</th>
                        <th>Seats</th>
                        <th>Fuel</th>
                        <th>Status</th>
                        <th style="padding: 0px 22px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $n = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td class="car-name"><?php echo $row['cname']; ?></td>
                            <td>₹<?php echo $row['chprice']; ?></td>
                            <td>₹<?php echo $row['price']; ?></td>
                            <td><?php echo $row['no_plate']; ?></td>
                            <td><?php echo $row['brand']; ?></td>
                            <td><?php echo $row['seat']; ?></td>
                            <td><?php echo $row['fual']; ?></td>
                            <td>
                                <span class="status <?php echo strtolower($row['status']); ?>">
                                    <?php
                                    if ($row['status'] == 0) echo "<span class='available'> Available</span>";
                                    elseif ($row['status'] == 1) echo "<span class='booked'>Booked </span>";
                                    elseif ($row['status'] == 2) echo "<span class='maintenance'>Maintenance </span>";
                                    else echo "Not Available";
                                    ?>
                                </span>
                            </td>
                            <td>
                                <a class="edit" style="padding:5px 4px;" href="update.php?vid=<?php echo $row['vid']; ?>">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a class="delete" href="delete.php?vid=<?php echo $row['vid']; ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
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
        function searchTable() {
            let input = document.getElementById("search").value.toLowerCase();
            let table = document.getElementById("carTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let carNameCell = rows[i].getElementsByClassName("car-name")[0];
                if (carNameCell) {
                    let carName = carNameCell.textContent.toLowerCase();
                    if (carName.includes(input)) {
                        rows[i].style.display = "";
                    } else {
                        rows[i].style.display = "none";
                    }
                }
            }

        }
    </script>

</body>

</html>