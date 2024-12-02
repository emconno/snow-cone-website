const productSource = document.getElementById('orders-temp').innerHTML;

const template = Handlebars.compile(productSource);
        

fetch('get-orders.php')
    .then(response => response.json()) // Parse JSON response
    .then(data => {

        fetch('get-order-items.php')
            .then(response => response.json()) // Parse JSON response
            .then(items => {

                fetch('get-products.php')
                    .then(response => response.json()) // Parse JSON response
                    .then(products => {

                        console.log(data); // JavaScript object
                        // Use the data as needed
                        let productContext = { orders: [] };
                        for (let i = 0; i < data.length; i++) {
                            if (data[i].complete === '0') {
                                productContext.orders.push(data[i]);
                            }
                            
                        }
                        
                        
                        for (let i = 0; i < productContext.orders.length; i++) {
                            let itemString = "";
                            console.log(i);
                            for (let j = 0; j < items.length; j++) {
                                
                                if (items[j].order_id == productContext.orders[i].id) {
                                    for(let k = 0; k < products.length; k++) {
                                        
                                        if(products[k].id == items[j].product_id) {
                                            itemString += products[k].name + ": " + items[j].quantity + "; ";
                                        }
                                    }
                                }
                                
                            }
                            productContext.orders[i].orderItems = itemString;
                        }
                        console.log('test');

                        const compiledProductHTML = template(productContext);

                        const list = document.getElementById('orders-temp-here');
                        list.innerHTML = compiledProductHTML;
            })
            .catch(error => console.error('Error fetching data:', error));
    

        })
        .catch(error => console.error('Error fetching data:', error));

    })
    .catch(error => console.error('Error fetching data:', error));
