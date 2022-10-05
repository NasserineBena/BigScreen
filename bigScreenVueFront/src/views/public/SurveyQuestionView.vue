<script>
import axios from "axios";
import { RouterLink, RouterView } from "vue-router";
import Message from "../../components/public/Message.vue";

export default {
    data() {
        return {
            responseTypeC: ["1", "2", "3", "4", "5"],
            surveyQuestions:[],
            surveyResponse: {},
            urlAPi: import.meta.env.VITE_URL_API,
            message: false,
            token:"WkWnsmkd2gwBDiLXv5rP",
        };
    },
    components: { Message },
    methods: {
    //function to get all questions
        getSurveyQuestions() {
            axios.get(this.urlAPi+'question').then((data) => {
                this.surveyQuestions = data["data"];
                this.surveyQuestions.forEach(element => {
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
        validate(){
            axios
            .post(this.urlAPi+"surveyUser", {
                request: JSON.stringify(this.surveyResponse),
            })
            .then((data) => {
                console.log(data);
                const id_user= data.data.id;
                const token_user= data.data.token;
                
                for(const element of this.surveyQuestions ) {
                    axios
                    .post(this.urlAPi+"survey", {
                    question_id: element.id,
                    survey_user_id : id_user,
                    response: this.surveyResponse[element.id],
                    }).then((data) => {
                        console.log(data.data);
                    })
                }
                this.message= true;
                this.token = token_user;
            })
            .catch((e) => {    
                alert(e);
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
    <div class="body" v-if="message==false">
        <div class="mt-5 mx-2">
            <div v-for="question in surveyQuestions" v-bind:value="question.id" class="border border-white my-5 p-4 rounded">
                <h4 class="text-color mb-2">Question {{question.id}} / {{surveyQuestions.length}}</h4>
                <h5 class="text-color mb-4">{{question.question}}</h5>
                <div v-if="question.type==='A'">
                    <div class="d-flex flex-wrap">
                        <div v-for="item in question.response_possibility" class="d-flex text-color mr-5 reponse"  >
                            <input class="text-color mr-1" type="radio" v-bind:value="item" v-model="surveyResponse[question.id]">{{item}}
                        </div>
                    </div>
                </div>
                <div v-if="question.type==='B'">
                    <textarea class="form-control text-color rounded-" maxlength="250" rows="7" v-model="surveyResponse[question.id]"></textarea>
                </div>
                <div v-if="question.type==='C'">
                    <div class="d-flex">
                        <div v-for="item in responseTypeC" class="text-color mr-5 reponse"  >
                            <input  class="text-color mr-1" type="radio" v-bind:value="item" v-model="surveyResponse[question.id]"> {{item}}
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="my-5 text-center">
                <button v-on:click.prevent="validate" class="bg-white p-3 rounded text-color">Valider</button>
            </div>
        </div>
    </div>
    <div class="popupMain" v-if="message==true">
        <div class="popup">
            <Message
            :token="token"/>
        </div>
    </div>
    
    
</template>

<style scoped>

.checkbox{
    margin-right: 30px;
}
.responseCheckbox{
    display:flex;
}
.body{  
    
    display:flex;
    justify-content: center;
    background-color: #EFF1F9;
   
}
.text-color{
    color: #34495e;
}
textarea{
    background-color: white;
    width: 100%;
    border:dotted 3px #34495e;
}
.reponse{
    font-size: 18px;
}
.popupMain{
    position: fixed;
    background-color: #E6E9F3;
    height: 100% !important;
    width: 100%;
}
.popup{
    background-color:white;
    width: 90%;
    position: fixed;
    left: 50%;
    top: 50%;
    margin: auto;
    transform: translate(-50%,-50%);
    white-space:wrap;
    text-overflow: "-";
}
</style>