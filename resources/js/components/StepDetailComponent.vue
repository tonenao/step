<template>
  <div class="p-step__detail">
    <progress-bar-component
      :count_child="this.count_child"
      :count_do_child="this.count_do_child"
      v-show="auth_user_challenge"
    ></progress-bar-component>

    <div class="p-description">
      <p class="p-description detail">{{step.description}}</p>
    </div>
    <div class="p-panel__bar p-panel__bar--mystep">
      <span class="p-panel__bar--info">Challenging!!</span>
      <span class="p-panel__bar--val-sm">人</span>
      <span class="p-panel__bar--val">{{count_challenge}}</span>
    </div>
    <div class="p-panel__bar p-panel__bar--mystep">
      <span class="p-panel__bar--info">Done!!</span>
      <span class="p-panel__bar--val-sm">人</span>
      <span class="p-panel__bar--val">{{count_done}}</span>
    </div>

    <div class="p-achievement-time">
      <p>目安達成時間</p>
      <span class="p-achievement-time--count" style="font-size:60px;">{{step.achievement_time}}</span>
      <span class="p-achievement-time--unit" style="font-size:20px;">時間</span>
    </div>

    <div class="c-form-group">
      <div class>
        <child-step-component
          :id="this.step.id"
          :count_do_child="this.count_do_child"
          :count_child="this.count_child"
          :auth_challenge="this.auth_user_challenge"
          v-on:click-inc-count="inc_count"
          v-on:click-dec-count="dec_count"
        ></child-step-component>
      </div>
    </div>

    <div class="c-form-group--submit">
      <button
        type="button"
        class="c-button__submit c-button__form c-button--accent3"
        v-if="auth && count_child"
        v-on:click="change_challenge_handler"
      >{{button_word}}</button>
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
    auth: {
      type: Boolean,
      default: true
    }
  },
  data: function() {
    return {
      count_child: this.step.count_child_steps,
      count_do_child: this.step.count_do_child_steps,
      count_challenge: this.step.count_challenge,
      count_done: this.step.count_done,
      auth_user_challenge: this.step.auth_user_challenge,
      status_flg: "",
      status: 0
    };
  },
  computed: {
    button_word: function() {
      if (this.auth_user_challenge) {
        return "Challengeをやめる";
      } else {
        return "Challengeする";
      }
    }
  },
  methods: {
    //子STEPの進捗を判定して各プロパティとdo_stepのステータスを変更する
    change_status_handler: function() {
      if (this.count_child === this.count_do_child) {
        this.count_done++;
        this.count_challenge--;
        this.change_done();
      } else if (
        this.count_child === this.count_do_child + 1 &&
        this.status_flg === "dec"
      ) {
        this.count_done--;
        this.count_challenge++;
        this.change_challenge();
      }
    },
    change_challenge_handler: function() {
      if (this.auth_user_challenge) {
        this.giveup();
      } else {
        this.start_challenge();
      }
    },
    inc_count: function() {
      this.count_do_child++;
      this.status_flg = "inc";
      this.change_status_handler();
    },
    dec_count: function() {
      this.count_do_child--;
      this.status_flg = "dec";
      this.change_status_handler();
    },
    // do_stepテーブルのステータスをchallengingからdoneに変更する
    change_done() {
      axios
        .post("/do_step", { step_id: this.step.id, status: 1 })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    // do_stepテーブルのステータスをdoneからchallengingに変更する
    change_challenge() {
      axios
        .post("/do_step", { step_id: this.step.id, status: 0 })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //do_stepテーブルに新規登録
    start_challenge() {
      this.auth_user_challenge = 1;
      if (this.count_child === this.count_do_child) {
        this.count_done++;
        this.status = 1;
      } else {
        this.count_challenge++;
      }
      axios
        .post("/do_step/challenge", {
          step_id: this.step.id,
          status: this.status
        })
        .then(function(response) {
          console.log(response);
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    //do_stepテーブルから削除
    giveup() {
      this.auth_user_challenge = 0;
      if (this.count_child === this.count_do_child) {
        this.count_done--;
      } else {
        this.count_challenge--;
      }
      axios
        .post("/do_step/giveup", { step_id: this.step.id })
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



