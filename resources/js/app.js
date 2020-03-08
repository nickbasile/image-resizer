// require('./bootstrap');

//Removes success message after form submit
setTimeout(function() {
    let message = document.getElementById('success-message');
    if(message) {
        message.style.opacity = 0;
        setTimeout(function() {
            message.remove();
        }, 500);
    }
}, 3000);
