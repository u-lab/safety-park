<template>
  <div> <!--id='page-top'部分-->
    <Header buttonText="text" /> <!--id='page-top'部分-->
    <main>
      <Nuxt />
    </main>
    <Footer />
  </div>
</template>

<script>
export default {
  components: {
    Header: () => import('~/components/Header')
  },
  computed: {
    buttonText () {
      const matchedRoute = this.$route.matched[0]
      const headInfo = matchedRoute.components.default.options.head()
      return headInfo ? headInfo.buttonText : ''
    }
  }

}
</script>

<style>
* {
    margin: 0px;
    padding: 0px;
}

body{
  color: #424242;
}

a{
  text-decoration: none;
  color: #424242;
}

ul, li{
  list-style: none;
  font-family: 'Noto Sans JP', sans-serif;
  font-weight: 300;
  color: #424242;
  font-size: 10px;
  padding:0;
  border: 0;
  margin: 0;
  display: inline;
}
</style>
