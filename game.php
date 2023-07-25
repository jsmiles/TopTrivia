<?php
require 'partials/nav.php';

$username = $_POST['username'];
$email = $_POST['email'];

date_default_timezone_set("Europe/London");
$timestamp = date('d/m/Y H:i:s', time());

$sql = 'INSERT INTO sessions(username, email, timestamp) VALUES(?,?,now())';
$pdo = new PDO($dsn, $db_user, $db_pw);
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $email]);

$stmt = null;
$pdo = null;

?>

<h2 class="m-4 text-center">Answer the multiple choice questions below then press submit</h2>

<div class="container d-flex justify-content-center">
  <div class="card m-4" style="background-color: #EDF5E1; color: #379683;">
    
    <form action="leaderboard.php" method="POST">
      <div class="m-4">
        <h4>Which famous detective resides at 221B Baker Street in London?</h4>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q1" id="q1_1" value="option1">
          <label class="form-check-label" for="q1_1">Inspector Morse</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q1" id="q1_2" value="option2">
          <label class="form-check-label" for="q1_2">Sherlock Holmes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q1" id="q1_3" value="option3">
          <label class="form-check-label" for="q1_3">Hercule Poirot</label>
        </div>
      </div>    
      <div class="m-4">
        <h4>What is the traditional filling for a classic Victoria sponge cake?</h4>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q2" id="q2_1" value="option1">
          <label class="form-check-label" for="q2_1">Chocolate ganache</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q2" id="q2_2" value="option2">
          <label class="form-check-label" for="q2_2">Fresh strawberries and cream</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q2" id="q2_3" value="option3">
          <label class="form-check-label" for="q2_3">Raspberry jam and buttercream</label>
        </div>
      </div>    
      <div class="m-4">
        <h4>Which river runs through the city of Bath in England?</h4>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q3" id="q3_1" value="option1">
          <label class="form-check-label" for="q3_1">River Tyne</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q3" id="q3_2" value="option2">
          <label class="form-check-label" for="q3_2">River Severn</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="q3" id="q3_3" value="option3">
          <label class="form-check-label" for="q3_3">River Avon</label>
        </div>
      </div> 
      <div class="m-4 d-flex justify-content-center">
        <input type="submit" class="btn btn-primary" style="background-color: #05386B; color:#8EE4AF;" value="Submit">
      </div>
      <input type="hidden" name="username" value="<?= $username ?>" />
      <input type="hidden" name="email" value="<?= $email ?>" />
    </form>
  </div>
</div>



<?php require 'partials/footer.php'; ?>