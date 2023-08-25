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
        <div class="nomessage">
            <h1>Select a Chat to start a conversation</h1>
        </div>
    </div>
</div>
<script src="assets/js/contact.js"></script>