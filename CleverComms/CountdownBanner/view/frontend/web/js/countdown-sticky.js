define([], function() {
    'use strict';

    return function() {
        // When the user scrolls the page, execute myFunction
        window.onscroll = stickyBanner;

        // Get the header using class name
        var header = document.querySelector(".header-promo");

        // Get the offset position of the navbar
        var sticky = header.offsetTop;

        // Add the sticky class to the header when you reach its scroll position. 
        // Remove "sticky" when you leave the scroll position
        function stickyBanner() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    };
});
