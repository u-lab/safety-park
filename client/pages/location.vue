<template>
  <div style="text-align: center; padding: 3rem;">
    <h1>UserLocation テスト</h1>

    <JoinButton @click="onJoin" />

    <h2 style="padding: 2rem">位置情報の表示</h2>

    <div v-for="(obj, key) in locations" :key="key">
      {{ obj }}
    </div>
  </div>
</template>

<script>
export default {
  async asyncData ({ $axios }) {
    try {
      const { data } = await $axios.$get('/api/v1/user/location')

      return { locations: data }
    } catch (e) {}
  },

  methods: {
    /**
     * 過去の位置情報を取得する
     */
    async fetchLocation () {
      const { data } = await this.$axios.$get('/api/v1/user/location')

      this.locations = data
    },

    /**
     * 参加ボタン
     */
    async onJoin (input) {
      try {
        await this.$axios.$post('/api/v1/user/location', input)
        // this.locations.push(data)
        await this.fetchLocation()
      } catch (e) {}
    }
  }
}
</script>

<style>

</style>
