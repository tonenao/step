<template>
  <div>
    <li v-for="step in steps" :key="step.id">
      <div class="c-panel p-panel-step p-panel-step-mystep">
        <a v-bind:href="'/step/'+step.id">
          <h3 class="c-panel-title">{{step.title}}</h3>
          <span class="c-category">{{step.category.category}}</span>
          <div class="c-panel-bar p-panel-bar-mystep">
            <span class="c-panel-bar-info">Challenging!!</span>
            <span class="c-panel-bar-val-sm">人</span>
            <span class="c-panel-bar-val">{{step.count_challenge}}</span>
          </div>
          <div class="c-panel-bar p-panel-bar-mystep">
            <span class="c-panel-bar-info">Done!!</span>
            <span class="c-panel-bar-val-sm">人</span>
            <span class="c-panel-bar-val">{{step.count_done}}</span>
          </div>
        </a>
      </div>
    </li>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  mounted: function() {
    console.log("MyStepコンポーネント");
    axios.get("/mystep/json").then(response => {
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
