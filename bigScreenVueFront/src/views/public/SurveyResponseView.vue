
<script>
import axios from "axios";
import { RouterLink, RouterView, useRouter } from "vue-router";

export default {
    data() {
        return {
            urlAPi: import.meta.env.VITE_URL_API,
            surveyQuestions: [],
            surveyResponse:[],

        };
    },
    computed: {
        currentRouteName() {
            return this.$route.path;
        }
    },
    methods: {
        getResponse(){
            const token = this.currentRouteName.split("/")[2];
            axios.get(this.urlAPi+'question').then((data) => {
                this.surveyQuestions = data.data;
            });
            axios.get(this.urlAPi+`surveyUser/`+`${token}`).then((data) => {
                axios.get(this.urlAPi+`survey/`+`${data.data.id}`).then((data)=>{
                    this.surveyResponse= data.data;
                    for(const element of this.surveyResponse) {
                        element.question_id = this.surveyQuestions[element.question_id-1].question
                        
                    }
                })
            });
        },
        setData(){
            this.getResponse();
        }
    },
    created() {
        this.setData()
    },

    
}
</script>

<template>
    <div class="body">
        <div>
            <div v-for="reponse in surveyResponse">
                <p class="titleQuestion">{{reponse.question_id}}</p>
                <p>{{reponse.response}}</p>
            </div>
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
</style>