import { createRouter, createWebHistory } from 'vue-router'
import LoginView from "../views/LoginView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      redirect: {
          name: "surveyQuestion"
      }
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
      beforeEnter() {
        if (localStorage.getItem("access_token") != null){
              return { path: "/surveyQuestion"}
        }
      },
    },
    {
      path: "/surveyQuestion",
      name: "surveyQuestion",
      component: () => import("../views/public/SurveyQuestionView.vue"),
      // beforeEnter() {
      //   if (localStorage.getItem("access_token") == null){
      //         return { path: "/login"}
      //   }
      // },
    },
  ]
})

export default router
