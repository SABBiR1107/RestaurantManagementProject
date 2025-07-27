/*!
=========================================================
* FoodHut Landing page
=========================================================

* Copyright: 2019 DevCRUD (https://devcrud.com)
* Licensed: (https://devcrud.com/licenses)
* Coded by www.devcrud.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/

// smooth scroll
$(document).ready(function(){
    $(".navbar .nav-link").on('click', function(event) {

        if (this.hash !== "") {

            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 700, function(){
                window.location.hash = hash;
            });
        } 
    });

    // Cart counter functionality
    updateCartCounter();
});

new WOW().init();

function initMap() {
    var uluru = {lat: 37.227837, lng: -95.700513};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 8,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
 }

// Function to update cart counter
function updateCartCounter() {
    // Get all cart badges on the page
    var cartBadges = document.querySelectorAll('.cart-badge');
    
    // If there are cart badges, update them
    if (cartBadges.length > 0) {
        // You can add AJAX call here to get real-time cart count
        // For now, the counter is updated via page refresh
        console.log('Cart counter updated');
    }
}

// Function to increment cart counter (can be called after adding items)
function incrementCartCounter() {
    var cartBadges = document.querySelectorAll('.cart-badge');
    cartBadges.forEach(function(badge) {
        var currentCount = parseInt(badge.textContent) || 0;
        badge.textContent = currentCount + 1;
        
        // Show badge if it was hidden
        if (badge.style.display === 'none') {
            badge.style.display = 'flex';
        }
    });
}

// Function to decrement cart counter (can be called after removing items)
function decrementCartCounter() {
    var cartBadges = document.querySelectorAll('.cart-badge');
    cartBadges.forEach(function(badge) {
        var currentCount = parseInt(badge.textContent) || 0;
        if (currentCount > 0) {
            badge.textContent = currentCount - 1;
            
            // Hide badge if count becomes 0
            if (currentCount - 1 === 0) {
                badge.style.display = 'none';
            }
        }
    });
}
