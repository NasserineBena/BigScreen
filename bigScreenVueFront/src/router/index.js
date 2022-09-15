import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../views/LoginView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      redirect: {
        name: "login",
      },
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
      beforeEnter() {
        if (localStorage.getItem("access_token") != null) {
          return { path: "/admin/accueil" };
        }
      },
    },
    {
      path: "/admin/accueil",
      name: "home",
      component: () => import("../views/admin/AdminHomeView.vue"),
      beforeEnter() {
        if (localStorage.getItem("access_token") == null) {
          return { path: "/login" };
        }
      },
    },
    {
      path: "/admin/questionnaire",
      name: "question",
      component: () => import("../views/admin/AdminQuestionView.vue"),
      beforeEnter() {
        if (localStorage.getItem("access_token") == null) {
          return { path: "/login" };
        }
      },
    },
    {
      path: "/admin/reponses",
      name: "responses",
      component: () => import("../views/admin/AdminResponsesView.vue"),
      beforeEnter() {
        if (localStorage.getItem("access_token") == null) {
          return { path: "/login" };
        }
      },
    },
  ],
});

export default router;
