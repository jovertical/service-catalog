import Signin from './views/auth/Signin';
import Home from './views/admin/Home';
import CategoryList from './views/admin/categories/List';
import ErrorNotFound from './views/errors/NotFound';

export const routes = [
    {
        path: '/signin',
        component: Signin,
    },

    {
        path: '/',
        component: Home,
        auth: true,
    },

    {
        path: '/categories',
        component: CategoryList,
        auth: true,
    },

    {
        component: ErrorNotFound,
    },
];
