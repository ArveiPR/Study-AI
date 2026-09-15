# 🎓 StudyAI - AI Study & Discussion Platform

StudyAI is a collaborative web application designed for students and learners to study, discuss, and interact with an AI tutor powered by OpenAI (GPT-4o mini).

---

## ✨ Features

- **🤖 1-on-1 AI Tutor (Private Chat):** Instant study help and answers powered by OpenAI with real-time typewriter stream effects.
- **👥 Group Discussion Chat:** Real-time peer chat room to collaborate with other students.
- **🔐 User Authentication:** Secure user registration and login with encrypted password hashing (`password_hash` / `password_verify`).
- **🌙 Dark / Light Mode:** Built-in theme switcher for comfortable reading at night.
- **📊 Interactive Dashboard:** Easy navigation hub for accessing private chats, study groups, and quizzes.

---

## 🛠️ Tech Stack

- **Backend:** PHP 8.0+ (Native)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3 (Modern Responsive UI), Vanilla JavaScript
- **AI Integration:** OpenAI API (`gpt-4o-mini`) via cURL

---

## 📋 Prerequisites

Before running this project, ensure you have the following installed:
- **PHP** (Version 8.0 or higher) with `curl` and `mysqli` extensions enabled.
- **MySQL / MariaDB** (via [XAMPP](https://www.apachefriends.org/), Laragon, or standalone MySQL).
- **OpenAI API Key** (from [platform.openai.com](https://platform.openai.com/api-keys)).
- **Git** (optional, for cloning).

---

## 🚀 Getting Started

Follow these steps to set up and run StudyAI locally:

### 1. Clone or Download the Repository

```bash
git clone https://github.com/your-username/study-ai.git
cd study-ai
```

### 2. Configure Environment Variables

Create your local `.env` file by copying the provided example template:

```bash
# On Windows PowerShell:
Copy-Item .env.example .env

# On Linux/macOS:
cp .env.example .env
```

Open `.env` in a text editor and fill in your database credentials and OpenAI API Key:

```env
# Database Configuration
DB_HOST=localhost
DB_USER=root
DB_PASS=
DB_NAME=study_ai

# OpenAI API Configuration
OPENAI_API_KEY=your_actual_openai_api_key_here
```

> 🔒 **Note:** The `.env` file is ignored by Git (`.gitignore`), ensuring your sensitive API keys and database credentials will never be exposed publicly.

### 3. Setup the Database

1. Start **MySQL** (e.g., via XAMPP Control Panel).
2. Open **phpMyAdmin** (`http://localhost/phpmyadmin`) or your MySQL terminal.
3. Import the database schema:
   - Create a database named `study_ai`.
   - Import the file [`database.sql`](database.sql) into `study_ai`.
   
   *(Alternative via terminal)*:
   ```bash
   mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS study_ai;"
   mysql -u root -p study_ai < database.sql
   ```

### 4. Run the Application

You can run the application using either method below:

#### Option A: PHP Built-in Server (Quickest)
Run this command from inside the `study-ai` folder:

```bash
php -S localhost:8000
```

Open your browser and navigate to:
```text
http://localhost:8000
```

#### Option B: Using XAMPP / Apache
1. Move or copy the `study-ai` folder into your XAMPP `htdocs` directory:
   ```text
   C:\xampp\htdocs\study-ai
   ```
2. Start both **Apache** and **MySQL** in XAMPP.
3. Open your browser and navigate to:
   ```text
   http://localhost/study-ai
   ```

---

## 📁 Project Structure

```text
study-ai/
├── api/
│   ├── create_conversation.php # Create chat session
│   ├── load_chat.php           # Fetch chat history
│   ├── load_conversations.php  # Fetch user conversations
│   ├── load_messages.php       # Fetch messages by conversation
│   ├── openai.php              # OpenAI API communication
│   ├── send_group.php          # Send message to group chat
│   ├── send_message.php        # Send message handler
│   └── send_private.php        # Send message to private AI
├── assets/
│   ├── css/                    # Stylesheets
│   └── js/                     # Client-side JavaScript
├── backend/
│   ├── env_loader.php          # Secure environment variable loader
│   └── koneksi.php             # MySQL database connection
├── .env.example                # Sample environment template
├── .gitignore                  # Git ignore rules for sensitive files
├── database.sql                # MySQL schema definition
├── dashboard.php               # User dashboard
├── group_chat.php              # Group discussion room
├── index.php                   # Landing page
├── login.php                   # Authentication login
├── logout.php                  # Session logout
├── private_chat.php            # 1-on-1 AI chat interface
├── profile.php                 # User profile page
├── register.php                # User registration
└── README.md                   # Project documentation
```

---

## 🛡️ Security Best Practices

- **Never commit `.env`:** Keep all API keys and secrets in `.env`.
- **Prepared Statements:** Database queries utilize `mysqli` prepared statements to prevent SQL Injection.
- **Password Hashing:** Passwords are encrypted using PHP's native `PASSWORD_DEFAULT` (Bcrypt).
