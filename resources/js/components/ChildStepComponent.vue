<template>
  <div>
    <li v-for="(child_step,index) in child_steps" :key="child_step.index">
      <div
        class="c-step-child p-step-detail p-step-detail-done"
        style="position:relative;"
        v-if="count>=index+1"
      >
        <span class="c-panel-badge">
          <i class="fas fa-check"></i>
        </span>
        <h3>STEP{{index+1}}</h3>
        <p>{{child_step.title}}</p>
        <button
          type="button"
          class="c-button c-button-step-child p-button-accent3"
          v-if="count===index+1"
        >戻す</button>
      </div>

      <div class="c-step-child p-step-detail" v-if="count<index+1">
        <h3>STEP{{index+1}}</h3>
        <p>{{child_step.title}}</p>
        <button
          type="button"
          class="c-button c-button-step-child p-button-accent2"
          v-if="count===index"
          v-on:click="createDate(child_step.id)"
        >Clear</button>
      </div>
    </li>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  props: ["id", "count_do_child"],
  mounted: function() {
    console.log("ChildStepコンポーネント");
    console.log(this.id);
    this.getDate();
  },

  data: function() {
    return {
      count: this.count_do_child,
      child_steps: []
    };
  },

  methods: {
    getDate() {
      axios.get("/step/json/" + this.id).then(response => {
        this.child_steps = response.data;
      });
    },
    createDate($child_step_id) {
      axios
        .post("/step/do_child/", { child_step_id: $child_step_id })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      this.count++;
    }
  }
};
</script>
