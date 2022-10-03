<script>
import axios from "axios";
export default {
  name: "Message",
  props: {
    token: String,
  },
  emits: ["closeMessage"],
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
  methods: {
    messageClose() {
      this.$emit("closeMessage");
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

    <div class="button">
      <button @click="messageClose()">OK</button>
    </div>
  </div>
</template>

<style scoped>
.popup {
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
