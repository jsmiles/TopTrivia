<?php
require 'partials/nav.php';

$player['email'] = array_pop($_POST);
$player['username'] = array_pop($_POST);

// Get the correct answers
$pdo = new PDO($dsn, $db_user, $db_pw);
$ans_sql = 'SELECT * FROM answers';
$stmt = $pdo->query($ans_sql);
$answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = null;
$pdo = null;

// Mark the score
$score = 0;
foreach($answers as $answer) {
  if ($answer['answer'] == $_POST[$answer['question']]) {
    $score++;
  }
}

// Insert score into the db
$pdo = new PDO($dsn, $db_user, $db_pw);
$sql = 'INSERT INTO results(username, email, answers, score, timestamp) VALUES(?,?,?,?,now())';
$pdo = new PDO($dsn, $db_user, $db_pw);
$stmt = $pdo->prepare($sql);
$stmt->execute([$player['username'], $player['email'], 'holding', $score]);

$stmt = null;
$pdo = null;

// Grab the refreshed leaderboard values
$pdo = new PDO($dsn, $db_user, $db_pw);
$leaderboard_sql = 'SELECT * FROM results ORDER BY score DESC LIMIT 3';
$stmt = $pdo->query($leaderboard_sql);
$leaderboard = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = null;
$pdo = null;

?>

<div class="container">
  <div class="card m-5" style="background-color: #EDF5E1; color: #379683;">
    <div class="card-body text-center">
      <h4>
        Congratulations <?= $player['username'] ?> for taking the quiz! You have scored <?= $score; ?> out of 3 
      </h4>
      <p>See the leaderboard below and if you would like to play again press the button below</p>
    </div>
  </div>
</div>

<div class="container-fluid d-flex justify-content-center">
  <div class="card m-5 w-50" style="background-color: #EDF5E1; color: #379683;">
    <table class="table" style="background-color: #EDF5E1; color: #379683;">
      <thead>
        <tr>
          <th scope="col" style="background-color: #EDF5E1; color: #379683;">#</th>
          <th scope="col" style="background-color: #EDF5E1; color: #379683;">Username</th>
          <th scope="col" style="background-color: #EDF5E1; color: #379683;">Score</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $counter = 1;
          foreach($leaderboard as $entry): ?>
        <tr>
          <th scope="row" style="background-color: #EDF5E1; color: #379683;">
            <?php 
              echo $counter;
              $counter++
            ?>
          </th>
          <td style="background-color: #EDF5E1; color: #379683;"><?= $entry['username']; ?></td>
          <td style="background-color: #EDF5E1; color: #379683;"><?= $entry['score']; ?></td>
        </tr>
        <?php endforeach; ?> 
      </tbody>
    </table>
  </div>
</div>

<div class="d-flex justify-content-center">
  <form action="game.php" method="POST" class="">
    <input type="submit" class="btn mx-1 p-3" style="background-color: #05386B; color:#8EE4AF;" value="Play Again!">
    <input type="hidden" name="username" value="<?= $player['username'] ?>" />
    <input type="hidden" name="email" value="<?= $player['email'] ?>" />
  </form>
  <a href="/" class="btn mx-1 p-3" style="background-color: #EDF5E1; color: #379683;">New Player</a>
</div>


<?php require 'partials/footer.php'; ?>


