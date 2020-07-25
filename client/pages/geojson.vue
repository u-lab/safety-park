<template>
  <div>
    {{ json }}
  </div>
</template>

<script>
export default {
  async asyncData ({ $axios, $config }) {
    const json = await $axios.$get(`${$config.clientUrl}/geojson/tokyo.geojson`)

    return { json }
  }
}
</script>

<style>

</style>
