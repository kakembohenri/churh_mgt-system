<?php
include('../dbconn.php');

$id = $_SESSION['id'];
//$query = "SELECT * FROM subscription WHERE user_id='$id'";
$query = "SELECT * FROM subscription WHERE user_id='$id' ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query) or die(mysqli_error());
$row = mysqli_fetch_array($result);
// $num_row = mysqli_num_rows($result);

if (count($row) != 0) {
    if ($row['plan'] == 'standard' || $row['plan'] == 'premium') {
        $today = new DateTime();
        $expiry_date = new DateTime($row['end_date']);
        if ($today > $expiry_date) {
?>
            <div class="backdrop">
                <div class="plan-container">
                    <div class="plan">
                        <h3>Basic plan</h3>
                        <ul class='price-container'>
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
                        </ul>
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
                            <button class="btn-sub" type="button">Subscribe</button>
                        </div>
                    </div>
                    <div class="plan">
                        <h3>Standard plan</h3>
                        <ul class='price-container'>
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
                        </ul>
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
                            <button class="btn-sub" type="button">Subscribe</button>
                        </div>
                    </div>
                    <div class="plan">
                        <h3>Premium plan</h3>
                        <ul class='price-container'>
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
                        </ul>
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
                            <button class="btn-sub" type="button">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="backdrop">
            <div class="plan-container">
                <div class="plan">
                    <h3>Basic plan</h3>
                    <ul class='price-container'>
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
                    </ul>
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
                        <button class="btn-sub" type="button">Subscribe</button>
                    </div>
                </div>
                <div class="plan">
                    <h3>Standard plan</h3>
                    <ul class='price-container'>
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
                    </ul>
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
                        <button class="btn-sub" type="button">Subscribe</button>
                    </div>
                </div>
                <div class="plan">
                    <h3>Premium plan</h3>
                    <ul class='price-container'>
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
                    </ul>
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
                        <button class="btn-sub" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}
?>