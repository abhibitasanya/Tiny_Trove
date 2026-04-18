document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.add-to-cart').forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = this.dataset.id;
            const formData = new URLSearchParams();
            formData.append('id', productId);
            formData.append('quantity', '1');

            fetch('cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'fetch'
                },
                body: formData.toString()
            })
            .then(response => response.text())
            .then(() => {
                alert('Added to Cart!');
            })
            .catch(() => {
                alert('Could not add item to cart.');
            });
        });
    });
});
