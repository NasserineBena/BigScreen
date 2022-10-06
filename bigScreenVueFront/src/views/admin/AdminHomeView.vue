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

      //arrays to stock all responses to every question from 6 to 15
      response6Array: [],
      response7Array: [],
      response10Array: [],
      response11Array: [],
      response12Array: [],
      response13Array: [],
      response14Array: [],
      response15Array: [],

      //arrays to stock responses possibilities to every question from 6 to 15
      responsePossibility6Array: [],
      responsePossibility7Array: [],
      responsePossibility10Array: [],
      responsePossibility11Array: [],
      responsePossibility12Array: [],
      responsePossibility13Array: [],
      responsePossibility14Array: [],
      responsePossibility15Array: [],

      //counters
      countStat6: 0,
      countStat7: 0,
      countStat10: 0,
      countStat11: 0,
      countStat12: 0,
      countStat13: 0,
      countStat14: 0,
      countStat15: 0,

      //arrays to stock responses possibilities counts to every question from 6 to 15
      countStat6Array: [],
      countStat7Array: [],
      countStat10Array: [],
    };
  },

  mounted() {
    //API requests
    // Get all the questions (id, name, response possibilities & type)
    axios.get(this.urlQuestionSurvey).then((data) => {
      this.questionSurvey = data["data"];
    });
    // Get all the responses (id, question's id, user's id & response)
    axios.get(this.urlResponseSurvey).then((data) => {
      this.responseSurvey = data["data"];
    });
    // Get all the users (id, name, email & response)
    axios.get(this.urlUserSurvey).then((data) => {
      this.userSurvey = data["data"];
    });
  },

  computed: {
    // function to get the number of response by category and by question / chart options
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

      // Use a loop to get all responses by question id and put them in an array
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

      // iterate through each table to get the number of response by category

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

      //  initialize chart options for each question
      let chartOptionsQuestion6 = {
        labels: this.responsePossibility6Array,
        grid: {
          padding: {
            left: 0,
          },
        },
        legend: {
          offsetX: -50,
          offsetY: 50,
        },
        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
                offsetX: 0,
                offsetY: 0,
              },
            },
          },
          {
            breakpoint: 768,
            options: {
              chart: {
                width: 300,
              },
            },
          },
        ],
      };

      let chartOptionsQuestion7 = {
        labels: this.responsePossibility7Array,
        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
                offsetX: -50,
                offsetY: 0,
              },
            },
          },
          {
            breakpoint: 768,
            options: {
              chart: {
                width: 300,
              },
            },
          },
        ],

        legend: {
          offsetX: -20,
          offsetY: 50,
        },
      };

      let chartOptionsQuestion10 = {
        labels: this.responsePossibility10Array,
        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 500,
              },
              legend: {
                position: "bottom",
                offsetX: -50,
                offsetY: 0,
              },
            },
          },
          {
            breakpoint: 768,
            options: {
              chart: {
                width: 300,
              },
            },
          },
        ],

        legend: {
          offsetX: -40,
          offsetY: 50,
        },
      };

      // return a table to get every argument in the tenmplate
      return [
        this.countStat6Array,
        this.countStat7Array,
        this.countStat10Array,
        chartOptionsQuestion6,
        chartOptionsQuestion7,
        chartOptionsQuestion10,
      ];
    },

    // function te get the averages of responses to question 11, 12, 13, 14 & 15
    getResultsQuality() {
      this.response11Array = [];
      this.response12Array = [];
      this.response13Array = [];
      this.response14Array = [];
      this.response15Array = [];
      this.responsePossibility11Array = [];
      this.responsePossibility12Array = [];
      this.responsePossibility13Array = [];
      this.responsePossibility14Array = [];
      this.responsePossibility15Array = [];
      let avg11 = 0.0;
      let avg12 = 0.0;
      let avg13 = 0.0;
      let avg14 = 0.0;
      let avg15 = 0.0;

      let sum11 = 0;
      let sum12 = 0;
      let sum13 = 0;
      let sum14 = 0;
      let sum15 = 0;

      for (const response of this.responseSurvey) {
        const response_id_question = response.question_id;
        for (const question of this.questionSurvey) {
          if (question.id == 11 && question.id == response_id_question) {
            this.response11Array.push(response.response);
          } else if (question.id == 12 && question.id == response_id_question) {
            this.response12Array.push(response.response);
          } else if (question.id == 13 && question.id == response_id_question) {
            this.response13Array.push(response.response);
          } else if (question.id == 14 && question.id == response_id_question) {
            this.response14Array.push(response.response);
          } else if (question.id == 15 && question.id == response_id_question) {
            this.response15Array.push(response.response);
          }
        }
      }

      // iterate through each table to get the average for each question
      this.response11Array.forEach((element11) => {
        this.countStat11++;
        sum11 = sum11 + parseInt(element11);
      });
      avg11 = sum11 / this.countStat11;

      this.response12Array.forEach((element12) => {
        this.countStat12++;
        sum12 = sum12 + parseInt(element12);
      });
      avg12 = sum12 / this.countStat12;

      this.response13Array.forEach((element13) => {
        this.countStat13++;
        sum13 = sum13 + parseInt(element13);
      });
      avg13 = sum13 / this.countStat13;

      this.response14Array.forEach((element14) => {
        this.countStat14++;
        sum14 = sum14 + parseInt(element14);
      });
      avg14 = sum14 / this.countStat14;

      this.response15Array.forEach((element15) => {
        this.countStat15++;
        sum15 = sum15 + parseInt(element15);
      });
      avg15 = sum15 / this.countStat15;

      // put all the averages in the table data
      let series = [
        {
          name: "Moyennes",
          data: [avg11, avg12, avg13, avg14, avg15],
        },
      ];

      let chartOptions = {
        chart: {
          type: "radar",
        },
        responsive: [
          {
            breakpoint: 991,
            options: {
              chart: {
                width: 500,
              },
            },
          },
          {
            breakpoint: 768,
            options: {
              chart: {
                width: 300,
              },
            },
          },
        ],
        xaxis: {
          categories: [
            "Question 11",
            "Question 12",
            "Question 13",
            "Question 14",
            "Question 15",
          ],
          labels: {
            style: {
              colors: ["#34495e"],
              fontSize: "13px",
              fontFamily: "Arial",
            },
          },
        },
        markers: {
          colors: ["#34495e"],
        },
      };

      return [chartOptions, series];
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-lg-3 col-12 nav-style pb-lg-0 pb-4 mb-lg-0 mb-4">
      <NavBar />
    </div>

    <div class="col-lg-9 col-12 position">
      <div class="pt-lg-5 pb-lg-5">
        <div class="row">
          <div
            class="col-lg-5 col-md-7 col-sm-10 col-12 border border-color rounded-3 py-2 my-4 mx-lg-4 mx-auto w-auto"
          >
            <p class="text-center">Statistiques sur la questions 6</p>
            <apexchart
              type="donut"
              :options="getResponse6710[3]"
              :series="getResponse6710[0]"
              :height="400"
              :width="450"
            ></apexchart>
          </div>
          <div
            class="col-lg-5 col-md-7 col-sm-10 col-12 border border-color rounded-3 py-2 my-4 mx-lg-4 mx-auto w-auto"
          >
            <p class="text-center">Statistiques sur la questions 7</p>
            <apexchart
              type="donut"
              :options="getResponse6710[4]"
              :series="getResponse6710[1]"
              :height="350"
              :width="450"
            ></apexchart>
          </div>
        </div>
        <div class="row">
          <div
            class="col-lg-5 col-md-7 col-sm-10 col-12 border border-color rounded-3 m-3 py-2 my-4 mx-lg-4 mx-auto w-auto"
          >
            <p class="text-center">Statistiques sur la questions 10</p>
            <apexchart
              type="donut"
              :options="getResponse6710[5]"
              :series="getResponse6710[2]"
              :height="400"
              :width="450"
            ></apexchart>
          </div>
          <div
            class="col-lg-5 col-md-7 col-sm-10 col-12 border border-color rounded-3 py-2 my-4 mx-lg-4 mx-auto w-auto"
          >
            <p class="text-center">
              Statistiques des question 11, 12, 13, 14 et 15
            </p>
            <apexchart
              type="radar"
              :height="400"
              :width="450"
              :options="getResultsQuality[0]"
              :series="getResultsQuality[1]"
            ></apexchart>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.row {
  margin: 0px;
  padding: 0px;
}
.nav-style {
  background-color: #34495e;
  height: 100vh;
}

.position {
  overflow: scroll !important;
  height: 95vh;
}

.vue-apexcharts {
  margin: 0px !important;
  padding: 0px !important;
}

@media only screen and (max-width: 991px) {
  .nav-style {
    height: auto;
    position: sticky;
  }
  .position {
    height: 70vh;
  }
}
</style>
