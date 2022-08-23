<nav class="nav-container">
    <div class='nav-header'>
        <a href='dashboard.php' class='product-name'>Product Name</a>
        <div class='avatar'>
            <img src='../public/images/NO-IMAGE-AVAILABLE.jpg' alt='profile pic' />
        </div>
        <div>
            <p style='color: orange;'><?php echo $admin_name; ?></p>
        </div>
        <div class='nav-header_actions'>
            <a href='#'>Profile</a>
            <a href='../admin/logout.php'>Logout</a>
        </div>
    </div>
    <div class='nav-links'>
        <div class='link-container'>
            <!-- Icon -->
            <a href='analytics.php'>Analytics</a>
        </div>
        <div class='link-container manage-users'>
            <!-- Icon -->
            <p style="color: white;">Manage users</p>
            <div class='manage-users_options'>
                <a href='testimonies.php'>Testimonies</a>
                <a href='accounts.php'>View Accounts</a>
            </div>
        </div>
        <div class='link-container'>
            <!-- Icon -->
            <a href='#Manage admins'>Manage admins</a>
        </div>
        <div class='link-container'>
            <!-- Icon -->
            <a href='system_log.php'>System log</a>
        </div>
        <div class='link-container'>
            <!-- Icon -->
            <a href='#settings'>Settings</a>
        </div>
    </div>
</nav>