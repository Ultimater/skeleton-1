
import framework from 'commons/libframework'

console.log('start')

if (ENV === DEVELOPMENT) {
  console.log('You are in development mode.  Load debug toolbars here.  The minifier will be remove this entire logic from the production build.')
}
