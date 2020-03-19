<template>
  <div style="width:100%">
    <progress-bar-component
      :count_child="this.count_child"
      :count_do_child="this.count_do_child"
      v-show="challenging"
    ></progress-bar-component>

    <div class="p-description">
      <p>{{step.description}}</p>
    </div>
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

    <div class="c-form-group">
      <div class>
        <child-step-component
          :id="this.id"
          :count_do_child="this.count_do_child"
          :count_child="this.count_child"
          :auth_challenge="this.challenging"
          v-on:click-inc-count="inc_count"
          v-on:click-dec-count="dec_count"
        ></child-step-component>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  props: {
    step: {
      type: Object,
      default: []
    },
    id: {
      type: Number,
      default: ""
    },
    // do_step_id: {
    //   type: Number,
    //   default: ""
    // },
    do_steps: {
      type: Object,
      default: []
    }
  },
  data: function() {
    return {
      count_child: this.step.count_child_steps,
      count_do_child: this.step.count_do_child_steps,
      challenging: this.step.auth_user_challenge,
      status_flg: ""
    };
  },
  methods: {
    inc_count: function() {
      this.count_do_child++;
      this.status_flg = "inc";
    },
    dec_count: function() {
      this.count_do_child--;
      this.status_flg = "dec";
    },
    change_done() {
      axios
        .post("/do_step/")
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    change_challenge() {
      axios
        .post("/do_step/")
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>
