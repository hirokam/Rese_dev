document.addEventListener("DOMContentLoaded", () => {
    for (let i = 0; i < stars.length; i++) {
        if (i < oldStars) {
            stars[i].style.color = "#0066ff";
            stars[i].clicked = true;
        }
        stars[i].addEventListener(
            "mouseover",
            () => {
                for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#0066ff";
                }
            },
            false
        );

        stars[i].addEventListener(
            "mouseout",
            () => {
                for (let j = 0; j < stars.length; j++) {
                    if (!stars[j].clicked) {
                        stars[j].style.color = "#a09a9a";
                    }
                }
            },
            false
        );

        stars[i].addEventListener(
            "click",
            (event) => {
                const rating = event.target.getAttribute("data-value");
                document.getElementById("rating").value = rating;
                for (let j = 0; j < stars.length; j++) {
                    stars[j].style.color = "#a09a9a";
                    stars[j].clicked = false;
                }
                event.target.clicked = true;
                for (let j = 0; j <= i; j++) {
                    stars[j].style.color = "#0066ff";
                    stars[j].clicked = true;
                }
            },
            false
        );
    }
});