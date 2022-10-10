<script>
import axios from "axios";
export default {
  name: "Message",
  props: {
    token: String,
  },
  data() {
    return {
      urlAPi: import.meta.env.VITE_URL_API,
    };
  },
  computed: {
    // function to get the href of router
    currentRouteName() {
      return window.location.href;
    },
  },
};
</script>

<template>
  <div class="border p-5 rounded-5 popup">
    <p>
      Toute l’équipe de Bigscreen vous remercie pour votre engagement. Si vous
      désirez consulter vos réponse.
      <br />
      Cliquez sur ce lien :
      <a target="_blank" :href="`/surveyResponse/${token}`"
        >http://{{ currentRouteName.split("/")[2] }}/surveyResponse/{{
          token
        }}</a
      >
    </p>
    <p class="text-danger mt-4">
      <i class="bi bi-exclamation-triangle"></i>Assurez-vous de bien copier ce
      lien car vous ne pourrez pas accéder à vos reponses autrement !
    </p>
  </div>
</template>

<style scoped>
.popup {
  color: #34495e;
  word-wrap: break-word;
  font-size: 20px;
  display: block;
  margin: 0px auto;
}
.redAttention {
  color: red;
}
</style>
