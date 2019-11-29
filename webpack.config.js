const webpack = require("webpack")
const path = require("path")
const ExtractTextWebpackPlugin = require("extract-text-webpack-plugin")

let config = {
	mode: 'development',
  entry: "./public/js/game.js",
  output: {
    path: path.resolve(__dirname, "./public"),
    filename: "./js/bundle.js"
  },
  module: {
    rules: [
	    {
	      	test: /\.js$/,
		  	exclude: /node_modules/,
		  	loader: "babel-loader"
	    }
	]
  }
}

module.exports = config