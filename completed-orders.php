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
    <link href="ordersTable.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <script id="orders-temp" type="text/x-handlebars-template">
        {{#each orders}}

            <form class="order" method="POST" action="send-confirmation-email.php">
                        <label class="" for="order-id"><em>Order ID: </em></label>
                        <input class="no-border" type="text" name="order-id" value="{{this.id}}" id="order-id" readonly>

                        <label class="" for="date"><em>Date: </em></label>
                        <input class="no-border" type="text" name="date" value="{{this.date}}" id="date" readonly>

                        <label class="" for="email"><em>E-mail: </em></label>
                        <input class="no-border" type="text" name="email" value="{{this.email}}" id="email" readonly>
                        <input class="complete-order" type="submit" value="Complete" disabled>

                        
            </form>
            <div class="ois"><p>{{this.orderItems}}</p></div>
        {{/each}}
    </script>
    <script src="completeOrdersTemp.js" defer></script>
</head>

<body>
    <header class="employee-header">
        <nav class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <a href="employee-home.php" id="header-logo"><img src="images/logo2.png" id="logo"></a>
                </div>
                <div class="col-8">
                    <h1 id="login-display">Logged in as: <strong><?= htmlspecialchars($user["name"]) ?></strong><h1>
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
        <!--
        <?php if (isset($user)): ?>
            
            <h1>Hello <?= htmlspecialchars($user["name"]) ?></h1>
            
        <?php else: ?>
            
            <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
            
        <?php endif; ?>
        -->
        <div class="functions">
            <a href="employee-home.php"><button class="employee-func current">Orders</button></a>
            <!--<a href="add-products.php"><button class="employee-func">Add Products</button></a> -->
            <a href="add-employees.php"><button class="employee-func">Add Employees</button></a>
        </div>

        <div id="orders-temp-here"></div>
        <br>
        <a class="view-more-orders" href="employee-home.php">Back to Active Orders</a>

    </main>
    


</body>