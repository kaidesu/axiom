import Vue from 'vue'
import Router from 'vue-router'
import routes from '../routes'
import { before, after } from './hooks'

Vue.use(Router)

const router = new Router({
    mode: 'history',

    routes,
})

router.beforeResolve(before)
router.beforeEach(before)
router.afterEach(after)