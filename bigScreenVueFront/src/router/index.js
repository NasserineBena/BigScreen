import { createRouter, createWebHistory } from 'vue-router'
import LoginView from "../views/LoginView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: {
          name: "login"
      }
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
      beforeEnter() {
        if (localStorage.getItem("access_token") != null){
              return { path: "/admin/currencies"}
        }
      },
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})

export default router
