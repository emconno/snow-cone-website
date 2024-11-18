<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: employee-home.php");
            exit;
        }
    }
    
    $is_invalid = true;

}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div class="login-box">
        <form method="POST" id="login">
            <h1>Employee Login</h1><br>
		    <?php if ($is_invalid): ?>
        		<em>Invalid login!</em>
    		<?php endif; ?>
            <table id="login-table">
                <tr>
                    <td>
                        <label for="email" class="login-label">Email:</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" class="login-input" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td>
                        <label for="password" class="login-label">Password:</label>
                    </td>
                    <td>
                        <input type="password" id="password" name="password" class="login-input" required>
                    </td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Login" id="login-button">
        </form>
    </div>
</body>