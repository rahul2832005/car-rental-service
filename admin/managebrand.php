<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <style>
        @font-face {
            font-family: 'pop-regular';
            src: url('../font/Poppins-Regular.ttf');
        }

        body {
            font-family: 'pop-regular', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #dc3545;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #bb2d3b;
        }

        input[type="text"] {
            padding: 8px;
            width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-warning {
            color: orange;
            text-decoration: none;
        }

        .text-danger {
            color: red;
            text-decoration: none;
        }

        .pagination a {
            margin: 0 4px;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #ddd;
            color: black;
        }

        .pagination a.active {
            background-color:rgb(60, 165, 179);
            color: white;
        }

        .pagination a:hover {
            background-color: #ddd;
        }

        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Manage Brands</h1>
        <div class="d-flex">
            <a href="createbrand.php" class="btn-custom">+ Add Brand</a>
            <input type="text" id="search" placeholder="Search...">
        </div>
        <table>
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
                @include 'include/config.php';
                $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM brands");
                $row = mysqli_fetch_assoc($result);
                $total_entries = $row['total'];
                $limit = 5;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;
                $total_pages = ceil($total_entries / $limit);

                $query = "SELECT * FROM brands LIMIT $start, $limit";
                $exquery = mysqli_query($conn, $query);
                $n = $start + 1;
                while ($row = mysqli_fetch_assoc($exquery)) {
                ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $row['bname']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><?php echo $row['updated_at']; ?></td>
                        <td>
                            <a href="updatebrand.php?bid=<?php echo $row['bid']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> &#160;
                            <a href="delete.php?bid=<?php echo $row['bid']; ?>" ><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php
                    $n++;
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex">
            <span>Showing <?php echo $start + 1; ?> to <?php echo min($start + $limit, $total_entries); ?> of <?php echo $total_entries; ?> entries</span>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="<?php echo $i == $page ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>
