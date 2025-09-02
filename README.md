# 👋 Abhishek Nangare — Personal Portfolio

A responsive single‑page portfolio website built with **HTML, CSS, and JavaScript** using Bootstrap and popular UI libraries.  
Includes a working **Contact** form powered by **PHP**, **PHPMailer** for email delivery, and **PostgreSQL (PDO)** to store messages.

---

## ✨ Sections
- **About**
- **Resume**
- **Services**
- **Portfolio/Gallery**
- **Contact** (email via PHPMailer + optional DB save)

---

## 🧩 Tech Stack
- **Frontend:** HTML5, CSS3, JS, Bootstrap 5, AOS, GLightbox, Swiper, Isotope, PureCounter, RemixIcon/Bootstrap Icons
- **Backend:** PHP 7+/8+
- **Email:** PHPMailer
- **Database (optional):** PostgreSQL via PDO

> Detected entry: `Personal/index.html` (title: *Abhishek Nangare*).

---

## 📁 Project Structure (key parts)
```
Personal/
├─ index.html
├─ assets/                 # CSS, JS, images, vendor libraries
├─ forms/
│  ├─ contact.php          # Basic email form handler
│  └─ send_email.php       # Alternative handler
├─ PHPMailer/              # PHPMailer library (no Composer needed)
├─ contact3.php            # PHPMailer + PostgreSQL (stores messages)
└─ send-message.php        # PHPMailer example
```

---

## 🚀 Local Setup
1. Place the `Personal/` folder into your local server root (e.g., `htdocs` for XAMPP/WAMP).  
2. Create `config.php` from the example:
   ```bash
   cp config.example.php config.php
   ```
3. Update `config.php` with your **PostgreSQL** and **SMTP** details.
4. Start Apache (and PostgreSQL).
5. Open: `http://localhost/Personal`

---

## 🗄️ Database (Optional: store contact messages)
Create a database and table (example):
```sql
CREATE DATABASE contact;
\c contact;

CREATE TABLE contact_form (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(200) NOT NULL,
  subject VARCHAR(200),
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
Then ensure your `config.php` points to this DB.

---

## ✉️ Email (PHPMailer)
This project includes **PHPMailer** in `/Personal/PHPMailer`. No Composer required.

---

## 🔧 Endpoints
- `forms/contact.php` – simple contact handler
- `contact3.php` – PHPMailer + PostgreSQL storage
- `send-message.php` – PHPMailer example

> You can consolidate these into a single `forms/contact.php` that uses the credentials from `config.php`.

---

## 🌐 Deployment
- **Static only (no PHP):** GitHub Pages / Netlify (contact form won’t work without backend).  
- **PHP needed (recommended):** Shared hosting, cPanel, Render, Railway, Koyeb, or a VPS with Apache/Nginx + PHP + Postgres.
- Add your environment secrets as server vars and keep `config.php` out of version control.

---

#
## 🙌 Credits
This site uses assets and vendor libraries such as Bootstrap, AOS, GLightbox, Isotope, Swiper, RemixIcon, and Bootstrap Icons.
