<template>
  <div>
    <div class="c-panel-bar p-panel-bar-mystep">
      <span class="c-panel-bar-info">Challenging!!</span>
      <span class="c-panel-bar-val-sm">人</span>
      <span class="c-panel-bar-val">{{id}}</span>
    </div>
    <div class="c-panel-bar p-panel-bar-mystep">
      <span class="c-panel-bar-info">Done!!</span>
      <span class="c-panel-bar-val-sm">人</span>
      <span class="c-panel-bar-val">10</span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["id"],
  mounted: function() {
    console.log("HomeStepコンポーネント");
  }
};
</script>
