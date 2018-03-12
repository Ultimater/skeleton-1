const webpackConfig = require('perch-framework')

const {APP_DIR, TMP_DIR, NODE_PATH} = process.env

/**
 *
 */
module.exports = webpackConfig({
  configDir: `${APP_DIR}config/`,
  webpackDir: `${APP_DIR}webpack/`,
  tmpDir: TMP_DIR,
  nodeModulesDir: NODE_PATH,
})

