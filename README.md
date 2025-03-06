# Firebase Diary App - WML

This is a simple diary app using Firebase Realtime Database, built to work on WML (Wireless Markup Language) platforms. It allows users to create, view, update, and delete diary entries from a mobile device.

## Requirements

- **XAMPP** (or any local server setup)
- **PHP 7.4+**
- **Firebase Account** (For Firebase Realtime Database)
- **Firebase API Key** and **Database URL** (from your Firebase project)
  
## Setup Instructions

Follow these steps to get the project running on a new developer's PC.

### 1. Clone the Repository

First, clone the repository to your local machine:

git clone https://github.com/your-repo/firebase-diary-wml.git
cd firebase-diary-wml
2. Install XAMPP (For Local Server)
Download and install XAMPP.
Start Apache and MySQL servers from the XAMPP control panel.
3. Set Up Firebase
Go to Firebase Console.

Create a new project or use an existing one.

Navigate to Realtime Database and create a new database if you haven't already.

In the Rules tab, change the rules to allow public access for development purposes:

{
  "rules": {
    ".read": "true",
    ".write": "true"
  }
}
Get your Firebase Realtime Database URL and API Key from the Firebase Console under Project Settings.

4. Configuration
Copy the config.php file in the root directory and configure it with your Firebase Realtime Database URL and API key.

Example:


<?php
// Firebase Configuration
$databaseURL = "https://your-database-name.firebaseio.com"; // Replace with your database URL
$apiKey = "your-firebase-api-key"; // Replace with your API key
?>
5. Setting Up XAMPP
Move the project folder (firebase-diary-wml) to the htdocs folder in the XAMPP directory.
For example, C:\xampp\htdocs\firebase-diary-wml.
Open the http://localhost/ in your web browser and navigate to index.php to view the app.
6. Running the Project
Accessing the Diary App: Open the app by navigating to http://localhost/firebase-diary-wml/index.php on your browser.
Add Diary Entries: You can add, view, edit, and delete diary entries from the interface.
7. Firebase Rules (Important)
For development purposes, Firebase rules are set to be open (read and write access for everyone). Make sure to restrict access in production by using Firebase Authentication.

8. Troubleshooting
CURL Issues: Ensure CURL is enabled in PHP by checking the php.ini file (extension=curl).
PHP Version: Make sure you're using PHP 7.4 or later.
XAMPP Not Running: If Apache is not running, try restarting XAMPP.
9. Contributing
Feel free to open issues or create pull requests if you have suggestions, improvements, or fixes.

10. License
This project is open-source and available under the MIT License.


### Instructions:
1. Replace the placeholder `https://github.com/your-repo/firebase-diary-wml.git` with the actual repository URL.
2. Make sure the Firebase credentials (database URL and API key) are properly set in the `config.php` file.
3. Guide your developers on the use of XAMPP and setting up PHP to run the application.

Let me know if you'd like any modifications or additional sections!











Search

Reason

ChatGPT can make mistakes. Check impo
