// Función para mostrar el popup de política de cookies si no se ha aceptado
function showCookiePopup() {
    const cookiePopup = document.getElementById("cookie-popup");
    const acceptButton = document.getElementById("accept-cookie");

    if (!getCookie("cookiesAccepted")) {
        cookiePopup.style.display = "block";

        acceptButton.addEventListener("click", () => {
            cookiePopup.style.display = "none";
            setCookie("cookiesAccepted", "true", 365); // Establecer una cookie que expira en 365 días
        });
    }
}

// Función para obtener el valor de una cookie
function getCookie(cookieName) {
    const name = cookieName + "=";
    const decodedCookie = decodeURIComponent(document.cookie);
    const cookieArray = decodedCookie.split(";");
    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];
        while (cookie.charAt(0) === " ") {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }
    return null;
}

// Función para establecer una cookie
function setCookie(cookieName, cookieValue, daysToExpire) {
    const d = new Date();
    d.setTime(d.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
    const expires = "expires=" + d.toUTCString();
    document.cookie = cookieName + "=" + cookieValue + "; " + expires + "; path=/";
}

// Mostrar el popup de política de cookies
showCookiePopup();
