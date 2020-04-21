<template>
  <div>
    <li v-for="step in steps" :key="step.id">
      <div
        class="p-panel p-panel__step"
        v-bind:class="{'p-panel__step--done':step.auth_user_challenge_done}"
      >
        <a class="p-panel__link" v-bind:href="'/step/'+step.id">
          <span class="p-panel__badge" v-if="step.auth_user_challenge_done">
            <i class="fas fa-check"></i>
          </span>
          <h3 class="p-panel__title">{{step.title}}</h3>
          <span class="c-category">{{step.category.category}}</span>
          <div class="c-prof-avatar p-prof-avatar--list">
            <img
              class="p-prof-avatar__img p-prof-avatar__img--list"
              v-if="!step.user.pic"
              src="/img/no-profile-image.png"
            />
            <img
              class="p-prof-avatar__img"
              v-else
              v-bind:src="'data:image/png;base64,'+step.user.pic"
            />
          </div>
          <span class="p-panel__name">{{step.user.name}}</span>
          <div class="p-panel__bar p-panel__bar--mystep">
            <span class="p-panel__bar--info">Challenging!!</span>
            <span class="p-panel__bar--val-sm">人</span>
            <span class="p-panel__bar--val">{{step.count_challenge}}</span>
          </div>
          <div class="p-panel__bar p-panel__bar--mystep">
            <span class="p-panel__bar--info">Done!!</span>
            <span class="p-panel__bar--val-sm">人</span>
            <span class="p-panel__bar--val">{{step.count_done}}</span>
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
    });
  },

  data: function() {
    return {
      steps: []
    };
  }
};
</script>
