<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Web Dev Quiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <style>
  body {
    background: linear-gradient(135deg, #87CEEB 10%, #ffffff 100%) !important;
    min-height: 100vh;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
  }
  .quiz-card {
    background-color: rgba(255, 255, 255, 0.7) !important;
    border-radius: 20px !important;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2) !important;
    padding: 40px !important;
    max-width: 700px !important;
    margin: 50px auto !important;
    min-height: 300px;
  }
</style>


</head>
<body>
  <div class="container py-5">
    <div class="card mx-auto quiz-card">
      <div class="card-body">
        <h1 class="card-title text-center mb-4">Web Dev Quiz</h1>

        <!-- Difficulty Selection -->
        <div id="difficulty-screen" class="text-center">
          <h3 class="mb-3">Choose Difficulty:</h3>
          <button class="btn btn-outline-primary mx-2" data-diff="easy">Easy</button>
          <button class="btn btn-outline-warning mx-2" data-diff="medium">Medium</button>
          <button class="btn btn-outline-danger mx-2" data-diff="hard">Hard</button>
        </div>

        <!-- Quiz Form -->
        <form id="quizForm" action="process.php" method="POST" class="d-none">
        <input type="hidden" name="difficulty" id="difficulty-input" />
          <div id="progress-container" class="mb-3">
            <div class="progress">
              <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
          </div>
          <div id="question-card" class="mb-3"></div>
          <div class="text-center">
            <button id="prev-btn" type="button" class="btn btn-secondary me-2">Back</button>
            <button id="next-btn" type="button" class="btn btn-primary">Next</button>
          </div>
        </form>

        <!-- Timer -->
        <div id="timer" class="text-center mt-4 d-none">
          Time Left: <span id="time">60</span>s
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
