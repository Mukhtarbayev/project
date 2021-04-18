function bigger(element) {
    element.style.fontSize = "23px";
}

function smaller(element) {
    element.style.fontSize = "20px";
}

function getLanguage(str) {
    var href = window.location.href;
    if (href.includes('/ru/')) {
        href = href.replace('/ru/', '/en/');
        document.location.href = href;
    } else if (href.includes('/en/')) {
        href = href.replace('/en/', '/ru/');
        document.location.href = href;
    }
}