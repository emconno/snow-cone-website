<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snow Cone</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="employee-header">
        <nav class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <a href="employee-home.php" id="header-logo"><img src="images/logo2.png" id="logo"></a>
                </div>
                <div class="col-8">

                </div>
                <div class="col-2">
                    <div class="inline">
                        <a href="logout.php"><button class="account">Log Out</button></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        
    </main>
    


</body>