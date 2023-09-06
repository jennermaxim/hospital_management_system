<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>WIEW DISEASE</h1>
            <hr>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <tr style="background-color: #ddd; padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Disease</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_disease order by(d_id) desc limit 3");
                $count = 0;
                while ($row = mysqli_fetch_array($select)) {
                    $count++;
                    ?>
                    <tr style="padding: 10px; background-color: #fff;">
                        <td style="padding: 10px">
                            <?php echo $count; ?>
                        </td>
                        <td style="padding: 10px">
                            <?php echo $row['disease']; ?>
                        </td>
                        <td style="padding: 10px; text-align: center"><a
                                href="delete-disease.php?d=<?php echo $row['d_id']; ?>"
                                onclick="return confirm('Are you sure you wanna delete <?php echo $row['disease']; ?>')">
                                <img src="images/delete.png" alt="">
                            </a>
                            <a href="update-disease.php?d=<?php echo $row['d_id']; ?>"><img src="images/write.png" alt=""></a>
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