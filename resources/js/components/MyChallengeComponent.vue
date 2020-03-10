<template>
  <div>
    <li v-for="step in steps" :key="step.id">
      <div class="c-panel p-panel-step">
        <a href="#">
          <h3 class="c-panel-title">{{ step.title }}</h3>
          <span class="c-category">{{ step.category.category }}</span>
          <span class="c-panel-name">{{ step.name }}</span>

          <progress-bar-component
            :count_child="step.count_child_steps"
            :count_do_child="step.count_do_child_steps"
          ></progress-bar-component>
        </a>
      </div>
    </li>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  mounted: function() {
    console.log("MyChallengeコンポーネント");
    axios.get("/mychallenge/json").then(response => {
      this.steps = response.data;
    });
  },

  data: function() {
    return {
      steps: []
    };
  }
};
</script>
