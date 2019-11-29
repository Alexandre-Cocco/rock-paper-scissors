<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Waste an Hour Having Fun</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="public/css/game.css" rel="stylesheet" />

    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="game">
        <div class="main">
        <div class="cover black" data-color="black"></div>
        <div class="container">
            <h1 class="logo cursive mt-3 pb-5">
	            Waste an Hour Having Fun
	        </h1>

            <div class="content">
                <div class="text-center col-lg-12 mt-2 change-mode mb-5">
                    <a href="#" v-if="gameMode == 'player'" @click="gameMode = 'computer'">Change to computer VS computer mode ?</a>
                    <a href="#" v-else @click="gameMode = 'player'">Change to player VS computer mode ?</a>
                    <a class="ml-2 mr-2"> or </a>
                    <a href="#" @click="resetGame('player')">Reset Game ?</a>
                </div>
	            <div class="d-flex justify-content-around" v-if="isGameStarted">
				    <div class="player p-3">
					    <div class="player-score">
						    Win: {{ players[0].win }}
					    </div>
		               Player 1 : {{ players[0].name }}
	               </div>
                    <div :class="[{ 'player-small' : gameMode == 'computer' }, 'player p-3']">
                        <div class="player-score">
                            <template v-if="!resultLastGame">VS</template>
                            <span v-if="resultLastGame == 'win'" v-text="gameMode == 'player' ? 'You Win': 'Computer 1 Wins'"></span>
                            <span v-if="resultLastGame == 'lose'" v-text="gameMode == 'player' ? 'You Lose': 'Computer 1 Loses'"></span>
                            <span v-if="resultLastGame == 'tied'">Tied</span>
                            <div class="row d-flex justify-content-around" v-if="resultLastGame">
                                <img :src="images[players[0].lastAction]" alt="Rock" width="55">
                                <img :src="images[players[1].lastAction]" alt="Rock" width="55">
                            </div>
                        </div>
                    </div>
	               <div class="player p-3">
		               <div class="player-score">
						    Win: {{ players[1].win }}
					    </div>
		               Player 2 : Computer {{ gameMode == 'computer' ? 2 : '' }}
	               </div>
				</div>
  
				<template v-if="!isGameStarted">
	                <div class="subscribe" v-if="gameMode =='player'">
                        <div class="row">
	                        <div class="col-12 d-flex justify-content-center">
	                            <div class="form-inline">
	                                <div class="form-group">
	                                    <input type="text" class="form-control transparent mr-3" placeholder="Enter Your username ..." v-model="players[0].name" @keyup="keymonitor" width="300">
	                                </div>
	                                <button type="button" class="btn btn-danger btn-fill" @click.prevent="launchGame()">Let's play {{ players[0].name }}</button>
	                            </div>
	                        </div>
	                    </div>
	                    
	                    <div class="alert alert-danger mt-3" role="alert" v-if="showErrorUsername && !players[0].name">
						  Please enter an username !
						</div>
	                </div>
				</template>

				<template v-else>
					<div class="mt-5">
                        <template v-if="gameMode == 'player'">
                            <div clas="row">
                            <h4 class="logo cursive pb-5">
                                Choose an action !
                            </h4>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button type="button" class="rounded-circle" title="Rock" @click.prevent="selectItem('rock')">
                                        <img src="public/img/rock.png" alt="Rock">
                                    </button>
                                </div>
                                <div class="col text-center">
                                     <button type="button" class="rounded-circle" title="Paper" @click.prevent="selectItem('paper')">
                                        <img src="public/img/paper.png" alt="Paper">
                                    </button>
                                </div>
                                <div class="col text-center">
                                    <button type="button" class="rounded-circle" title="Scissors" @click.prevent="selectItem('scissors')">
                                        <img src="public/img/scissors.png" alt="Scissors">
                                    </button>
                                </div>
                            </div>
                        </template>
                        <div v-else class="col-12 text-center">
                            <button type="button" class="btn btn-light btn-fill" @click.prevent="randomPlay()">launch random play</button>
                        </div>
			        </div>

                    <div class="alert alert-danger mt-3" role="alert" v-if="showErrorAjax">
                        OOPS, an internal error occured :(
                    </div>
				</template>
            </div>
        </div>
       
    </div>
	</div>
</body>
<script src="public/js/bundle.js"></script>
</script>

</html>