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
<template >
    <div class="body" v-if="message==false">
        <div>
            <div v-for="question in surveyQuestions" v-bind:value="question.id">
                <p class="titleQuestion">{{question.question}}</p>
                <div v-if="question.type==='A'">
                     <!-- <select v-model="surveyResponse[question.id]">
                        <option v-for="item in question.response_possibility">
                            {{ item }}
                        </option>
                     </select> -->
                     <div class="d-flex flex-wrap">
                        <div v-for="item in question.response_possibility" class="d-flex mr-5"  >
                            <input class="mr-1" type="radio" v-bind:value="item" v-model="surveyResponse[question.id]">{{item}}
                        </div>
                     </div>
                </div>
                <div v-if="question.type==='B'">
                    <textarea maxlength="250" rows="7" v-model="surveyResponse[question.id]"></textarea>
                </div>
                <div v-if="question.type==='C'">
                    <!-- <select v-model="surveyResponse[question.id]">
                        <option v-for="item in responseTypeC">
                            {{ item }}
                        </option>
                     </select> -->
                     <div class="d-flex">
                        <div v-for="item in responseTypeC" class=" mr-5"  >
                            <input class="mr-1" type="radio" v-bind:value="item" v-model="surveyResponse[question.id]">{{item}}
                        </div>
                     </div>
                    
                </div>
            </div>
            <div>
                <button v-on:click.prevent="validate">Valider</button>
            </div>
        </div>
    </div>
    <div class="popup" v-if="message==true">
        <div >
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
    margin-top: 45px;

}
textarea{
    width: 100%;
    border:dotted 2px black;
}
.titleQuestion{
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 20px;
    font-weight:bold;
}
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