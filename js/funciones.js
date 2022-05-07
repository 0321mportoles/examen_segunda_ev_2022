let container = document.getElementsByClassName("contenido")[0];

container.onkeyup = function(e) {
    let target = e.srcElement || e.target;
    let maxLength = parseInt(target.attributes["maxlength"].value, 10);
    let myLength = target.value.length;
    if (myLength >= maxLength) {
        let next = target;
        while (next = next.nextElementSibling) {
            if (next == null)
                break;
            if (next.tagName.toLowerCase() === "input") {
                next.focus();
                break;
            }
        }
    }
    // Move to previous field if empty (user pressed backspace)
    else if (myLength === 0) {
        let previous = target;
        while (previous = previous.previousElementSibling) {
            if (previous == null)
                break;
            if (previous.tagName.toLowerCase() === "input") {
                previous.focus();
                break;
            }
        }
    }
}