<template>
  <div>
    <transition name="modal">
      <div class="c-modal" v-show="modal"></div>
    </transition>

    <li v-for="(child_step,index) in child_steps" :key="child_step.index">
      <div v-if="child_step.editMode" class="c-step-child isModal">
        <h3>STEP{{index+1}}</h3>
        <!-- <span>タイトル</span> -->
        <textarea type="text" v-model="child_step.title" style="display:inline-block;" />
        <!-- <span>説明</span> -->
        <!-- <textarea type="text" v-model="child_step.description" style="display:inline-block;" /> -->
        <button
          class="c-button c-button-step-child p-button-accent3"
          v-on:click.prevent="changeEditMode(index)"
        >登録</button>
      </div>

      <div v-else class="c-step-child">
        <h3>STEP{{index+1}}</h3>
        <p>{{child_step.title}}</p>
        <button
          class="c-button c-button-step-child p-button-accent3"
          v-on:click.prevent="changeEditMode(index)"
        >編集</button>
      </div>
    </li>

    <div class="c-step-child p-step-detail" v-bind:class="{isModal:add_modal}">
      <h3 style="color:#555;">STEP</h3>
      <p v-if="!this.add_modal"></p>
      <textarea v-else type="text" style="display:inline-block;" />
      <button class="c-button c-button-step-child p-button-accent2" v-on:click.prevent="AddMode">追加</button>
    </div>

    <div class="c-form-group-submit">
      <button type="button" class="c-button c-button-form p-button-accent2">更新する</button>
    </div>

    <div class="c-form-group-submit">
      <button type="button" class="c-button c-button-form p-button-accent3">削除する</button>
    </div>
  </div>
</template>

<script>
const axios = require("axios");
export default {
  props: {
    id: { type: Number, default: "" }
  },
  mounted: function() {
    console.log("ChildStepコンポーネント");
    this.getData();
  },

  data: function() {
    return {
      child_steps: [],
      modal: false,
      add_modal: false
    };
  },

  methods: {
    getData() {
      axios.get("/step/json/" + this.id).then(response => {
        this.child_steps = response.data;
      });
    },
    //子STEP編集モードの切り替え
    changeEditMode: function(index) {
      this.modal = !this.modal;
      if (!this.child_steps[index].hasOwnProperty("editMode")) {
        this.child_steps[index].editMode = true;
      } else {
        this.child_steps[index].editMode = !this.child_steps[index].editMode;
      }
    },
    //子STEP追加モードの切り替え
    AddMode: function() {
      this.modal = !this.modal;
      this.add_modal = !this.add_modal;
    }

    // createData($child_step_id) {
    //   axios
    //     .post("/step/do_child/", { child_step_id: $child_step_id })
    //     .then(function(response) {
    //       console.log(response);
    //     })
    //     .catch(function(error) {
    //       console.log(error);
    //     });
    //   this.count++;
    //   // this.$emit("click-inc-count", this.status_flg);
    //   this.$emit("click-inc-count");
    // },
    // removeData($child_step_id) {
    //   axios
    //     .delete("/step/do_child/", { data: { child_step_id: $child_step_id } })
    //     .then(function(response) {
    //       console.log(response);
    //     })
    //     .catch(function(error) {
    //       console.log(error);
    //     });
    //   this.count--;
    //   // this.$emit("click-dec-count", this.status_flg);
    //   this.$emit("click-dec-count");
    // }
  }
};
</script>
