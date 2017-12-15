
const path = require('path');
const webpackConfig = require('perch-framework/webpack-config')

const {APP_DIR, PACKAGE_DIR} = process.env
const jsDir = path.join(APP_DIR, 'webpack')
const nodeModulesDir = path.join(PACKAGE_DIR, 'node_modules')

module.exports = webpackConfig({
  entry: [
    './entries/start',
  ],
  modules: [
    jsDir,
    nodeModulesDir,
  ],
})
