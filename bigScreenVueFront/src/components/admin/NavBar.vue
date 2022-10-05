<template>
  <div class="">
    <div class="title mt-4">Bigscreen</div>
    <div class="content d-flex flex-lg-column flex-row justify-content-around">
      <div class="pt-lg-5 pt-4 mx-lg-0 mx-2">
        <a href="/admin/accueil"> Accueil</a>
      </div>
      <div class="pt-4 mx-lg-0 mx-2">
        <a href="/admin/questionnaire">Questionnaire</a>
      </div>
      <div class="pt-4 mx-lg-0 mx-2">
        <a href="/admin/reponses">Réponses</a>
      </div>
      <div v-on:click.prevent="logout" class="pt-4 mx-lg-0 mx-2">
        <a>Déconnexion</a>
      </div>
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
        .post(this.urlApi + "logout", null, {
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
          window.alert("Vous ne pouvez pas vous déconnecter ");
        });
    },
  },
};
</script>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Michroma&display=swap");

.title {
  color: white;
  font-size: 35px;
  font-family: "Michroma";
  font-weight: 900;
  width: fit-content;
  margin: 0 auto;
}
.content {
  width: fit-content;
  margin: 0 auto;
}
a {
  text-decoration: none;
  cursor: pointer;
  color: white !important;
  font-size: 20px;
}
a:hover {
  border: 1px solid #f5f6fa;
  border-radius: 10px;
  background-color: #f5f6fa;
  color: #34495e !important;
  padding: 10px;
}
.padding {
  padding-top: 20px;
}
</style>
