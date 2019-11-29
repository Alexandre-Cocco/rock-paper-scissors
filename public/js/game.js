import axios from 'axios'
import Vue from 'vue/dist/vue.js'
import { getPlayersDefaultData, getImages } from './constants'

var app = new Vue({
    el: '#game',
    data: {
        isGameStarted: false, // the game is started or not
        gameMode: 'player', // player for player vs player | computer for computer vs computer
        showErrorUsername: false, // if true displays an error because username is empty the game can't start
        showErrorAjax: false, // if an error occur during the ajax request, an error is displayed
        resultLastGame: null, // win or lose or tied
        images: getImages(),
        players: getPlayersDefaultData()
    },
    watch: {
        gameMode: function () { // if game mode switched, restart game
            this.resetGame(this.gameMode)
        },
    },
    methods: {
        /**
         * reinitialize the game
         * @param gameMode
         */
        resetGame: function (gameMode) {
            this.gameMode = gameMode
            this.players = getPlayersDefaultData()
            this.resultLastGame = null
            this.isGameStarted = false
            this.launchGame()
            this.showErrorUsername = false
        },
        /**
         * start game
         */
        launchGame: function () {
            if (this.gameMode == 'player') {
                this.gameMode = 'player'
                if (this.players[0].name) {
                    this.isGameStarted = true
                } else {
                    this.showErrorUsername = true
                }
            } else {
                this.resultLastGame = null
                this.players[0].name = 'Computer 1'
                this.players[1].name = 'Computer 2'
                this.isGameStarted = true
            }
        },
        /**
         * call every time user choose an item during the game
         * @param item
         */
        selectItem: function (item) {
            this.players[0].lastAction = item
            this.players[1].lastAction = this.getComputerChoice()
            this.sendChoices()
        },
        /**
         * call ajax to php server to retrieve the result of the game
         */
        sendChoices: function () {
            let that = this
            this.showErrorAjax = false
            axios.get('./controller/gameController.php', {
                params: {
                    action: 'select',
                    userAction: this.players[0].lastAction,
                    computerAction: this.players[1].lastAction
                }
            })
            .then(function (response) {
                that.resultLastGame = response.data
                switch (that.resultLastGame) {
                    case 'win':
                        that.players[0].win ++
                        break;
                    case 'lose':
                        that.players[1].win ++
                        break;
                }
            })
            .catch(function (error) {
                that.showErrorAjax = true
            })
        },
        /**
         * random choice for computer
         * @returns {string}
         */
        getComputerChoice: () => {
            const choices = ['rock', 'paper', 'scissors'];
            const randomNumber = Math.floor(Math.random() * 3);
            return choices[randomNumber];
        },
        /**
         * random choice if the game is in computer vs computer mode
         */
        randomPlay: function() {
            this.players[0].lastAction = this.getComputerChoice()
            this.players[1].lastAction = this.getComputerChoice()
            this.sendChoices()
        },
        /**
         * detect if user press enter to submit his username
         * @param event
         */
        keymonitor: function(event) {
            if (event.key == "Enter") {
                this.launchGame()
            }
        }
    }
})