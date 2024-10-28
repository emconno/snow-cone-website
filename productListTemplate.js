const productSource = document.getElementById('product-temp').innerHTML;

const template = Handlebars.compile(productSource);

const productContext = {};


/*
import { createConnection } from "mysql";

const con = createConnection({
    host: 'localhost',
    user: 'root',
    password: 'password',
    database:'it391',
    connectionLimit: 10
});

con.connect(err => {
    if(err) {
        console.log(err);
    } else {
        console.log('Connected to database');
    }
});

con.query('select * from products', (err, res) => {
    if (err) {
        console.log(err);
    } else {
        productContext.products = res;
        console.log(productContext);
    } 
});

*/
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
    

];
console.log(productContext);

const compiledProductHTML = template(productContext);

const list = document.getElementById('product-list');
list.innerHTML = compiledProductHTML;