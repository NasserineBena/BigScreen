<script>
import NavBar from "../../components/admin/NavBar.vue";
import axios from "axios";

export default {
  components: {
    NavBar,
  },
  data() {
    return {
      urlQuestionSurvey: "http://127.0.0.1:8000/api/question",
      questionSurvey: [],
      urlResponseSurvey: "http://127.0.0.1:8000/api/survey",
      responseSurvey: [],
      urlUserSurvey: "http://127.0.0.1:8000/api/surveyUser",
      userSurvey: [],
      responseEmail: "",
      questionName: "",
      allSurveys: [],
    };
  },
  mounted() {
    axios.get(this.urlQuestionSurvey).then((data) => {
      console.log(data);
      this.questionSurvey = data["data"].substr(5);
      console.log(JSON.parse(this.questionSurvey)[0]);
    });
    axios.get(this.urlResponseSurvey).then((data) => {
      console.log(data);
      this.responseSurvey = data["data"];
      console.log(this.responseSurvey[0]);
    });
    axios.get(this.urlUserSurvey).then((data) => {
      console.log(data);
      this.userSurvey = data["data"];
      console.log(this.userSurvey[0]);
    });
  },
  methods: {
    getSurvey() {
      this.responseEmail = "";
      this.questionName = "";
      for (const user of this.userSurvey) {
        for (const response of this.responseSurvey) {
          if (user.id === response.survey_user_id) {
            console.log(user.id + "=>" + response.survey_user_id);
            let questionArray = JSON.parse(this.questionSurvey);
            for (const question of questionArray) {
              if (response.question_id === question.id) {
                console.log(response.question_id + "=>" + question.id);
                this.questionName = question.question;
                if (response.question_id == 1) {
                  this.responseEmail = user.email;
                  this.allSurveys.push({
                    questionNumber: response.question_id,
                    questionName: this.questionName,
                    questionResponse: this.responseEmail,
                  });
                } else {
                  this.allSurveys.push({
                    questionNumber: response.question_id,
                    questionName: this.questionName,
                    questionResponse: response.response,
                  });
                }
              }
            }
          }
        }
      }
      console.log(this.allSurveys.length);
      return this.allSurveys;
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-3">
      <NavBar />
    </div>
    <div class="col-9">
      <table id="customers">
        <tr>
          <th>Numéro</th>
          <th>Question</th>
          <th>Réponse</th>
        </tr>
        <tbody v-for="item in getSurvey()" v-bind:value="item.id">
          <tr>
            <td>{{ item.questionNumber }}</td>
            <td>{{ item.questionName }}</td>
            <td>{{ item.questionResponse }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
.row {
  display: flex;
  margin: 0px;
  padding: 0px;
}
.col-3 {
  width: 20%;
  background-color: #34495e;
  padding-top: 100px;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td,
#customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}

#customers tr:hover {
  background-color: #ddd;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #2c3e50;
  color: white;
}
</style>
