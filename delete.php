<?php
header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0"?>';
include 'firebase.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    echo '<wml><card title="Error"><p>No entry ID provided. <a href="index.php">Return Home</a></p></card></wml>';
    exit;
}

$result = firebase_delete($id);
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" 
 "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
  <card id="delete" title="Delete Entry">
    <p>
      <?php
      if($result === false){
          echo "Error deleting entry.<br/>";
      } else {
          echo "Entry deleted successfully.<br/>";
      }
      ?>
      <a href="list.php">Return to List</a>
    </p>
  </card>
</wml>
