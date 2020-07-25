<template>
  <div>
    <TheHeader button-text="text" /> <!--id='page-top'部分-->
    <main>
      <Nuxt />
    </main>
    <TheFooter />
  </div>
</template>

<script>
export default {
  computed: {
    buttonText () {
      const matchedRoute = this.$route.matched[0]
      const headInfo = matchedRoute.components.default.options.head()
      return headInfo ? headInfo.buttonText : ''
    }
  }

}
</script>
