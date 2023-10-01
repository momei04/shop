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
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Nummer</th>
            <th>Marktwert</th>
            <th>Verein</th>
        </thead>
        <tbody id="transfer-container">
        <?php
            $username="webapp";
            $password="root";
            $servername = "db";
            $dbname="webapp";
            $charset= "utf8mb4";
            $dsn = "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset;

            try{
                $db = new PDO($dsn,$username,$password);
            }catch(PDOException $err){
                echo "Connection Problems: " .$err->getMessage();
                exit();
            }

            $querry = $db->query("SELECT * FROM player");
            $players = $querry->fetchAll(PDO::FETCH_ASSOC);
            foreach ($players as $player) {
                echo("<tr>
                        <td>".$player['vorname'] . "</td>
                        <td>".$player['nachname'] . "</td>
                        <td>".$player['nummer'] . "</td>
                        <td>".$player['marktwert'] . "</td>
                        <td>".$player['club'] . "</td>
                    </tr>");
            }

            //Inserting stuff into the database
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $insert_player_vorname = $_POST['vorname'];
            $insert_player_nachname = $_POST['nachname'];
            $insert_player_number = $_POST['number'];
            $insert_player_club = $_POST['club'];
            $insert_player_marktwert = $_POST['marktwert'];

            $insert_querry =$db->prepare("INSERT INTO player (id, vorname, nachname, nummer, club, marktwert)
VALUES (null, :vorname_insert, :nachname_insert, :nummer_insert, :club_insert, :marktwert_insert)");
            $insert_querry->execute(
                    ['vorname_insert'=> $insert_player_vorname,
                    'nachname_insert'=> $insert_player_nachname,
                    'nummer_insert'=> $insert_player_number,
                    'club_insert'=> $insert_player_club,
                    'marktwert_insert'=> $insert_player_marktwert]
            );
        }

        $db = null;
        ?>

        </tbody>
    </table>


</div>


<script>
    let table = new DataTable('#transfers', {
        "lengthChange": false,
        "pageLength": 12,
        dom: "<'row'<'small-6 columns'l><'small-6 columns'f>r>"+
            "t"+
            "<'row table-footer'<'small-6 columns'i><'small-6 columns'p>>",
    });
</script>
</body>
</html>