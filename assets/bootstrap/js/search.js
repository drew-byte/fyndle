const searchBar = document.querySelector(".content .search input");
const searchBtn = document.querySelector(".content .search button");


searchBtn.onclick = ()=> {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}