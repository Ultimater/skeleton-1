const webpackConfig = require('perch-framework/webpack-config')

const {APP_DIR, NODE_PATH} = process.env

/**
 *
 */
module.exports = webpackConfig({
  appDir: APP_DIR,
  nodeModulesDir: NODE_PATH,
})

