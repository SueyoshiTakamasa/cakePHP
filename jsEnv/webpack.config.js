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
  ],

  // 出力ファイル
  output: {
    filename: "bundle.js"
  }
}