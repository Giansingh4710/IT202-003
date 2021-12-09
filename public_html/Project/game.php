<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Suduko</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
      #theGameGrid {
        margin: 5%;
        width: 95%;
        border: 3px solid green;
        /* padding: 10px; */
        border-collapse: collapse;
      }
      html{
        padding: 10px;
      }
      .verticalSpace,
      .horizontalSpace {
        border: 2px solid blue;
      }

      .cell input {
        display: inline-block;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 30px;
      }
      .displayScore{
        display: flex;
        flex-direction: row;
        /* width: 50%; */
        font-size: 24px;
      }
      .theScoreOrPointsText{
        flex: 1;
        /* background-color:aqua */
      }
      .theScoreOrPoints{
        /* background-color:bisque; */
        flex: 5;
      }
    </style>
  </head>
  <body>
    <h1>Play Suduko</h1>
    <h2 id="loading">Loading....</h2>
    <div class="displayScore">
      <h4 class="theScoreOrPointsText">Solved Boards:</h4>
      <p class="theScoreOrPoints" id="score"></p>
    </div>
    <div>
      <?php if(!is_logged_in()):?>
        <a href="<?php echo get_url("login.php?redirect=game.php"); ?>">Log In</a>
        <p>or</p>
        <a href="<?php echo get_url("register.php?redirect=game.php"); ?>">Register</a>
        <p>If want to save your solved boards, Log In or Register if you have not Yet.</p>
        
        <?php else: ?>
          <div class="displayScore">
            <h4 class="theScoreOrPointsText">Points:</h4>
            <p class="theScoreOrPoints" id="points"></p>
          </div>
      <?php endif; ?>
    </div>
    <table id="theGameGrid">
      <div class="threeRows">
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell1"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell2"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell3"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell4"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell5"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell6"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell7"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell8"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell9"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell10"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell11"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell12"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell13"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell14"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell15"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell16"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell17"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell18"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell19"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell20"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell21"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell22"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell23"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell24"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell25"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell26"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell27"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr class="horizontalSpace"></tr>
      </div>
      <div class="threeRows">
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell28"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell29"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell30"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell31"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell32"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell33"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell34"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell35"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell36"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell37"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell38"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell39"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell40"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell41"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell42"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell43"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell44"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell45"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell46"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell47"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell48"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell49"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell50"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell51"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell52"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell53"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell54"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr class="horizontalSpace"></tr>
      </div>
      <div class="threeRows">
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell55"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell56"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell57"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell58"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell59"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell60"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell61"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell62"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell63"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell64"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell65"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell66"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell67"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell68"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell69"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell70"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell71"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell72"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr>
          <td class="cell" maxlenth='1' type="number" id="cell73"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell74"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell75"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell76"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell77"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell78"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>

          <td class="cell" maxlenth='1' type="number" id="cell79"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell80"><input type="text" maxlength="1" /></td>
          <td class="cell" maxlenth='1' type="number" id="cell81"><input type="text" maxlength="1" /></td>

          <td class="verticalSpace"></td>
        </tr>
        <tr class="horizontalSpace"></tr>
      </div>
    </table>
    <button onclick="solveAndShowBoard()">Show solved board</button>
    <button onclick="generateRandomBoard()">New game</button>
    <button onclick="checkIfCorrect()" id="isCorrect">See if Correct</button>
  </body>
  <script>
    const BOARD = [];
    
    function sleep(ms) {
      return new Promise((res) => setTimeout(res, ms));
    }

    function getScore(){
      $(document).ready(()=>{
        <?php if(is_logged_in()):?>
          $("#score").load("api/get_score.php");
          $("#points").load("api/get_points.php");
          <?php else: ?>
            $("#score").text("Please Log in to Get or Save Score")
        <?php endif; ?>
      });
    }

    async function generateRandomBoard() {
      const theGameGrid = document.getElementById("theGameGrid");
      const loading = document.getElementById("loading");
      loading.style.display = "block";
      theGameGrid.style.display = "none";
      await sleep(1);

      const clearBoard = () => {
        for (let i = 0; i < 9; i++) {
          BOARD[i] = [0, 0, 0, 0, 0, 0, 0, 0, 0];
        }
      };

      while (true) {
        clearBoard();
        const cellsWithNums = 40;
        for (let i = 0; i < cellsWithNums; i++) {
          let indexToPut = Math.floor(Math.random() * 81);
          let row = Math.floor(indexToPut / 9);
          let col = indexToPut % 9;
          while (BOARD[row][col] !== 0) {
            indexToPut = Math.floor(Math.random() * 81);
            row = Math.floor(indexToPut / 9);
            col = indexToPut % 9;
          }
          for (let numToPut = 1; numToPut < 10; numToPut++) {
            if (validNum(numToPut, row, col, BOARD)) {
              BOARD[row][col] = numToPut;
            }
          }
        }

        // console.log("solving board.....");
        let solvable = solveBoard(BOARD);
        // console.log(
        //   solvable
        //     ? "Board Solvable"
        //     : "Board not solvable. Generating New board"
        // );
        if (solvable) {
          unsolveBoard(BOARD);
          showUserBoard(BOARD);
          theGameGrid.style.display = "block";
          loading.style.display = "none";
          $("#isCorrect").show()
          return;
        }
      }
    }

    function showUserBoard(board) {
      for (let i = 0; i < 9; i++) {
        for (let j = 0; j < 9; j++) {
          cellNum = "cell" + (i * 9 + j + 1);
          if (board[i][j] !== 0) {
            document.getElementById(cellNum).lastChild.value = board[i][j];
            document.getElementById(cellNum).lastChild.disabled = true;
          } else {
            document.getElementById(cellNum).lastChild.disabled = false;
            document.getElementById(cellNum).lastChild.value = "";
          }
        }
      }
    }
    function showUserBoard2(board) {
      for (let i = 0; i < 9; i++) {
        for (let j = 0; j < 9; j++) {
          cellNum = "cell" + (i * 9 + j + 1);
          if (board[i][j] !== 0) {
            document.getElementById(cellNum).lastChild.value = board[i][j];
          } else {
            document.getElementById(cellNum).lastChild.value = "";
          }
        }
      }
    }

    const validNum = (testNum, row, col, brd) => {
      const inRowAndCol = (testNum, row, col, brd) => {
        for (let i = 0; i < 9; i++) {
          if (i === col) continue;
          if (brd[row][i] === testNum) {
            return true;
          }
        }
        for (let i = 0; i < 9; i++) {
          if (i == row) continue;
          if (brd[i][col] === testNum) {
            return true;
          }
        }
        return false;
      };

      const inBox = (testNum, row, col, brd) => {
        const topRightOfBox = [row - (row % 3), col - (col % 3)];
        const x = topRightOfBox[0];
        const y = topRightOfBox[1];
        for (let i = 0; i < 3; i++) {
          for (let j = 0; j < 3; j++) {
            if (x + i === row && y + j === col) continue;
            if (testNum === brd[x + i][y + j]) {
              return true;
            }
          }
        }
        return false;
      };

      if (!inRowAndCol(testNum, row, col, brd)) {
        if (!inBox(testNum, row, col, brd)) {
          return true;
        }
      }
      return false;
    };

    function solveBoard(board) {
      const solvable = (brd) => {
        for (let i = 0; i < 9; i++) {
          for (let j = 0; j < 9; j++) {
            if (brd[i][j] === 0) {
              for (let testNum = 1; testNum <= 9; testNum++) {
                if (validNum(testNum, i, j, brd)) {
                  brd[i][j] = testNum;
                  if (!solvable(brd)) {
                    brd[i][j] = 0;
                  } else {
                    return true;
                  }
                }
              }
              return false;
            }
          }
        }
        return true;
      };

      return solvable(board);
    }

    function unsolveBoard(board) {
      const blankSpaces = 40;
      for (let i = 0; i < blankSpaces; i++) {
        const indexToPut = Math.floor(Math.random() * 81);
        const row = Math.floor(indexToPut / 9);
        const col = indexToPut % 9;
        board[row][col] = 0;
      }
    }

    function solveAndShowBoard() {
      solveBoard(BOARD);
      showUserBoard(BOARD);
    }

    function checkIfCorrect() {
      for (let i = 0; i < 9; i++) {
        for (let j = 0; j < 9; j++) {
          cellNum = "cell" + (i * 9 + j + 1);
          theCell = document.getElementById(cellNum).lastChild;
          let goodNum = validNum(parseInt(theCell.value), i, j, BOARD);
          if (theCell.value === "") {
            sendDataToServer(false,0)
            flash("BOARD not filled", "danger");
            return;
          } else if (!goodNum) {
            sendDataToServer(false,0)
            flash("Incorrect Board ", "danger");
            return;
          }
        }
      }
      sendDataToServer(true,0)
      flash("GOOD JOB. IT'S a VALID BOARD", "success");
      $("#isCorrect").hide()

    }
    
    function sendDataToServer(boardIsSolved=null,pointsUpdate=0){
      console.log(boardIsSolved,pointsUpdate)
      <?php if(!is_logged_in()):?>
        console.log("Not logged in!. from sendData Func");
        flash("Log in to Save Score.","warning")
        return;
      <?php endif; ?>
      $.ajax(
        {
          url: "api/save_score.php",
          type: "post",
          data:{
            "boardSolved":boardIsSolved,
            "points":pointsUpdate
          },
          success: (resp, status, xhr) => {
            console.log(resp)
          },
          error: (xhr, status, error) => {
            console.log(xhr, status, error);
          }
        }
        );
        getScore();
    }

    function fillBoard(corr) {
      if (corr) {
        solveBoard(BOARD);
      } else {
        for (let i = 0; i < 9; i++) {
          for (let j = 0; j < 9; j++) {
            cellNum = "cell" + (i * 9 + j + 1);
            theCell = document.getElementById(cellNum).lastChild;
            if (!theCell.disabled) {
              BOARD[i][j] = Math.floor(Math.random() * 9) + 1;
            }
          }
        }
      }
      showUserBoard2(BOARD);
    }

    getScore();
    generateRandomBoard();
  </script>
</html>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>