<template>
  <div>
    <TheHeader /> <!--id='page-top'部分-->

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
  }
}
</script>
