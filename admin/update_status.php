<?php
// Include database connection
include('../includes/dbcon.php');


// Start the session (if not already started in included files)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Handle action to approve or decline
if(isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    // Update status based on action
    if($action == 'approve') {
        $query = "UPDATE model_20 SET `status` = 'approved' WHERE `ordinary-number` = $id";
    } elseif($action == 'decline') {
        $query = "UPDATE model_20 SET `status` = 'declined' WHERE `ordinary-number` = $id";
    }

    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        // Set notification message in session
        $_SESSION['notification'] = 'Item status updated successfully.';
        // Redirect back to index.php or admin page after updating
        // header('Location: ../request/index.php?success_msg=Item status updated successfully.');
        exit();
    }
}

// Close database connection
mysqli_close($connection);

?>