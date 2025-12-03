# UniLife API

Laravel REST API backend for the UniLife university management system.

## Features

- **Store Management**: Beverages and snacks inventory with categories
- **Student Marketplace**: P2P product sales between students
- **Student Records**: University student management with auto-generated passwords
- **Announcements**: Career-specific announcements with priority levels

## Quick Start

### Installation

```bash
# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations and seeders
php artisan migrate:fresh --seed


# Filament install
composer require filament/filament:"^3.3" -W
php artisan filament:install --panels
php artisan filament:optimize
php artisan filament:optimize-clear
php artisan vendor:publish --tag=filament-config
php artisan vendor:publish --tag=filament-panels-translations
composer require filament/widgets:"^3.3" -W
php artisan filament:install --widgets
npm install tailwindcss@3 @tailwindcss/forms @tailwindcss/typography postcss postcss-nesting autoprefixer --save-dev

# filament create a user
 php artisan make:filament-resource 
# Start development server
php artisan serve
php artisan serve --host=0.0.0.0 --port=8000
```

The API will be available at `http://localhost:8000`

## Database Configuration

By default, the project uses SQLite. To use MySQL:

1. Update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=unilife_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

2. Run migrations:
```bash
php artisan migrate:fresh --seed
```

## API Endpoints

All endpoints are prefixed with `/api`

### Universitarios (Students)
- `GET /api/universitarios` - List all students
- `POST /api/universitarios` - Create student
- `GET /api/universitarios/{cu}` - Get student by CU
- `PUT /api/universitarios/{cu}` - Update student
- `DELETE /api/universitarios/{cu}` - Delete student

### Store Products
- `GET /api/store/products` - List all products
- `POST /api/store/products` - Create product
- `GET /api/store/products/{id}` - Get product
- `PUT /api/store/products/{id}` - Update product
- `DELETE /api/store/products/{id}` - Delete product
- `GET /api/store/categories/{category}/products` - Get products by category

### Marketplace Products
- `GET /api/marketplace/products` - List all products
- `POST /api/marketplace/products` - Create product
- `GET /api/marketplace/products/{id}` - Get product
- `PUT /api/marketplace/products/{id}` - Update product
- `DELETE /api/marketplace/products/{id}` - Delete product
- `POST /api/marketplace/products/{id}/purchase` - Mark as purchased

### Anuncios (Announcements)
- `GET /api/anuncios` - List all announcements
- `POST /api/anuncios` - Create announcement
- `GET /api/anuncios/{id}` - Get announcement
- `PUT /api/anuncios/{id}` - Update announcement
- `DELETE /api/anuncios/{id}` - Delete announcement
- `GET /api/anuncios/carrera/{carrera}` - Filter by career
- `GET /api/anuncios/categoria/{categoria}` - Filter by category

## Example Requests

### Create a Student
```bash
curl -X POST http://localhost:8000/api/universitarios \
  -H "Content-Type: application/json" \
  -d '{
    "cu": "12345",
    "nombres": "Juan",
    "apellidos": "Garcia",
    "correo": "juan.garcia@university.edu"
  }'
```

### Create a Store Product
```bash
curl -X POST http://localhost:8000/api/store/products \
  -H "Content-Type: application/json" \
  -d '{
    "category_id": 1,
    "nombre": "Coca Cola",
    "imagen_url": "https://example.com/coca-cola.jpg",
    "cantidad": 50,
    "precio": 1.50
  }'
```

### Create an Announcement
```bash
curl -X POST http://localhost:8000/api/anuncios \
  -H "Content-Type: application/json" \
  -d '{
    "carrera": "Ciencias de la Computación",
    "anuncio": "Examen final de Algoritmos el viernes 15",
    "categoria": "importante"
  }'
```

## Database Schema

### universitarios
- `cu` - Carnet Universitario (unique)
- `nombres` - First name(s)
- `apellidos` - Last name(s)
- `correo` - Email (unique)
- `contrasena` - Password (auto-generated: CU + apellido)

### store_categories
- `nombre` - Category name (Bebidas, Snacks)

### store_products
- `category_id` - Foreign key to store_categories
- `nombre` - Product name
- `imagen_url` - Image URL
- `cantidad` - Stock quantity
- `precio` - Price

### marketplace_products
- `nombre` - Product name
- `descripcion` - Description
- `imagen_url` - Image URL
- `precio` - Price
- `cu_owner` - Seller's CU
- `cu_comprador` - Buyer's CU (nullable)

### anuncios
- `carrera` - Career (Ciencias de la Computación, Telecomunicaciones, TIC, Sistemas)
- `anuncio` - Announcement text
- `categoria` - Priority (importante, cotidiano, regular)

## Technologies

- Laravel 11.x
- PHP 8.4+
- SQLite/MySQL
- RESTful API

## License

This project is for educational purposes.
