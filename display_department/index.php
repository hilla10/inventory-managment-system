<?php
// Include necessary files
include('../includes/dbcon.php');
include('../includes/header.php');
include('../includes/check_time.php'); // Include time out for security

// Start the session (if not already started in included files)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include insert_app.php to access determineCurrentPage() function
include('../includes/determineFnc.php');

// Determine the current page
$currentPage = determineCurrentPage($_SERVER['REQUEST_URI']);

// Store the current page URL in a session variable
$_SESSION['currentPage'] = $currentPage;

// Access user role from session
$userRole = isset($_SESSION['options']) ? $_SESSION['options'] : '';
// Check if the user is logged in and has the appropriate role
if (!isset($_SESSION['username']) || $_SESSION['options'] !== 'admin') {

    // Redirect to specific pages based on the role
    if ($_SESSION['options'] === 'business head') {
        header('Location: ../business/index.php');
        exit();
    } elseif ($_SESSION['options'] === 'art head') {
        header('Location: ../art/index.php');
        exit();
    } elseif ($_SESSION['options'] === 'auto head') {
        header('Location: ../auto/index.php');
        exit();
    }elseif ($_SESSION['options'] === 'it head') {
        header('Location: ../it/index.php');
        exit();
    }
}
?>


<header class="main-header">

      <div>
        <?php   if ($userRole == 'admin') {
                echo "<a tabindex=\"0\" href=\"../admin/index.php\" class=\"logo";
                echo "\" aria-current=\"page\">";
                echo " <img src=\"../img/EPTC_logo\" alt=\"logo\">";
                echo "</a>";
            } else {
                echo "<a tabindex=\"0\" href=\"index.php\" class=\"logo";
                echo "\" aria-current=\"page\">";
                echo " <img src=\"../img/EPTC_logo\" alt=\"logo\">";
                echo "</a>";
            }
        ?>
        <nav class="navbar navbar-static-top">

            <a tabindex="0" href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <i class="fa-solid fa-bars-staggered"></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </div>
    
   <nav class="navbar navbar-expand-lg d-flex align-items-center bg-dark-blue navbar-toggle tabindex="0">
     <div class="hamburger"  tabindex="0" role="button" aria-label="Toggle menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      
      <div class="d-flex  justify-content-end w-100">
      <ul class="navbar-nav mb-2 mb-lg-0">  
        

                    <li>
                            <div class="dropdown nav-item">
                                <button tabindex="0" class="btn btn-info dropdown-toggle me-5 mb-1" type="button" id="dropdownMenuButton" aria-expanded="false">
                                    <?php
                                    if ($userRole == 'admin') {
                                        echo 'Admin';
                                    }
                                    ?>
                                </button>
                                <ul class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                    <!-- Display user information -->
                                   <li>
                                        <a tabindex="0" class="dropdown-item" href="../profile/">
                                            <i class="fas fa-user me-1 fs-5"></i> <!-- Font Awesome icon for user -->
                                            <?php echo $_SESSION['username']; ?> <!-- Display user's email or other info -->
                                        </a>
                                    </li>
                                    <li><a tabindex="0" class="dropdown-item text-danger fw-bold" href="../login/logout_process.php">Logout</a></li>
                                </ul>
                            </div>
                        </li>
    </ul>
      </div>
    </div>
  </div>
</nav>
</header>

<div class="d-flex justify-content-between">

    <?php include('../includes/navigation.php'); ?>

    <div class="flex-grow-1 main-content">


     <?php
        $title = "Display All Department"; // Set the default title

        if (isset($title) && !empty($title)) {
            echo "<script>document.title = '" . $title . "'</script>";
        }
        ?>
<div class="container content-wrapper">
     <section class="content-header">
                    <h1>
                        Display Department
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a tabindex="0" href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">display_department</li>
                    </ol>
    </section>
 <div class="box1 d-flex flex-md-row flex-column justify-content-between align-items-center mt-2">
        <form method="GET" action="">
         <div class="d-flex flex-sm-row flex-column align-items-center justify-content-center align-items-md-end  gap-3">
<div class="d-flex gap-3">
                <div class="d-flex gap-4">
                    <div class="form-group mb-2">  
                        <label for="field" class="sr-only" id="field-label">Select a field</label>
                         <select name="field" class="form-select" aria-labelledby="field-label">
                            <option value="select field">Select field</option>
                            <option value="username" <?php if(isset($_GET['field']) && $_GET['field'] == 'username') echo 'selected'; ?>>Username</option>
                            <option value="gender" <?php if(isset($_GET['field']) && $_GET['field'] == 'gender') echo 'selected'; ?>>Gender</option>
                            <option value="age" <?php if(isset($_GET['field']) && $_GET['field'] == 'age') echo 'selected'; ?>>Age</option>
                            <option value="email" <?php if(isset($_GET['field']) && $_GET['field'] == 'email') echo 'selected'; ?>>Email</option>
                            <option value="Phone" <?php if(isset($_GET['field']) && $_GET['field'] == 'Phone') echo 'selected'; ?>>Phone</option>
                            <option value="options" <?php if(isset($_GET['field']) && $_GET['field'] == 'options') echo 'selected'; ?>>Options</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                                <label for="order" class="sr-only">Sort options by</label>
                            <select name="order" id="order" class="form-select " onchange="this.form.submit()" aria-label="Sort options by">
                                <option value="asc" <?php if(isset($_GET['order']) && $_GET['order'] == 'asc') echo 'selected'; ?>>Ascending</option>
                                <option value="desc" <?php if(isset($_GET['order']) && $_GET['order'] == 'desc') echo 'selected'; ?>>Descending</option>
                            </select>
                        </div>
                </div>
                        <div class="form-group input-box outline">
                                <label for="search" class="sr-only">Search User</label>
                        <input type="text" name="search" id="search" placeholder="Search user" class="form-control search">
                    </div>
                </div>
        <button tabindex="0" type="submit" class="btn btn-primary my-3 ms-1">Search</button>
    </div>
        </form>
        <button tabindex="0" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#ModalDepartment">Add Department</button>
    </div>
    
   
            <?php
            // Pagination parameters
            $departmentPerPage = 5;

            // Ensure $currentPage is numeric and set a default if not
            $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

            // Calculate offset for LIMIT in SQL query
            $offset = ($currentPage - 1) * $departmentPerPage;

            // Modify query to include LIMIT and OFFSET
            if (isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc')) {
                $order = $_GET['order'];
            } else {
                $order = 'asc'; // Default ordering is ascending
            }
       
// Initialize the base query
$query = "SELECT * FROM department_registration ";

// Handle form submission for sorting
$field = isset($_GET['field']) ? $_GET['field'] : ''; // Default empty if not set
$order = isset($_GET['order']) ? $_GET['order'] : 'asc'; // Default ascending order if not set

// Validate and sanitize input for security
if (!empty($field) && $field != 'select field') {
    $field = mysqli_real_escape_string($connection, $_GET['field']);
    $order = mysqli_real_escape_string($connection, $_GET['order']);

    // Modify query to include sorting and search
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($connection, $_GET['search']);
        $query = "SELECT * FROM `department_registration` WHERE `$field` LIKE '%$search%' ORDER BY `$field` $order LIMIT $departmentPerPage OFFSET $offset";
    } else {
        $query = "SELECT * FROM `department_registration` ORDER BY `$field` $order LIMIT $departmentPerPage OFFSET $offset";
    }
} else {
    // Default query if no valid sorting parameters are provided
    $query = "SELECT * FROM `department_registration` ORDER BY `id` ASC LIMIT $departmentPerPage OFFSET $offset";
}


            if(!empty($errors)) {
                $message = implode(" ", $errors);
                header('location: index.php?error_msg=' . urldecode($message));
            }

            $result = mysqli_query($connection, $query);
  // Count total number of rows without LIMIT for pagination
            $countQuery = "SELECT COUNT(*) AS total FROM `department_registration`";
              if (isset($_GET['search']) && !empty($_GET['search']) && isset($_GET['field']) && !empty($_GET['field']) && $_GET['field'] != 'select field') {
    $search = $_GET['search'];
    $field = $_GET['field'];
    $countQuery .= " WHERE `$field` LIKE '%$search%'";
}
            $countResult = mysqli_query($connection, $countQuery);

            if (!$countResult) {
                die("Count query failed: " . mysqli_error($connection));
            }

            $rowCount = mysqli_fetch_assoc($countResult)['total'];
            if (!$result) {
                die("Query failed: " . mysqli_error($connection));
            } else {
                if (mysqli_num_rows($result) > 0) {
                    // Initialize the counter variable
                    $departmentCount = 0;
            ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ተራ ቁጥር</th>
                        <th>ስም</th>
                         <th>ጾታ</th>
                        <th>ኢሜል</th>
                        <th>አድሜ</th>
                        <th>ስልክ ቁጥር</th>
                        <th>ያሉበትን ሁኔታ</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

<?php
        while ($row = mysqli_fetch_assoc($result)) {
            // Increment the counter for each item
            $departmentCount++;
            ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                       <td class="text-wrap" style="max-width: 12rem;">
                            <?php
                            if ($row['email'] === NULL) {
                                echo "No email specified";
                            } else {
                                echo $row['email'];
                            }
                            ?>
                            </td>
                       <td><?php echo $row['age'] ?></td>
                        <td>
                            <?php
                            if ($row['phone'] === NULL) {
                                echo "No phone specified";
                            } else {
                                echo $row['phone'];
                            }
                            ?>
                        </td>
                        <td><?php echo $row['position'] ?></td>
                        <td><a tabindex="0" href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
                         <td>
                                  <a  href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return confirmDelete('<?php echo $row['id']; ?>','<?php echo $row['email']; ?>' )">Delete</a>
                                </td>

                                <script>
                                function confirmDelete(id, email) {
                                return confirm("Are you sure you want to delete the record?\n\nid: " + id + "\nemail: " + email);
                                }
                                </script>
                    </tr>
                    <?php
        }
        ?>
            
            
        </tbody>
    </table>
    </div>
     <div class="d-flex justify-content-between bg-light align-items-center p-2 rounded-2">
                        <?php
                    // Calculate start and end item numbers
                    $startItem = ($currentPage - 1) * $departmentCount + 1;
                    $endItem = min($startItem + $departmentCount - 1, $rowCount);

                    // Display start and end item numbers and total count
                    echo "<div class=' fs-6 fw-bold '>Showing <span class=\"text-primary fs-5\">$startItem</span> to <span class=\"text-primary fs-5\">$endItem</span> of <span class=\"text-primary fs-5\">$rowCount</span> entries</div>";
                    ?>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end m-auto">
                            <?php
                            // Count total number of rows without LIMIT for pagination
                            $countQuery = "SELECT COUNT(*) AS total FROM `department_registration` ";
                          // Check if search parameters are set and construct the WHERE clause accordingly
                      if (isset($_GET['search']) && !empty($_GET['search']) && isset($_GET['field']) && !empty($_GET['field']) && $_GET['field'] != 'select field') {
                                $search = mysqli_real_escape_string($connection, $_GET['search']);
                                $field = mysqli_real_escape_string($connection, $_GET['field']);
                                $countQuery .= " WHERE `$field` LIKE '%$search%'";
                            }

                            $countResult = mysqli_query($connection, $countQuery);
                            $rowCount = mysqli_fetch_assoc($countResult)['total'];

                    // Calculate total pages
                    $totalPages = ceil($rowCount / $departmentPerPage);

                  
                    // Previous page link
                    if ($currentPage > 1) {
                        echo "<li class='page-item'><a class='page-link' href='?page=".($currentPage - 1);
                        if (isset($_GET['field'])) {
                            echo "&field={$_GET['field']}";
                        }
                        if (isset($_GET['order'])) {
                            echo "&order={$_GET['order']}";
                        }
                        if (isset($_GET['search'])) {
                            echo "&search={$_GET['search']}";
                        }
                        echo "'>Previous</a></li>";
                    }

                    // Page links
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<li class='page-item";
                        if ($i == $currentPage) {
                            echo " active";
                        }
                        echo "'><a class='page-link' href='?page=$i";
                        if (isset($_GET['field'])) {
                            echo "&field={$_GET['field']}";
                        }
                        if (isset($_GET['order'])) {
                            echo "&order={$_GET['order']}";
                        }
                        if (isset($_GET['search'])) {
                            echo "&search={$_GET['search']}";
                        }
                        echo "'>$i</a></li>";
                    }

                    // Next page link
                    if ($currentPage < $totalPages) {
                        echo "<li class='page-item'><a class='page-link' href='?page=".($currentPage + 1);
                        if (isset($_GET['field'])) {
                            echo "&field={$_GET['field']}";
                        }
                        if (isset($_GET['order'])) {
                            echo "&order={$_GET['order']}";
                        }
                        if (isset($_GET['search'])) {
                            echo "&search={$_GET['search']}";
                        }
                        echo "'>Next</a></li>";
                    }
                    ?>


                        </ul>
                    </nav>
                    <!-- End Pagination -->
                    </div>
<?php
            } else {
                 echo "<div class='alert alert-info text-center w-70 m-3'><strong class='fs-3 text-light'>No items found in the database.</strong></div>";
            }
        }
?>
    </div>
    </div>
    </div>

<!-- message -->
<?php include('../includes/message.php'); ?>

<!-- Modal -->
<?php include('../includes/register_modal.php'); ?>
<?php include('../includes/modal.php'); ?>


<!-- footer -->
<?php include('../includes/footer.php'); ?>
