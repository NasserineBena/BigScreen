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
      // countStat11Array: [],
      // countStat12Array: [],
      // countStat13Array: [],
      // countStat14Array: [],
      // countStat15Array: [],
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
        title: {
          text: "Statistiques sur la questions 6",
        },
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
        title: {
          text: "Statistiques sur la questions 7",
        },
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
        title: {
          text: "Statistiques sur la questions 10",
        },
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

    // function te get
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
      // this.countStat11Array = [];
      // this.countStat12Array = [];
      // this.countStat13Array = [];
      // this.countStat14Array = [];
      // this.countStat15Array = [];
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

      // for (let i = 1; i < 6; i++) {
      //   this.countStat11 = 0;
      //   this.response11Array.forEach((element11) => {
      //     if (element11 == i) this.countStat11++;
      //   });
      //   this.countStat11Array.push(this.countStat12);
      // }
      // for (let i = 1; i < 6; i++) {
      //   this.countStat12 = 0;
      //   this.response12Array.forEach((element12) => {
      //     if (element12 == i) this.countStat12++;
      //   });
      //   this.countStat12Array.push(this.countStat12);
      // }

      // for (let i = 1; i < 6; i++) {
      //   this.countStat13 = 0;
      //   this.response13Array.forEach((element13) => {
      //     if (element13 == i) this.countStat13++;
      //   });
      //   this.countStat13Array.push(this.countStat13);
      // }
      // for (let i = 1; i < 6; i++) {
      //   this.countStat14 = 0;
      //   this.response14Array.forEach((element14) => {
      //     if (element14 == i) this.countStat14++;
      //   });
      //   this.countStat14Array.push(this.countStat14);
      // }
      // for (let i = 1; i < 6; i++) {
      //   this.countStat15 = 0;
      //   this.response15Array.forEach((element15) => {
      //     if (element15 == i) this.countStat15++;
      //   });
      //   this.countStat15Array.push(this.countStat15);
      // }

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

      // let series = [
      //   {
      //     name: "Question 11",
      //     data: this.countStat11Array,
      //   },
      //   {
      //     name: "Question 12",
      //     data: this.countStat12Array,
      //   },
      //   {
      //     name: "Question 13",
      //     data: this.countStat13Array,
      //   },
      //   {
      //     name: "Question 14",
      //     data: this.countStat14Array,
      //   },
      //   {
      //     name: "Question 15",
      //     data: this.countStat15Array,
      //   },
      // ];
      let chartOptions = {
        chart: {
          type: "radar",
        },
        title: {
          text: "Statistiques sur les questions 11, 12, 13, 14, 15",
        },
        xaxis: {
          categories: [
            "Question 1",
            "Question 2",
            "Question 3",
            "Question 4",
            "Question 5",
          ],
          // categories: [
          //   1,
          //   2,
          //   3,
          //   4,
          //   5,
          // ],
        },
      };

      return [chartOptions, series];
    },
  },
};
</script>

<template>
  <div class="row">
    <div class="col-3">
      <NavBar />
    </div>

    <div class="col-9 position">
      <div class="">
        <apexchart
          type="donut"
          :options="getResponse6710[3]"
          :series="getResponse6710[0]"
          :height="200"
          :width="550"
        ></apexchart>

        <apexchart
          type="donut"
          :options="getResponse6710[4]"
          :series="getResponse6710[1]"
          :height="200"
          :width="500"
        ></apexchart>

        <apexchart
          type="donut"
          :options="getResponse6710[5]"
          :series="getResponse6710[2]"
          :height="200"
          :width="550"
        ></apexchart>

        <apexchart
          type="radar"
          height="500"
          :options="getResultsQuality[0]"
          :series="getResultsQuality[1]"
        ></apexchart>
      </div>
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
  height: 93vh;
}

.position {
  overflow: auto;
  height: 80vh;
}
.pos-overflow {
  overflow: hidden;
  height: 70vh;
}
</style>
