
   <?php
$title = "Dashboard"; // Set the default title

  if (isset($title) && !empty($title)) {
    echo "<script>document.title = '" . $title . "'</script>";
}

?>

<?php $userRole = $_SESSION['options']; ?>

<?php
// PHP
// Determine the current page
$currentUrl = $_SERVER['REQUEST_URI'];
if (strpos($currentUrl, '/admin/') !== false) {
    $currentPage = 'admin';
} elseif (strpos($currentUrl, '/it/') !== false) {
    $currentPage = 'it';
} elseif (strpos($currentUrl, '/art/') !== false) {
    $currentPage = 'art';
}elseif (strpos($currentUrl, '/auto/') !== false) {
    $currentPage = 'auto';
}elseif (strpos($currentUrl, '/business/') !== false) {
    $currentPage = 'business';
}elseif (strpos($currentUrl, '/bin/') !== false) {
    $currentPage = 'bin';
}elseif (strpos($currentUrl, '/business/') !== false) {
    $currentPage = 'business';
}elseif (strpos($currentUrl, '/business/') !== false) {
    $currentPage = 'business';
}elseif (strpos($currentUrl, '/model_19/') !== false) {
    $currentPage = 'model_19';
}elseif (strpos($currentUrl, '/model_20/') !== false) {
    $currentPage = 'model_20';
}elseif (strpos($currentUrl, '/display_user/') !== false) {
    $currentPage = 'display_user';
}elseif (strpos($currentUrl, '/display_department/') !== false) {
    $currentPage = 'display_department';
}elseif (strpos($currentUrl, '/profile/') !== false) {
    $currentPage = 'profile';
}
?>




<aside class="main-sidebar elevation-4 position-fixed top-0">
  <h1 class="visually-hidden">Inventory Management System</h1>
  <div  class="sidebar os-host os-theme-light p-3  pt-5" style="width: 260px; min-height: 100vh ;background-color: #272727;">
    <h2 class=" text-info pt-3 text-center" style="font-size: 1rem;"><i class="fas fa-warehouse"></i> Inventory Management</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
       
         <?php   if ($currentPage === 'admin' || $userRole === 'admin') {
            echo "<a tabindex=\"0\" href=\"../admin/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'admin') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-house\"></i>";
            echo "<span>Dashboard</span>";
            echo "</a>";
        } else if ($currentPage === 'profile' &&  $userRole === 'admin') {
                      echo "<a tabindex=\"0\" href=\"../admin/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'admin') {
                echo "active";
            }
        }
        ?>
      </li>

        <li class="nav-item">
       
         <?php   if ($currentPage === 'it' ||  $userRole === 'admin' || ($userRole == 'it head' && $currentPage === 'profile') ) {
            echo "<a tabindex=\"0\" href=\"../it/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage == 'it') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-server\"></i>";
            echo "<span>It Department</span>";
            echo "</a>";
        } else if (($currentPage === 'profile' && $userRole === 'it head') || ($currentPage === 'model_19' && $userRole === 'it head')  || ($currentPage === 'model_20' && $userRole === 'it head')  || ($currentPage === 'bin' && $userRole === 'it head')) {
                echo "<a tabindex=\"0\" href=\"../it/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";

                 if ($currentPage == 'it') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-server\"></i>";
            echo "<span>It Department</span>";
            echo "</a>";
            }
         ?>
      </li>
      <li>
         <?php   if ($currentPage === 'art' ||  $userRole === 'admin' || ($userRole === 'art head'  && $currentPage === 'profile')) {
            echo "<a tabindex=\"0\" href=\"../art/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'art') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-palette\"></i>";
            echo "<span>Art Department</span>";
            echo "</a>";
        } else if (($currentPage === 'profile' && $userRole === 'art head') || ($currentPage === 'model_19' && $userRole === 'art head')  || ($currentPage === 'model_20' && $userRole === 'art head')  || ($currentPage === 'bin' && $userRole === 'art head')) {
           echo "<a tabindex=\"0\" href=\"../art/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'art') {
                echo "active";
            }
                        echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-palette\"></i>";
            echo "<span>Art Department</span>";
            echo "</a>";
        }
         ?>
        </a>
      </li>
      <li>
        
         <?php   if ($currentPage === 'auto' ||  $userRole === 'admin' || ($userRole === 'auto head' && $currentPage === 'profile') ) {
            echo "<a tabindex=\"0\" href=\"../auto/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'auto') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-car\"></i>";
            echo "<span>Auto Department</span>";
            echo "</a>";
        } else if (($currentPage === 'profile' &&  $userRole ===  'auto head')|| ($currentPage === 'model_19' && $userRole === 'auto head')  || ($currentPage === 'model_20' && $userRole === 'auto head')  || ($currentPage === 'bin' && $userRole === 'auto head')) {
           echo "<a tabindex=\"0\" href=\"../auto/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'auto') {
                echo "active";
            }
             echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-car\"></i>";
            echo "<span>Auto Department</span>";
            echo "</a>";
        }
        ?>
      </li>
      <li>
          
           <?php   if ($currentPage === 'business' ||  $userRole === 'admin' || ($userRole === 'business head'  && $currentPage === 'profile')) {
            echo "<a tabindex=\"0\" href=\"../business/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'business') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-briefcase\"></i>";
            echo "<span>Business Department</span>";
            echo "</a>";
        }  else if (($currentPage === 'profile' &&  $userRole ===  'business head') || ($currentPage === 'model_19' && $userRole === 'business head')  || ($currentPage === 'model_20' && $userRole === 'business head')  || ($currentPage === 'bin' && $userRole === 'business head')) {
          echo "<a tabindex=\"0\" href=\"../business/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
            if ($currentPage === 'business') {
                echo "active";
            }
            echo "\" aria-current=\"page\">";
            echo "<i class=\"fas fa-briefcase\"></i>";
            echo "<span>Business Department</span>";
            echo "</a>";
        }
        ?>

      </li>
      <li>
        <a tabindex="0" href="../bin/" class="nav-link fs-6 text-white link-opacity-50-hover <?php if ($currentPage == 'bin') echo 'active'; ?>">
          <i class="fas fa-archive"></i>
        <span>Bin</span>
        </a>
      </li>
      <li>
        <a tabindex="0" href="../model_19/" class="nav-link fs-6 text-white link-opacity-50-hover <?php if ($currentPage == 'model_19') echo 'active'; ?>">
        <i class="fas fa-table"></i>
          <span>Modal 19</span>
        </a>
      </li>
      <li>
        <a tabindex="0" href="../model_20/" class="nav-link fs-6 text-white link-opacity-50-hover <?php if ($currentPage == 'model_20') echo 'active'; ?>">
          <i class="fas fa-table"></i>
         <span> Modal 20</span>
        </a>
      </li>
       <li>
         <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header pb-1" tabindex="0" role="button" aria-label="Expand department details">
                        <h3>
                            <div>
                              <i class="fas fa-user"></i>
                            <span>User</span>
                            </div>
                            <i class="fas fa-angle-down accordion-icon"></i>
                        </h3>
                </div>
                <div class="accordion-content">
                    <ul>
                        <li class="item1"> 
                         
                             <?php   if ($currentPage == 'display_user' || $userRole == 'admin') {
                                echo "<a tabindex=\"0\" href=\"../display_user/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
                                if ($currentPage == 'display_user') {
                                    echo "active";
                                }
                                echo "\" aria-current=\"page\">";
                                echo "<i class=\"fa-solid fa-users\"></i>";
                                echo "<span aria-label=\"Display All Users\">See All User</span>";
                                echo "</a>";
                            } ?>
                          </li>
                          
                        <li class="item1">  <a class="nav-link link-light link-opacity-50-hover" href="#" data-bs-toggle="modal"
                        data-bs-target="#ModalUser">
                                <i class="fa-solid fa-user-plus"></i>
                                Add User
                            </a>
                          </li>

                    </ul>
                </div>
            </div>

        </div>
       </li>

       <li>
         <div class="accordion">
            <div class="accordion-item">
               <div class="accordion-header pb-1" tabindex="0" role="button" aria-label="Expand user details">
            <h3>
                <div>
                    <i class="fas fa-building"></i>
                    <span>Department</span>
                </div>
                <i class="fas fa-angle-down accordion-icon"></i>
            </h3>
                        </div>

                <div class="accordion-content">
                    <ul>
                    <li class="item1">
                        <?php   if ($currentPage == 'display_department' ||  $userRole == 'admin') {
                                echo "<a tabindex=\"0\" href=\"../display_department/index.php\" class=\"nav-link fs-6 text-white link-opacity-50-hover ";
                                if ($currentPage == 'display_department') {
                                    echo "active";
                                }
                                echo "\" aria-current=\"page\">";
                                echo "<span aria-label=\"Display All Department\">See All Department</span>";
                                echo "</a>";
                            } ?>
                          </li>
                        <li class="item1">  <a class="nav-link link-light link-opacity-50-hover" href="#" data-bs-toggle="modal"
                        data-bs-target="#ModalDepartment">
                                Add Department
                            </a>
                          </li>

                    </ul>
                </div>
            </div>

        </div>
       </li>

    </ul>
  </div>
</aside>
