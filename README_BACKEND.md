# BCA Prep_Zone - Contact Form Backend Setup

This document explains how to set up the backend for the "Get in Touch" contact form.

## Prerequisites

1. **XAMPP/WAMP/MAMP** - Local web server with PHP and MySQL
2. **PHP** - Version 7.0 or higher
3. **MySQL** - Database server

## Setup Instructions

### 1. Database Setup

1. Open phpMyAdmin (usually at `http://localhost/phpmyadmin`)
2. Create a new database named `bca_prepzone`
3. Import the `database_setup.sql` file or run the SQL commands manually:

```sql
CREATE DATABASE IF NOT EXISTS bca_prepzone;
USE bca_prepzone;

CREATE TABLE IF NOT EXISTS contact_messages (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(200),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### 2. File Configuration

1. Place all files in your web server directory (e.g., `htdocs` for XAMPP)
2. Update database credentials in `connect.php` if needed:
   ```php
   $servername = "localhost";
   $username = "root";  // Your MySQL username
   $password = "";      // Your MySQL password
   $dbname = "bca_prepzone";
   ```

### 3. Email Configuration (Optional)

To enable email notifications:

1. Uncomment the email line in `connect.php`:
   ```php
   mail($to, $email_subject, $email_body, $headers);
   ```

2. Configure your server's mail settings (SMTP) if needed

### 4. Admin Panel Access

1. Access the admin panel at: `http://localhost/your-project-folder/admin.php`
2. Default credentials:
   - Username: `admin`
   - Password: `admin123`

**Important:** Change these credentials in production!

## Features

### Contact Form (`connect.php`)
- ✅ Form validation (required fields, email format)
- ✅ SQL injection protection
- ✅ Database storage
- ✅ Email notifications (optional)
- ✅ Success/error messages
- ✅ Automatic table creation

### Admin Panel (`admin.php`)
- ✅ Secure login system
- ✅ View all contact messages
- ✅ Delete messages
- ✅ Responsive design
- ✅ Message sorting by date

## File Structure

```
your-project-folder/
├── index.html          # Main website with contact form
├── connect.php         # Backend form handler
├── admin.php           # Admin panel
├── database_setup.sql  # Database setup script
├── style.css           # Website styling
└── README_BACKEND.md   # This file
```

## Testing

1. Start your web server (XAMPP/WAMP/MAMP)
2. Open `http://localhost/your-project-folder/`
3. Fill out the contact form
4. Check the admin panel to see the submitted message
5. Test form validation by submitting incomplete forms

## Security Notes

- Change default admin credentials
- Use HTTPS in production
- Implement proper session management
- Add rate limiting for form submissions
- Consider using prepared statements for better SQL security

## Troubleshooting

### Common Issues:

1. **Database Connection Error**
   - Check if MySQL is running
   - Verify database credentials
   - Ensure database exists

2. **Form Not Submitting**
   - Check if PHP is enabled
   - Verify file permissions
   - Check error logs

3. **Admin Panel Not Working**
   - Ensure sessions are enabled
   - Check PHP configuration
   - Verify file paths

## Support

For issues or questions, contact: anishaverma839@gmail.com 