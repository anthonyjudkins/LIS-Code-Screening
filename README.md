# Ohio Legislative Information Systems (LIS) - Data Entry Web Application

A robust, maintainable data entry web application for managing **Legislators** and **Legislation** with co-sponsors. The project demonstrates clean backend architecture (controllers, services, custom form requests) and a modern, reusable frontend (Vue 3 + TypeScript components).

## 🚀 Quick Start (Docker Environment)

This project leverages **Laravel Sail** (PHP 8.4) and **SQLite** to ensure an isolated, cross-platform evaluation environment with zero local database configuration required.

### 1. Install Dependencies
Run a temporary container to safely pull the project's Composer packages:
```bash
docker run --rm -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php84-composer:latest composer install
```

### 2. Launch Application Environment
Spin up the Docker services in the background:
```bash
./vendor/bin/sail up -d
```
*(Note: If your system requires admin privileges for the Docker socket, prefix Sail commands with `sudo`)*

### 3. Automated Application Setup
Run the universal initialization script to configure environment keys, generate the SQLite database file, run schema migrations, and inject test records:
```bash
./vendor/bin/sail composer run setup
```

👉 **Access the Application:** Open your web browser and navigate to **[http://localhost](http://localhost)**

---

## 🛠️ Local Installation Alternative (No Docker)

If you prefer to run the application natively on your host machine, ensure you have **PHP 8.4+** (with `pdo_sqlite` enabled) and **Composer** installed.

```bash
# 1. Install packages
composer install

# 2. Run cross-platform initialization
composer run setup

# 3. Start local development server
php artisan serve
```
👉 **Access the Application:** Open your web browser and navigate to **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🏛️ Application Architecture & Routes

The application uses a layered architecture:
- **Controllers**: Handle HTTP requests and responses, delegating business logic to services.
- **Services**: Encapsulate business logic for legislators and legislations, making code testable and maintainable.
- **Custom Form Requests**: Centralize validation rules for all forms, ensuring robust data integrity.
- **Reusable Vue Components**: All forms and tables use type-safe, reusable components for consistency and maintainability.
- **Tailwind CSS**: Provides a modern, responsive UI.

### 1. Legislator Management
*   **Form Route:** `GET /legislators/create` (Inertia page)
*   **Submission Route:** `POST /api/legislators` (handled by `LegislatorController`)
*   **Index View:** `GET /legislators` (Inertia page)
*   **Validation:** Centralized in `StoreLegislatorRequest` (custom form request). Ensures all fields are required and provides user-friendly error messages.
*   **Business Logic:** Managed by `LegislatorService` for clean separation of concerns.
*   **Frontend:** Uses reusable `FormWrapper` and `FormItem` Vue components for the form UI.
*   **Post-Submission:** Redirects to the index view showing all legislators.

### 2. Legislation Management
*   **Form Route:** `GET /legislations/create` (Inertia page)
*   **Submission Route:** `POST /api/legislations` (handled by `LegislationController`)
*   **Index View:** `GET /legislations` (Inertia page)
*   **Validation:** Centralized in `StoreLegislationRequest` (custom form request). Ensures all required fields are present.
*   **Business Logic:** Managed by `LegislationService` for sponsor mapping and data handling.
*   **Sponsor Selection:** Multi-select checkbox group, dynamically listing all legislators (via reusable Vue component).
*   **Frontend:** Uses the same reusable form components for consistency.
*   **Post-Submission:** Redirects to the index view, displaying titles, text, and sponsors as a readable list.

---

## 📁 Key Technical Deliverables

### Key Backend Files
*   **Controllers:** `app/Http/Controllers/LegislatorController.php`, `LegislationController.php`
*   **Services:** `app/Services/LegislatorService.php`, `LegislationService.php`
*   **Custom Form Requests:** `app/Http/Requests/StoreLegislatorRequest.php`, `StoreLegislationRequest.php`
*   **Database Schema:** `database/migrations/` (see `legislators`, `legislations`, and `legislation_legislator` for many-to-many bridge)

### Key Frontend Files
*   **Reusable Components:** `resources/js/components/FormWrapper.vue`, `FormItem.vue`, `Table.vue`
*   **Pages:** `resources/js/pages/LegislatorForm.vue`, `LegislationForm.vue`, `LegislatorList.vue`, `LegislationList.vue`
*   **Layout:** `resources/js/layouts/MainLayout.vue`

---

## 🏗️ Database Relations & Models

The relationship between Legislators and Legislation is modeled as a normalized **Many-to-Many** schema. Multiple legislators can sponsor a single piece of legislation, and a legislator can sponsor multiple bills.

### 🛠️ Eloquent Models & Relationships

**`app/Models/Legislator.php`**
```php
public function legislations()
{
    return $this->belongsToMany(Legislation::class);
}
```

**`app/Models/Legislation.php`**
```php
public function sponsors()
{
    return $this->belongsToMany(Legislator::class, 'legislation_legislator');
}
```

### 🗄️ Database Tables
*   `legislators`: Stores `id`, `first_name`, `last_name`, and `hometown`.
*   `legislations`: Stores `id`, `title`, and `text`.
*   `legislation_legislator`: Pivot table managing foreign keys (`legislation_id`, `legislator_id`) to bridge the entries.

---


## 🧪 Running Automated Tests

A simple suite of feature and unit tests can be found in the tests folder.

### Using Laravel Sail (Docker)
Run tests inside the Sail environment:
```bash
./vendor/bin/sail test
```

### Using Local Installation (No Docker)
Run tests directly on your host machine:
```bash
php artisan test
```
