# 🚀 TrackTime – Time Management System

**TrackTime** is a modern Laravel-based time-tracking and lightweight project management system built for freelancers and small teams.

It allows users to track time entries against projects and work types, manage users and roles, and generate simple reports — all inside a clean and responsive Bootstrap 5 interface.

Designed as a developer-friendly demo application with admin pages and an attractive UI.

---

## 🎯 Purpose

- Track time entries against projects and work types  
- Manage users and roles  
- Generate simple reports  
- Provide a self-hosted lightweight time tracker  

---

## 👥 Primary Audience

- Developers  
- Freelancers  
- Small teams  
- Anyone looking for a simple self-hosted time tracking solution  

---

# ✨ Key Features

## ⏱ Time Tracking
- Create, edit, view, and delete time entries  
- Log start/end time or duration  
- Associate entries with projects and work types  

## 📁 Projects
- Create and manage projects  
- Assign time entries to specific projects  

## 🏷 Work Types
- Create task categories/work types  
- Use work types while logging time  

## 👤 User Management
- Full CRUD operations for users  
- Role assignment system  
- Role badges display  

## 📋 Audit Log
- Tracks user actions  
- Records: model, action type, record ID  

## 📊 Reports
- Filter by date range  
- View aggregated time summaries  

## 🔐 Authentication
- Laravel authentication scaffold  
- Redesigned responsive Bootstrap 5 login page  

## 🎨 Responsive UI
- Bootstrap 5 layout  
- Dark sidebar + top navigation bar  
- Cards-based dashboard  
- DataTables integration  
- Flatpickr date picker  
- Clean and modern design  

## 🗑 Mass Actions
- Bulk delete support  
- Enhanced DataTables functionality  

---

# 🏗 Architecture & Tech Stack

## Backend
- **Framework:** Laravel 10.x  
- **Language:** PHP 8.x  
- **Database:** MySQL  

## Frontend
- Bootstrap 5  
- Font Awesome 6  
- Google Inter Font  
- DataTables (Bootstrap theme)  
- Flatpickr

---

# 📂 Project Structure

This project follows the standard Laravel directory structure:
```
app/
├── Models/
├── Http/Controllers/

routes/
└── web.php

resources/
├── views/
│ ├── layouts/
│ ├── partials/
│ └── CRUD views

public/
└── Assets & entry point

storage/
bootstrap/
database/
```

## Tools & Packages
- Composer-managed dependencies  
- laravel/ui (authentication scaffolding)  
- doctrine/dbal  
- intervention/image  
---

# ⚙️ Installation

Follow the steps below to set up the project locally:

```bash
git clone https://github.com/th3sabbir/Time-Management-System.git
cd Time-Management-System

composer install
cp .env.example .env
php artisan key:generate
Configure Database
```
Open the .env file and update your database credentials:

DB_DATABASE=tracktime
DB_USERNAME=root
DB_PASSWORD=

Then run:

php artisan migrate
php artisan db:seed
php artisan serve

Visit the application at:

http://127.0.0.1:8000

---

# 🔑 Login Credentials

To explore the system features, use the demo account below:

| Role  | Email               | Password  |
|-------|--------------------|-----------|
| Admin | admin@sabbirahmed.net  | s1234567  |

If you find this project helpful, feel free to ⭐ star the repository.
