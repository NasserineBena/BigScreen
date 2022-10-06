<template>
  <div class="">
    <div class="title mt-4">Bigscreen</div>
    <div class="content d-flex flex-lg-column flex-row justify-content-around">
      <div class="mt-lg-5 mt-4 mx-lg-0 mx-2 width text-center">
        <a class="m-4" href="/admin/accueil"> Accueil</a>
      </div>
      <div class="mt-4 mx-lg-0 mx-2 width text-center">
        <a class="m-4" href="/admin/questionnaire">Questionnaire</a>
      </div>
      <div class="mt-4 mx-lg-0 mx-2 width text-center">
        <a class="m-4" href="/admin/reponses">Réponses</a>
      </div>
      <div
        v-on:click.prevent="logout"
        class="mt-4 mx-lg-0 mx-2 width text-center"
      >
        <a class="m-4">Déconnexion</a>
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
    //Logout
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
          //redirection to login page
          this.$router.push("/login");
          this.connexion = false;
          //remove token from local storage to not allow login to the user
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
  color: white !important;
  font-size: 20px;
}

a:hover {
  color: #34495e !important;
}
.width {
  cursor: pointer;
  border: 1px solid #4472c4;
  border-radius: 10px;
  background-color: #4472c4;
}
.width:hover {
  background-color: #f5f6fa;
  border: 1px solid #f5f6fa;
  color: #34495e !important;
}
.padding {
  padding-top: 20px;
}
</style>
