
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Car Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #result {
            margin-top: 10px;
        }
        .car-item {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <h2>Search Cars</h2>
    <input type="text" id="search" placeholder="Search by name..." autocomplete="off">
    <div id="result"></div>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "search2.php",
                        method: "POST",
                        data: { search: query },
                        success: function(data) {
                            $("#result").html(data);
                        }
                    });
                } else {
                    $("#result").html("");
                }
            });
        });
    </script>

</body>
</html>
