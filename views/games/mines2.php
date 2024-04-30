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
        <div class="flex gap-5 text-center">
            <div>
                <label for="mineAmount" class="block mb-2 text-sm font-medium text-white">Mines</label>
                <input type="text" name="mineAmount" id="mineAmount" class="bg-[#1A2C38] border border-[#0F212E] text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="x" required="">
            </div>
            <div>
                <label for="betAmount" class="block mb-2 text-sm font-medium text-white">Bet</label>
                <input type="text" name="betAmount" id="betAmount" class="bg-[#1A2C38] border border-[#0F212E] text-white sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="x" required="">
            </div>
        </div>
        <div class="w-full text-center">
            <button id="gameButton" class="bg-[#00E701] w-3/5 hover:bg-[#1FFF20] px-4 py-3 rounded-md ml-0 font-semibold text-[#050811] mt-10">Bet</button>
        </div>
    </div>
    <div id="alertWindow" class="text-green-400 text-2xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black bg-opacity-10 flex justify-center items-center hidden">
        <div class="bg-[#213744] py-4 px-7 rounded-lg relative border border-2 border-[#00E701] text-center">
            <p id="alertMulti" class="font-semibold mb-2"></p>
            <hr>
            <p class="text-sm font-semibold mt-2"><span id="alertWin"></span><i class="fa-brands fa-bitcoin text-yellow-400"></i></p>
            <p class="text-xs text-gray-300">You may need to refresh <br>to update wallet.</p>
        </div>
    </div>



    <script>


        const boardSize = 5
        let mineCount = 2;

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
                gameButton.innerText = 'Bet';
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
            if(gemsFound === 25 - mineCount){

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
            gameOver = true;
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

        const gameButton = document.getElementById('gameButton');

        gameButton.addEventListener('click', function (){
            if(gameOver && $('#betAmount').val() > 0.1 && $('#mineAmount').val() > 0 && $('#mineAmount').val() < 25) {
                console.log('BET PLACED');
                mineCount = $('#mineAmount').val();
                $.ajax({
                    type: 'POST',
                    url: '/mines',
                    data: {
                        game: 'mines',
                        betAmount: $('#betAmount').val(),
                    },
                    success:function (data){
                        if (data.success) {
                            resetGame();
                            gameButton.innerText = 'Cash Out';
                            $('#alertWindow').addClass('hidden');
                        } else {
                            console.log('Bet unsuccessful');
                        }
                    }
                })
            }else if(!gameOver && gemsFound >= 1){
                console.log('CASH OUT');
                $.ajax({
                    type: 'POST',
                    url: '/mines',
                    data: {
                        game: 'mines',
                        bet: $('#betAmount').val(),
                        multi: $('#multiplier').text(),
                    },
                    success:function (data){
                        if (data.success) {
                            gameButton.innerText = 'Bet';
                            $('#alertWindow').removeClass('hidden');
                            $('#alertMulti').text(data.multi + 'x');
                            $('#alertWin').text('$' + data.win_loss.toFixed(2) + ' ');
                            setTimeout(location.reload(), 3000);
                        } else {
                            console.log('Cashout unsuccessful');
                        }
                    }
                })

                gameButton.innerText = 'Bet';
                revealAllMines();
                gemsFound = 0;
                gameOver = true;
                return;
            }

            console.log('asdasdasd');
        })

        $('#btnCloseAlert').on('click', function() {
            $('#alertWindow').addClass('hidden');
        });

        initGame();
    </script>
</div>
