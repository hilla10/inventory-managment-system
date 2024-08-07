<?php include('../includes/header.php') ?>

<div class="py-2 text-center primary-color text-light">
    <h1 class="fs-3">Update User</h1>
    <?php  
    $title = "Update User"; // Set the default title
    if (isset($title) && !empty($title)) {
        echo "<script>document.title = '" . $title . "'</script>";
    }
    ?>
</div>

<div class="container mt-4 w-50">
    <form action="../includes/user_update.php?id=<?php echo $id; ?>" method="post" class="update userForm form-user-content">
        <div class="form-group input-box mb-2">
            <label for="username" >Username:</label>
            <input tabindex="0" aria-label="Username" type="text" class="form-control name" id="username" name="username" placeholder="Username" value="<?php echo htmlspecialchars($row['username']); ?>">
        </div>

       <div class="form-group input-box mb-2">
    <label for="gender">Gender:</label>
    <select name="gender" id="gender" class="select-option" aria-label="Select gender">
        <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
        <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
    </select>
</div>


        <div class="form-group mb-2 input-box"> <label for="age" >Age:</label>
            <input tabindex="0" aria-label="Age" type="text" class="form-control age" id="age" name="age" placeholder="Age" value="<?php echo htmlspecialchars($row['age']); ?>">
        </div>
        <div class="form-group mb-2 input-box"> 
            <label for="email" >Email:</label>
            <input tabindex="0" aria-label="Email" type="text" class="form-control email" id="email" name="email" placeholder="Email" value="<?php  echo $row['email'] ? htmlspecialchars($row['email']) : ''; ?>">
        </div>

        <div class="form-group mb-2 input-box">
             <label for="phone" >Phone:</label>
            <input tabindex="0" aria-label="Phone" type="text" class="form-control update_phone" id="phone" name="phone" placeholder="Phone" value="<?php echo $row['phone'] ? htmlspecialchars($row['phone']) : '+251 '; ?>">
        </div>

        <div class="form-group mb-2 input-box">
    <label for="options" class="text-light">ያሉበትን ሁኔታ ይምረጡ:|Enter your position:</label>
    <select name="options" id="options" class="select-option" aria-label="Select position">
        <?php if ($userRole == 'admin'): ?>
            <option value="admin" <?php if ($row['options'] == 'admin') echo 'selected'; ?>>Admin</option>
        <?php endif; ?>
        <option value="it head" <?php if ($row['options'] == 'it head') echo 'selected'; ?>>IT Head</option>
        <option value="business head" <?php if ($row['options'] == 'business head') echo 'selected'; ?>>Business Head</option>
        <option value="art head" <?php if ($row['options'] == 'art head') echo 'selected'; ?>>Art Head</option>
        <option value="auto head" <?php if ($row['options'] == 'auto head') echo 'selected'; ?>>Auto Head</option>
    </select>
</div>


        <input tabindex="0" aria-label="update" type="submit" class="btn btn-success" name="update_user" value="Update">
    </form>
</div>

<?php include('../includes/modal.php'); ?>
<?php include('../includes/footer.php'); ?>
