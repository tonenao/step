<template>
  <div>
    <transition name="modal">
      <div class="c-modal" v-show="modal"></div>
    </transition>

    <li v-for="(child_step,index) in child_steps" :key="child_step.index">
      <transition name="modal">
        <div v-if="child_step.editMode" class="c-step-child isModal" key="edit">
          <h3>STEP{{index+1}}</h3>
          <h4>タイトル</h4>
          <span class="error" v-show="isError">タイトルが未入力です</span>
          <textarea type="text" rows="3" v-model="child_step.title" />
          <h4>説明文</h4>
          <textarea type="text" rows="8" v-model="child_step.description" />
          <button
            class="c-button c-button-step-child p-button-accent3"
            v-on:click.prevent="updateChildStep(index)"
          >更新</button>
        </div>

        <div v-else class="c-step-child" key="save">
          <h3>STEP{{index+1}}</h3>
          <p>{{child_step.title}}</p>
          <button
            class="c-button c-button-step-child p-button-accent3"
            v-on:click.prevent="changeEditMode(index)"
          >編集</button>
        </div>
      </transition>
    </li>

    <transition name="modal">
      <div
        v-if="!this.add_modal"
        class="c-step-child p-step-detail"
        v-bind:class="{isModal:add_modal}"
      >
        <h3 style="color:#555;">STEP{{this.child_steps.length+1}}</h3>
        <p></p>
        <button
          class="c-button c-button-step-child p-button-accent2"
          v-on:click.prevent="changeAddMode"
        >追加</button>
      </div>

      <div v-else class="c-step-child p-step-detail" v-bind:class="{isModal:add_modal}">
        <h3 style="color:#555;">STEP{{this.add_steps_number}}</h3>
        <h4>タイトル</h4>
        <span class="error" v-show="isError">タイトルが未入力です</span>
        <textarea type="text" rows="3" v-model="add_title" />
        <h4>説明文</h4>
        <textarea type="text" rows="8" v-model="add_description" />
        <button
          class="c-button c-button-step-child p-button-accent3"
          style="width:40%;"
          v-on:click.prevent="changeAddMode"
        >キャンセル</button>
        <button
          class="c-button c-button-step-child p-button-accent2"
          v-on:click.prevent="addChildStep"
        >追加</button>
      </div>
    </transition>
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
      add_modal: false,
      add_title: "",
      add_description: "",
      isError: ""
    };
  },

  computed: {
    add_steps_number: function() {
      return this.child_steps.length + 1;
    }
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
    changeAddMode: function() {
      this.modal = !this.modal;
      this.add_modal = !this.add_modal;
    },
    //タイトルのバリデーション＋ChildStepの追加
    addChildStep() {
      if (this.add_title) {
        this.child_steps.push({
          title: this.add_title,
          step_id: this.id,
          description: this.add_description
        });
        this.isError = false;
        this.changeAddMode();
        this.createData();
      } else {
        console.log("空っぽ");
        this.isError = true;
      }
    },
    //タイトルのバリデーション＋ChildStepの更新
    updateChildStep(index) {
      if (this.child_steps[index].title) {
        this.isError = false;
        this.changeEditMode(index);
        this.updateData(index);
      } else {
        console.log("空っぽ");
        this.isError = true;
      }
    },
    //新規のchild_stepのDB登録
    createData() {
      axios
        .post("/step/child_step/", {
          title: this.add_title,
          description: this.add_description,
          step_id: this.id
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      this.add_title = "";
      this.add_description = "";
      this.getData();
    },
    //child_stepのDB内容更新
    updateData(index) {
      axios
        .post("/step/" + this.child_steps[index].id + "/child_step/", {
          title: this.child_steps[index].title,
          description: this.child_steps[index].description
        })
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
