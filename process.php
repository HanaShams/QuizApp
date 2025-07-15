<?php
$questions = json_decode(file_get_contents('questions.json'), true);
$difficulty = $_POST['difficulty'];
$filtered = array_filter($questions, function($q) use ($difficulty) {
    return $q['difficulty'] === $difficulty;
});
$filtered = array_values($filtered); // Re-index array

$score = 0;
foreach ($filtered as $i => $q) {
    if (isset($_POST["q$i"]) && $_POST["q$i"] === $q['answer']) {
        $score++;
    }
}
$total = count($filtered);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz Result</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
   body {
  background: linear-gradient(135deg, #87CEEB 50%, #ffffff 50%);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: 'Segoe UI', sans-serif;
}

    .result-box {
      background-color: rgba(255, 255, 255, 0.9); /* Transparent rectangle */
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      text-align: center;
      width: 100%;
      max-width: 500px;
    }

    .result-box h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .result-box p {
      font-size: 1.25rem;
      margin-bottom: 30px;
    }

    .btn-primary {
      padding: 10px 30px;
      font-size: 1rem;
      border-radius: 30px;
    }
  </style>
</head>
<body>
  <div class="result-box">
    <h1>Your Score: <?= $score ?> / <?= $total ?></h1>
    <p>Difficulty: <?= ucfirst($difficulty) ?></p>
    <a href="index.php" class="btn btn-primary">Try Again</a>
  </div>
</body>
</html>
