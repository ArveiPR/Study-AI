# Study-AI

A web-based collaborative learning platform with integrated AI tutoring and real-time group discussions. Built with native PHP, MySQL, and the OpenAI API.

---

## Overview

Study-AI is designed to provide students with an interactive study environment. Users can chat 1-on-1 with an AI assistant to get quick explanations on study topics, join shared discussion rooms with other students, and organize their learning sessions through a simple dashboard.

## Key Features

- **AI Tutor:** Interactive chat with OpenAI's GPT models featuring streaming-style responses.
- **Group Discussion:** Shared study room for peer messaging and collaboration.
- **Authentication:** User registration and session-based login with bcrypt password hashing.
- **Theme Switcher:** Dark and light mode toggle.
- **Clean Architecture:** Lightweight native PHP backend with prepared SQL statements.

## Requirements

- PHP 8.0 or higher (with `curl` and `mysqli` extensions enabled)
- MySQL / MariaDB (via XAMPP, Laragon, or standalone)
- An OpenAI API key

## Quick Start

### 1. Clone the repository

```bash
git clone https://github.com/ArveiPR/Study-AI.git
cd Study-AI
```

### 2. Environment configuration

Copy the example environment file:

```bash
cp .env.example .env
```

*(On Windows PowerShell, you can use `Copy-Item .env.example .env`)*

Open `.env` and set your database connection details and OpenAI API key:

```env
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=study_ai

OPENAI_API_KEY=your_openai_api_key_here
```

### 3. Database setup

1. Ensure MySQL is running.
2. Create the database and import `database.sql`:

```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS study_ai;"
mysql -u root -p study_ai < database.sql
```

Alternatively, open **phpMyAdmin**, create a database named `study_ai`, and import `database.sql` through the web interface.

### 4. Run the development server

Using PHP's built-in web server:

```bash
php -S localhost:8000
```

Open `http://localhost:8000` in your browser.

> If you are using XAMPP, place the project inside `C:/xampp/htdocs/Study-AI` and access `http://localhost/Study-AI`.

## Project Layout

```text
Study-AI/
├── api/                  # API endpoints (OpenAI bridge, chat handlers)
├── assets/               # Static CSS styles and client-side JavaScript
├── backend/              # Database connection and environment loader
├── components/           # Shared UI partials
├── .env.example          # Sample environment configuration template
├── .gitignore            # Git exclusion rules
├── database.sql          # Database schema
├── dashboard.php         # Main user dashboard
├── group_chat.php        # Group discussion room
├── private_chat.php      # 1-on-1 AI chat page
├── index.php             # Landing page
├── login.php             # Authentication entry
└── register.php          # Account creation
```

## Security Notes

- Sensitive credentials and keys should stay in `.env` only. The `.env` file is excluded from git tracking via `.gitignore`.
- Database operations use parameterized queries (`mysqli_stmt`) to prevent SQL injection.
- User passwords are encrypted using `password_hash()` with `PASSWORD_DEFAULT`.
