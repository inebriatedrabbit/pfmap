<html>
	<head></head>
	<body>

			<p class="guesses">
				<label for="guessField">Enter a guess: </label><input type="text" id="guessField" class="guessField">
				<input type="submit" value="Submit guess" class="guessSubmit">
			</p>
			<p class="lastResult"></p>
			<p class="loworHi"></p>
</body>
<script>
	var randomNumber = Math.floor(Math.random() * 100) + 1;

	var guesses = document.querySelector('.guesses');
	var lastResult = document.querySelector('.lastresult');
	var lowOrHi = document.querySelector('.lowOrHi');

	var guessSubmit = document.querySelector('.guessSubmit');
	var guessField = document.querySelector('.guessField');

	var guessCount = 1;
	var resetButton;

	function checkGuess() {
		var userGuess = Number(guessField.value);
		if(guessCount === 1) {
			guesses.textContent = 'Previous guesses: ';
		}
		guesses.textContent += userGuess + ' ';


		if(userGuess === randomNumber) {
			lastResult.textContent = 'Congratulations! You got it right!';
			lastResult.style.backgroundColor = 'green';
			lowOrHi.textContent = '';
			setGameOver();
		} else if(guessCount === 10) {
			lastresult.textContent = '!!!GAME OVER!!!';
			setGameOver();
		} else {
			lastResult.textContent = 'Wrong!';
			lastResult.style.backgroudncolor = 'red';
			if(userGuess < randomNumber) {
				lowOrHi.textContent = 'Last guess was too low!';
			} else if(userGuess > randomNumber) {
				lowOrHi.textContent = 'Last guess was too high!';
			}

			guessCount++;
			guessField.value = '';
			guessField.focus();
		}
	}
	guessSubmit.addEventListener('click', checkGuess);
	function setGameover() {
		guessField.disabled = true;
		guesssubmit.disabled = true;
		resetButton = document.createElement('button');
		document.body.appendChild(resetButton);
		resetButton.addEventListener('click', resetGame);
	}
	function resetGame() {
		guessCount = 1;
		var resetParas = document.querySelectorAll('.resultParas p');
		for (var i=0; i < resetParas.length; i++) {
			resetParas[i].textContent = '';
		}
		resetButton.parentNode.removeChild(resetButton);
		guessField.disabled = false;
		guessSubmit.disabled = false;
		guessField.value = '';
		guessField.focus();
		lastResult.style.backgroundColor = 'white';
		randomNumber = Math.floor(Math.random() * 100) + 1;
	}

	
</script>

</html>
