<template>
  <div class="container">
    <div class="title">bigscreen</div>
    <div class="content">
      <div class="padding"><a href="/admin/accueil"> Accueil</a></div>
      <div class="padding">
        <a href="/admin/questionnaire">Questionnaire</a>
      </div>
      <div class="padding"><a href="/admin/reponses">Réponses</a></div>
      <div v-on:click.prevent="logout" class="padding"><a href="/admin/reponses">Déconnexion</a></div>
    </div>
  </div>
</template>
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
  methods: {
    logout() {
      let token = localStorage.getItem("access_token");
      axios
        .post(this.urlApi+"logout", null, {
          headers: {
            "Content-Type": "application/json",
            Authorization: "Bearer " + token,
          },
        })
        .then(({ data }) => {
          this.$router.push("/login");
          this.connexion = false;
          localStorage.removeItem("nameAdmin");
          localStorage.removeItem("access_token");
        })
        .catch((error) => {
          window.alert("Vous ne pouvez pas se déconnecter ");
        });
    },   
  },
};
</script>
<style scoped>
.container {
  width: fit-content;
  margin: 0 auto;
}
.title {
  color: white;
  font-size: 24px;
}
a {
  text-decoration: none;
  cursor: pointer;
  color: white;
  font-size: 20px;
}
.padding {
  padding-top: 20px;
}
</style>
