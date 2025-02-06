# Laravel Technical Task  

## Table of Contents  
- [Introduction](#introduction)  
- [Requirements](#requirements)  
- [Installation](#installation)  
- [Database Setup](#database-setup)  
- [Running the Application](#running-the-application)  
- [API Documentation](#api-documentation)  
- [Testing](#testing)  
- [Stripe Integration](#stripe-integration)  
- [Security Considerations](#security-considerations)  

---

## Introduction  
This project is a Laravel-based application that includes routing, middleware, authentication, authorization, RESTful API, unit testing, and Stripe payment integration.  

---

## Requirements  
- PHP 8.x  
- Composer  
- Laravel 11  
- MySQL or PostgreSQL  
- Node.js & npm (for frontend dependencies)  
- Stripe API Keys (Test Mode)  

---

## Installation  

1. Clone the repository:  
   ```sh
   git clone https://github.com/malakmilad/techincal_task.git
   cd <project-directory>
   ```

2. Install dependencies:  
   ```sh
   composer install
   npm install
   ```

3. Copy environment file:  
   ```sh
   cp .env.example .env
   ```

4. Generate application key:  
   ```sh
   php artisan key:generate
   ```

---

## Database Setup  

1. Configure your `.env` file:  
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel_task
   DB_USERNAME=root
   DB_PASSWORD=
   ```

2. Run migrations and seeders:  
   ```sh
   php artisan migrate --seed
   ```

---

## Running the Application  

1. Start the local development server:  
   ```sh
   php artisan serve
   ```

2. Run Vite for frontend assets (if applicable):  
   ```sh
   npm run dev
   ```
3. use user email & password loced at user seeder
4. email "admin@admin.com" password "123456789"   

---

## API Documentation  

### Product API  

#### Get Products (Paginated)  
```http
GET /api/products
```

#### Add a New Product  
```http
POST /api/products
```
**Body:**  
```json
{
  "name": "Product Name",
  "price": 100,
  "quantity": 5,
  "category_id": 1
}
```

#### API Authentication  
Generate an API token using:  
```sh
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

Use the token in the `Authorization` header:  
```
Authorization: Bearer <your-token>
```

---

## Testing  

Run unit and feature tests:  
```sh
php artisan test
```

---

## Stripe Integration  

1. Obtain your Stripe test API keys from [Stripe Dashboard](https://dashboard.stripe.com/test/apikeys).  
2. Update `.env` with your Stripe keys:  
   ```
   STRIPE_KEY=pk_test_51MChApEvPjpFSyUoDFSKwvcHry2F0P2rZ0mRNKP2YIyJUr9bar6Dkb9YS12KFq6leO4fCsRv1s8Vh0ni1NozXirJ00pZSmrCra
   STRIPE_SECRET=sk_test_51MChApEvPjpFSyUo1apJWQI9dKEAelfRPD9Jn48HvzBvEpYEguX4g4ZB4FQ6iEZnJOR9Xzrleg6Ho7WLMPNigUaa00bfMHnSBP
   ```
3. Test a payment using a test card:  
   ```
   4242 4242 4242 4242 (Visa)
   Expiry: Any future date
   CVC: Any 3 digits
   ```

--- 
