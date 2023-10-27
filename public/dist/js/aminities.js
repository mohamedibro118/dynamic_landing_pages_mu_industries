document.getElementById("amview-more").addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelectorAll(".homes-list.hidden").forEach(function(elem) {
        elem.classList.remove("hidden");
    });
    document.getElementById("amview-more").classList.add("hidden");
    document.getElementById("amview-less").classList.remove("hidden");
});

document.getElementById("amview-less").addEventListener("click", function(e) {
    e.preventDefault();
    document.querySelectorAll(".homes-list:not(.hidden)").forEach(function(elem) {
        elem.classList.add("hidden");
    });
    document.getElementById("amview-less").classList.add("hidden");
    document.getElementById("amview-more").classList.remove("hidden");
});