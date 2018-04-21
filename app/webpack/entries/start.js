
import framework from 'commons/libframework'
import './style'

console.log('start')

// TEST Babel
const test = {
  a: 123,
  b: 456,
}
console.log({
  ...test,
  c: 789,
})

if (ENV === DEVELOPMENT) {
  console.log('You are in development mode.  Load debug toolbars here.  The minifier will be remove this entire logic from the production build.')
}
