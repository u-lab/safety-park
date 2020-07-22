<template>
  <header>
    <div class="header">
      <p class="header__logo__synschismo">
        <img :src="SynschismoTypography" alt="Synschismo">
      </p>

      <p class="header__logo__safetypark">
        <img :src="SafetyParkTypography" alt="Safety Park Logo">
      </p>

      <p class="header__button">
        <a href="https://www.notion.so/About-8de8a0af53444c82a0a49a58701dd4c7">
          <span class="header__button__text">{{ buttonText }}</span>
        </a>
      </p>
    </div>
  </header>
</template>

<script>
import SynschismoTypography from '@/assets/image/svg/synschismo-typography.svg'
import SafetyParkTypography from '@/assets/image/svg/safety-park-typography.svg'

export default {
  props: {
    buttonText: {
      type: String,
      default: ''
    }
  },

  computed: {
    SynschismoTypography: () => SynschismoTypography,
    SafetyParkTypography: () => SafetyParkTypography
  }
}
</script>

<style lang="scss" scoped>
  .header{
    padding:17px 20px 0 20px;
    border-top: 0;
    margin-top: 0;
  }

  .header__logo__synschismo{
    width: 69px;
    padding:0;
    border: 0;
    margin: 0 auto 0 0;
  }

  .header__logo__safetypark{
    width: 137px;
    float: left;
    padding: 0;
    margin: 0;
  }

  .header__button{
    width: 71px;
    height: 20px;
    background-color: #424242;
    border-radius: 30px;
    margin: 4px 0 0 auto;
    position: relative;
    box-shadow: 0px 2px 2px 0 rgba(0, 0, 0, 0.30);
  }

  .header__button__text{
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    font-size: 14px;
    color: white;
    text-align: center;
    position: absolute;
    top: 1px;
    right: 0;
    bottom: 0;
    left: 0;
    line-height: 20px
  }
</style>
