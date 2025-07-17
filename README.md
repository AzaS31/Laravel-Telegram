# Telegram Bot with Laravel

This project implements user registration with notifications sent via Email and Telegram. It was built as part of a GeekBrains course to practice integrating external services such as Mailtrap and the Telegram Bot API.

---

## 📌 Features

* 🔐 **User registration and authentication** via Laravel
* 📧 **Email notifications**: welcome email to newly registered users (via Mailtrap)
* 🤖 **Telegram notifications**: message sent to a Telegram channel upon user registration
* 🔍 **Test route** `/test-telegram` to verify Telegram integration

---

## 🛠 Technologies

* **Backend**: PHP, Laravel
* **External services**:

  * Telegram Bot API (`irazasyed/telegram-bot-sdk`)
  * Mailtrap (SMTP email testing)
* **Tools**: Composer, Git

---

## Screenshots

![screen1](./screen1.png)
![screen2](./screen2.png)
![screen3](./screen3.png)

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/AzaS31/Laravel-Telegram.git
cd Laravel-Telegram
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Configure Environment Variables

```bash
cp .env.example .env
```

Then edit the `.env` file and provide your Mailtrap and Telegram credentials:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_FROM_ADDRESS=your-email@example.com
MAIL_FROM_NAME="${APP_NAME}"

TELEGRAM_CHANNEL_ID=your-telegram-channel-id
TELEGRAM_BOT_TOKEN=your-telegram-bot-token
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Database

Set your database connection in `.env` (MySQL, SQLite, etc.), then run migrations:

```bash
php artisan migrate
```

### 6. Run the Application

```bash
php artisan serve
```

---

## ✅ Functionality Check

### Telegram

Go to:

```
http://localhost:8000/test-telegram
```

> Make sure the message appears in your Telegram channel.

### Email

* Register a new user
* Check Mailtrap inbox for the welcome email

---

## 📁 Project Structure

| Component                                  | Description                                 |
| ------------------------------------------ | ------------------------------------------- |
| `RegisteredUserController`                 | Handles registration and notification logic |
| `App\Mail\Welcome.php`                     | Mail class for the welcome email            |
| `resources/views/emails/welcome.blade.php` | HTML template for the welcome email         |
| `routes/web.php`                           | Contains the `/test-telegram` route         |

---

## 🎯 Project Goals

* Learn email notification setup via SMTP (Mailtrap)
* Master integration with Telegram using the Bot API
* Implement registration and authentication in Laravel
* Set up secure handling of sensitive credentials

---

## ⚠️ Notes

* Ensure your Telegram bot **is added to the channel** and has permission to **send messages**
* Mailtrap is used **only for development** and does not deliver to real inboxes
* This project is meant for **local development and testing** purposes

---

## 🧑‍💻 Author

**Azamat S.**
[GitHub: @AzaS31](https://github.com/AzaS31)

---

## 📜 License

This project is licensed under the **MIT License**.

