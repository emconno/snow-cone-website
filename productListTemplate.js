const productSource = document.getElementById('product-temp').innerHTML;

const template = Handlebars.compile(productSource);





fetch('get-products.php')
    .then(response => response.json()) // Parse JSON response
    .then(data => {
        console.log(data); // JavaScript object
        // Use the data as needed
        const productContext = { products: [] };
        productContext.products = data;

        const compiledProductHTML = template(productContext);

        const list = document.getElementById('product-list');
        list.innerHTML = compiledProductHTML;


        let productButtons = document.getElementsByClassName("product");

        console.log(productButtons);
        
        function openProductPage() {
            
            location.href="product-info.php";
            console.log('testing button');
        }

        for (let i = 0; i < Object.keys(productButtons).length; i++) {
            productButtons[i].addEventListener('click', (event) => {
                const url = `product-info.php?pname=` + encodeURIComponent(productButtons[i].children[1].children[0].innerHTML);
                window.location.href = url; // Navigate to the URL
            });
        }
        /*
        productButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const url = `product-info.php?pname=` + encodeURIComponent(button.children[1].children[0].innerHTML);
                window.location.href = url; // Navigate to the URL
            });
        });
        */
    })
    .catch(error => console.error('Error fetching data:', error));
/*
productContext.products = [
    {
        product_id: 1,
        product_name: 'ice',
        sale_price: 5,
        category: 'ingredients'
    },
    {
        product_id: 2,
        product_name: 'cherry syrup',
        sale_price: 7,
        category: 'syrup'
    },
    {
        product_id: 3,
        product_name: 'grape syrup',
        sale_price: 7,
        category: 'syrup'
    },
    {
        product_id: 4,
        product_name: 'cones',
        sale_price: 7,
        category: 'straws/paper goods'
    },
    {
        product_id: 5,
        product_name: 'ice machine',
        sale_price: 7,
        category: 'ice machine'
    },
    {
        product_id: 6,
        product_name: 'ice machine',
        sale_price: 7,
        category: 'ice macine'
    },
    {
        product_id: 7,
        product_name: 'strawberry syrup',
        sale_price: 7,
        category: 'syrup'
    },
    {
        product_id: 6,
        product_name: 'ice machine',
        sale_price: 7,
        category: 'ice macine'
    },
    {
        product_id: 6,
        product_name: 'ice machine',
        sale_price: 7,
        category: 'ice macine'
    },
    {
        product_id: 6,
        product_name: 'ice machine',
        sale_price: 7,
        category: 'ice macine'
    },
    

];
*/
console.log(productContext);

