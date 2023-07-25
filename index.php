<?php require 'partials/nav.php'; ?>


<h2 class="text-center m-4" style="color: #EDF5E1;">Welcome to Top Trivia</h2>

<div class="container d-flex justify-content-center">
  <div class="card" style="background-color: #EDF5E1; color: #379683;">
    <div class="card-body text-center">
      <h5 class="card-title">Would you like to test yourself by taking our quiz?</h5>
      <p>Just fill in the form below to play and see where you come on our leaderboard</p>
      <form action="game.php" method="post" class="m-4">
        <div class="d-flex justify-content-center">
          <div class="mb-3 p-1">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="mb-3 p-1">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
        </div>
        <input type="submit" class="btn" style="background-color: #05386B; color:#8EE4AF;" value="Submit">
      </form>
    </div>
  </div>
</div>


<?php require 'partials/footer.php'; ?>