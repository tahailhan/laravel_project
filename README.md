# Full-Stack E-Commerce Platform (Laravel MVC)

A full-stack e-commerce web application built with **Laravel** following the **Model-View-Controller (MVC)** architectural pattern. The system manages the complete online retail lifecycle, including rich-text product administration, category hierarchies, real-time stock validation, shopping cart persistence, and order processing.

## Key Features

* **Admin Panel & Catalog CRUD:** Complete product and category management interface integrated with **CKEditor** for rich-text product descriptions and structured media handling.
* **Shopping Cart & Checkout Engine:** Dedicated `CartController` and `OrderController` handling dynamic cart operations, real-time inventory/stock validation during checkout, and transactional order creation.
* **Relational Data Modeling:** Normalized database schema built via Laravel Migrations with Eloquent relationships across `User`, `Category`, `Product`, `Cart`, `Order`, and `OrderItem` models.
* **Authentication & User Management:** Custom authentication flows, user role management, and dynamic auth state tracking across storefront and administrative routes.

## Tech Stack

* **Backend:** PHP 8.x, Laravel Framework (MVC)
* **Frontend:** Blade Templating Engine, HTML5, CSS3, JavaScript, CKEditor
* **Database:** MySQL / Relational Schema Migrations & Eloquent ORM
* **Version Control:** Git (Conventional Commits workflow)

## Architecture Overview

```text
├── app/
│   ├── Http/Controllers/   # CartController, OrderController, Product/Category & Admin Controllers
│   └── Models/             # User, Product, Category, Cart, Order, OrderItem (Eloquent ORM)
├── database/
│   └── migrations/         # Relational schema definitions & foreign key constraints
├── resources/views/        # Modular Blade templates (Storefront, Cart, Checkout, Admin Dashboard)
└── routes/web.php          # Storefront & protected administrative routes
```
