<template>
  <div>
    <transition name="modal">
      <div class="c-modal" v-show="modal"></div>
    </transition>

    <li v-for="(child_step,index) in child_steps" :key="child_step.index">
      <transition name="modal">
        <div v-if="child_step.editMode" class="p-step-child isModal" key="edit">
          <h3 class="p-step-child__step">STEP{{index+1}}</h3>
          <h4 class="p-step-child__title">タイトル</h4>
          <span class="error" v-show="isError_title_require">タイトル未入力です</span>
          <span class="error" v-show="isError_title_max">191文字以下にしてください。</span>
          <textarea class="p-step-child__textarea" type="text" rows="3" v-model="child_step.title" />
          <h4 class="p-step-child__title">説明文</h4>
          <span class="error" v-show="isError_desc_max">191文字以下にしてください。</span>
          <textarea
            class="p-step-child__textarea"
            type="text"
            rows="8"
            v-model="child_step.description"
          />
          <button
            class="c-button c-button__child-step c-button--accent1"
            v-on:click.prevent="updateChildStep(index)"
          >更新</button>
          <button
            class="c-button c-button__child-step c-button--accent3"
            v-on:click.prevent="deleteChildStep(index)"
          >削除</button>
        </div>

        <div v-else class="p-step-child" key="save">
          <h3 class="p-step-child__step">STEP{{index+1}}</h3>
          <p class="p-step-child__description">{{child_step.title}}</p>
          <button
            class="c-button c-button__child-step c-button--accent3"
            v-on:click.prevent="changeEditMode(index)"
          >編集</button>
        </div>
      </transition>
    </li>

    <transition name="modal">
      <div
        v-if="!this.add_modal"
        class="p-step-child p-step-detail"
        v-bind:class="{isModal:add_modal}"
      >
        <h3 class="p-step-child__step" style="color:#555;">STEP{{this.child_steps.length+1}}</h3>
        <p class="p-step-child__description"></p>
        <button
          class="c-button c-button__child-step c-button--accent2"
          v-on:click.prevent="changeAddMode"
        >追加</button>
      </div>

      <div v-else class="p-step-child p-step-detail" v-bind:class="{isModal:add_modal}">
        <h3 class="p-step-child__step" style="color:#555;">STEP{{this.add_steps_number}}</h3>
        <h4 class="p-step-child__title">タイトル</h4>
        <span class="error" v-show="isError_title_require">タイトル未入力です</span>
        <span class="error" v-show="isError_title_max">191文字以下にしてください。</span>
        <textarea class="p-step-child__textarea" type="text" rows="3" v-model="add_title" />
        <h4 class="p-step-child__title">説明文</h4>
        <span class="error" v-show="isError_desc_max">191文字以下にしてください。</span>
        <textarea class="p-step-child__textarea" type="text" rows="8" v-model="add_description" />
        <button
          class="c-button c-button__child-step c-button--accent3"
          v-on:click.prevent="changeAddMode"
        >キャンセル</button>
        <button
          class="c-button c-button__child-step c-button--accent2"
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
      isError: "",
      isError_title_require: false,
      isError_title_max: false,
      isError_desc_max: false
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
      if (this.varidate(this.add_title, this.add_description)) {
        this.changeAddMode();
        this.createData();
      }
    },

    //タイトルのバリデーション＋ChildStepの更新
    updateChildStep(index) {
      // console.log(index);
      if (
        this.varidate(
          this.child_steps[index].title,
          this.child_steps[index].description
        )
      ) {
        this.changeEditMode(index);
        this.updateData(index);
      }
    },
    //削除確認画面表示+ChildStepの削除
    deleteChildStep(index) {
      window.confirm("削除しますか？");
      this.removeData(index);
      this.changeEditMode(index);
      this.isError_title_require = false;
      this.isError_title_max = false;
      this.isError_desc_max = false;
    },
    //新規のchild_stepのDB登録
    async createData() {
      await axios
        .post("/step/child_step", {
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
      await this.getData();
    },
    //child_stepのDB削除
    async removeData(index) {
      await axios
        .delete("/step/child_step", {
          data: { child_step_id: this.child_steps[index].id }
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
      await this.getData();
    },
    //child_stepのDB内容更新
    updateData(index) {
      axios
        .post("/step/" + this.child_steps[index].id + "/child_step", {
          title: this.child_steps[index].title,
          description: this.child_steps[index].description
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //バリデーション
    varidate(title, desc) {
      this.isError_title_require = false;
      this.isError_title_max = false;
      this.isError_desc_max = false;

      if (title.length == 0) {
        this.isError_title_require = true;
      }
      if (title.length > 191) {
        this.isError_title_max = true;
      }
      if (desc.length > 191) {
        this.isError_desc_max = true;
      }

      if (
        !this.isError_title_require &&
        !this.isError_title_max &&
        !this.isError_desc_max
      ) {
        return true;
      } else {
        return false;
      }
    }
  }
};
</script>
