document.addEventListener("DOMContentLoaded", function () {
    // Retrieve cart from localStorage or initialize as empty array
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Update the cart count on the page
    function updateCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
        // If you have a cart count element, update it here
        if (document.getElementById("cart-count")) {
            document.getElementById("cart-count").innerText = cart.reduce((sum, item) => sum + item.quantity, 0);
        }
    }

    // Function to add an item to the cart
    function addToCart(id, name, price, image) {
        id = parseInt(id);
        price = parseFloat(price);
        
        // Check if the item is already in the cart
        let existingItem = cart.find(item => item.id === id);
        if (existingItem) {
            existingItem.quantity++;  // If item exists, increase quantity
        } else {
            cart.push({ id, name, price, image, quantity: 1 });  // Add new item to cart
        }

        updateCart();  // Update the cart in localStorage
        alert(${name} added to cart! 🛒);  // Alert user when item is added
    }

    // Event listener for 'Add to Cart' buttons
    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            // Get product data from data attributes
            let productId = this.dataset.id;
            let productName = this.dataset.name;
            let productPrice = this.dataset.price;
            let productImage = this.dataset.image;

            // Call addToCart function with product data
            addToCart(productId, productName, productPrice, productImage);
        });
    });

    updateCart();  // Initialize the cart count on page load
});