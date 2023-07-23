<?php include './inc/header.php'; ?>
<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<div id="main-heading">
  <h1 class="heading">Feedback</h1>
</div>
<div id="feedback-list">
  <?php if (empty($feedback)) : ?>
    <h3 style="text-align: center;"> There is no feedback </h3>
  <?php endif; ?>
  <?php foreach ($feedback as $item) : ?>
    <div class="feedback">
      <p><?php echo $item['body']; ?></p>
      <h4>By: <?php echo $item['name']; ?> on <?php echo $item['date']; ?></h4>
    </div>
  <?php endforeach; ?>
</div>
</body>

</html>