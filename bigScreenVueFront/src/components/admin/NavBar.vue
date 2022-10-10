<template>
  <div class="">
    <div class="title mt-4">Bigscreen</div>
    <div class="content d-lg-flex d-none flex-column justify-content-around">
      <div class="mt-5 width text-center">
        <a class="m-4" href="/admin/accueil"> Accueil</a>
      </div>
      <div class="mt-4 width text-center">
        <a class="m-4" href="/admin/questionnaire">Questions</a>
      </div>
      <div class="mt-4 width text-center">
        <a class="m-4" href="/admin/reponses">Réponses</a>
      </div>
      <div v-on:click.prevent="logout" class="mt-4 width text-center">
        <a class="m-4">Déconnexion</a>
      </div>
    </div>

    <nav class="navbar d-lg-none f-block bg-dark mt-4">
      <div class="container-fluid">
        <button
          class="navbar-toggler bg-light"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo01"
          aria-controls="navbarTogglerDemo01"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/admin/accueil"> Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/questionnaire">Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/reponses">Réponses</a>
            </li>
            <li v-on:click.prevent="logout" class="nav-item">
              <a class="nav-link">Déconnexion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
  height: 40px;
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
