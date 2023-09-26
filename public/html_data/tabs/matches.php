<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/html_data/css/style.css">
    <title>Matches</title>
</head>
<body>
<?php
include("../includes/nav/navigation.php");

function getPlayerData()
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://transfermarket.p.rapidapi.com/players/get-header-info?id=74842&domain=de",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: transfermarket.p.rapidapi.com",
            "X-RapidAPI-Key: ced8202e38mshec5f19b7fa1570bp1db34ejsn9a1df5262c3d"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    return $response;
}

echo(getPlayerData());
?>
<div class="main-content">
    <h1>Matches</h1>
</div>
</body>
</html>