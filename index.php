<?php include './inc/header.php'; ?>
<?php
$name = $email = $body = '';
$nameERR = $emailERR = $bodyERR = '';
if (isset($_POST['submit'])) {
  if ($_POST['name'] != '')
    $name = htmlspecialchars($_POST['name']);
  else
    $nameERR = 'Name is required !!';
  if ($_POST['email'] != '')
    $email = htmlspecialchars($_POST['email']);
  else
    $emailERR = 'email is required !!';
  if ($_POST['body'] != '')
    $body = htmlspecialchars($_POST['body']);
  else
    $bodyERR = 'feedback is required !!';
  if ($nameERR == '' && $emailERR == '' && $bodyERR == '') {
    $sql = "INSERT INTO feedback (name, email, body) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $body);

    if ($stmt->execute()) {
      header('Location: ./feedback.php');
      exit;
    } else {
      echo 'Error : ' . $conn->error;
    }
  }
}

?>

<div id="main-heading">
  <h1 class="heading">Feedback Form</h1>
  <h4 class="heading">❤️Leave feedback for Arya Verse❤️</h4>
</div>
<div class="form">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="name">Name</label><br />
    <input type="text" name="name" placeholder="Enter the name" /><br />
    <p style="color:red"><?php echo $nameERR ?></p>
    <label for="email">Email</label><br />
    <input type="text" name="email" placeholder="Enter the email" /><br />
    <p style="color:red"><?php echo $emailERR ?></p>
    <label for="feedback">Feedback</label><br />
    <textarea name="body" cols="30" rows="2" placeholder="Enter your feedback"></textarea><br />
    <p style="color:red"><?php echo $bodyERR ?></p>
    <button name="submit" value="submit">Send</button>
  </form>
</div>
</body>

</html>