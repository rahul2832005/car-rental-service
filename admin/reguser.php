<?php
@include "include/config.php";

$sql = "SELECT * FROM reguser";
$result = mysqli_query($conn, $sql);
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

        /* Action Icons */
        .action-icons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .delete {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: 0.3s;
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
                        <th>User Name</th>
                        <th>Number</th>
                        <th>Email</th>
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
                        <td class="user-name"><?php echo $row['name']; ?></td>
                        <td><?php echo $row['mnumber']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a class="delete" href="delete.php?uid=<?php echo $row['uid']; ?>">
                                <i class="fa-solid fa-trash"></i> Delete
                            </a>
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
