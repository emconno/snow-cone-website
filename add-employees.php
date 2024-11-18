<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $is_valid = true;

    if (empty($_POST["name"])) {
        die("Name is required");
    }
    
    if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        die("Valid email is required");
    }
    
    if (strlen($_POST["password"]) < 8) {
        $is_valid = false;
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
        $is_valid = false;
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["password"])) {
        $is_valid = false;
    }
    
    if ($_POST["password"] !== $_POST["password_confirmation"]) {
        $is_valid = false;
    }
    if ($is_valid) {
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $mysqli = require __DIR__ . "/database.php";

        $sql = "INSERT INTO user (name, email, password_hash)
                VALUES (?, ?, ?)";
                
        $stmt = $mysqli->stmt_init();

        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }

        $stmt->bind_param("sss",
                        $_POST["name"],
                        $_POST["email"],
                        $password_hash);
                        
        if ($stmt->execute()) {
            $_SESSION['newuser'] = true;
            header("Location: add-employees.php");
            exit;
            
        } else {
            
            if ($mysqli->errno === 1062) {
                die("email already taken");
            } else {
                die($mysqli->error . " " . $mysqli->errno);
            }
        }
    }
    
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snow Cone</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
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
        <div class="functions">
            <a href="employee-home.php"><button class="employee-func">Orders</button></a>
            <a href="add-products.php"><button class="employee-func">Add Products</button></a>
            <a href="add-employees.php"><button class="employee-func current">Add Employees</button></a>
        </div>

        
    
        <form method="post" id="signup" class="signup-form">
            <h1 id="signup-title">Enter Employee Information:</h1>
            <table>
                <tr>
                    <td>
                        <label class="signup-label" for="name">Name</label>
                    </td>
                    <td>
                        <input class="signup-input" type="text" id="name" name="name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="signup-label" for="email">email</label>
                    </td>
                    <td>
                        <input class="signup-input" type="email" id="email" name="email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="signup-label" for="password">Password</label>
                    </td>
                    <td>
                        <input class="signup-input" type="password" id="password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="signup-label" for="password_confirmation">Repeat password</label>
                    </td>
                    <td>
                        <input class="signup-input" type="password" id="password_confirmation" name="password_confirmation" required>
                    </td>
                </tr>
                
            </table>
            
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && strlen($_POST["password"]) < 8): ?>
        		<em class="signup-error">Password must be at least 8 characters.</em><br>
    		<?php endif; ?>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" &&  (! preg_match("/[a-z]/i", $_POST["password"]))): ?>
        		<em class="signup-error">Password must contain at least one letter.</em><br>
    		<?php endif; ?>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && ( ! preg_match("/[0-9]/", $_POST["password"]))): ?>
        		<em class="signup-error">Password must contain at least one number.</em><br>
    		<?php endif; ?>
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["password"] !== $_POST["password_confirmation"]): ?>
        		<em class="signup-error">Passwords must match.</em><br>
    		<?php endif; ?>
            <?php if (isset($_SESSION['newuser']) && $_SESSION['newuser']): ?>
                <?php $_SESSION['newuser'] = false;?>
        		<em class="signup-success">New employee account Created</em><br>
    		<?php endif; ?>
            <button id="employee-submit">Create Account</button>
        </form>
        
        
        
        

    </main>
    


</body>