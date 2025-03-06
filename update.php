<?php
header("Content-type: text/vnd.wap.wml");
echo '<?xml version="1.0"?>';
include 'firebase.php';

$id = $_GET['id'] ?? '';
if (!$id) {
    echo '<wml><card title="Error"><p>No entry ID provided. <a href="index.php">Return Home</a></p></card></wml>';
    exit;
}

// Retrieve existing entry data
$existingEntry = firebase_get_single($id);
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" 
 "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
  <card id="update" title="Edit Diary Entry">
    <p>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $title   = trim($_POST['title']);
          $content = trim($_POST['content']);
          $mood    = trim($_POST['mood']);
          if(empty($title) || empty($content)){
              echo "Title and Content are required.<br/>";
          } else {
              $data    = array(
                  "title"   => htmlspecialchars($title),
                  "content" => htmlspecialchars($content),
                  "mood"    => htmlspecialchars($mood)
              );
              $result = firebase_update($id, $data);
              if($result){
                  echo "Entry updated successfully.<br/>";
              } else {
                  echo "Error updating entry.<br/>";
              }
              echo "<a href='list.php'>Return to List</a>";
              exit;
          }
      }
      ?>
      <form method="post" action="update.php?id=<?php echo $id; ?>">
        Title:<br/>
        <input name="title" value="<?php echo htmlspecialchars($existingEntry['title'] ?? ''); ?>" format="*M" /><br/>
        Content:<br/>
        <input name="content" value="<?php echo htmlspecialchars($existingEntry['content'] ?? ''); ?>" format="*M" /><br/>
        Mood (optional):<br/>
        <input name="mood" value="<?php echo htmlspecialchars($existingEntry['mood'] ?? ''); ?>" format="*M" /><br/>
        <do type="accept">
          <go href="update.php?id=<?php echo $id; ?>" method="post">
            <postfield name="title" value="$(title)"/>
            <postfield name="content" value="$(content)"/>
            <postfield name="mood" value="$(mood)"/>
          </go>
        </do>
      </form>
    </p>
  </card>
</wml>
