<template>
  <div class="container">
    <div class="title">bigscreen</div>
    <div class="content">
      <div class="padding"><a href="/admin/accueil"> Accueil</a></div>
      <div class="padding">
        <a href="/admin/questionnaire">Questionnaire</a>
      </div>
      <div class="padding"><a href="/admin/reponses">Réponses</a></div>
    </div>
  </div>
</template>

<style scoped>
.container {
  width: fit-content;
  margin: 0 auto;
}
.title {
  color: white;
  font-size: 24px;
}
a {
  text-decoration: none;
  cursor: pointer;
  color: white;
  font-size: 20px;
}
.padding {
  padding-top: 20px;
}
</style>
