<?php
    // get the data from the form
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $heard_from = filter_input(INPUT_POST, 'heard_from', FILTER_SANITIZE_SPECIAL_CHARS);
    $heard_from = $heard_from ?: 'Unknown'; // default to 'Unknown' if not selected
    $wants_updates = filter_input(INPUT_POST, 'wants_updates') ? 'Yes' : 'No';
    $contact_via = filter_input(INPUT_POST, 'contact_via', FILTER_SANITIZE_SPECIAL_CHARS);
    $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_SPECIAL_CHARS);

    // Convert special characters in comments and handle new lines
    $comments = nl2br(htmlspecialchars($comments));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Account Information</title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo str_repeat('*', strlen($password)); ?></span><br> <!-- Masking the password -->

        <label>Phone Number:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard From:</label>
        <span><?php echo htmlspecialchars($heard_from); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo htmlspecialchars($wants_updates); ?></span><br>

        <label>Contact Via:</label>
        <span><?php echo htmlspecialchars($contact_via); ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo $comments; ?></span><br>        
    </main>
</body>
</html>
