const hamb = document.getElementById("button-side-bar");
const sideBar = document.getElementById("side-bar");

hamb.addEventListener('click',function(){
    sideBar.classList.toggle('hidden-display');
})