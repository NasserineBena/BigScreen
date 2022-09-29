<script>
import NavBar from "../../components/admin/NavBar.vue";
import { createApp } from "vue";
import App from "../../App.vue";
import ApexCharts from "apexcharts";
import axios from "axios";

import VueApexCharts from "vue3-apexcharts";

const app = createApp(App);

app.config.globalProperties.$apexcharts = ApexCharts;

app.use(VueApexCharts);
app.component("VueApexCharts", VueApexCharts);

export default {
  components: {
    NavBar,
    apexchart: VueApexCharts,
  },

  data: function () {
    return {
      urlQuestionSurvey: "http://127.0.0.1:8000/api/question",
      questionSurvey: [],
      urlResponseSurvey: "http://127.0.0.1:8000/api/survey",
      responseSurvey: [],
      urlUserSurvey: "http://127.0.0.1:8000/api/surveyUser",
      response6Array: [],
      response7Array: [],
      response10Array: [],
      responsePossibility6Array: [],
      responsePossibility7Array: [],
      responsePossibility10Array: [],
      stat6Array: [],
      stat7Array: [],
      stat10Array: [],
      countStat6: 0,
      countStat7: 0,
      countStat10: 0,
      countStat6Array: [],
      countStat7Array: [],
      countStat10Array: [],

      chartOptions: {
        chart: {
          type: "donut",
        },
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
    };
  },

  mounted() {
    axios.get(this.urlQuestionSurvey).then((data) => {
      this.questionSurvey = data["data"];
    });
    axios.get(this.urlResponseSurvey).then((data) => {
      this.responseSurvey = data["data"];
    });
    axios.get(this.urlUserSurvey).then((data) => {
      this.userSurvey = data["data"];
    });
  },

  computed: {
    getResponse6710() {
      this.response6Array = [];
      this.response7Array = [];
      this.response10Array = [];
      this.responsePossibility6Array = [];
      this.responsePossibility7Array = [];
      this.responsePossibility10Array = [];
      this.countStat6Array = [];
      this.countStat7Array = [];
      this.countStat10Array = [];
      for (const response of this.responseSurvey) {
        const response_id_question = response.question_id;
        for (const question of this.questionSurvey) {
          if (question.id == 6 && question.id == response_id_question) {
            this.responsePossibility6Array = [];
            this.responsePossibility6Array = question.response_possibility;
            this.response6Array.push(response.response);
          } else if (question.id == 7 && question.id == response_id_question) {
            this.responsePossibility7Array = [];
            this.responsePossibility7Array = question.response_possibility;
            this.response7Array.push(response.response);
          } else if (question.id == 10 && question.id == response_id_question) {
            this.responsePossibility10Array = [];
            this.responsePossibility10Array = question.response_possibility;
            this.response10Array.push(response.response);
          }
        }
      }
      this.countStat10Array = [];
      this.responsePossibility6Array.forEach((responses6) => {
        this.countStat6 = 0;
        this.response6Array.forEach((element6) => {
          if (element6 == responses6) this.countStat6++;
        });
        this.countStat6Array.push(this.countStat6);
      });
      this.responsePossibility7Array.forEach((responses7) => {
        this.countStat7 = 0;
        this.response7Array.forEach((element7) => {
          if (element7 == responses7) this.countStat7++;
        });
        this.countStat7Array.push(this.countStat7);
      });
      this.responsePossibility10Array.forEach((responses10) => {
        this.countStat10 = 0;
        this.response10Array.forEach((element10) => {
          if (element10 == responses10) this.countStat10++;
        });
        this.countStat10Array.push(this.countStat10);
      });
      console.log(this.countStat6Array);

      let chartOptionsQuestion6 = {
        labels: this.responsePossibility6Array,
        responsive: [
          {
            breakpoint: 770,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      };

      let chartOptionsQuestion7 = {
        labels: this.responsePossibility7Array,
        responsive: [
          {
            breakpoint: 770,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      };

      let chartOptionsQuestion10 = {
        labels: this.responsePossibility10Array,
        responsive: [
          {
            breakpoint: 770,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      };

      return [
        this.countStat6Array,
        this.countStat7Array,
        this.countStat10Array,
        chartOptionsQuestion6,
        chartOptionsQuestion7,
        chartOptionsQuestion10,
      ];
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-3">
      <NavBar />
    </div>

    <div>
      Statistiques de la question 6
      <apexchart
        type="donut"
        :options="getResponse6710[3]"
        :series="getResponse6710[0]"
        :height="200"
        :width="550"
      ></apexchart>

      Statistiques de la question 7
      <apexchart
        type="donut"
        :options="getResponse6710[4]"
        :series="getResponse6710[1]"
        :height="200"
        :width="500"
      ></apexchart>

      Statistiques de la question 10

      <apexchart
        type="donut"
        :options="getResponse6710[5]"
        :series="getResponse6710[2]"
        :height="200"
        :width="550"
      ></apexchart>
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
  background-color: #34495e;
  color: white;
}
</style>
