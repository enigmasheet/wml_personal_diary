<?php
header("Content-Type: text/vnd.wap.wml");
include 'firebase.php';

echo '<?xml version="1.0"?>';
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" 
 "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
  <card id="create" title="Add Diary Entry">
    <p>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $title   = trim($_POST['title']);
          $content = trim($_POST['content']);

          if (empty($title) || empty($content)) {
              echo "Title and Content are required.<br/>";
          } else {
              $date = date("Y-m-d H:i:s");
              $data = [
                  "title"   => htmlspecialchars($title),
                  "content" => htmlspecialchars($content),
                  "date"    => $date
              ];
              
              $result = firebase_create($data);
              if ($result && isset($result['name'])) {
                  echo "Entry added with ID: " . $result['name'] . "<br/>";
              } else {
                  echo "Error adding entry.<br/>";
              }
              
              echo '<anchor>Return to Home<go href="index.php"/></anchor>';
              exit;
          }
      }
      ?>
    </p>
    <p>
      Title:<br/>
      <input name="title" format="*M"/><br/>
      Content:<br/>
      <input name="content" format="*M"/><br/>
      <do type="accept" label="Save">
        <go href="create.php" method="post">
          <postfield name="title" value="$(title)"/>
          <postfield name="content" value="$(content)"/>
        </go>
      </do>
    </p>
  </card>
</wml>
