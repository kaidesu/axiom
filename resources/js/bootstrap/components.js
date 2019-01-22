import Vue from 'vue';

/**
 * Global Components
 */
Vue.component('app', require('../components/App').default)

/**
 * Layouts
 */
Vue.component('app-layout', require('../layouts/App').default)
Vue.component('default-layout', require('../layouts/Default').default)
Vue.component('error-layout', require('../layouts/Error').default)