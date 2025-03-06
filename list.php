<?php
header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0"?>';
ob_start();
include 'firebase.php';
$entries = firebase_read();
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" 
 "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
  <card id="list" title="Diary Entries">
    <p>
      <?php
      if ($entries) {
          foreach ($entries as $id => $entry) {
              echo "Title: " . htmlspecialchars($entry['title']) . "<br/>";
              echo "Date: " . htmlspecialchars($entry['date']) . "<br/>";
              if (isset($entry['mood']) && !empty($entry['mood'])) {
                  echo "Mood: " . htmlspecialchars($entry['mood']) . "<br/>";
              }
              echo "<a href='view.php?id=" . $id . "'>View</a> | ";
              echo "<a href='update.php?id=" . $id . "'>Edit</a> | ";
              echo "<a href='delete.php?id=" . $id . "'>Delete</a><br/><br/>";
              flush(); // Ensures content is sent immediately to the client
          }
      } else {
          echo "No diary entries found.";
      }
      ?>
      <br/>
      <a href="index.php">Return to Home</a>
    </p>
  </card>
</wml>
<?php
ob_end_flush(); // Flushes output buffer and sends it to the client
?>
