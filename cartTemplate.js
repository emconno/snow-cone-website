const productSource = document.getElementById('cart-temp').innerHTML;

const template = Handlebars.compile(productSource);




fetch('get-products.php')
    .then(response => response.json()) // Parse JSON response
    .then(data => {
        console.log(data); // JavaScript object
        // Use the data as needed
        let productContext = { products: [] };
        const inCart = localStorage.get("cart");
        inCart.forEach(element => {
            for (let i = 0; i < data.length; i++) {
                if (data[i].name === element) {
                    productContext.products.push(data[i]);
                    break;
                }
            }
        });

        const compiledProductHTML = template(productContext);

        const list = document.getElementById('cart-temp-here');
        list.innerHTML = compiledProductHTML;

    })
    .catch(error => console.error('Error fetching data:', error));