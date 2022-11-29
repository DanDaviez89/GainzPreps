/*
document.getElementById("plus-1").addEventListener("click", function() {
    var currentQan = document.getElementById("quantity").textContent;

    currentQan = Number(currentQan) + 1;

    var currentQan = document.getElementById("quantity").innerHTML = currentQan;
})

document.getElementById("minus-1").addEventListener("click", function() {
    var currentQan = document.getElementById("quantity").textContent;

    if(Number(currentQan) > 0) {
        currentQan = Number(currentQan) - 1;
    }

    var currentQan = document.getElementById("quantity").innerHTML = currentQan;
})
*/

let menuItems = document.querySelectorAll(".qanSelector");
let minusButtons  = document.querySelectorAll(".minus-item");
let addButtons  = document.querySelectorAll(".add-item");

menuItems.forEach(function(item, index) {
    let itemChildNodes = item.childNodes;

    itemChildNodes.forEach(function (item) { 
        if(item.hasClass(minusItem)){
            console.log(item)
        }
     })
});



