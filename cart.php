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
    <script src="https://cdn.jsdelivr.net/npm/handlebars@latest/dist/handlebars.js"></script>
    <script id="cart-temp" type="text/x-handlebars-template">
        {{#each products}}
        <div class="container product-form-item">
                <div class="row">
                    <div class="col-1">
                        <a class="remove-cart-item" href="cart.php">Remove Item</a>
                    </div>
                    <div class="col-2" width="180px;">
                        <img width="180px;" src="{{this.image_url}}">
                    </div>
                    <div class="col-9">
                        <div class="cart-text">
                            <a class="cart-product-link" href="product-info.php?pname={{this.url}}"><h2>{{this.name}}</h2></a>
                            <label for="product-quantity">Quantity:</label>
                            <br>
                            <input value="{{this.orderQuantity}}" type="number" min="1" max="{{this.quantity}}" id="product-quantity">
                            <p><em>{{this.quantity}} in stock</em></p>
                            <p>Price: <em><strong>${{this.price}}</strong> each</em></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        {{/each}}
    </script>



    <script defer>
        let cartItems = <?php echo json_encode($_SESSION['cart']); ?>;
        console.log(cartItems);

        


        
        


        const productSource = document.getElementById('cart-temp').innerHTML;

        const template = Handlebars.compile(productSource);
        

        fetch('get-products.php')
            .then(response => response.json()) // Parse JSON response
            .then(data => {
                console.log(data); // JavaScript object
                // Use the data as needed
                let productContext = { products: [] };
                cartItems.forEach(element => {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].name === element.name) {
                            data[i].orderQuantity = element.quantity;
                            let urlVar = data[i].name.split(' ');
                            urlVar = urlVar.join('%20');
                            data[i].url = urlVar;
                            productContext.products.push(data[i]);
                            break;
                        }
                    }
                });
                

                const compiledProductHTML = template(productContext);

                const list = document.getElementById('cart-temp-here');
                list.innerHTML = compiledProductHTML;





                const removes = document.getElementsByClassName('remove-cart-item');
                function removeItem() {
                    for (let i = 0; i < cartItems.length; i++) {
                        if (cartItems[i].name === this.parentNode.parentNode.children[2].children[0].children[0].children[0].innerHTML){
                            
                            cartItems.splice(i, 1);
                            
                            console.log(cartItems);
                            console.log('testing');
                            fetch("process_array.php", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify({ array: cartItems }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log("Server response:", data);
                            })
                            .catch(error => {
                                console.error("Error:", error);
                            });
                            break;
                        }

                    }
                }

                for (let i = 0; i < removes.length; i++) {
                    removes[i].onclick = removeItem
                }
                
                

            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
    <script defer>
       

        
    </script>
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
                    <a href="cart.php"><button class="account current" id="cart">Cart</button></a>
                </div>
            </div>
        </nav>
    </header>

    <main class="cart-content">
        
        <!--
            <div id="cart-temp-here"></div>
        -->
        <form method="POST" action="send-email.php">
            <h1 class="product-form-item">Shopping Cart</h1>
            <?php if (count($_SESSION['cart']) > 0): ?>
            <div class="container product-form-item">
                <div class="row">
                    <div class="col-9">
                        <div class="orderEmail">
                            <label for="email"><h5>Enter email: </h5></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="submit" value="Place Order" class="order-button" id="cart-order-button">
                    </div>
                </div>
                

            </div>
            <?php endif; ?>
            
            <div id="cart-temp-here"></div>
            <?php if (count($_SESSION['cart']) == 0): ?>
                <div id="empty-cart-message">
                    <p><em>Your cart is empty<br>Click <a href="product-list.php">here</a> to view our catalog</em><br></p>
                </div>
    		<?php endif; ?>
            

        </form>

    </main>

    <footer>
        <a href="index.php"  class="footer-link">home</a>
        <a href="product-list.php"  class="footer-link">products</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>