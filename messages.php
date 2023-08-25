<?php include 'includes/header.php'; ?>
<?php
$_SESSION['receiver'] = $_GET['em'];
if (isset($_POST['submit'])) {
    $message = $_POST['message'];
    $insert = mysqli_query($conn, "insert into tbl_message(message_id, sender_id, receiver_id, message) values(null, '" . $_SESSION['login'] . "', '" . $_SESSION['receiver'] . "', '" . $message . "')");
    if (!$insert) {
        echo "<span class'error'>Failed to send the message</span>";
    }
}
?>
<div class="main dashboard">
    <?php include 'includes/sidebar.php' ?>
    <div class="workspace">
        <div class="chat">
            <div class="contacts">
                <div class="profile">
                    <div class="img">
                        <img src="images/favicon.jpeg" alt="">
                    </div>
                    <div class="name">
                        <?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?>
                    </div>
                </div>
                <div class="form">
                    <form action="">
                        <input type="text" name="search" id="">
                        <input type="submit" value="Search" class="btn">
                    </form>
                </div>
                <div class="user-contact">

                </div>
            </div>
            <div class="contact-messages" id="contact-messages">
                <?php
                $select = mysqli_query($conn, "select * from tbl_employee where (employee_id != '" . $_SESSION['login'] . "' and employee_id = '" . $_GET['em'] . "')");
                $row = mysqli_fetch_array($select);
                ?>
                <div class="message-bar">
                    <div class="contact-profile">
                        <div class="img"><img src="images/favicon.jpeg" alt=""></div>
                        <div class="name">
                            <?php echo $row['fname'] . ' ' . $row['lname']; ?>
                        </div>
                    </div>
                    <div class="icons">
                        <img src="images/telephone.png" alt="">
                        <img src="images/video-camera.png" alt="">
                        <img src="images/dots.png" alt="">
                    </div>
                </div>
                <div class="messages">
                    <div class="chat-box"></div>
                    <form method="post">
                        <input type="text" name="message" id="" required autofocus>
                        <input type="submit" value="send" name="submit">
                        <!-- <button name="submit" type="submit"><img src="images/paper-plane.png" alt=""></button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/chat.js"></script>
    <?php include 'includes/footer.php'; ?>