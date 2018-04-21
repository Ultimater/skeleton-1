const {createAppConfig, createConstants, createEntryMap, devServer} = require('@perch-framework/core')

// All user defined variables are automatically exported from files ".env" and ".env.ENV".
const {YOUR_VARIABLE} = process.env

const config = createAppConfig()
const {assetDir, modulesDir, vendorModulesDir, rootDir, tmpDir, webpackDir} = config

/**
 *
 */
module.exports = {
  context: webpackDir,
  entry: createEntryMap(webpackDir),
  output: {
    path         : '/TODO',
    publicPath   : 'js/',
  },
  resolve: {
    modules: [
      modulesDir,
      vendorModulesDir,
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
          'style-loader',
          {
            loader: 'css-loader',
            options: {
              importLoaders: 1,
            },
          },
          'postcss-loader',
        ],
      },
    ],
  },
  devServer: devServer({}),
  plugins: [
    createConstants(config),
  ],
}
