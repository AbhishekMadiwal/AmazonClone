document.addEventListener('DOMContentLoaded', () => {
    // Scroll back to top
    const backToTop = document.querySelector('.foot-panel1');
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Handle Cart click event
    const cartButton = document.querySelector('.btn-outline-light .fa-cart-shopping').parentElement;
    cartButton.addEventListener('click', () => {
        alert('Cart functionality is not implemented yet.');
    });

    // Search functionality (simulated)
    const searchIcon = document.querySelector('.search-icon');
    const searchInput = document.querySelector('.search-input');

    if (searchIcon && searchInput) {
        searchIcon.addEventListener('click', () => {
            const query = searchInput.value.trim();
            if (query) {
                alert(`Searching for: ${query}`);
            } else {
                alert('Please enter a search term.');
            }
        });
    }

    // Shop box click event
    const boxes = document.querySelectorAll('.box');
    boxes.forEach(box => {
        box.addEventListener('click', () => {
            alert(`You clicked on ${box.querySelector('h2').textContent}`);
        });
    });
});

// jQuery version (optional, if you're using jQuery)
$(document).ready(function() {
    // Scroll back to top
    $('.foot-panel1').on('click', function() {
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
    });

    // Handle Cart click event
    $('.btn-outline-light .fa-cart-shopping').parent().on('click', function() {
        alert('Cart functionality is not implemented yet.');
    });

    // Search functionality (simulated)
    $('.search-icon').on('click', function() {
        var query = $('.search-input').val().trim();
        if (query) {
            alert('Searching for: ' + query);
        } else {
            alert('Please enter a search term.');
        }
    });

    // Shop box click event
    $('.box').on('click', function() {
        alert('You clicked on ' + $(this).find('h2').text());
    });
});
