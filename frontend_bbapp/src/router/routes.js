import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/public/Login.vue'
import Dashboard from '../views/admin/Dashboard.vue'
import useAuth from '../store/auth'
import Customers from '../views/admin/Customers.vue'
import Employees from '../views/admin/Employees.vue'
import Miscellaneous from '../views/admin/Miscellaneous.vue'
import Quotations from '../views/admin/Quotations.vue'
import Sales from '../views/admin/Sales.vue'
import Services from '../views/admin/Services.vue'
import Supplies from '../views/admin/Supplies.vue'
import Users from '../views/admin/Users.vue'
import MainView from '../views/admin/MainView.vue'

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
            path: '/main',
            name: 'main',
            component: MainView,
            meta: {
                requireAuth: true
            },
            children: [
                {
                    path: '/dashboard',
                    name: 'dashboard',
                    component: Dashboard,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/customers',
                    name: 'customers',
                    component: Customers,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/employees',
                    name: 'employees',
                    component: Employees,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/miscellaneous',
                    name: 'miscellaneous',
                    component: Miscellaneous,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/quotations',
                    name: 'quotations',
                    component: Quotations,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/sales',
                    name: 'sales',
                    component: Sales,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/services',
                    name: 'services',
                    component: Services,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/supplies',
                    name: 'supplies',
                    component: Supplies,
                    meta: {
                        requireAuth: true
                    }
                },
                {
                    path: '/users',
                    name: 'users',
                    component: Users,
                    meta: {
                        requireAuth: true
                    }
                },
            ]
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