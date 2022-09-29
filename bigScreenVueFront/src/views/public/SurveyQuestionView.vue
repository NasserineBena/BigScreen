<script>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";
import Message from "../../components/public/Message.vue";

export default {
  data() {
    return {
      responseTypeC: ["1", "2", "3", "4", "5"],
      surveyQuestions: [],
      surveyResponse: {},
      urlAPi: import.meta.env.VITE_URL_API,
    };
  },
  methods: {
    getSurveyQuestions() {
      axios.get(this.urlAPi + "question").then((data) => {
        this.surveyQuestions = data["data"];
        this.surveyQuestions.forEach((element) => {
          this.surveyResponse[element.id] = "";
        });
      });
    },
    checkValidate() {
      for (const element of this.surveyQuestions) {
        if (this.surveyResponse[element.id] == "") {
          window.alert("Il faut répondre tous les questions");
          return false;
        }
      }
      return true;
    },
    validate() {
      if (this.checkValidate() == true) {
        axios
          .post(this.urlAPi + "surveyUser", {
            email: this.surveyResponse[1],
          })
          .then((data) => {
            const id_user = data.data.id;
            const token_user = data.data.token;
            console.log(data);
            for (const element of this.surveyQuestions) {
              axios.post(this.urlAPi + "survey", {
                question_id: element.id,
                survey_user_id: id_user,
                response: this.surveyResponse[element.id],
              });
            }
            this.$router.push("surveyResponse/" + token_user);
          })
          .catch((e) => {
            alert(e);
          });
      }
      return true;
    },

    valider() {
      if (this.checkValide() == true) {
        axios
          .post("http://127.0.0.1:8000/api/surveyUser", {
            email: this.surveyResponse[1],
          })
          .then((data) => {
            const id_user = data.data;
            console.log(id_user);
            for (const element of this.surveyQuestions) {
              axios.post("http://127.0.0.1:8000/api/survey", {
                question_id: element.id,
                survey_user_id: id_user,
                response: this.surveyResponse[element.id],
              });
            }
<<<<<<< HEAD
        },
        closeMessage(){
            this.message= false;
            this.$router.go(this.$router.currentRoute);
        }
    },
    
    created() {
        this.getSurveyQuestions();
=======
          })
          .catch((e) => {
            alert(e);
          });
      }
>>>>>>> 2028d14a7e3743c3f0047198f8665e1c2c418d43
    },
  },
  created() {
    this.getSurveyQuestions();
  },
};
</script>
<<<<<<< HEAD
<template >
    <div class="body" v-if="message==false">
        <div>
            <div v-for="question in surveyQuestions" v-bind:value="question.id">
                <p class="titleQuestion">{{question.question}}</p>
                <div v-if="question.type==='A'">
                     <select v-model="surveyResponse[question.id]">
                        <option v-for="item in question.response_possibility">
                            {{ item }}
                        </option>
                     </select>
                </div>
                <div v-if="question.type==='B'">
                    <textarea maxlength="250" rows="7" v-model="surveyResponse[question.id]"></textarea>
                </div>
                <div v-if="question.type==='C'">
                    <select v-model="surveyResponse[question.id]">
                        <option v-for="item in responseTypeC">
                            {{ item }}
                        </option>
                     </select>
                </div>
            </div>
            <div>
                <button v-on:click.prevent="validate">Valider</button>
            </div>
=======
<template>
  <div class="body">
    <div>
      <div v-for="question in surveyQuestions" v-bind:value="question.id">
        <p class="titleQuestion">{{ question.question }}</p>
        <div v-if="question.type === 'A'">
          <select v-model="surveyResponse[question.id]">
            <option v-for="item in question.response_possibility">
              {{ item }}
            </option>
          </select>
        </div>
        <div v-if="question.type === 'B'">
          <textarea
            maxlength="250"
            rows="7"
            v-model="surveyResponse[question.id]"
          ></textarea>
        </div>
        <div v-if="question.type === 'C'">
          <select v-model="surveyResponse[question.id]">
            <option v-for="item in responseTypeC">
              {{ item }}
            </option>
          </select>
>>>>>>> 2028d14a7e3743c3f0047198f8665e1c2c418d43
        </div>
      </div>
      <div>
        <button v-on:click.prevent="validate">Valider</button>
      </div>
    </div>
<<<<<<< HEAD
    <div class="popup" v-if="message==true">
        <div >
            <Message
            :token="token"
            @closeMessage="closeMessage"/>
        </div>
    </div>
=======
  </div>
>>>>>>> 2028d14a7e3743c3f0047198f8665e1c2c418d43
</template>

<style scoped>
.checkbox {
  margin-right: 30px;
}
.responseCheckbox {
  display: flex;
}
<<<<<<< HEAD
.body{
    
    display:flex;
    justify-content: center;
    margin-top: 45px;

=======
.body {
  display: flex;
  justify-content: center;
  margin-top: 45px;
>>>>>>> 2028d14a7e3743c3f0047198f8665e1c2c418d43
}
textarea {
  width: 100%;
  border: dotted 2px black;
}
.titleQuestion {
  margin-bottom: 20px;
  margin-top: 20px;
  font-size: 20px;
  font-weight: bold;
}
<<<<<<< HEAD
.popup{
    width: 85%;
    background-color: white;
    position: absolute;
    left: 50%;
    top: 50%;
    margin: auto;
    transform: translate(-50%,-50%);
    white-space:wrap;
    text-overflow: "-";
}
</style>
=======
</style>
>>>>>>> 2028d14a7e3743c3f0047198f8665e1c2c418d43
