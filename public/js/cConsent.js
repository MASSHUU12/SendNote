$(() => {
    if (getCookie("cConsentRead") != "true")
        $("#c-container").delay(500).fadeIn(350);
});

$("#c-btn").click(() => {
    $("#c-container").fadeOut();
    document.cookie = "cConsentRead=true";
});

// A function to search for a cookie and return its contents
function getCookie(cname) {
    let name = cname + "=";
    let ca = decodeURIComponent(document.cookie).split(";");

    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];

        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }

        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}
