const {createEntryMap, createConstants, devServer, getAppConfig} = require('perch-framework')

// All five core paths and the target environment are automatically exported.
const {ROOT_DIR, APP_DIR, CONFIG_DIR, TMP_DIR, ENV_DIR, ENV} = process.env

// All user defined variables are automatically exported from files ".env" and ".env.ENV".
const {YOUR_VARIABLE} = process.env

// Setup necessary paths.
const webpackRootDir = `${APP_DIR}/webpack/`
const modulesDir = `${APP_DIR}webpack/modules/`
const assetDir = `${APP_DIR}/assets`
const nodeModulesDir = `${ROOT_DIR}node_modules/`
const tmpDir = `${TMP_DIR}/webpack`

// Get the webpack section of the dev config.
const config = require(`${CONFIG_DIR}dev`).webpack

/**
 *
 */
module.exports = {
  context: webpackRootDir,
  entry: createEntryMap(webpackRootDir),
  output: {
    path         : '/TODO',
    publicPath   : 'js/',
  },
  resolve: {
    modules: [
      modulesDir,
      nodeModulesDir,
    ],
    extensions: [
      '.js',
      '.css',
    ],
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
      {
        test: /\.css$/,
        exclude: /node_modules/,
        use: [
          {
            loader: 'style-loader',
          },
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            },
          },
          {
            loader: 'postcss-loader',
          },
        ],
      },
    ],
  },
  devServer: devServer({}),
  plugins: [
    createConstants(ENV, ROOT_DIR, config.constants),
  ],
}

