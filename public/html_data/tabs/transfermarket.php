<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--JQuerry-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Datatables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="/html_data/css/style.css">
    <title>Transfermarkt</title>
</head>
<body>
<?php


include("../includes/nav/navigation.php");
?>


<div class="main-content">
    <h1>Transfermarkt</h1>
    <table id="transfers" >
        <thead>
        <tr>
            <th>player info</th>
        </tr>
        </thead>
        <tbody id="transfer-container">

        </tbody>
    </table>
</div>

<script src="database/transfermarket.js"></script>
<script>
    let table = new DataTable('#transfers', {
        "pageLength": 15,
        dom: "<'row'<'small-6 columns'l><'small-6 columns'f>r>"+
            "t"+
            "<'row table-footer'<'small-6 columns'i><'small-6 columns'p>>",
    });
</script>
</body>
</html>