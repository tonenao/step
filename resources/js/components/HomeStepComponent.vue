<template>
  <div>
    <li v-for="step in getSteps" :key="step.id">
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
            <img v-bind:src="'/storage/img/'+step.user.pic" />
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
    <paginate
      :page-count="getPageCount"
      :page-range="3"
      :margin-pages="2"
      :click-handler="clickCallback"
      :prev-text="'«'"
      :next-text="'»'"
      :container-class="'pagination'"
      :page-class="'page-item'"
    ></paginate>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  mounted: function() {
    console.log("HomeStepコンポーネント");
    axios.get("/step/json").then(response => {
      this.steps = response.data;
    });
  },
  data: function() {
    return {
      steps: [],
      parPage: 6,
      currentPage: 1
    };
  },
  methods: {
    clickCallback: function(pageNum) {
      this.currentPage = Number(pageNum);
    }
  },
  computed: {
    getSteps: function() {
      let current = this.currentPage * this.parPage;
      let start = current - this.parPage;
      return this.steps.slice(start, current);
    },
    getPageCount: function() {
      return Math.ceil(this.steps.length / this.parPage);
    }
  }
};
</script>
