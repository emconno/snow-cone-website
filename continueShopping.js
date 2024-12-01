const CSButton = document.getElementById('continue-shopping');

function backToProductList() {
    window.location.href = 'product-list.php';
}

CSButton.onclick = backToProductList();