<script>
import axios from "axios";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    connexion() {
      console.log(this.email, this.password);
      if (this.password == "" || this.email == "") {
        window.alert("Mot de passe et email ne sont pas vide!");
      } else {
        axios
          .post("http://127.0.0.1:8000/api/login", {
            email: this.email,
            password: this.password,
          })
          .then(({ data }) => {
            if (data["message"] == "User login successfully.") {
              localStorage.setItem("access_token", data["data"]["token"]);
              localStorage.setItem("nameAdmin", data["data"]["name"]);
              this.$router.push("/about");
            }
          })
          .catch((error) => {
            window.alert("Mot de passe ou email n'est pas correct!");
          });
      }
    },
  },
  created() {},
};
</script>
<template>
  <div class="body">
    <div>
      <p class="title">bigscreen</p>
      <form @submit.prevent="connexion">
        <div class="fields">
          <div class="four wide field">
            <label>E-mail</label><br />
            <input
              type="email"
              name="email"
              placeholder="email"
              v-model="email"
            /><br />
            <label>Password</label><br />
            <input
              type="password"
              name="password"
              placeholder="password"
              v-model="password"
            /><br />
          </div>
          <div class="buttonCenter">
            <button type="submit" class="buttonConnexion">Connexion</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<style scoped>
template {
  margin-top: 200px;
}
.body {
  padding: 50px;
  border-radius: 25px;
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #d0e2f3;
  width: 30%;
  margin: 0 auto;
}
label {
  color: white;
}
.title {
  color: white;
  font-size: 30px;
  text-align: center;
  margin: 20px;
}
input {
  padding: 12px;
  min-width: 250px;
  border-radius: 5px;
  margin-top: 15px;
  margin-bottom: 15px;
}
.buttonCenter {
  display: flex;
  justify-content: center;
}
.buttonConnexion {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 30px;
  padding: 8px;
  border-radius: 8px;
  font-size: 15px;
  color: green;
}
</style>
