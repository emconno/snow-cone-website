const addToCart = document.getElementById('add-to-cart');

document.addEventListener("DOMContentLoaded", function() {
    const inputElement = document.getElementById("product-quantity");
    if (inputElement) {
        let quantity = inputElement.value;
        console.log(quantity);
    } else {
        console.error("Element with ID 'product-quantity' not found.");
    }
});

function addItem() {
    localStorage.getItem('cart').push({name: productName, quantity: 0});
}
//addToCart.onclick = 