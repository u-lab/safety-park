<template>
  <div>
    <TheHeader :buttonText='title' /> <!--id='page-top'部分-->
    <main>
      <Nuxt />
    </main>
    <TheFooter />
  </div>
</template>

<script>
import TheHeader from '@/components/organisms/TheHeader'

export default {
  components: {
    TheHeader
  },
  data () {
    return {
      title: ''
    }
  },
  created () {
    this.setListener()
  },
  methods: {
    setListener () {
      this.$nuxt.$on('updateHeader', this.setHeader)
    },
    setHeader (buttonText) {
      this.title = buttonText || ''
    }
  }
}
</script>
