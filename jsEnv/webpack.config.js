const path = require('path');

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  mode: "production",

  // メインのJS
  entry:  [
  	"./src/modules/search.js",
  	"./src/modules/modal.js",
  	"./src/modules/carousel.js",
  	"./src/modules/addFile.js",
    "./src/modules/zipcodeSearch.js",
    "./src/modules/dropDown.js",
  ],

  // 出力ファイル
  output: {

    path: path.resolve(__dirname, '../app/webroot/js/'),

    filename: "bundle.js",
  }
}