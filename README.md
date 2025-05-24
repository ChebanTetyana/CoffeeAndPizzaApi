# Coffee and Pizza API

## About Laravel

A simple RESTful API for ordering pizza and coffee. Users can view the menu, add items to the cart, and place orders. The project is built with Laravel and serves as a basic backend for an online food ordering service.

## Built With

- Laravel 10
- PHP 8.2+
- MySQL
- Laravel Sanctum (Authentication)
- Laravel Socialite (Google OAuth)
- Docker (optional for containerization)

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP 8.1 or higher
- Composer
- MySQL or compatible database
- Node.js and npm (optional, if you use frontend)
- Laravel CLI (optional but recommended)

##Installation

###Step-by-step Guide

1. Clone the repository:

`git clone https://github.com/ChebanTetyana/CoffeeAndPizzaApi.git`
`cd CoffeeAndPizzaApi`

2. Copy the example environment file:

`cp .env.example .env`

3. Install PHP dependencies:

`composer install`

4. Generate the application key:

`php artisan key:generate`

5. Create a database and configure your .env database settings.

6. Run migrations and seeders (if any):

npm install

npm run dev

8. Start the development server:

php artisan serve

## Usage

Use this API as a backend for a pizza & coffee ordering web or mobile app. It’s suitable for learning purposes or as a foundation for building small e-commerce platforms.

## Roadmap

### First steps

- Visit `/api/menu` to view available menu items
- Add items to cart (via POST requests)
- Place an order at `/api/orders/create`

### Test Users
If you seed users or provide test accounts:

- Admin: `admin@example.com` / `password`
- Customer: Register via the public API `/api/register`

## Testing
To run automated tests:

`php artisan test`

## License

This project is open-sourced under the MIT license.
