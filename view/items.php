<?php
include '../includes/config.inc.php';
session_start();

// Check if there's an id, if it has, then it's logged in
// If there's no id, head back to login page
if (!isset($_SESSION['user_id']) and ($_SESSION['user_id'] == '')) {
    header("location: index.php");
    exit();
}

// To determine which is active page in nav bar
$_SESSION['active_tab'] = basename($_SERVER['SCRIPT_FILENAME']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Headers and other attachments/CDN -->
    <?php include_once '../includes/headers.inc.php'; ?>

    

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/items.css?v=<?php echo time(); ?>">

    <?php include '../assets/CDN.php'; ?>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Javascript for Datatables.net  -->
    <script>
        $(document).ready(function() {
            $('table').DataTable();
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        });
    </script>
</head>

<body>

    <?php include '../components/nav.php'; ?>



    <div id="wrapper">
        <div class="section px-5 pt-4">
            <div class="row justify-content-center align-items-center">
                <!-- TECHNOLOGY -->
                <div class="box col-sm-12 col-md-4 col-lg-4">
                    <i class="fa-solid fa-computer icon"></i>
                    <p class="m-0">Technology</p>
                    <?php
                    // Prepare and execute the query
                    $query = "SELECT COUNT(item_category) FROM items WHERE item_category = 1";
                    $stmt = $pdo->query($query);

                    // Fetch the count
                    $count = $stmt->fetchColumn();

                    // Check if the count was successfully fetched
                    if ($count !== false) {
                        echo '<p class="m-0">' . $count . '</p>'; // Output the count
                    } else {
                        echo "Error fetching count"; // Handle the error if fetch failed
                    }
                    ?>
                </div>
                <!-- CONSUMABLE -->
                <div class="box col-sm-12 col-md-4 col-lg-4">
                    <i class="fa-solid fa-glass-water icon"></i>
                    <p class="m-0">Consumable</p>
                    <?php
                    // Prepare and execute the query
                    $query = "SELECT COUNT(item_category) FROM items WHERE item_category = 2";
                    $stmt = $pdo->query($query);

                    // Fetch the count
                    $count = $stmt->fetchColumn();

                    // Check if the count was successfully fetched
                    if ($count !== false) {
                        echo '<p class="m-0">' . $count . '</p>'; // Output the count
                    } else {
                        echo "Error fetching count"; // Handle the error if fetch failed
                    }
                    ?>
                </div>
                <!-- OFFICE SUPPLY -->
                <div class="box col-sm-12 col-md-4 col-lg-4">
                    <i class="fa-solid fa-stapler icon"></i>
                    <p class="m-0 px-2">Office Supply</p>
                    <?php
                    // Prepare and execute the query
                    $query = "SELECT COUNT(item_category) FROM items WHERE item_category = 3";
                    $stmt = $pdo->query($query);

                    // Fetch the count
                    $count = $stmt->fetchColumn();

                    // Check if the count was successfully fetched
                    if ($count !== false) {
                        echo '<p class="m-0">' . $count . '</p>'; // Output the count
                    } else {
                        echo "Error fetching count"; // Handle the error if fetch failed
                    }
                    ?>
                </div>
            </div>
            <br>



            <?php include '../components/ActionComponent.php'?>
            




        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


</body>

</html>