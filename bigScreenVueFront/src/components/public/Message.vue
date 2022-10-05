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
    currentRouteName() {
      return window.location.href;
    },
  },
};
</script>

<template>
  <div class="popup">
    <i>
      Toute l’équipe de Bigscreen vous remercie pour votre engagement. Si vous
      désirez consulter vos réponse , cliquez sur ce lien :
      <a target="_blank" :href="`/surveyResponse/${token}`"
        >http://{{ currentRouteName.split("/")[2] }}/surveyResponse/{{
          token
        }}</a
      >
    </i>
    <p class="redAttention">
      Assurez-vous de bien copier ce lien car vous ne pouvez pas accéder à vos
      reponses autrement !
    </p>
  </div>
</template>

<style scoped>
.popup {
  color: #34495e;
  word-wrap: break-word;
  font-size: 20px;
  border: 1px solid black;
  padding: 20px;
  display: block;
  margin: 0px auto;
}
.redAttention {
  color: red;
}
.button {
  display: flex;
  justify-content: center;
}
</style>
