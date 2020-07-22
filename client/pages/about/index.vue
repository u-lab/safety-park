<template>
  <div class="main__container">
    <div class="body">
      <Statement />
      <Background />
      <Support />
      <Member />
    </div>
    <BackgroundAnim />
  </div>
</template>

<script>
export default {
  head () {
    return {
      buttonText: 'TOPページ'
    }
  }
}
</script>

<style lang="scss" scoped>
  .main__container{
    width: 89.3vw;
    height: 1500px;
    margin: 0 auto;
    padding: 0;
  }

  .body{
    margin-left:auto;
    margin-right:auto;
    width:89.3333333333vw;
    height: 548px;
    padding:41px 0 0 0;
  }
</style>
