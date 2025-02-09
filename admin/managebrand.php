<?php
@include "include/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Brands</title>
    <link rel="stylesheet" href="css/managebrand.css">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="fontawesome-free-6.4.0-web/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="css/all.min.css">
 <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
  
        <div class="add">
        <button  class="btn"><a href="createbrand.php" class="btnadd">+ADD</a></button>
        </div>
    <div class="container">
        <h1>Manage Brands</h1>
        <div class="card">
            <div class="card-header">
                LISTED BRANDS
            </div>
            <div class="card-body">
                <div class="form-control">
                    <label for="entries">Show</label>
                    <select id="entries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>entries</span>
                    <label for="search">Search:</label>
                    <input type="text" id="search" placeholder="Search...">
                </div>
                <div class="table-container">
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
                           $n=1;
                            $query="select * from brands";
                            $exquery=mysqli_query($conn,$query);
                            $total=mysqli_num_rows($exquery);
                            if($total != 0)
                            {
                            
                              while ($row = mysqli_fetch_assoc($exquery)) {
                                ?>
                                  <tr align="center">
                                    <td><?php echo $n ?></td>
                                    <td><?php echo $row["bname"] ?></td>
                                    <td><?php echo $row["created_at"]?></td>
                                    <td><?php echo $row["updated_at"]?></td>
                                
                                    
                                    <td>
                                    <a href="edit-brand.php?bid=<?php echo $row["bid"] ?>" class="link-dark1"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                      <a href="delete.php?bid=<?php echo $row["bid"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                    
                                    </td>
                                  </tr>
                                <?php
                                $n++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                    <span>Showing 1 to 7 of 7 entries</span>
                    <div>
                        <a href="#">Previous</a>
                        <a href="#">1</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>