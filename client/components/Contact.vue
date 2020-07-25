<template>
  <div class="contact">
    <a href="https://forms.gle/LCmGDe3uLfckFxKJ8" class="contact__text">公園の追加はこちら</a>
    <a class="contact__subtext">その他お問い合わせ</a>
  </div>
</template>

<script>
</script>

<style lang="scss" scoped>
.contact{
  width: 160px;
  height: 30px;
  background-color: #424242;
  border-radius: 30px;
  position: relative;
  left: 0;
  right: 0;
  margin: 28px auto auto;
  box-shadow: 0px 2px 2px 0 rgba(0, 0, 0, 0.30);
}

.contact__text{
  font-family: "Noto Sans JP", sans-serif;
  font-weight: 700;
  font-size: 14px;
  color: white;
  text-align: center;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  line-height: 29px;
}

.contact__subtext{
  font-family: "Noto Sans JP", sans-serif;
  font-weight: 400;
  font-size: 10px;
  color: #424242;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  text-align: center;
  margin: 35px auto;
}
</style>
