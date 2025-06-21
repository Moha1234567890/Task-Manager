
# 📝 Task Manager Web App

A simple full-stack **Task Manager** web application built using:

- ✅ Native PHP (no frameworks)
- ✅ jQuery (with AJAX)
- ✅ MySQL (via PDO)
- ✅ Bootstrap 5 (for responsive UI)

---

## 📌 Features

- ✅ Create, Read, Update, and Delete (CRUD) tasks
- ✅ AJAX-powered interactions (no page reloads)
- ✅ Bootstrap 5 responsive layout & modals
- ✅ Status toggle (Pending ✅ / Completed ✅)
- ✅ Filter tasks by status
- ✅ Server-side and client-side form validation
- ✅ Bootstrap alert messages for feedback

---

## 📁 Project Structure

```
/task-manager/
├── /api/                   # Backend PHP APIs
│   ├── create_task.php
│   ├── get_tasks.php
│   ├── update_task.php
│   └── delete_task.php
├── /assets/                # JS and CSS files
│   ├── script.js
│   └── style.css
├── index.php               # Main frontend UI
└── database.sql            # MySQL schema
```

---

## 🧱 Database Schema

Use the following SQL to create the `tasks` table:

```sql
CREATE TABLE `tasks` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT,
  `status` ENUM('pending','completed') DEFAULT 'pending',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

---

## 🚀 Getting Started

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/task-manager.git
cd task-manager
```

### 2. Setup Your Database

- Create a new database (e.g. `task_manager`)
- Import `database.sql` into your database
- Update DB credentials in `/api/db.php`:

```php
$pdo = new PDO("mysql:host=localhost;dbname=task_manager;charset=utf8", "root", "");
```

> Replace `root` and `""` with your MySQL username and password if different.

---

### 3. Run the Project

If using XAMPP or similar:

- Place the project inside your `htdocs/` folder.
- Access it in browser:  
  👉 `http://localhost/task-manager/`

---

## 🧪 Development Notes

- jQuery AJAX (`$.post`, `$.get`) handles communication between frontend and backend.
- PHP returns `JSON` responses, which are parsed in JS using `JSON.parse()`.
- Tasks are rendered dynamically into the HTML table.
- `Bootstrap 5` ensures mobile responsiveness and modals.

---

## 📸 Screenshots

_Add some screenshots here if you want visual reference._

---

## 📄 License

MIT License. Feel free to use or modify.

---

## 🙋‍♂️ Author

**Your Name**  
[GitHub Profile](https://github.com/your-username)
