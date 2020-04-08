<template>
  <div>
    <li v-for="step in steps" :key="step.id">
      <div
        class="c-panel p-panel-step"
        v-bind:class="{'p-panel-step-done':step.auth_user_challenge_done}"
      >
        <a v-bind:href="'/step/'+step.id">
          <span class="c-panel-badge" v-if="step.auth_user_challenge_done">
            <i class="fas fa-check"></i>
          </span>
          <h3 class="c-panel-title">{{step.title}}</h3>
          <span class="c-category">{{step.category.category}}</span>
          <div class="c-img-prof p-prof-list">
            <img v-if="step.user.pic=='no-profile-image.png'" src="/img/no-profile-image.png" />
            <img v-else v-bind:src="'storage/img/'+step.user.pic" />
          </div>
          <span class="c-panel-name">{{step.user.name}}</span>
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
    console.log("FavoriteStepコンポーネント");
    axios.get("/favorite/json").then(response => {
      this.steps = response.data;
      console.log("aaaaE");
      console.log(this.steps);
    });
  },

  data: function() {
    return {
      steps: []
    };
  }
};
</script>
