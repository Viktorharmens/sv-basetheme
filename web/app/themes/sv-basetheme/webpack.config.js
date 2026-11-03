const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');

module.exports = (env, argv) => ({
  entry: {
    'js/script': './assets/js/script.js',
    'css/style': './assets/css/style.css',
    'css/editor': './assets/css/editor.css',
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].js',
    clean: true,
  },
  devtool: argv.mode === 'development' ? 'source-map' : false,
  module: {
    rules: [
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'],
      },
      {
        test: /\.woff2?$/,
        type: 'asset/resource',
        generator: { filename: 'fonts/[name][ext]' },
      },
      {
        test: /\.(png|jpe?g|gif|svg|webp|avif)$/,
        type: 'asset/resource',
        generator: { filename: 'images/[name][ext]' },
      },
    ],
  },
  plugins: [new RemoveEmptyScriptsPlugin(), new MiniCssExtractPlugin({ filename: '[name].css' })],
  stats: 'minimal',
});
