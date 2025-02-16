 <?php
    @include "include/config.php";
    $status = 0;

    // Pagination Logic
    $limit =3;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    // Fetch Cars with Limit and Offset
    $sql = "SELECT * FROM booking where status=$status LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);

    // Total Cars for Pagination Count
    $total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM booking where status=$status");
    $total_row = mysqli_fetch_assoc($total_result);
    $total_entries = $total_row['total'];
    $total_pages = ceil($total_entries / $limit);

    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>New Booking</title>
     <link rel="stylesheet" href="css/all.min.css">
     <link rel="stylesheet" href="css/fontawesome.min.css">
     <style>
         @font-face {
             font-family: 'pop-regular';
             src: url('../font/Poppins-Regular.ttf');
         }

         body {
             font-family: 'pop-regular', sans-serif;
             margin: 20px;
             background-color: rgb(221, 224, 227);
         }

         .container {
             width: 1000px;
             margin: auto;
             background: white;
             padding: 20px;
             border-radius: 8px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         }

         h1 {
             text-align: center;
             color: #333;
         }

         .search-container {
             margin-bottom: 15px;
             display: flex;
             justify-content: space-between;
         }

         .search-container input {
             padding: 10px;
             font-size: 14px;
             width: 100%;
             max-width: 300px;
             border: 1px solid #ccc;
             border-radius: 5px;
         }

         table {
             width: 100%;
             border-collapse: collapse;
             margin-top: 20px;
         }

         .table-wrapper {
             overflow-x: auto;
         }

         th,
         td {
             border: 1px solid #ddd;
             text-align: center;
             padding: 12px;
         }

         th {
             background-color: #007bff;
             color: white;
         }

         tr:nth-child(even) {
             background-color: #fff;
         }

         tr:hover {
             background-color: #ddd;
         }

         .action a {
             text-decoration: none;
             padding: 6px 12px;
             background: #28a745;
             color: white;
             border-radius: 5px;
         }

         .action a:hover {
             background: #218838;
         }

         @media (max-width: 768px) {
             table {
                 font-size: 12px;
             }

             .search-container input {
                 width: 100%;
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
         <h1>New Booking</h1>
         <div class="search-container">
             <input type="text" id="search" placeholder="Search..." onkeyup="searchTable()">
         </div>
         <table id="bookingTable">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Booking NO</th>
                     <th>User Email</th>
                     <th>Vehicle ID</th>
                     <th>From Date</th>
                     <th>To Date</th>
                     <th>Posting Date</th>
                     <th>Status</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $n = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                     <tr>
                         <td><?php echo $n; ?></td>
                         <td><?php echo $row['bookingno']; ?></td>
                         <td><?php echo $row['userEmail']; ?></td>
                         <td><?php echo $row['vid']; ?></td>
                         <td><?php echo $row['FromDate']; ?></td>
                         <td><?php echo $row['ToDate']; ?></td>
                         <td><?php echo $row['PostingDate']; ?></td>
                         <td><?php echo ($row['status'] == 0) ? "Not Confirmed Yet" : "Confirmed"; ?></td>
                         <td class="action">
                             <a href="Approve.php?bno=<?php echo $row['bookingno']; ?>&userEmail=<?php echo $row['userEmail']; ?>&did=<?php echo $row['did']; ?>">Approve</a>
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