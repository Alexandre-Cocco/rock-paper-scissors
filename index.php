<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.png">

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
            <h1 class="logo cursive pb-5">
	            Waste an Hour Having Fun
	        </h1>
            <div class="content">	            
	            <div class="d-flex justify-content-around">
				    <div class="player p-3">
					    <div class="player-score">
						    Win: {{ players[0].win }}
					    </div>
		               Player 1 : {{ players[0].name }}
	               </div>
	               <div class="player p-3">
		               <div class="player-score">
						    Win: {{ players[1].win }}
					    </div>
		               Player 2 : Computer
	               </div>
				</div>
  
				<template  v-if="!isGameStarted">
	                <div class="subscribe" v-if="gameMode =='player'">
	                    <h5 class="info-text">
		                    Enter your username
		                </h5>
		               
	                    <div class="row">
	                        <div class="col-12 d-flex justify-content-center">
	                            <form class="form-inline">
	                                <div class="form-group">
	                                    <label class="sr-only" for="exampleInputEmail2">Email address</label>
	                                    <input type="text" class="form-control transparent" placeholder="Your username here..." v-model="players[0].name">
	                                </div>
	                                <button type="button" class="btn btn-danger btn-fill" @click.prevent="launchGame()">Let's play {{ players[0].name }}</button>
	                            </form>
	
	                        </div>
	                    </div>
	                    
	                    <div class="alert alert-danger mt-3" role="alert" v-if="showErrorUsername && !players[0].name">
						  Please enter an username !
						</div>
	                </div>
				</template>
				<template v-else>
					<div class="mt-5">
						<div clas="row">
						<h4 class="logo cursive pb-5">
				            Choose an action !
				        </h4>
						</div>
						<div class="row">
				            <div class="col text-center">
				                <button type="button" class="rounded-circle" title="Rock" @click.prevent="selectItem(1)">
				                    <img src="public/img/rock.png" alt="Rock">
				                </button>
				            </div>
				            <div class="col text-center">
				                 <button type="button" class="rounded-circle" title="Paper" @click.prevent="selectItem(2)">
				                    <img src="public/img/paper.png" alt="Paper">
				                </button>
				            </div>
				            <div class="col text-center">
				                <button type="button" class="rounded-circle" title="Scissors" @click.prevent="selectItem(3)">
				                    <img src="public/img/scissors.png" alt="Scissors">
				                </button>
				            </div>
						</div>
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