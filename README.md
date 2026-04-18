# Tiny Trove

Tiny Trove is a miniature-themed ecommerce web app where users can browse products, view product details, add items to cart, and place a basic checkout order.

## Live Demo
- https://tiny-trove.onrender.com

## Features
- Product listing page with cards and pricing
- Product details page for each item
- Session-based cart (add, update quantity, remove)
- Session-based wishlist (add, remove, clear)
- Simple checkout flow
- Responsive UI using custom CSS

## Tech Stack
- PHP (server-rendered pages)
- HTML, CSS, JavaScript
- Apache (via Docker on Render)
- Render Web Service deployment

## Project Structure
- `index.php`: Product listing page
- `product.php`: Product details
- `cart.php`: Cart management
- `checkout.php`: Checkout flow
- `wishlist.php`: Wishlist management
- `remove.php`: Remove items from cart/wishlist
- `clear_wishlist.php`: Clear wishlist action
- `db.php`: In-memory product catalog and helper functions
- `styles1.css`: Main styles
- `script.js`: Client-side add-to-cart action
- `images/`: Product and logo assets
- `Dockerfile`, `docker-entrypoint.sh`, `render.yaml`: Deployment files

## Deployment
This project is deployed on Render as a Docker-based Web Service.

## Notes
- Current version uses in-memory product data and session storage.
- Cart/wishlist data is temporary and not persisted in a database.

## Future Improvements
- Add persistent database for products, users, and orders
- Add authentication and user accounts
- Add order history and admin product management
- Add payment gateway integration

## License
Developed for learning and portfolio use.
