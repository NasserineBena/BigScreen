<script setup>
import NavBar from "../../components/admin/NavBar.vue";
</script>

<template>
  <div class="row">
    <div class="col-3">
      <NavBar />
    </div>
    <div class="col-9">Graphes</div>
  </div>
</template>

<style scoped>
.row {
  display: flex;
  margin: 0px;
  padding: 0px;
}
.col-3 {
  width: 20%;
  background-color: #d0e2f3;
  padding-top: 100px;
  height: 84vh;
}
</style>
