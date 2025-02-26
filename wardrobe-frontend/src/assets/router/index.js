import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import ClothingList from '../components/ClothingList.vue';
import ClothingForm from '../components/ClothingForm.vue';

const routes = [
  { path: '/', redirect: '/login' }, // Default to login page
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/clothing', component: ClothingList, meta: { requiresAuth: true } },
  { path: '/clothing/add', component: ClothingForm, meta: { requiresAuth: true } },
  { path: '/clothing/edit/:id', component: ClothingForm, meta: { requiresAuth: true } },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Navigation Guard to protect routes
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('token');
  if (to.meta.requiresAuth && !isAuthenticated) {
    next('/login'); // Redirect to login if not authenticated
  } else {
    next();
  }
});

export default router;
