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
      message: false,
      token: "WkWnsmkd2gwBDiLXv5rP",
    };
  },
  components: { Message },
  methods: {
    //function to get all questions
    getSurveyQuestions() {
      axios.get(this.urlAPi + "question").then((data) => {
        this.surveyQuestions = data["data"];
        this.surveyQuestions.forEach((element) => {
          this.surveyResponse[element.id] = "";
        });
      });
    },
    // checkValidate(){
    //     for(const element of this.surveyQuestions ) {
    //         if(this.surveyResponse[element.id]==''){
    //             window.alert("Tous les champs doivent être remplis")
    //             return false;
    //         }
    //     }
    //     return true;
    // },
    //function to create new userSurvey and save the response to database
    validate() {
      axios
        .post(this.urlAPi + "surveyUser", {
          request: JSON.stringify(this.surveyResponse),
        })
        .then((data) => {
          console.log(data);
          const id_user = data.data.id;
          const token_user = data.data.token;

          for (const element of this.surveyQuestions) {
            axios
              .post(this.urlAPi + "survey", {
                question_id: element.id,
                survey_user_id: id_user,
                response: this.surveyResponse[element.id],
              })
              .then((data) => {
                console.log(data.data);
              });
          }
          this.message = true;
          this.token = token_user;
        })
        .catch((e) => {
          alert(e.response.data.message);
          console.log(e);
        });
    },
  },

  created() {
    this.getSurveyQuestions();
  },
};
</script>
<template>
  <div class="body" v-if="message == false">
    <div class="mt-5 mx-2">
      <div
        v-for="question in surveyQuestions"
        v-bind:value="question.id"
        class="border border-white my-5 p-4 rounded bg-customized text-white"
      >
        <h4 class="text-color mb-4 text-center">
          Question {{ question.id }} / {{ surveyQuestions.length }}
        </h4>
        <h5 class="text-color mb-4">{{ question.question }}</h5>
        <div v-if="question.type === 'A'">
          <div
            class="d-flex flex-wrap border border-white rounded-3 p-4 check-customized"
          >
            <div
              v-for="item in question.response_possibility"
              class="d-flex me-5 reponse"
            >
              <input
                class="me-1"
                type="radio"
                v-bind:value="item"
                v-model="surveyResponse[question.id]"
              />{{ item }}
            </div>
          </div>
        </div>
        <div v-if="question.type === 'B'">
          <textarea
            class="form-control rounded-3"
            maxlength="250"
            rows="7"
            v-model="surveyResponse[question.id]"
          ></textarea>
        </div>
        <div v-if="question.type === 'C'">
          <div
            class="d-flex border border-white rounded-3 p-4 check-customized"
          >
            <div v-for="item in responseTypeC" class="me-5 reponse">
              <input
                class="text-color me-1"
                type="radio"
                v-bind:value="item"
                v-model="surveyResponse[question.id]"
              />
              {{ item }}
            </div>
          </div>
        </div>
      </div>
      <div class="my-5 text-center">
        <button
          v-on:click.prevent="validate"
          class="btn btn-lg btn-customized p-3 rounded-3 text-black"
        >
          Valider
        </button>
      </div>
    </div>
  </div>

  <div class="popupMain" v-if="message == true">
    <div class="popup">
      <Message :token="token" />
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
  background-color: #eff1f9;
}
.text-color {
  color: white;
}
textarea {
  background-color: #eff1f9;
  width: 100%;
}

.reponse {
  font-size: 18px;
}
.popupMain {
  position: fixed;
  background-color: #e6e9f3;
  height: 100% !important;
  width: 100%;
}
.popup {
  background-color: white;
  width: 90%;
  position: fixed;
  left: 50%;
  top: 50%;
  margin: auto;
  transform: translate(-50%, -50%);
  white-space: wrap;
  text-overflow: "-";
}
.bg-customized {
  background-color: #34495e !important;
}

.check-customized {
  background-color: #eff1f9;
  color: #34495e !important;
}
.btn-customized {
  background-color: #eff1f9;
  color: #34495e !important;
  border: 1px solid #34495e;
}
.btn-customized:hover {
  background-color: #34495e;
  color: #eff1f9 !important;
}
</style>
