

<?php
// Include necessary files
include('../includes/dbcon.php');
include('../includes/header.php');

// Start the session (if not already started in included files)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include insert_app.php to access determineCurrentPage() function
include('../includes/insert_app.php');

// Determine the current page
$currentPage = determineCurrentPage($_SERVER['REQUEST_URI']);

// Store the current page URL in a session variable
$_SESSION['currentPage'] = $currentPage;

// Access user role from session
$userRole = isset($_SESSION['options']) ? $_SESSION['options'] : '';
echo $_SESSION['currentPage'];
?>

   
   <header class="main-header">

      <div>
        <?php   if ($userRole == 'admin') {
                echo "<a href=\"../admin/index.php\" class=\"logo";
                echo "\" aria-current=\"page\">";
                echo " <img src=\"../img/EPTC_logo\" alt=\"logo\">";
                echo "</a>";
            } else {
                echo "<a href=\"index.php\" class=\"logo";
                echo "\" aria-current=\"page\">";
                echo " <img src=\"../img/EPTC_logo\" alt=\"logo\">";
                echo "</a>";
            }
        ?>
        <nav class="navbar navbar-static-top">

            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <i class="fa-solid fa-bars-staggered"></i>
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </div>
    
    
    <nav class="navbar navbar-expand-lg d-flex align-items-center bg-dark-blue navbar-toggle">
        <div class="hamburger">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-between text-center" id="navbarNav">
          <div class=" py-2 mx-auto ">
            <h1 class="text-center fs-3 text-light">
                ቢን ካርድ
            </h1>
            <?php  $title = "All Bin Card"; // Set the default title

                if (isset($title) && !empty($title)) {
                echo "<script>document.title = '" . $title . "'</script>";
                 }
            ?>
            </div>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li>
                        <div class="dropdown nav-item">
                            <a class="btn btn-info dropdown-toggle me-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php
                                        if ($userRole == 'admin') {
                                            echo 'Admin';
                                        } elseif ($userRole == 'it head') {
                                            echo 'IT Head';
                                        }
                                ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-danger fw-bold" href="../login/logout_process.php">Logout</a></li>
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

   
    <div class="container mt-5 ">

     <div class="d-flex justify-content-between align-items-center"> 
        <form method="GET" action="">
           <div class="box1 d-flex flex-md-row flex-column justify-content-center align-items-center">
            <div>
                <div class="form-group mb-2">
                    <select name="order" id="order" class="form-select ">
                        <option value="asc" <?php if(isset($_GET['order']) && $_GET['order'] == 'asc') echo 'selected'; ?>>Ascending</option>
                        <option value="desc" <?php if(isset($_GET['order']) && $_GET['order'] == 'desc') echo 'selected'; ?>>Descending</option>
                    </select>
                </div>

                <div class="form-group mb-2 outline input-box">
                   <input type="text" name="search" id="search" placeholder="Search item by inventory list" class="form-control">
               </div>
               

            </div>

            <button type="submit" class="btn btn-primary mb-2 ms-1">Search</button>
           </div>
        </form>

   <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#Modal3">Add Bin</button>
</div>

         <!-- message -->
  <?php include('../includes/message.php'); ?>
    
  <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
         
            <thead>
                <tr>
                    <th>የተጠቃ.ቁጥር</th>
                    <th>ቀን</th>
                    <th>ገቢ</th>
                    <th>ወጪ</th>
                    <th>ከወጪ ቀሪ</th>
                    <th>አጭር ፈር</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php


            // Check if the user selected an ordering option
        if (isset($_GET['order']) && ($_GET['order'] == 'asc' || $_GET['order'] == 'desc')) {
            $order = $_GET['order'];
        } else {
            $order = 'asc'; // Default ordering is ascending
        }

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM `bin` WHERE `date` LIKE '%$search%' ORDER BY `date` $order";
        } else {
            $query = "SELECT * FROM `bin` ORDER BY `date` $order";
        }

                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("query Failed".mysqli_error($connection));
                    } else {
                          // Initialize the counter variable
                        $binCount = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                              // Increment the counter for each item
                        $binCount++;
                            ?>

                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['date']?></td>
                            <td><?php echo $row['income']?></td>
                            <td><?php echo $row['cost']?></td>
                            <td><?php echo $row['remain']?></td>
                            <td><?php echo $row['short']?></td>
                            
                            <td><a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Update</a></td>
                             <td>
                                <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger"  onclick="return confirmDelete()">Delete</a>
                                </td>

                                <script>
                                function confirmDelete() {
                                return confirm("Are you sure you want to delete the record?");
                                }
                                </script>
                        </tr>
                            <?php
                        }
                    }

                ?>

            </tbody>
        </table>
    </div>
        <div class="text-uppercase fs-4 fw-bold text-end">Bin Count : <span class="text-primary"><?php echo $binCount; ?></span></div>
   </div>
   </div>
</div>
     <!-- Modal -->
<?php include('../includes/modal.php'); ?>

<!-- footer -->
  <?php include('../includes/footer.php'); ?>