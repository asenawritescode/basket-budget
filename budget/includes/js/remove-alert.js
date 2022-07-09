let element = document.getElementById('message');
setTimeout(() => {
    if (element) {
        element.remove();
    }
}, 5000);