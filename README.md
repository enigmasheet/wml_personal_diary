# Firebase Diary App - WML

A simple diary app built with Firebase Realtime Database for WML (Wireless Markup Language) platforms. Users can create, read, update, and delete diary entries from mobile devices.

---

## Requirements
- **XAMPP** (or equivalent local server setup)
- **PHP 7.4 or newer**
- **Firebase Account** (to access Realtime Database)
- **Firebase API Key** and **Database URL** (from your Firebase project)

---

## Setup Instructions

### 1. Clone the Repository
``bash
git clone https://github.com/your-repo/firebase-diary-wml.git
cd firebase-diary-wml
2. Install XAMPP
Download and install XAMPP.

Start Apache and MySQL from the XAMPP control panel.

3. Configure Firebase
Create a Firebase project in the Firebase Console.

Enable Realtime Database and set security rules for development:

json
Copy
{
  "rules": {
    ".read": "true",
    ".write": "true"
  }
}
Copy your project's Database URL and API Key from Firebase Project Settings.

4. Update Project Configuration
Create/update config.php in the root directory:

php
Copy
<?php
$databaseURL = "https://your-database-name.firebaseio.com"; // Replace with your URL
$apiKey = "your-firebase-api-key"; // Replace with your API key
?>
5. Deploy to XAMPP
Move the project folder to XAMPP/htdocs/ (e.g., C:\xampp\htdocs\firebase-diary-wml).

Access the app at http://localhost/firebase-diary-wml/index.php.

Firebase Security Rules (Production)
Before deploying publicly, restrict database access:

json
Copy
{
  "rules": {
    ".read": "auth != null",
    ".write": "auth != null"
  }
}
Project Structure
Copy
firebase-diary-wml/
├── index.php        # List all entries
├── create.php       # Add new entry
├── view.php         # View single entry
├── update.php       # Edit entry
├── delete.php       # Delete entry
├── firebase.php     # Firebase API interactions
└── config.php       # Firebase credentials
Key Features
Create Entries: Add new diary entries with title/content

Read Entries: View all entries or filter by date

Update Entries: Modify existing entries

Delete Entries: Remove unwanted entries

WML Compatibility: Optimized for mobile markup

Troubleshooting
CURL Errors: Enable extension=curl in php.ini

PHP Version Issues: Verify PHP ≥7.4 in XAMPP settings

Database Connection Failures: Double-check Firebase credentials in config.php

Permission Issues: Ensure Apache has write access to project files

Contributing
Fork the repository

Create a feature branch (git checkout -b feature/improvement)

Commit changes (git commit -m 'Add new feature')

Push to branch (git push origin feature/improvement)

Open a Pull Request

License
MIT License. See the LICENSE file for details.

Notes:

Replace placeholder credentials in config.php

Never commit actual API keys to version control

Enable Firebase Authentication for production use

Copy

This version:
1. Removes all external links
2. Uses consistent Markdown formatting
3. Groups related content under clear headers
4. Provides actionable troubleshooting steps
5. Includes security best practices
6. Maintains full compatibility with WML platforms
