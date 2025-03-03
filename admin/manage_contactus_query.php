<?php

@include "include/config.php";
// Pagination Logic
$limit = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch Cars with Limit and Offset
$sql = "SELECT * FROM contactusquery ORDER BY PostingDate DESC LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Total Cars for Pagination Count
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contactusquery");
$total_row = mysqli_fetch_assoc($total_result);
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Contact Us Queries</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f9; 
            margin: 0; 
            padding: 20px; 
        }
        .container { 
            background-color: #fff; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            max-width: 900px; 
            margin: 0 auto; 
        }
        h1 { 
            color: #333; 
            text-align: center; 
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: left; 
        }
        th { 
            background-color: #f4f4f4; 
            color: #333; 
        }
        tr:nth-child(even) { 
            background-color: #f9f9f9; 
        }
        tr:hover { 
            background-color: #f1f1f1; 
        }
        .action-link { 
            color: green; 
            text-decoration: none; 
        }
        .action-link:hover { 
            text-decoration: underline; 
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
          /* Search Bar */
          .search-container {
            margin-bottom: 15px;
            text-align: right;
        }

        .search-container input {
            padding: 8px;
            font-size: 14px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .delete,
        .view {
            margin: 0 5px;
            font-size: 16px;
            transition: 0.3s;
            padding: 5px 8px;
            border-radius: 5px;
            text-decoration: none;
        }

        .delete {
            background: #dc3545;
            color: white;
        }

        .delete:hover {
            background: #c82333;
        }

        .view {
            background: rgb(45, 96, 207);
            color: white;
        }

        .view:hover {
            background: rgb(67, 97, 161);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Contact Us Queries</h1>
        <div class="search-container">
             <input type="text" id="search" placeholder="Search..." onkeyup="searchTable()">
         </div>
        <table id="bookingTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Posting Date</th>
                    <th style="padding: 0 33px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $cnt = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $cnt++; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['messages']; ?></td>
                        <td><?php echo $row['PostingDate']; ?></td>
                        <td>
                            <a class="view" style="padding:5px 4px;" href="viewquery.php?contactid=<?php echo $row['contactid']; ?>">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="delete" href="delete.php?contactid=<?php echo $row['contactid']; ?>" onclick="return confirm('Do You Delete Query!');">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
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
    
       <script>
         function searchTable() {
             let input = document.getElementById("search").value.toLowerCase();
             let rows = document.querySelectorAll("#bookingTable tbody tr");

             rows.forEach(row => {
                 let text = row.textContent.toLowerCase();
                 row.style.display = text.includes(input) ? "" : "none";
             });
         }
     </script>
   
</body>
</html>