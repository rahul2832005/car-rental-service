<?php
include "include/config.php"; // Database connection

// Pagination settings
$limit = 2; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search functionality
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";

// SQL query with search filter
$sql = "SELECT f.fid, f.rating, f.comment, f.created_at, c.cname, u.name 
        FROM feedback f
        JOIN car_list c ON f.vid = c.vid
        JOIN reguser u ON f.uid = u.uid
        WHERE u.name LIKE '%$search%' OR c.cname LIKE '%$search%' OR f.comment LIKE '%$search%'
        ORDER BY f.created_at DESC 
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

// Count total records for pagination
$count_sql = "SELECT COUNT(*) as total FROM feedback f
              JOIN car_list c ON f.vid = c.vid
              JOIN reguser u ON f.uid = u.uid
              WHERE u.name LIKE '%$search%' OR c.cname LIKE '%$search%' OR f.comment LIKE '%$search%'";
$count_result = mysqli_query($conn, $count_sql);
$count_row = mysqli_fetch_assoc($count_result);
$total_entries = $count_row['total'];
$total_pages = ceil($total_entries / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .search-box {
            width: 50%;
            margin: 10px auto;
            display: flex;
            justify-content: space-between;
        }

        .search-box input {
            width: 80%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-box button {
            padding: 8px 12px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        .delete, .view {
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
        <h2>Manage Feedback</h2>

        <!-- Search Form -->
        <form method="GET" class="search-box">
            <input type="text" name="search" placeholder="Search by User, Car, or Comment" value="<?php echo $search; ?>">
            <button type="submit">Search</button>
        </form>

        <!-- Feedback Table -->
        <table>
            <thead>
                <tr>
                    <th>User</th>
                    <th>Car</th>
                    <th>Rating</th>
                    <th>Comment</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo str_repeat("⭐", $row['rating']); ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                        <td>
                            <a class="view" href="viewfeedback.php?fid=<?php echo $row['fid']; ?>">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="delete" href="delete.php?fid=<?php echo $row['fid']; ?>" onclick="return confirm('Do you want to delete this feedback?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination -->
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
</body>

</html>
