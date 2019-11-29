import axios from 'axios'
import Vue from 'vue/dist/vue.js'
import { getPlayersDefaultData, getImages } from './constants'

var app = new Vue({
    el: '#game',
    data: {
        isGameStarted: false,
        gameMode: 'player',
        showErrorUsername: false,
        showErrorAjax: false,
        resultLastGame: null,
        images: getImages(),
        players: getPlayersDefaultData()
    },
    watch: {
        gameMode: function () { // if game mode switched, restart game
            this.resetGame()
        },
    },
    methods: {
        resetGame: function () {
            this.players = getPlayersDefaultData()
            this.resultLastGame = null
            this.isGameStarted = false
            this.launchGame()
            this.showErrorUsername = false
        },
        launchGame: function () {
            if (this.gameMode == 'player') {
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
        selectItem: function (item) {
            this.players[0].lastAction = item
            this.players[1].lastAction = this.getComputerChoice()
            this.sendChoices()
        },
        sendChoices: function () {
            let that = this
            this.showErrorAjax = false
            axios.get('../controller/gameController.php', {
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
        getComputerChoice: () => {
            const choices = ['rock', 'paper', 'scissors'];
            const randomNumber = Math.floor(Math.random() * 3);
            return choices[randomNumber];
        },
        randomPlay: function() {
            this.players[0].lastAction = this.getComputerChoice()
            this.players[1].lastAction = this.getComputerChoice()
            this.sendChoices()
        },
        keymonitor: function(event) {
            if (event.key == "Enter") {
                this.launchGame()
            }
        }
    }
})