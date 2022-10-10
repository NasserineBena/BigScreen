<script>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";
import { useRouter } from "vue-router";

export default {
  data() {
    return {
      connexion: false,
      urlApi: import.meta.env.VITE_URL_API,
    };
  },
  computed: {
    //Get current route
    currentRouteName() {
      return this.$route.name;
    },
  },
  methods: {
    //Redirection in two different ways depending on connexion status
    login() {
      if (this.connexion != null) {
        this.$router.push("/admin/accueil");
      }
      this.$router.push("/login");
    },
    //Check if the user is connected or not
    getStatusConnexion() {
      if (localStorage.getItem("access_token") !== null) {
        this.connexion = true;
      } else {
        this.connexion = false;
      }
    },
  },
  created() {
    //Call it when vue instance is created to access to data reactively
    this.getStatusConnexion();
  },
};
</script>

<template>
  <body>
    <header
      v-if="
        currentRouteName == 'surveyQuestion' ||
        currentRouteName == 'surveyResponse'
      "
    >
      <h1 class="text-white">BIGSCREEN</h1>
    </header>

    <RouterView
      v-if="currentRouteName == 'login'"
      @getStatusConnexion="getStatusConnexion"
    />
    <RouterView v-if="currentRouteName != 'login'" />
  </body>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Michroma&display=swap");

header {
  position: sticky;
  top: 0;
  width: 100%;
  padding: 30px;
  background-color: #34495e;
  line-height: 1.5;
  max-height: 100vh;
  font-family: "Michroma";
  font-weight: 900;
  text-align: center;
}
.buttonAuth {
  cursor: pointer;
}
</style>
