const mysql = require("mysql");

const pool = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'password',
    database:'it391',
    connectionLimit: 10
});

pool.connect(err => {
    if(err) {
        console.log(err);
    } else {
        console.log('Connected to database');
    }
});

pool.query('select * from products', (err, res) => {
    if (err) {
        console.log(err);
    } else {
        console.log(res);
    } 
});

pool.query('select * from products where product_name = \'cherry syrup\'', (err, res) => {
    if (err) {
        console.log(err);
    } else {
        console.log(res[0].sale_price);
    } 
});