<template>
  <div class="main__container">
    <div class="body">
      <ConceptMsg />
      <Map />
<<<<<<< HEAD
      <Contact />
=======
>>>>>>> fc4c0ef239a8c596183c41234f017111e6a3e255
    </div>
    <!--<BackgroundAnim />-->
  </div>
</template>

<script>
export default {
  components: {
    ConceptMsg: () => import('~/components/ConceptMsg')
  },
  head () {
    return {
      buttonText: 'TOPページ'
    }
  }
}
</script>

<style>
  .main__container{
    width:89.3333333333vw;
    height: 841px;
    margin-left:auto;
    margin-right:auto;
    padding:0;
  }

  .body{
    margin-left:auto;
    margin-right:auto;
    width:89.3333333333vw;
    height: 548px;
    padding:41px 0 0 0;
  }
</style>
