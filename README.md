# Wardrobe Management System

This is a simple Wardrobe Management System built with **Laravel 11** as the backend and **Vue 3** as the frontend.

## Features
- Add, Edit, View, and Delete Clothing Items
- Categorize Clothing Items (e.g., Tops, Bottoms, Shoes)
- Responsive and User-Friendly Interface
- Filtering and Search functionality

## Technologies Used
- Backend: Laravel 11
- Frontend: Vue 3 + Vite
- Database: MySQL
- API Authentication: Laravel Sanctum (Optional)

## Prerequisites
- PHP >= 8.2
- Composer
- Node.js >= 16.x
- MySQL

## Installation

### 1. Backend Setup

Navigate to the `wardrobe-backend` directory:
```bash
cd wardrobe-backend
```

Install dependencies:
```bash
composer install
```

Create the `.env` file:
```bash
cp .env.example .env
```

Configure the database connection in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wardrobe_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

Generate application key:
```bash
php artisan key:generate
```

Run database migrations:
```bash
php artisan migrate
```

Start the backend server:
```bash
php artisan serve
```

### 2. Frontend Setup
Navigate to the `wardrobe-frontend` directory:
```bash
cd wardrobe-frontend
```

Install dependencies:
```bash
npm install
```

Start the frontend server:
```bash
npm run dev
```

The frontend will be accessible at `http://localhost:5173`

## API Endpoints
| Method    | Endpoint         | Description           |
|----------|----------------|--------------------|
| GET      | /api/clothing   | List all clothing items |
| POST     | /api/clothing   | Add new clothing item  |
| GET      | /api/clothing/{id} | View specific clothing item |
| PUT      | /api/clothing/{id} | Update clothing item   |
| DELETE   | /api/clothing/{id} | Delete clothing item   |

## Usage
1. Open the frontend app at `http://localhost:5173`.
2. Navigate to the Clothing List to view all items.
3. Add new clothing items using the provided form.
4. Edit or delete existing clothing items.

## License
This project is licensed under the MIT License.

