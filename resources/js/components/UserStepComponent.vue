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
// const axios = require("axios");
export default {
  props: {
    steps: {
      type: Array,
      default: []
    }
  }
  // mounted: function() {},

  // data: function() {
  //   return {
  //     steps: []
  //   };
  // }
};
</script>
