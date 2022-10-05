<script>
import axios from "axios";
// import AddAndEditCurrency from "@/components/AddAndEditCurrency.vue";
// import AddAndEditPair from "@/components/AddAndEditPair.vue";
export default {
  data() {
    return {
      email: "",
      password: "",
      urlApi:import.meta.env.VITE_URL_API,
    };
  },
  emits: ["getStatusConnexion"],
  methods: {
    login() {
      console.log(this.email, this.password);
      if (this.password == "" || this.email == "") {
        window.alert("Mot de passe et email ne sont pas vide!");
      } else {
        axios
          .post(this.urlApi+"login", {
            email: this.email,
            password: this.password,
          })
          .then(({ data }) => {
            if (data["message"] == "User login successfully.") {
              localStorage.setItem("access_token", data["data"]["token"]);
              localStorage.setItem("nameAdmin", data["data"]["name"]);
              this.$emit("getStatusConnexion");
              this.$router.push("/admin/accueil");
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
  <div class="main">
    <div class="body" >
      <div>
        <p class="titre">BIGSCREEN</p>
        <form @submit.prevent="login">
          <div class="fields">
            <div class="four wide field">
              <label>E-mail</label><br />
              <div class="input-group input-group-lg">
                <input  class="form-control"  
                        type="email"  name="email"
                        placeholder="email@email.com" 
                        v-model="email">
              </div>
              <label>Password</label><br />
              <div class="input-group input-group-lg">
                <input  class="form-control"  
                        type="password"
                        name="password"
                        placeholder="password"
                v-model="password">
              </div>
            </div>
            <div class="buttonCenter">
              <button type="submit" class="buttonConnexion">Connexion</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Michroma&display=swap");
.main{
  position: fixed;
  background-color: #DBDFEC;
  height: 100% !important;
  width: 100%;
}
.body {
  
  padding: 55px;
  background-color: #34495e;
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%,-50%);
  border-radius: 25px;
  font-size: 18px;
  display: flex;
  align-items: center;
  justify-content: center;
}
label {
  color: white;
  margin-top: 10px; 
  font-size: 25px;
}
.titre {
  color: #0080ff;
  font-size: 30px;
  text-align: center;
  
  font-family: "Michroma";
}
input{
  min-width: 300px;
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
  font-size: 20px;
  color: #34495e;
  background-color: white;
}
</style>
