<?php session_start(); ?>
<?php
if (empty($_SESSION['login'])) {
    header('location:index.php');
}
include 'includes/config.php';
$select = mysqli_query($conn, "select * from tbl_employee where employee_id != '" . $_SESSION['login'] . "'");
while ($row = mysqli_fetch_assoc($select)) {

    $employee_msg_id = $row['employee_id'];
    $selectm = mysqli_query($conn, "select * from tbl_message where (sender_id = '" . $_SESSION['login'] . "' or receiver_id = '" . $_SESSION['login'] . "' and sender_id = '" . $employee_msg_id . "' or receiver_id = '" . $employee_msg_id . "') order by message_id desc limit 1");
    $rowm = mysqli_fetch_assoc($selectm);

    if (mysqli_num_rows($selectm) > 0) {
        $lastmessage = $rowm['message'];
    } else {
        $lastmessage = "No message available";
    }

    (strlen($lastmessage) > 10) ? $trim_msg = substr($lastmessage, 0, 10) . '...' : $trim_msg = $lastmessage;
    ($_SESSION['login'] == $rowm['sender_id']) ? $you = "You: " : $you = "";

    if (!empty($row)) {
        ?>
        <a href="messages.php?em=<?php echo $row['employee_id']; ?>">
            <div class="contact">
                <div class="img-name-message">
                    <img src="images/favicon.jpeg" alt="">
                    <div class="name-message">
                        <div class="name">
                            <?php echo $row['fname'] . ' ' . $row['lname']; ?>
                        </div>
                        <div class="last-message">
                            <p>
                                <?php echo $lastmessage; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="time">
                    <?php echo $rowm['create_time']; ?>
                </div>
            </div>
        </a>
        <?php
    } else {
        echo "<span class='nouser'>No User found</span>";
    }
}
?>