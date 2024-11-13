const mysql = require("mysql");

const connection = mysql.createConnection({
    host: 'localhost',
    port: 3306,
    user: 'root',
    password: 'password',
    database:'it391',
    connectionLimit: 10
});

connection.connect(function(err) {
    if (err) {
        console.log("error occurred while connecting");
    } else {
        console.log("connection created with mysql successfully");
    }
});

connection.query('select * from products', (err, res) => {
    if (err) {
        console.log(err);
    } else {
        console.log(res);
    } 
});

connection.query('select * from products where product_name = \'cherry syrup\'', (err, res) => {
    if (err) {
        console.log(err);
    } else {
        console.log(res[0].sale_price);
    } 
});