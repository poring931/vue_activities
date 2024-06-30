export const routes = [
    {
        path: '/',
        component: () => import('@/pages/MainPage'),
    },
    {
        path: '/:pathMatch(.*)',
        component: () => import('@/pages/NotFoundPage'),
    },
];
