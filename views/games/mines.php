<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
    }

    #game-board {
        display: grid;
        grid-template-columns: repeat(5, 100px);
        gap: 10px;
    }

    .cell {
        width: 100px;
        height: 100px;
        background-color: #2F4553;

        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 50px;
        cursor: pointer;
        border-radius: 5px;
        border-bottom: 8px solid #213743;
    }
    .cell:not(.revealed):hover {
        background-color: #557086;
        transform: translateY(-3px);
    }
</style>
<div class="m-auto">
    <div class="container">
        <h1 class="text-3xl text-gray-100 font-bold mb-4">Mines</h1>
        <p class="text-gray-100 font-semibold mb-3">Multiplier: <span id="multiplier"></span></p>
        <div id="game-board"></div>
        <button id="resetGame" class="bg-[#1475E1] px-4 py-3 rounded-md ml-0 font-semibold text-white mt-10">Reset Game</button>
    </div>


    <script>



        const boardSize = 5
        const mineCount = 2;

        let gameBoard = [];
        let mines = [];


        //MINE GAME STUFF
        let gameOver = false;
        let multiplier = 0;
        const displayedMultiplier = document.getElementById('multiplier');
        let gemsFound = 0;


        function rFact(num)
        {
            let rval = 1;
            for (let i = 2; i <= num; i++)
                rval = rval * i;
            return rval;
        }


        function createGameBoard() {
            for (let i = 0; i < boardSize; i++) {
                gameBoard.push([]);
                for (let j = 0; j < boardSize; j++) {
                    gameBoard[i].push({
                        isMine: false,
                        isRevealed: false
                    });
                }
            }
        }

        function placeMines() {
            for (let i = 0; i < mineCount; i++) {
                let x = Math.floor(Math.random() * boardSize);
                let y = Math.floor(Math.random() * boardSize);
                if (!gameBoard[x][y].isMine) {
                    gameBoard[x][y].isMine = true;
                    mines.push([x, y]);
                } else {
                    i--;
                }
            }
        }

        function revealCell(x, y) {
            if (x < 0 || x >= boardSize || y < 0 || y >= boardSize || gameBoard[x][y].isRevealed) {
                return;
            }
            if(gameOver) return;
            gameBoard[x][y].isRevealed = true;
            if (gameBoard[x][y].isMine) {
                revealAllMines();
                multiplier = 0;
                const gemSound = new Audio('./assets/sounds/wrong_gem.mp3');
                gemSound.volume = 0.4;
                gemSound.play();
                gameOver = true;
            } else {
                drawBoard();
                gemsFound++;

                const gemSound = new Audio('./assets/sounds/correct_gem.mp3');
                gemSound.volume = 0.4;
                gemSound.play();

                let winOdds = (rFact(25)*rFact(25-gemsFound-mineCount))/
                    (rFact(25-mineCount)*rFact(25-gemsFound));
                let multiplier = winOdds*0.97;
                displayedMultiplier.innerText = multiplier.toFixed(2).toString() + 'x';
            }
        }

        function revealAllMines() {
            for (let mine of mines) {
                const [x, y] = mine;
                gameBoard[x][y].isRevealed = true;
            }
            drawBoard();
        }


        function drawBoard() {
            const gameBoardElement = document.getElementById('game-board');
            gameBoardElement.innerHTML = '';
            for (let i = 0; i < boardSize; i++) {
                for (let j = 0; j < boardSize; j++) {
                    const cell = document.createElement('div');
                    cell.classList.add('cell');
                    if (gameBoard[i][j].isRevealed) {
                        if (gameBoard[i][j].isMine) {
                            cell.innerHTML = '<i class="fa-solid fa-bomb"></i>';
                            cell.classList.add('text-red-500')
                        }else{
                            cell.innerHTML = '<i class="fa-regular fa-gem"></i>';
                            cell.classList.add('text-green-400')
                            cell.style.backgroundColor = '#071824';
                            cell.style.border = 'none';
                            cell.classList.add('revealed');

                        }
                    }
                    cell.addEventListener('click', () => {
                        if (!gameBoard[i][j].isRevealed) {
                            revealCell(i, j);
                        }
                    });
                    gameBoardElement.appendChild(cell);
                }
            }
        }

        function initGame() {
            createGameBoard();
            placeMines();
            drawBoard();
        }

        function resetGame() {
            gameBoard = [];
            mines = [];
            gameOver = false;
            gemsFound = 0;
            createGameBoard();
            placeMines();
            drawBoard();
            displayedMultiplier.innerText = '0x';

        }

        const resetButton = document.getElementById('resetGame');

        resetButton.addEventListener('click', resetGame);

        initGame();
    </script>
</div>
