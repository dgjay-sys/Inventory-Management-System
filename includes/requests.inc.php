<?php
session_start();

if(isset($_POST['approve-request-item-btn'])) { // For approving a request
    include 'config.inc.php';

    $requestId = $_POST['approve_request_id']; // Get the request's ID that is about to approve
    $userId = $_POST['user_id']; // Get the user's ID

    if (empty($requestId) && empty($userId)) { // Check if the request ID and userID is empty para pag wala to, babalik sila sa requests.php
        header("location: ../requests.php?m=404"); // Wala akong maisip na error Code HAHAH
        exit();
    }

    // The process in database
    $sql = "UPDATE history SET history_status = 'approved' WHERE history_id = :requestId";
    // Probably dadagdagan dito para sa logs table
    try {
        $stmt = $pdo->prepare($sql);
        // Bind the parameter
        $stmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);
        // Execute the statement
        $stmt->execute();

        // Updated successfully
        header("location: ../profile.php?m=us");
        exit();
    } catch (PDOException $e) {
        // Get error message if failed
        echo "Error: " . $e->getMessage();
        header("location: ../requests.php?m=".$e->getMessage().""); // Failed
        exit();
    }
} 
else if (isset($_POST['decline-request-item-btn'])) { // For declining a request
    include 'config.inc.php';

    $requestId = $_POST['decline_request_id']; // Get the request's ID that is about to approve
    $userId = $_POST['user_id']; // Get the user's ID

    if (empty($requestId) && empty($userId)) { // Check if the request ID and userID is empty para pag wala to, babalik sila sa requests.php
        header("location: ../requests.php?m=404"); // Wala akong maisip na error Code HAHAH
        exit();
    }

    // The process in database
    $sql = "UPDATE history SET history_status = 'declined' WHERE history_id = :requestId";
    // Probably dadagdagan dito para sa logs table
    try {
        $stmt = $pdo->prepare($sql);
        // Bind the parameter
        $stmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);
        // Execute the statement
        $stmt->execute();

        // Updated successfully
        header("location: ../requests.php?m=dcs");
        exit();
    } catch (PDOException $e) {
        // Get error message if failed
        echo "Error: " . $e->getMessage();
        header("location: ../requests.php?m=".$e->getMessage().""); // Failed
        exit();
    }
}
 else {
    header("location: ../requests.php?m=404");
    exit();
}