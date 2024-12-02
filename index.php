<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snow Cone</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="cartInit.js" defer></script>
    <script src="forButtons.js" defer></script>
</head>

<body>
    <header>
        <nav class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <a href="index.php" id="header-logo"><img src="images/logo2.png" id="logo"></a>
                </div>
                <div class="col-7">
                    <form action="product-list.php" method="POST">
                        <input id="search-bar" type="text" placeholder="Search for a product">
                    </form>
                </div>
                <div class="col-3" id="header-buttons">
                    <a href="login.php"><button class="account">Employee Log-in</button></a>
                    <a href="cart.php"><button class="account" id="cart">Cart</button></a>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <a id="srup">
                        <button class="home-button" id="syrup">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">Syrup</h2>
                                </div>
                            </div>
                            
                            
                        </button>
                    </a>
                    <a id="cnes">
                        <button class="home-button" id="cones">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">Cones</h2>
                                </div>
                            </div>
                        </button>
                    </a>
                    <a id="machine" href="product-list.php">
                        <button class="home-button" id="ice-machines">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">Ice Machines</h2>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>

                <div class="col-8">
                    <a href="product-list.php">
                        <button class="home-button" id="big-button">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">All Products</h2>
                                </div>
                            </div>
                            
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="about">
            <h1 class="center">Welcome to Frosty's Cones!</h1>
            <p><em>Click one of the buttons above to explore our catalog.</em></p>
        </div>


    </main>

    <footer>
        <a href="index.php"  class="footer-link">home</a>
        <a href="product-list.php"  class="footer-link">products</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>