<?php
header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0"?>';
include 'firebase.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    echo '<wml><card title="Error"><p>No entry ID provided. <a href="index.php">Return Home</a></p></card></wml>';
    exit;
}

$entry = firebase_get_single($id);
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" 
 "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
  <card id="view" title="View Diary Entry">
    <p>
      <?php
      if ($entry) {
          echo "Title: " . htmlspecialchars($entry['title']) . "<br/>";
          echo "Date: " . htmlspecialchars($entry['date']) . "<br/>";
          if(isset($entry['mood']) && !empty($entry['mood'])){
              echo "Mood: " . htmlspecialchars($entry['mood']) . "<br/>";
          }
          echo "Content: " . htmlspecialchars($entry['content']) . "<br/>";
      } else {
          echo "Entry not found.";
      }
      ?>
      <br/>
      <a href="list.php">Return to List</a>
    </p>
  </card>
</wml>
