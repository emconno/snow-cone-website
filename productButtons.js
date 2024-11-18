let productButtons = document.getElementsByClassName("product");

console.log(productButtons);



function openProductPage() {
    location.href="product-info.php";
    console.log('testing button');
}

for (let i = 0; i < Object.keys(productButtons).length; i++) {
    productButtons[i].addEventListener('click', openProductPage);
}
