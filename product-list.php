
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snow Cone</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script id="product-temp" type="text/x-handlebars-template">
        {{#each products}}
                <button class="product {{this.category}}">
                    <div class="pidiv">
                        <img class="product-img" src="{{this.image_url}}">
                    </div>
                    
                    <div class="product-description">
                        <h2 class="list-name">{{this.name}}</h2>
                        <p>{{this.description}}</p>
                    </div>
                </button>
        {{/each}}
    </script>
    <script src="productListTemplate.js" defer></script>
    <script src="searchFilter.js" defer></script>

</head>

<body>
    <header>
        <nav class="container-fluid">
            <div class="row">
                <div class="col-2">
                    <a href="index.php" id="header-logo"><img src="images/logo2.png" id="logo"></a>
                </div>
                <div class="col-8">
                    <form action="index.php" method="POST">
                        <input id="search-bar" type="text" placeholder="Search for a product">
                    </form>
                </div>
                <div class="col-2">
                    <div class="inline">
                        <a href="login.php"><button class="account">Employee Log-in</button></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <input type="text" id="search-filter" onkeyup="searchFilter()" placeholder="Search for a product by name">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="product-list"></div>
                </div>
            </div>
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