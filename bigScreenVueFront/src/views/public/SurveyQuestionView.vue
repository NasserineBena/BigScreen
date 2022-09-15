<script>

import axios from "axios";
// import AddAndEditCurrency from "@/components/AddAndEditCurrency.vue";
// import AddAndEditPair from "@/components/AddAndEditPair.vue";
;
export default {
    data() {
        return {
            surveyQuestions: "",
        };
    },
    methods: {
        getSurveyQuestions() {
        axios.get('http://127.0.0.1:8000/api/question').then((data) => {
            this.surveyQuestions = data["data"];
        });
        },
    },
    created() {
        this.getStatusConnexion();
    },
},
</script>


<template>
<p></p>
</template>