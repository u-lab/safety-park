<template>
  <div class="main__container">
    <div class="body">
      <ConceptMsg />
      <Map />
      <chart />
      <Contact />
    </div>
    <BackgroundAnim />
  </div>
</template>

<script>
export default {
}
</script>

<style lang="scss" scoped>
  .main__container{
    width: 89.3vw;
    height: calc(100vh + 31px);
    margin: 0 auto;
    padding:0;
  }

  .body{
    margin-left:auto;
    margin-right:auto;
    width:89.3vw;
    height: 548px;
    padding:41px 0 0 0;
  }
</style>
