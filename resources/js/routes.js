const routes = [
    {
        path: '/',
        component: require('./views/Dashboard.vue').default,
        name: 'dashboard',
        meta: {
            layout: 'app'
        }
    }
]

export default routes