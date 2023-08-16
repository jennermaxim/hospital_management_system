<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD EMPLOYEE</h1>
            <hr>
            <?php
            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $insert = mysqli_query($conn, "insert into tbl_title(title_id, title) values(null, '" . $title . "')");
                if ($insert) {
                    echo "<span class='success'>Inserted Successfully!</span>";
                } else {
                    echo "<span class='error'>Failed to Insert...!</span>";
                }
            }
            ?>
            <form method="post">
                <input type="text" name="title" id="">
                <input type="submit" name="submit" value="Add Tilte" class="btn">
            </form>
            <br>
            <table>
                <tr>
                    <th colspan="3">LIST OF ADDED TITLES</th>
                </tr>
                <tr class="second-th">
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_title order by title_id desc limit 3");
                $count = 0;
                while ($rowt = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr>
                        <td>
                            <?php echo $count; ?>
                        </td>
                        <td>
                            <?php echo $rowt['title']; ?>
                        </td>
                        <td>
                            <a href="#">Delete</a>
                            <a href="#">Update</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>