<?php
$conn=mysqli_connect('localhost','root','','car_rent');


$sql = "select * from driver";

$result = mysqli_query($conn, $sql);


?>
    <style>
    /* Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

/* body {
    font-family: 'Poppins', sans-serif;
    background: #f4f4f4;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
} */
 

/* .container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 900px;
    text-align: center;
} */

h2 {
    margin-bottom: 20px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    color: #333;
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
    color: white;
    font-weight: bold;
}

.available {
    background: green;
}

.unavailable {
    background: red;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>🚗 Available Drivers</h2>
        
        <table>
            <thead>
                <tr>
                    <th>👤 Name</th>
                    <th>🎂 Age</th>
                    <th>💰 Rate (per day)</th>
                    <th>📌 Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $n=1;
        while ($row = mysqli_fetch_assoc($result)) {
            $proff = explode(",", $row['proff']);
        ?>
                <tr>
                    <td><?php echo  $row['dfname']; ?></td>
                    <td><?php echo "20";  ?></td>
                    <td><?php echo $row['dprice']; ?></td>
                    <?php 
                        if($row['status']==0)
                        {
                            echo "<td><span class='status available'>Available</span></td>";
                        }
                        elseif($row['status']==1)
                      {
                        echo "<td><span class='status unavailable'>unavailable</span></td>";

                      }
                    ?>
                </tr>
                
                <?php
        $n++;
        }
        ?>
            </tbody>
        </table>
    </div>

