<script>
import axios from "axios";

export default {
  data() {
    return {
      responseTypeC: ["1", "2", "3", "4", "5"],
      surveyQuestions: [],
      surveyResponse: {},
    };
  },
  methods: {
    getSurveyQuestions() {
      axios.get("http://127.0.0.1:8000/api/question").then((data) => {
        this.surveyQuestions = data["data"];
        this.surveyQuestions.forEach((element) => {
          this.surveyResponse[element.id] = "";
        });
      });
    },
    checkValide() {
      for (const element of this.surveyQuestions) {
        if (this.surveyResponse[element.id] == "") {
          window.alert("Il faut répondre tous les questions");
          return false;
        }
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
          })
          .catch((e) => {
            alert(e);
          });
      }
    },
  },

  created() {
    this.getSurveyQuestions();
  },
};
</script>
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
        </div>
      </div>
      <div>
        <button v-on:click.prevent="valider">Valider</button>
      </div>
    </div>
  </div>
</template>
<style scoped>
.checkbox {
  margin-right: 30px;
}
.responseCheckbox {
  display: flex;
}
.body {
  display: flex;
  justify-content: center;
  margin-top: 45px;
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
</style>
