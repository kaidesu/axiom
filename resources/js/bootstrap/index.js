window._ = require('lodash')
window.Vue = require('vue')
window.moment = require('moment')
window.Proton = require('@efelle/proton')

import './axios'
import './components'

if (process.env.APP_ENV === 'production') {
    console.log('/*')
    console.log(' * Axiom')
    console.log(' * Your source of truth.')
    console.log(' *')
    console.log(' * Author:    Kai (Shea Lewis)')
    console.log(' * Website:   https://github.com/axiom-labs/axiom')
    console.log(' * Copyright: 2019')
    console.log(' */')
}