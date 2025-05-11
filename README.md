# Secure and Vulnerable Web Application (PHP & MySQL)

This project is a deliberately vulnerable web application developed using PHP and MySQL. It is designed for learning, demonstration, and testing of web application security vulnerabilities and secure coding practices.

## Project Objectives

- Demonstrate common web application vulnerabilities (e.g., SQL Injection, XSS, CSRF, IDOR).
- Provide a secure version of each vulnerable functionality.
- Help learners understand the difference between insecure and secure code.
- Practice penetration testing skills and secure coding in a PHP/MySQL environment.


## Technologies Used

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS
- **Server:** XAMPP (Apache + MySQL)
- **Tools for Testing:** Burp Suite, Browser Developer Tools


## Vulnerabilities Demonstrated

This project includes pages intentionally vulnerable to:

- **SQL Injection** – Unsecured login queries.
- **Cross-Site Scripting (XSS)** – User input reflected or stored without sanitization.
- **Cross-Site Request Forgery (CSRF)** – No token validation for critical actions.
- **Insecure Direct Object Reference (IDOR)** – Accessing user profiles by manipulating `id` in URL.
- **Plaintext Password Storage** – Demonstrated in early phase (later secured).
- **Lack of Brute-force Protection** – Demonstrated and then mitigated.


## Secure Features Implemented

- Password hashing using `password_hash()` and verification via `password_verify()`.
- Prepared statements for all database queries (prevents SQLi).
- Output encoding using `htmlspecialchars()` to prevent XSS.
- Session-based brute-force protection using cooldown timer.
- Secure user registration and login.
- Restricted access to pages without authentication.
- CSRF token mechanism added in secure version of critical forms.


## Setup Instructions

1. Clone or download the repository to your local XAMPP `htdocs` directory.
2. Start Apache and MySQL from the XAMPP control panel.
3. Update database credentials in `/db/db_config.php` if needed.
4. Access the app at: http://localhost/secure-web-app/login.php OR http://localhost/vuln-web-app/login.php
5. (Optional) Use tools like **Burp Suite** to test for vulnerabilities.


## Testing Scenarios

- Use XSS payloads in `form.php` in the insecure version to see reflected/stored attacks.
- Perform SQL injection on vulnerable login page before prepared statements are applied.
- Test brute-force login before and after protection is implemented.
- Use Burp Suite intruder to automate brute-force or IDOR attacks.
- Use the CSRF attack page to test unauthorized requests.


## License

This project is open-source and can be used for learning, training, and internal academic purposes.
