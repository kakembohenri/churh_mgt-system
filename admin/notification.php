<?php

if (!empty($_SESSION['success'])) {
?>
    <div class="notification">
        <div class='notification-content success'>
            <img style='width: 2rem; margin-right: 0.5rem;' src='../public/images/success.png' alt='success icon' />
            <h3 style='font-weight: 100;'><?php echo $_SESSION['success']; ?></h3>
        </div>
    </div>
<?php
    
} elseif (!empty($_SESSION['error'] !== '')) {
?>
    <div class="notification">
        <div class='notification-content failure'>
            <img style='width: 2rem; margin-right: 0.5rem;' src='../public/images/failure2.png' alt='failed icon' />
            <h3 style='font-weight: 100;'><?php echo $_SESSION['error']; ?></h3>
        </div>
    </div>
<?php
}
?>