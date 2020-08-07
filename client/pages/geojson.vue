<template>
  <div>
    {{ json.features[0].properties.name }}
    {{ json.features[1].properties.name }}
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
