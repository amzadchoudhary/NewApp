
````bash
# Laravel POC User Dashboard

A proof-of-concept Laravel application demonstrating a user dashboard built with Tabler UI, role-based access, CSV export, birthday alerts, and API endpoints.

## 🚀 Features

- 🧑‍🤝‍🧑 User listing with pagination, search, and modals for viewing/editing.
- 🎂 Birthday alert system with toast notifications on the dashboard.
- 💾 Export user list as CSV for easy data management.
- 🔒 Role-based access control (Admin/User) to manage permissions.
- 📧 Simulated birthday email logs for demonstration.
- 🌗 Dark mode toggle using Tabler for user preference.
- 🔌 REST API for user list, secured with Laravel Sanctum.
- 📦 One-command setup script for quick deployment.

## 🛠 Tech Stack

- Laravel 11.x (or 12.x if that's the version you are using)
- MySQL
- Tabler UI
- Laravel Sanctum
- PHP 8.2+ (Laravel 11 requires PHP >= 8.2)

---

## ✅ Prerequisites

- PHP >= 8.2 (matching Laravel's requirement)
- Composer
- MySQL or MariaDB
- Node.js & NPM (for frontend asset compilation)
- Git

---

## ⚙️ Setup Instructions

Clone the repository:

```bash
git clone [https://github.com/amzadchoudhary/NewApp.git](https://github.com/amzadchoudhary/NewApp.git)
cd NewApp
````

Run the setup command:

```bash
php artisan app:setup
```

This command will guide you through:

  * Setting up database credentials and creating the `.env` file.
  * Running database migrations.
  * Seeding the database with initial data.
  * Creating your initial admin user.
  * Generating the application key.

-----

## 🔐 Admin Login

After successful setup, use the admin credentials you created during the `php artisan app:setup` process to log in to the dashboard.

-----

## 🧪 Simulated Birthday Alert

The application includes a simulated birthday alert system. On user birthdays, toast notifications will appear at the bottom of the dashboard (or as configured). Additionally, birthday "email" events are logged.

-----

## 📷 Screenshots

**Dashboard**
![image](https://github.com/user-attachments/assets/c2eedbbd-fef3-40f2-86a7-0f7c249b2bff)

**User Datatable View**
![image](https://github.com/user-attachments/assets/8b556439-a015-45a2-ba84-3f2f3e90b757)

-----

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
EOF
