import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/public/Login.vue'
import Dashboard from '../views/admin/Dashboard.vue'
import useAuth from '../store/auth'

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Login,
            meta: {
                requireAuth: false
            }
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                requireAuth: true
            }
        },

    ]

})

router.beforeEach((to, from, next) => {
    const auth = useAuth()
    const isAuth = auth.token

    if (to.meta.requireAuth && !isAuth) {
        next('/')
    } else {
        next()
    }
})

export default router