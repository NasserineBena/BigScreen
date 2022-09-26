<script>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";
import { useRouter } from "vue-router";

export default {
  data() {
    return {
      connexion: false,
    };
  },
  computed: {
    currentRouteName() {
      return this.$route.name;
    },
  },
  mounted() {
    console.log(import.meta.env.VITE_URL_API)
  },
  methods: {
    logout() {
      let token = localStorage.getItem("access_token");
      axios
        .post("http://127.0.0.1:8000/api/logout", null, {
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
          window.alert("Vous ne pouvez pas se déconnacter ");
        });
    },
    login() {
      if (this.connexion != null) {
        this.$router.push("/admin");
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
  <header>
    <h1>BIGSCREEN</h1>
    <div>
      <p
        class="buttonAuth"
        v-if="connexion == true"
        v-on:click.prevent="logout"
      >
        Déconnexion
      </p>
      <p
        class="buttonAuth"
        v-if="connexion == false"
        v-on:click.prevent="login"
      >
        Connexion
      </p>
    </div>
  </header>

  <RouterView
    v-if="currentRouteName == 'login'"
    @getStatusConnexion="getStatusConnexion"
  />
  <RouterView v-if="currentRouteName != 'login'" />
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Michroma&display=swap");
header {
  line-height: 1.5;
  max-height: 100vh;
  font-family: "Michroma";
  font-weight: 900;
  display: flex;
  justify-content: space-between;
}
.buttonAuth {
  cursor: pointer;
}
</style>

<!-- <style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}
.logo {
  display: block;
  margin: 0 auto 2rem;
}
nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}
nav a.router-link-exact-active {
  color: var(--color-text);
}
nav a.router-link-exact-active:hover {
  background-color: transparent;
}
nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}
nav a:first-of-type {
  border: 0;
}
@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }
  .logo {
    margin: 0 2rem 0 0;
  }
  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;
    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style> -->
