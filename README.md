# Web-Based Voting System

## Overview

This web-based voting system is a comprehensive solution for conducting secure and efficient online elections. Built with PHP and MySQL, the system provides a user-friendly interface for voters and powerful management tools for administrators.

## Features

### For Voters
- **Secure Authentication**: Login system with encrypted credentials
- **Intuitive Voting Interface**: Easy-to-use interface for casting votes
- **Real-time Results**: View election results graphically after voting closes
- **Candidate Information**: Access detailed information about candidates
- **Mobile Responsive**: Vote from any device with a responsive design

### For Administrators
- **Dashboard**: Comprehensive admin dashboard with analytics
- **Candidate Management**: Add, edit, and remove candidates
- **Voter Management**: Register, activate, and manage voter accounts
- **Election Control**: Set election parameters, start/stop voting periods
- **Results Management**: View, export, and analyze voting results
- **User Management**: Control admin access with role-based permissions

## System Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache, Nginx, etc.)
- Modern web browser

## Installation

1. **Clone the repository**
   ```
   git clone https://github.com/yourusername/voting-system.git
   ```

2. **Set up the database**
   - Create a new MySQL database
   - Import the database schema from `database/voting.sql`

3. **Configure the connection**
   - Edit `dbcon.php` with your database credentials
   ```php
   <?php
   $conn = mysqli_connect("localhost", "username", "password", "voting_db");
   
   if(!$conn){
       die("Connection error: " . mysqli_connect_error());
   }
   ?>
   ```

4. **Deploy to web server**
   - Copy all files to your web server's public directory

5. **Access the system**
   - Navigate to the URL of your web server
   - Login with the default admin credentials:
     - Username: `admin`
     - Password: `admin123`
   - **Important**: Change the default admin password immediately after first login

## Project Structure

```
voting1/
├── admin/              # Administrator interface
├── admin2/             # Secondary administrator interface
├── candidates/         # Candidate information pages
├── css/                # Stylesheets
├── database/           # Database schema and backups
├── img/                # Image assets
├── js/                 # JavaScript files
├── register/           # User registration system
├── index.php           # Main entry point
├── login.php           # User login page
├── vote.php            # Voting interface
└── vote_result.php     # Results display
```

## Usage

### Voter Workflow
1. Register for an account or use provided credentials
2. Login to the system during active voting period
3. View candidate information
4. Submit votes for preferred candidates
5. View results (if enabled by administrator)

### Administrator Workflow
1. Login to admin dashboard
2. Manage election settings
3. Add/edit candidates and positions
4. Register and manage voters
5. Monitor voting progress
6. Close election and publish results

## Security Features

- Password encryption
- Session management
- Input validation
- Protection against SQL injection
- CSRF protection
- Role-based access control

## Development

### Technology Stack
- **Frontend**: HTML, CSS, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Charts**: JavaScript charting libraries

### Extending the System
The system is designed to be modular for easy extension:
- Add new election types by extending the voting mechanisms
- Implement additional authentication methods
- Create custom reporting features

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contributors

- **Original Development Team**
    - Herald Carl Avila
    - Jester Carlo Tapit
- **Feature Enhancement Contributors**
    - Herald Carl Avila
    - Jester Carlo Tapit
- **Security Improvement Contributors**
    - Herald Carl Avila
    - Jester Carlo Tapit

---

© 2025 Web-Based Voting System. All rights reserved.
