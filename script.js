let questions = [], filtered = [], current = 0, answers = {}, timerInterval, timeLeft = 60;

document.querySelectorAll('#difficulty-screen button').forEach(btn =>
  btn.onclick = () => startQuiz(btn.dataset.diff)
);

fetch('questions.json')
  .then(r => r.json())
  .then(data => questions = data);

function startQuiz(diff) {
  filtered = questions.filter(q => q.difficulty === diff);
  document.getElementById('difficulty-input').value = diff;

  document.getElementById('difficulty-screen').classList.add('d-none');
  document.getElementById('quizForm').classList.remove('d-none');
  document.getElementById('timer').classList.remove('d-none');
  renderQuestion();
  startTimer();
}


function renderQuestion() {
  const q = filtered[current];
  document.getElementById('question-card').innerHTML =
    `<div class="card"><div class="card-body">
      <h5>Q${current + 1}/${filtered.length}: ${q.question}</h5>
      <div class="mt-3">
        ${q.options.map((opt, i) => `
          <div class="form-check">
            <input class="form-check-input" type="radio" name="q${current}" value="${opt}" id="opt${i}" ${answers[current] === opt ? 'checked' : ''}>
            <label class="form-check-label" for="opt${i}">${opt}</label>
          </div>
        `).join('')}
      </div>
    </div></div>`;

  updateProgress();
  document.getElementById('prev-btn').style.display = current ? 'inline-block' : 'none';
  document.getElementById('next-btn').textContent = current === filtered.length - 1 ? 'Submit' : 'Next';
}

document.getElementById('quizForm').addEventListener('click', e => {
  if (e.target.name?.startsWith('q')) answers[current] = e.target.value;
});

document.getElementById('next-btn').onclick = () => {
  saveAnswer();
  if (current < filtered.length - 1) {
    current++;
    renderQuestion();
  } else {
    clearInterval(timerInterval);
    document.getElementById('quizForm').submit();
  }
};

document.getElementById('prev-btn').onclick = () => {
  saveAnswer();
  if (current > 0) {
    current--;
    renderQuestion();
  }
};

function saveAnswer() {
  const sel = document.querySelector(`input[name="q${current}"]:checked`);
  if (sel) answers[current] = sel.value;
}

function updateProgress() {
  const percent = ((current) / filtered.length) * 100;
  document.getElementById('progress-bar').style.width = percent + '%';
}

function startTimer() {
  timerInterval = setInterval(() => {
    document.getElementById('time').textContent = timeLeft;
    if (timeLeft-- <= 0) {
      clearInterval(timerInterval);
      alert('Time up!');
      document.getElementById('quizForm').submit();
    }
  }, 1000);
}
