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

console.log(array);
