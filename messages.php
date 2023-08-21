<?php include 'includes/header.php'; ?>

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
                    <?php
                    if (isset($_POST['submit'])) {
                        $message = $_POST['message'];
                        $insert = mysqli_query($conn, "insert into tbl_message(message_id, sender_id, receiver_id, message) values(null, '" . $_SESSION['login'] . "', '" . $_GET['em'] . "', '{$message}')");
                        if (!$insert) {
                            echo "<span class='error'>Failed to Send Message..!</span>";
                        }
                    }
                    $select = mysqli_query($conn, "select * from tbl_message where (sender_id = '" . $_SESSION['login'] . "' or receiver_id = '" . $_SESSION['login'] . "' and sender_id = '" . $_GET['em'] . "' or receiver_id = '" . $_GET['em'] . "') order by message_id desc limit 1");
                    while ($rowm = mysqli_fetch_assoc($select)) {
                        if (mysqli_num_rows($select) > 0) {
                            $lastmessage = $rowm['message'];
                        } else {
                            $lastmessage = "No message available";
                        }
                    }
                    $select = mysqli_query($conn, "select * from tbl_employee where tbl_employee.employee_id != '" . $_SESSION['login'] . "'");
                    while ($row = mysqli_fetch_assoc($select)) {
                        if (mysqli_num_rows($select) > 0) {
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
                                    <div class="time">4:58 PM</div>
                                </div>
                            </a>
                            <?php
                        } else {
                            echo "<span class='nouser'>No User found</span>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="contact-messages" id="contact-messages">
                <?php
                $select = mysqli_query($conn, "select * from tbl_employee where (employee_id != '" . $_SESSION['login'] . "' and employee_id = '" . $_GET['em'] . "')");
                $row = mysqli_fetch_array($select);
                $_SESSION['receiver'] = $_GET['em'];
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
    <script src="assets/js/chat.js"></script>
    <?php include 'includes/footer.php'; ?>