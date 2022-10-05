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
      allSurveys: [],
    };
  },
  mounted() {
    axios.get(this.urlQuestionSurvey).then((data) => {
      console.log(data);
      this.questionSurvey = data["data"];
      console.log(this.questionSurvey);
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
      this.allSurveys = [];
      for (const response of this.responseSurvey) {
        const response_id_user = response.survey_user_id;
        const response_id_question = response.question_id;
        for (const user of this.userSurvey) {
          if (response_id_user === user.id) {
            for (const question of this.questionSurvey) {
              if (question.id == response_id_question) {
                if (response.question_id == 1) {
                  this.allSurveys.push({
                    questionNumber: response.question_id,
                    questionName: question.question,
                    questionResponse: user.email,
                  });
                } else if (response.question_id > 1) {
                  this.allSurveys.push({
                    questionNumber: response.question_id,
                    questionName: question.question,
                    questionResponse: response.response,
                  });
                }
              }
            }
          }
        }
      }

      return this.allSurveys;
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-lg-3 col-12 style pb-lg-0 pb-4 mb-lg-0 mb-4">
      <NavBar />
    </div>
    <div class="col-lg-9 col-12 position">
      <table id="customers">
        <tr class="row">
          <th class="col-2">Numéro</th>
          <th class="col-5">Question</th>
          <th class="col-5">Réponse</th>
        </tr>
        <div class="pos-overflow w-100">
          <tbody
            v-for="item in getSurvey()"
            v-bind:value="item.questionNumber"
            class="w-100"
          >
            <tr class="w-100">
              <td class="col-2">{{ item.questionNumber }}</td>
              <td class="col-5">{{ item.questionName }}</td>
              <td class="col-5">{{ item.questionResponse }}</td>
            </tr>
            <div v-if="item.questionNumber == 20">
              <br />
              <br />
            </div>
          </tbody>
        </div>
      </table>
    </div>
  </div>
</template>

<style scoped>
* {
  /* padding-top:100px */
}
.row {
  margin: 0px;
  padding: 0px;
}
.style {
  background-color: #34495e;
}
.col-3 {
  /* display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center; */
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
  background-color: #34495e;
  color: white;
}

.position {
  overflow: hidden;
  height: 100vh;
}
.pos-overflow {
  overflow: scroll;
  height: 90vh;
}
</style>
