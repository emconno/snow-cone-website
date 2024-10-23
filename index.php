<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snow Cone</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <h1>PHP TEST</h1>
                </div>
                <div class="col-8">
                    <form action="index.html" method="POST">
                        <input id="search-bar" type="text" placeholder="Search for a product">
                    </form>
                </div>
                <div class="col-2">
                    <div class="inline">
                        <a href="index.html"><button class="account">Log In</button></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <a href="product-list.html">
                        <button class="home-button" id="syrup">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">Syrup</h2>
                                </div>
                            </div>
                            
                            
                        </button>
                    </a>
                    <a href="product-list.html">
                        <button class="home-button" id="cones">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">Cones</h2>
                                </div>
                            </div>
                        </button>
                    </a>
                    <a href="product-list.html">
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
                    <a href="product-list.html">
                        <button class="home-button" id="big-button">
                            <div class="for-button">
                                <div class="button-label">
                                    <h2 class="home-button-title">All Products</h2>
                                </div>
                            </div>
                            
                        </button>

                        <?php echo "testing php" ?>
                    </a>
                </div>
            </div>
        </div>



    </main>

    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
