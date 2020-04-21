<template>
  <div class="p-panel__bar">
    <span class="p-panel__bar--info">進捗…</span>
    <span class="p-panel__bar--val-sm">{{this.count_child}}</span>
    <span class="p-panel__bar--val">{{this.count_do_child}}/</span>
    <div class="p-panel__bar--progress" :style="this.progressWidth"></div>
  </div>
</template>

<script>
export default {
  // props: ["count_child", "count_do_child", ":auth_challenge="],
  props: {
    count_child: { type: Number, default: "" },
    count_do_child: { type: Number, default: "" }
  },
  mounted: function() {
    console.log("ProgressBarコンポーネント");
  },
  computed: {
    //進捗バーのwidthを取得
    progressWidth: function() {
      var progress = Math.round((this.count_do_child / this.count_child) * 100);
      if (!isNaN(progress)) {
        return "width:" + progress + "%";
      } else {
        return "width:0";
      }
    }
  }
};
</script>
