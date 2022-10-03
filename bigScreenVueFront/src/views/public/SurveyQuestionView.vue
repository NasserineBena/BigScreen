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
        getSurveyQuestions() {
            axios.get(this.urlAPi+'question').then((data) => {
                this.surveyQuestions = data["data"];
                this.surveyQuestions.forEach(element => {
                    this.surveyResponse[element.id] = "";
                });

            });
        },
        checkValidate(){
            for(const element of this.surveyQuestions ) {
                if(this.surveyResponse[element.id]==''){
                    window.alert("Il faut répondre tous les questions")
                    return false;
                }
            }
            return true;
        },
        validate(){
            console.log(this.surveyResponse);
            // if(this.checkValidate()== true){
            //     axios
            //     .post(this.urlAPi+"surveyUser", {
            //     email: this.surveyResponse[1],
            //     })
            //     .then((data) => {
            //         const id_user= data.data.id;
            //         const token_user= data.data.token
            //         console.log(data);
            //         for(const element of this.surveyQuestions ) {
            //             axios
            //             .post(this.urlAPi+"survey", {
            //             question_id: element.id,
            //             survey_user_id : id_user,
            //             response: this.surveyResponse[element.id],
            //             })
            //         }
            //         this.message= true;
            //         this.token = token_user
            //         // this.$router.push("surveyResponse/"+token_user);

            //     })
            //     .catch((e) => {
            //         alert(e);
            //     });

            // }
        },
        closeMessage(){
            this.message= false;
            this.$router.go(this.$router.currentRoute);
        }
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
            :token="token"
            @closeMessage="closeMessage"/>
        </div>
    </div>
</template>

<style scoped>
@import 'bootstrap.css'
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