
export const routes = [

    {
        path: '/',
        component: () => import('@/pages/Main')
    },
    {
        path: '/:pathMatch(.*)',
        component: () => import('@/pages/NotFoundPage'),
    }
]
