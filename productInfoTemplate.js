const params = new URLSearchParams(window.location.search);
const productName = params.get('pname');

const productSource = document.getElementById('product-info-temp').innerHTML;

const template = Handlebars.compile(productSource);


fetch('get-products.php')
    .then(response => response.json()) // Parse JSON response
    .then(data => {
        console.log(data); // JavaScript object
        // Use the data as needed
        let productContext = {};
        for (let i = 0; i < data.length; i++) {
            if (data[i].name === productName) {
                productContext = data[i];
                break;
            }
        }
        //productContext.products = data;
        let urlVar = productName.split(' ');
        urlVar = urlVar.join('%20');
        productContext.url = urlVar;
        const compiledProductHTML = template(productContext);

        const list = document.getElementById('product-info');
        list.innerHTML = compiledProductHTML;

    })
    .catch(error => console.error('Error fetching data:', error));