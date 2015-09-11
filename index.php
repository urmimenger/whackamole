<html>
    <head>
        <script src="./js/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/bootstrap.min.js"></script>
        <script src="js/index.js"></script>
    </head>
    <body>
        <h1 class="text-center">Whack-A-Mole</h1>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <input type="text" class="input-sm" id="name" placeholder="Enter your name to start">
                    <button id="startGame" class="btn btn-success disabled">Start Game</button>
                    <button id="stopGame" class="btn btn-warning disabled">Stop Game</button>
                    <input type="email" class="input-sm" id="email_id" placeholder="Enter the email_id">-->
                    <button id="sendEmailBtn" class="btn btn-primary disabled" onclick="sendEmailMethod()">Email Score</button>        </div>
                <br/>
                <hr/>
                <br/>
                <link rel="stylesheet" type="text/css" href="./css/index.css">
                <div style="position: relative; left: 0; top: 0;">
                    <div class="col-lg-2 text-center">
                        <h2>Score</h2>
                        <h4 id="score">0</h4>
                        <br/><hr/>
                        
                    </div>
                    <div id="game_holder" class="col-lg-8 text-center images">
                        <div class="mole" id="1" ></div>
                        <div class="mole" id="2" ></div>
                        <div class="mole" id="3" ></div>
                        <div class="mole" id="4" ></div>
                        <div class="mole" id="5" ></div>
                        <div class="mole" id="6" ></div>
                        <div class="mole" id="7" ></div>
                        <div class="mole" id="8" ></div>
                        <div class="mole" id="9" ></div>
                    </div>
                    <div class="col-lg-2 text-center">
                        <h2>Timer</h2>
                        <h4 id="timer">20</h4>
                        <br/><hr/>
                        <h1>Top Players</h1>
                        <hr/>
                         <table class="table table-bordered text-center" id="player_table">
                            <thead>
                                <tr>
                                    <th class="success text-center">Player Name</th>
                                    <th class="success text-center">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                     
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "game_data";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection

                                    if ($conn->connect_error) 
                                    {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    else
                                    {
                                        $sql1 = "SELECT * FROM game_score ORDER BY score desc limit 0,9";
                                        $top_scorer = $conn->query($sql1);
                                    } 

                                    if($top_scorer)
                                    {
                                        foreach ($top_scorer as $row) 
                                        {
                                            echo "<tr>
                                                        <td>".$row['full_name']."</td>
                                                        <td>".$row['score']."</td>
                                                </tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<tr>
                                                <td colspan='2'>
                                                    NO Top scorer
                                                </td>
                                            </tr>"; 
                                    }
                                ?>
                            </tbody>
                         </table>

                    </div>
                    <div class="col-lg-12">
                        <br/><hr/>
                    </div>

                </div>
            </div>

        </div>

    </body>
</html>