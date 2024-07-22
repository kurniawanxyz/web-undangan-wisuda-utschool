countdownDate = new Date("Aug 6, 2024 08:00:00").getTime();
x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countdownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.querySelector(".countdown-item:nth-child(1) .countdown-number").textContent = days;
    document.querySelector(".countdown-item:nth-child(2) .countdown-number").textContent = hours;
    document.querySelector(".countdown-item:nth-child(3) .countdown-number").textContent = minutes;
    document.querySelector(".countdown-item:nth-child(4) .countdown-number").textContent = seconds;
    if (distance < 0) {
        clearInterval(x);
    }
}, 1000);
