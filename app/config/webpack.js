
const path = require('path')
const webpackConfig = require('perch-framework/webpack-config')

const {APP_DIR, PACKAGE_DIR} = process.env

/**
 *
 */
module.exports = webpackConfig({
  appDir: APP_DIR,
  nodeModulesDir: path.join(PACKAGE_DIR, 'node_modules'),
})

