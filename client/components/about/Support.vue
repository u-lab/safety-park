<template>
  <div class="paragraph">
    <h1>Support</h1>
    <h2>応援のお願い</h2>
    <p>本サービスは、全て個人でデザイン・運営しています。新しい仕組みで、より過ごしやすい世の中を作れないかという思いで立ち上げました。この活動を応援したいと思ってくださった方54円から支援できますので、応援してくださると幸いです。</p>
    <div class="link-button">
      <a href="https://forms.gle/LCmGDe3uLfckFxKJ8" class='button-text'>応援する</a>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "~assets/sass/paragraph.scss";

.link-button{
  width: 140px;
  height: 30px;
  background-color: #19C0F4;
  border-radius: 30px;
  position: relative;
  left: 0;
  right: 0;
  margin: 20px auto auto;
  box-shadow: 0px 2px 2px 0 rgba(0, 0, 0, 0.30);
}

.button-text{
  font-family: 'Noto Sans JP', sans-serif;
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
</style>
