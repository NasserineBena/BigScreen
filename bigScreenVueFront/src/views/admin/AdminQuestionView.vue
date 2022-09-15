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
    axios.get(this.urlQuestionSurvey).then((data) => {
      console.log(data);
      this.questionSurvey = data["data"].substr(5);
      console.log(JSON.parse(this.questionSurvey)[0]);
    });
  },
};
</script>

<template>
  <div class="row">
    <div class="col-3">
      <NavBar />
    </div>
    <div class="col-9">
      <table id="customers">
        <tr>
          <th>Numéro</th>
          <th>Question</th>
          <th>Type</th>
        </tr>
        <tbody
          v-for="item in JSON.parse(questionSurvey)"
          v-bind:value="item.id"
        >
          <tr>
            <td>{{ item.id }}</td>
            <td>{{ item.question }}</td>
            <td>{{ item.type }}</td>
          </tr>
        </tbody>
      </table>
    </div>
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
  background-color: #34495e;
  padding-top: 100px;
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
</style>
