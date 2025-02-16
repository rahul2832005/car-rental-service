<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        }

        .card-header {
            background-color: #dc3545;
            color: white;
        }

        .btn-custom {
            background-color: #dc3545;
            color: white;
        }

        .btn-custom:hover {
            background-color: #bb2d3b;
        }

        .pagination a {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h1 class="mb-4">Manage Brands</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="createbrand.php" class="btn btn-custom">+ Add Brand</a>
            <input type="text" id="search" class="form-control w-25" placeholder="Search..." onkeyup="searchTable()">
        </div>
        <div class="card shadow-sm">
            <div class="card-header">Listed Brands</div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="brandTable">
                    <thead class="table-light">
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
                                    <a href="updatebrand.php?bid=<?php echo $row['bid']; ?>" class="text-warning me-3"><i class="fas fa-edit"></i></a>
                                    <a href="delete.php?bid=<?php echo $row['bid']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php
                            $n++;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between mt-3">
                    <span>Showing <?php echo $start + 1; ?> to <?php echo min($start + $limit, $total_entries); ?> of <?php echo $total_entries; ?> entries</span>
                    <nav>
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($page < $total_pages): ?>
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
