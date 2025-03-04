<?php
@include "include/config.php";


// Pagination Logic
$limit = 2;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch Cars with Limit and Offset
$sql = "SELECT * FROM reguser LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Total Cars for Pagination Count
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM reguser");
$total_row = mysqli_fetch_assoc($total_result);
$total_entries = $total_row['total'];
$total_pages = ceil($total_entries / $limit);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
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
            height: 90vh;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 900px;
            text-align: center;
            margin-top: -50px;
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
            padding: 10px;
            font-size: 16px;
            width: 100%;
            max-width: 300px;
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
            padding: 10px 9px;
            
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
       /* Profile Image */
       td img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
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

        /* Action Icons */
        .action-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .delete {
            background: #dc3545;
            color: white;
            /* padding: 8px; */
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
        }
        .view {
            background:rgb(53, 78, 220);
            color: white;
            /* padding: 8px; */
            padding: 6px 8px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
            margin: 10px 10px;
           
        }
        
        .view:hover {
            background:rgb(50, 37, 170);
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
            th, td {
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
        <h1>👥 Manage Users</h1>
        <div class="search-container">
            <input type="text" id="search" placeholder="🔍 Search by user name..." autocomplete="off" onkeyup="searchTable()">
        </div>
        <div class="table-container">
            <table id="userTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Profile</th>
                        <th>User Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $n =$start+ 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><img src="../user/<?php echo  $row['profile_picture']; ?>" alt="User"></td>
                        <td class="user-name"><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mnumber']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a class="view" href="viewuser.php?uid=<?php echo $row['uid']; ?>">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                       
                            <a class="delete" href="delete.php?uid=<?php echo $row['uid']; ?>">
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
            let table = document.getElementById("userTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) { 
                let userNameCell = rows[i].getElementsByClassName("user-name")[0];
                if (userNameCell) {
                    let userName = userNameCell.textContent.toLowerCase();
                    if (userName.includes(input)) {
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
