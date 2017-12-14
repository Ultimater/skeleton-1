
const path = require('path');

const {APP_DIR, PACKAGE_DIR} = process.env
const jsDir = path.join(APP_DIR, 'webpack')
const nodeModulesDir = path.join(PACKAGE_DIR, 'node_modules')

module.exports = {
  context: jsDir,
  entry: [
    './entries/start',
  ],
  output: {
    path         : '/tmp/phalcon-autoapp',
    publicPath   : '/',
    filename     : 'js/[name].js',
    chunkFilename: 'js/chunk/[id].js',
  },
  resolve: {
    modules: [
      jsDir,
      nodeModulesDir,
    ],
    descriptionFiles: ['package.json'],
    mainFields: ['main', 'browser'],
    mainFiles: ['index'],
    extensions: [
      '.js',
    ],
    enforceExtension: false,
    enforceModuleExtension: false,
  },
  devServer: {
    contentBase: jsDir,
    host: '0.0.0.0',
    disableHostCheck: true,
    stats: {
      assets: false,
      colors: true,
      children: false,
      chunks: false,
      modules: false,
    },
  },
}
