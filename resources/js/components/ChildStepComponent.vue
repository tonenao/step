<template>
  <div>
    <transition name="modal">
      <div class="c-modal" v-show="modal"></div>
    </transition>

    <li v-for="(child_step,index) in child_steps" :key="child_step.index">
      <transition name="modal">
        <div
          class="c-step-child p-step-detail p-step-detail-done"
          style="position:relative;"
          v-if="!child_step.editMode && count>=index+1 && auth_challenge"
          v-on:click="changeEditMode(index)"
        >
          <span class="c-panel-badge">
            <i class="fas fa-check"></i>
          </span>
          <h3>STEP{{index+1}}</h3>
          <p>{{child_step.title}}</p>
          <button
            type="button"
            class="c-button c-button-step-child p-button-accent3"
            v-if="count===index+1 && auth_challenge"
            v-on:click.stop="removeData(child_step.id)"
          >戻す</button>
        </div>

        <div
          class="c-step-child p-step-detail"
          v-if="count<(!child_step.editMode && index+1) ||(!child_step.editMode && !auth_challenge)"
          v-on:click="changeEditMode(index)"
        >
          <h3>STEP{{index+1}}</h3>
          <p>{{child_step.title}}</p>
          <button
            type="button"
            class="c-button c-button-step-child p-button-accent2"
            v-if="count===index && auth_challenge"
            v-on:click.stop="createData(child_step.id)"
          >Clear</button>
        </div>
        <!-- </transition>

        <transition name="modal">-->
        <div
          class="c-step-child p-step-detail isModal"
          v-if="child_step.editMode"
          v-on:click="changeEditMode(index)"
        >
          <h3 style="color:#555;">STEP{{index+1}}</h3>
          <h4>タイトル</h4>
          <p class="detail">{{child_step.title}}</p>
          <h4>説明文</h4>
          <p class="detail">{{child_step.description}}</p>
          <div style="height:50px;"></div>
        </div>
      </transition>
    </li>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  props: {
    id: { type: Number, default: "" },
    count_do_child: { type: Number, default: "" },
    count_child: { type: Number, default: "" },
    auth_challenge: { type: Number, default: "" }
  },
  mounted: function() {
    console.log("ChildStepコンポーネント");
    this.getData();
  },

  data: function() {
    return {
      count: this.count_do_child,
      child_steps: [],
      modal: false,
      add_modal: true
    };
  },

  methods: {
    getData() {
      axios.get("/step/json/" + this.id).then(response => {
        this.child_steps = response.data;
      });
    },
    createData($child_step_id) {
      axios
        .post("/step/do_child/", { child_step_id: $child_step_id })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      this.count++;
      // this.$emit("click-inc-count", this.status_flg);
      this.$emit("click-inc-count");
    },
    removeData($child_step_id) {
      axios
        .delete("/step/do_child/", { data: { child_step_id: $child_step_id } })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      this.count--;
      // this.$emit("click-dec-count", this.status_flg);
      this.$emit("click-dec-count");
    },
    //子STEP編集モードの切り替え
    changeEditMode: function(index) {
      this.modal = !this.modal;
      if (!this.child_steps[index].hasOwnProperty("editMode")) {
        this.child_steps[index].editMode = true;
      } else {
        this.child_steps[index].editMode = !this.child_steps[index].editMode;
      }
    }
  }
};
</script>
