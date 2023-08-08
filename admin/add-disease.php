<?php include 'includes/header.php'; ?>
<div class="main">
    <?php include 'includes/sidebar.php'; ?>
    <div class="workspace">
        <center>
            <h1>ADD DISEASE</h1>
            <hr>
            <?php
            if(isset($_POST['submit'])){
                $disease = $_POST['disease'];
                $insert = mysqli_query($conn, "insert into tbl_disease (d_id, disease) values(null, '".$disease."')");
                if($insert){
                    echo "<font color='green' size='10px'>Inserted Successfully!</font>";
                } else{
                    echo "<font color='red seze='10px'>Failed to insert...!</font>";
                }
            }
            ?>
            <form method="post">
                <input type="text" name="disease" id="" autofocus required placeholder="Enter Disease">
                <input type="submit" value="Add Disease" name="submit" class="btn">
            </form>
            <br>
            <table width="80%" border="2px" style="border-collapse: collapse;">
                <th colspan="3" style="padding: 15px; background-color: aqua;">LIST OF ADDED DISEASE</th>
                <tr style="background-color: skyblue; padding: 10px">
                    <th style="padding: 10px">#</th>
                    <th style="padding: 10px">Disease</th>
                    <th style="padding: 10px">Action</th>
                </tr>
                <?php
                $select = mysqli_query($conn, "select * from tbl_disease order by(d_id) desc limit 3");
                while($row = mysqli_fetch_array($select)){
                    ?>
                    <tr style="padding: 10px; background-color: beige;">
                        <td style="padding: 10px"><?php echo $row['d_id'] ?></td>
                        <td style="padding: 10px"><?php echo $row['disease'] ?></td>
                        <td style="padding: 10px; text-align: center"><a href="#">Delete</a> | <a href="#">Update</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </center>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
