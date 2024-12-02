function searchFilter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('search-filter');
    filter = input.value.toUpperCase();
    li = document.getElementsByClassName('list-name');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
    
        txtValue = li[i].innerHTML;
        console.log(txtValue);
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          li[i].parentNode.parentNode.style.display = "";
        } else {
          li[i].parentNode.parentNode.style.display = "none";
        }
    }
}


searchFilter();