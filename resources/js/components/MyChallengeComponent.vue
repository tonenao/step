<template>
  <div>
    <li v-for="step in steps" :key="step.id">
      <div class="p-panel p-panel__step" v-bind:class="{'p-panel__step--done':step.check_done}">
        <a class="p-panel__link" v-bind:href="'/step/'+step.id">
          <span class="p-panel__badge" v-if="step.check_done">
            <i class="fas fa-check"></i>
          </span>
          <h3 class="p-panel__title">{{ step.title }}</h3>
          <span class="c-category">{{ step.category.category }}</span>
          <span class="p-panel__name">{{ step.name }}</span>

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
