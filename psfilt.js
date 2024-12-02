const sf = document.getElementById('search-filter');
const params = new URLSearchParams(window.location.search);
let val = params.get('search');
console.log(val);
sf.value = val;
searchFilter();