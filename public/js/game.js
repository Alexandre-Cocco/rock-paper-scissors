import axios from 'axios'
import Vue from 'vue/dist/vue.js'

Vue.config.productionTip = false

var app = new Vue({
  el: '#game',
  data: {
	isGameStarted: false,
	gameMode: 'player',
	showErrorUsername: false,
    players: 
	    [
            {
                name: null,
                win: 0
            },
            {
                name: 'Computer',
                win: 0
            }
        ]
  },
  watch: {
    gameMode: function () {
      this.launchGame()
    },
  },
  methods: {
	  launchGame: function () {
		  if(this.players[0].name) {
		  	this.isGameStarted = true
		  } else {
			  this.showErrorUsername = true
		  }
	  },
	  selectItem: function (item) {
		  axios.get('../controller/gameController.php', {
			  params: {
				  action: 'select'
			  }
		  })
		  .then(function (response) {
		    
		  })
		  .catch(function (error) {
		    console.log(error);
		  })
		  .finally(function () {
		    // always executed
		  })
	  },
	  getData: function () {
		  
	  }
  }
})