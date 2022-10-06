<script>
import NavBar from "../../components/admin/NavBar.vue";
import axios from "axios";
export default {
  components: {
    NavBar,
  },
  data() {
    return {
      urlQuestionSurvey: "http://127.0.0.1:8000/api/question",
      questionSurvey: [],
    };
  },
  created() {
    // Get all the questions (id, name, response possibilities & type)
    axios.get(this.urlQuestionSurvey).then((data) => {
      console.log(data);
      this.questionSurvey = data["data"];
      console.log(this.questionSurvey);
    });
  },
};
</script>

<template>
  <div class="row">
    <div class="col-lg-3 col-12 nav-style pb-lg-0 pb-4 mb-lg-0 mb-4">
      <NavBar />
    </div>
    <div class="col-lg-9 col-12 position">
      <table id="customers">
        <tr class="row">
          <th class="col-3">Numéro</th>
          <th class="col-8">Question</th>
          <th class="col-1">Type</th>
        </tr>
        <div class="pos-overflow w-100">
          <tbody v-for="item in questionSurvey" class="w-100">
            <tr class="w-100">
              <td class="col-3">{{ item.id }}</td>
              <td class="col-8">{{ item.question }}</td>
              <td class="col-1">{{ item.type }}</td>
            </tr>
          </tbody>
        </div>
      </table>
    </div>
  </div>
</template>

<style scoped>
.row {
  margin: 0px;
  padding: 0px;
}
.nav-style {
  background-color: #34495e;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers td,
#customers th {
  border: 1px solid #ddd;
  padding: 8px;
}
#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}
#customers tr:hover {
  background-color: #ddd;
}
#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #34495e;
  color: white;
}

.position {
  overflow: hidden;
  height: 100vh;
}
.pos-overflow {
  overflow: scroll;
  height: 92vh;
}
</style>
