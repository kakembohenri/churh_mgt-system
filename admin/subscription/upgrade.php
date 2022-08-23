<?php
if(!empty($_SESSION['upgrade'])){
?>
<div class="backdrop" >
    <div class="plan-container" id="expired" style='position: relative; padding: 3rem;'>
    <h2 style='position: absolute; top: 0;'><?php echo $_SESSION['upgrade']; ?></h2>
        <button class='shut' style='position: absolute; top: 5%; right: 1%; background: crimson; border: none; padding: 0.2rem; color: white;'>Close</button>
        <div class="plan">
            <h3>Basic plan</h3>
            <!-- <ul class='price-container'>
                <li>
                    <ul class='period'>
                        <li>30 days</li>
                        <li>6 months</li>
                        <li>1 year</li>
                    </ul>
                </li>
                <li>
                    <ul class='prices'>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                    </ul>
                </li>
            </ul> -->
            <div class='features'>
                <h4>Features</h4>
                <ul>
                    <li>
                        Manage Congrigants
                    </li>
                    <li>
                        Manage Services
                    </li>
                </ul>
                <form action="../admin/subscription/pay.php" method="POST">
                    <input hidden name='amount' value='30000' />
                    <input hidden name='username' value='<?php echo $_SESSION['username']; ?>' />
                    <input hidden name='plan' value='basic' />
                    <button class="btn-sub" type="submit">Upgrade</button>
                </form>
            </div>
            <h4>Current plan</h4>
        </div>
        <div class="plan">
            <h3>Standard plan</h3>
            <!-- <ul class='price-container'>
                <li>
                    <ul class='period'>
                        <li>30 days</li>
                        <li>6 months</li>
                        <li>1 year</li>
                    </ul>
                </li>
                <li>
                    <ul class='prices'>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                    </ul>
                </li>
            </ul> -->
            <div class='features'>
                <h4>Features</h4>
                <ul>
                    <li>
                        Manage Congrigants
                    </li>
                    <li>
                        Manage Services
                    </li>
                    <li>
                        Visitors module
                    </li>
                    <li>
                        Upcoming Events
                    </li>
                </ul>
                <button class="btn-sub" type="button">Upgrade</button>
            </div>
        </div>
        <div class="plan">
            <h3>Premium plan</h3>
            <!-- <ul class='price-container'>
                <li>
                    <ul class='period'>
                        <li>30 days</li>
                        <li>6 months</li>
                        <li>1 year</li>
                    </ul>
                </li>
                <li>
                    <ul class='prices'>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                        <li>xxxxxx shs</li>
                    </ul>
                </li>
            </ul> -->
            <div class='features'>
                <h4>Features</h4>
                <ul>
                    <li>
                        Manage Congrigants
                    </li>
                    <li>
                        Manage Services
                    </li>
                    <li>
                        Visitors module
                    </li>
                    <li>
                        Upcoming Events
                    </li>
                    <li>
                        SMS
                    </li>
                    <li>
                        Birthday
                    </li>
                    <li>
                        Giving
                    </li>
                </ul>
                <button class="btn-sub" type="button">Upgrade</button>
            </div>
        </div>
    </div>
</div>
<script>
            let btn = document.querySelector('.shut')

            let bd = document.querySelector('.backdrop')

            btn.addEventListener('click', close)
            // bd.addEventListener('click', close)

            function close(){
                bd.style.display = 'none'
            }

        
        </script>
<?php
}
?>