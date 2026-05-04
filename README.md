# FoodBizz — Laravel Food Ordering Platform

A full-stack web application for food discovery and ordering, built with Laravel 12, MySQL, Supabase Storage, and Stripe payment integration.

🔗 **Live Demo:** [https://food-bizz.onrender.com](https://food-bizz.onrender.com)

---

## Overview

FoodBizz is a complete food ordering platform that allows users to browse food items, view details, add to cart, and checkout with Stripe. Admins can manage food listings, categories, and orders through a dedicated dashboard.

---

## Key Features

| Feature | Description |
|---------|-------------|
| **Multi-Auth System** | Separate authentication for Admin and Regular Users |
| **Food Management** | Admin CRUD for food items (create, read, update, delete) |
| **Category System** | Organize food items by categories |
| **Shopping Cart** | Add/remove items, update quantities |
| **Stripe Payment** | Secure checkout with Stripe integration |
| **Supabase Storage** | Cloud-based image storage for food photos |
| **Order Management** | Track user orders and status |
| **Responsive Design** | Blade templates with Tailwind CSS |

---

## Tech Stack

| Category | Technology |
|----------|------------|
| Backend Framework | Laravel 12 (PHP 8.2+) |
| Database | MySQL |
| File Storage | Supabase Storage (S3-compatible) |
| Payment Gateway | Stripe API |
| Frontend | Blade templates, Tailwind CSS, Alpine.js |
| Authentication | Laravel Breeze (multi-auth) |
| Hosting | Render |

---

## Infrastructure Notes

| Component | Details |
|-----------|---------|
| **Supabase Storage** | Used for food image uploads. Migrated from local `public` disk to Supabase for production scalability. |
| **Render Deployment** | Free tier may have cold starts. First visit may take 20-30 seconds. |
| **Stripe (Test Mode)** | Use test cards for payments. No real charges processed. |

---

## Environment Variables

Create a `.env` file in the root directory:

```env
# App Configuration
APP_NAME=FoodBizz
APP_ENV=production
APP_DEBUG=false
APP_URL=https://food-bizz.onrender.com

# Database
DB_CONNECTION=mysql
DB_HOST=your_mysql_host
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Supabase Storage (S3-compatible)
SUPABASE_ACCESS_KEY_ID=your_supabase_key
SUPABASE_SECRET_ACCESS_KEY=your_supabase_secret
SUPABASE_REGION=your_region
SUPABASE_BUCKET=your_bucket_name
SUPABASE_ENDPOINT=https://your_project.supabase.co/storage/v1/s3
SUPABASE_URL=https://your_project.supabase.co/storage/v1/object/public

# Stripe Payment
STRIPE_KEY=pk_test_your_publishable_key
STRIPE_SECRET=sk_test_your_secret_key

# Filesystem (default to supabase)
FILESYSTEM_DISK=supabase
⚠️ Never commit .env to GitHub.

Local Setup
bash
# Clone the repository
git clone https://github.com/Allevandrose/food_bizz.git
cd food_bizz

# Install PHP dependencies
composer install

# Install NPM dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your .env file with database and Supabase credentials (see above)

# Run database migrations
php artisan migrate

# Seed database (if you have seeders)
php artisan db:seed

# Build frontend assets
npm run build

# Start the development server
php artisan serve
The application will run at http://localhost:8000

Deployment on Render
This application is configured with a Dockerfile for containerized deployment on Render.

Deployment steps:

Push code to GitHub

Create a new Web Service on Render

Connect your repository

Set environment variables in Render dashboard

Render will automatically build and deploy using Docker

Project Structure (Relevant to You)
text
food_bizz/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── FoodController.php      # Admin food CRUD
│   │   │   ├── CartController.php      # Shopping cart logic
│   │   │   ├── OrderController.php     # Order management
│   │   │   └── Auth/                   # Multi-auth controllers
│   │   └── Middleware/                 # Admin auth middleware
│   └── Models/
│       ├── Food.php
│       ├── Category.php
│       ├── Order.php
│       └── User.php
├── config/
│   ├── filesystems.php                 # Supabase disk configuration
│   └── stripe.php                      # Stripe configuration
├── database/
│   └── migrations/                     # Database schema
├── resources/
│   └── views/
│       ├── admin/                      # Admin dashboard views
│       ├── user/                       # User-facing views
│       └── auth/                       # Authentication views
├── routes/
│   └── web.php                         # All application routes
├── public/
│   └── build/                          # Compiled assets
├── Dockerfile                          # Container configuration
└── .env.example                        # Environment template
Key Routes
Method	Route	Description	Auth
GET	/	Home page with food listings	No
GET	/foods/{id}	Food detail page	No
POST	/cart/add/{id}	Add item to cart	Yes
GET	/cart	View shopping cart	Yes
POST	/checkout	Process Stripe payment	Yes
GET	/admin/foods	Admin food list	Admin
GET	/admin/foods/create	Create new food item	Admin
POST	/admin/foods	Store new food	Admin
GET	/admin/foods/{food}/edit	Edit food	Admin
PUT	/admin/foods/{food}	Update food	Admin
DELETE	/admin/foods/{food}	Delete food	Admin
Database Schema (Key Tables)
Table	Purpose
users	User accounts (role: admin/user)
categories	Food categories (e.g., Breakfast, Lunch, Desserts)
foods	Food items (name, description, price, image, category_id)
orders	Customer orders
order_items	Individual items within an order
carts	Temporary shopping cart storage
Storage Migration Notes
This project was migrated from local public disk to Supabase Storage.

Changes made:

Added supabase disk configuration in config/filesystems.php

Updated all image URLs from asset('storage/...') to Storage::disk('supabase')->url(...)

Admin image uploads now store files in user-specific folders for RLS compliance

What I Learned
Building FoodBizz taught me:

Full-stack Laravel development with Blade templates

Implementing multi-authentication (admin + user roles)

Integrating Stripe payment gateway

Migrating from local to cloud storage (Supabase S3-compatible)

Handling file uploads with validation

Building shopping cart functionality

Deploying Laravel with Docker to Render

Managing environment-specific configurations

Future Improvements
Add order status tracking with email notifications

Implement live chat support between users and admin

Add user reviews and ratings for food items

Implement discount coupons and promo codes

Add PDF invoice generation for orders

Write unit and feature tests with PHPUnit

Troubleshooting
Issue	Solution
Images not loading	Check Supabase bucket is public and environment variables are correct
Stripe payment fails	Ensure you're using test card numbers (e.g., 4242 4242 4242 4242)
403 Forbidden on images	Check Supabase RLS policies for the bucket
Login redirect loop	Verify APP_URL matches your deployed URL
Migration fails	Ensure database credentials are correct and MySQL is running
Contact
Built by Ibrahim Mulei — ibrahimmulei@gmail.com

GitHub: @Allevandrose

📌 Live Demo: https://food-bizz.onrender.com
🔗 Portfolio: ibrahimmulei.netlify.app
