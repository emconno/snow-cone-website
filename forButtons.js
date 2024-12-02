const syrupButton = document.getElementById('srup');
const conesButton = document.getElementById('cnes');
const machineButton = document.getElementById('machine');

syrupButton.addEventListener('click', (event) => {
    const url = `product-list.php?search=` + encodeURIComponent('syrup');
    syrupButton.href = url; // Navigate to the URL
});

conesButton.addEventListener('click', (event) => {
    const url = `product-list.php?search=` + encodeURIComponent('cones');
    conesButton.href = url; // Navigate to the URL
});

machineButton.addEventListener('click', (event) => {
    const url = `product-list.php?search=` + encodeURIComponent('machine');
    machineButton.href = url; // Navigate to the URL
});

