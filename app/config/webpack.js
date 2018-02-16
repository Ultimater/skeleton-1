
const path = require('path')
const webpackConfig = require('perch-framework/webpack-config')

const {APP_DIR, PACKAGE_DIR, WEBPACK_MODE} = process.env

/**
 *
 */
module.exports = webpackConfig({
  appDir: APP_DIR,
  mode: WEBPACK_MODE,
  nodeModulesDir: path.join(PACKAGE_DIR, 'node_modules'),
})

