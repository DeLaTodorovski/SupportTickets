<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'SupportTickets';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}





// Template header, feel free to customize this
function template_header($title) {

    if (!isset($_SESSION['loggedin'])) {
            
        $loginbtn = 'Login';
        $loginlink = 'login.php';
    
    }else{

        $loginbtn = 'Logout';
        $loginlink = 'logout.php';
    }
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Ticketing System</h1>
                <a href="index.php"><i class="fas fa-ticket-alt"></i>Tickets</a>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="$loginlink"><i class="fas fa-sign-out-alt"></i>$loginbtn</a>
            </div>
        </nav>
    EOT;
    }

    // Template footer
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>