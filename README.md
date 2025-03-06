# Firebase Diary App - WML

A simple diary app using Firebase Realtime Database, optimized for mobile devices.

## Prerequisites
- XAMPP installed ([Download](https://www.apachefriends.org))
- Firebase account

## Quick Setup Guide

1. **Clone the Project**
   ```bash
   git clone https://github.com/your-repo/firebase-diary-wml.git
   cd firebase-diary-wml
Start XAMPP

Launch XAMPP Control Panel

Start Apache and MySQL

Firebase Setup

Create a new Firebase project at Firebase Console

Enable Realtime Database

Set security rules (temporary for development):

json
Copy
{
  "rules": {
    ".read": "true",
    ".write": "true"
  }
}
Copy your:

Database URL (from Realtime Database section)

API Key (Project Settings > General > Web API Key)

Configure Project

Create config.php in the project root:

php
Copy
<?php
$databaseURL = "PASTE_YOUR_DATABASE_URL_HERE";
$apiKey = "PASTE_YOUR_API_KEY_HERE";
?>
Run the App

Move project folder to XAMPP/htdocs/

Access via browser:

http://localhost/firebase-diary-wml/index.php
Security Note
Before deploying publicly:

Update Firebase security rules to require authentication

Never commit real API keys to version control

Troubleshooting
CURL Errors: Enable extension in php.ini:

extension=curl
PHP Version: Ensure using PHP ≥7.4 (Check in XAMPP settings)

Connection Issues: Verify credentials in config.php
