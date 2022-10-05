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
    currentRouteName() {
      return this.$route.name;
    },
  },
  methods: {
    logout() {
      let token = localStorage.getItem("access_token");
      axios
        .post(this.urlApi + "logout", null, {
          headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
          },
        })
        .then(({ data }) => {
          this.$router.push("/surveyQuestion");
          this.connexion = false;
          localStorage.removeItem("nameAdmin");
          localStorage.removeItem("access_token");
        })
        .catch((error) => {
          window.alert("Vous ne pouvez pas se déconnecter ");
        });
    },
    login() {
      if (this.connexion != null) {
        this.$router.push("/admin/accueil");
      }
      this.$router.push("/login");
    },
    getStatusConnexion() {
      // console.log(localStorage.getItem("access_token"));
      if (localStorage.getItem("access_token") !== null) {
        this.connexion = true;
      } else {
        this.connexion = false;
      }
    },
  },
  created() {
    this.getStatusConnexion();
  },
};
</script>

<template>
  <body>
    <header v-if="currentRouteName == 'surveyQuestion'|| currentRouteName=='surveyResponse' ">
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
  position:sticky;
  top: 0;
  width:100%;
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


