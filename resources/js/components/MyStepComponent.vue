<template>
  <div>
    <li v-for="step in getSteps" :key="step.id">
      <div class="p-panel p-panel__step p-panel__step--mystep">
        <a class="p-panel__link" v-bind:href="'/step/'+step.id+'/edit'">
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
    <paginate
      :page-count="getPageCount"
      :page-range="3"
      :margin-pages="2"
      :click-handler="clickCallback"
      :prev-text="'«'"
      :prev-class="'page-item'"
      :next-text="'»'"
      :next-class="'page-item'"
      :container-class="'p-pagination'"
      :page-class="'page-item'"
    ></paginate>
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
