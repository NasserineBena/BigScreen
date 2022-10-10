<script>
import axios from "axios";
import { RouterLink, RouterView, useRouter } from "vue-router";

export default {
  data() {
    return {
      urlAPi: import.meta.env.VITE_URL_API,
      surveyQuestions: [],
      surveyResponse: [],
    };
  },
  computed: {
    // function to get the path of router
    currentRouteName() {
      return this.$route.path;
    },
  },
  methods: {
    // function to get all response of a surveyUser
    getResponse() {
      const token = this.currentRouteName.split("/")[2];
      axios.get(this.urlAPi + "question").then((data) => {
        this.surveyQuestions = data.data;
      });
      axios.get(this.urlAPi + `surveyUser/` + `${token}`).then((data) => {
        axios.get(this.urlAPi + `survey/` + `${data.data.id}`).then((data) => {
          this.surveyResponse = data.data;
          for (const element of this.surveyResponse) {
            element.question_id =
              this.surveyQuestions[element.question_id - 1].question;
          }
        });
      });
    },
    setData() {
      this.getResponse();
    },
  },
  created() {
    this.setData();
  },
};
</script>

<template>
  <div class="body">
    <div>
      <div
        v-for="reponse in surveyResponse"
        class="my-5 border rounded-3 p-4 bg-customized"
      >
        <h6 class="text-white pb-3">{{ reponse.question_id }}</h6>
        <div class="p-2 border rounded-3 check-customized">
          <p class="m-0">{{ reponse.response }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.body {
  display: flex;
  justify-content: center;
  background-color: #eff1f9;
  width: 100%;
}

.bg-customized {
  background-color: #34495e !important;
}

.check-customized {
  background-color: #eff1f9;
  color: #34495e !important;
}
</style>
