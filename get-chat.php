<?php session_start(); ?>
<?php
if (empty($_SESSION['login'])) {
    header('location:index.php');
}
include 'includes/config.php';
$output = "";
$select = mysqli_query($conn, "select * from tbl_message where (sender_id = '" . $_SESSION['login'] . "' and receiver_id = '" . $_SESSION['receiver'] . "' or sender_id = '" . $_SESSION['receiver'] . "' or receiver_id = '" . $_SESSION['login'] . "')");
// $output .= $select;  
while ($row = mysqli_fetch_array($select)) {
    if ($row['sender_id'] === $_SESSION['login']) {
        $output .= '<div class="outgoing">
                        <p>' . $row['message'] . '</p>
                    </div>';
    } elseif ($row['sender_id'] === $_SESSION['receiver']) {
        $output .= '<div class="incoming">
                        <p>' . $row['message'] . '</p>
                    </div>';
    }
}
echo $output;
?>