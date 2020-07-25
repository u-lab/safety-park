<template>
  <button @click="onClick">
    参加ボタン
  </button>
</template>

<script>
export default {
  props: {
    // 公園ID
    parkId: {
      type: Number,
      default: 1
    }
  },

  data () {
    return {
      latitude: 0,
      longitude: 0
    }
  },

  methods: {
    /**
     * 位置情報をクリアする
     */
    clearGeoLocation () {
      this.longitude = 0
      this.latitude = 0
    },

    /**
     * クリックイベント
     */
    onClick () {
      // APIへの送信値
      this.getGeoLocation()

      const input = {
        park_id: this.parkId,
        longitude: this.longitude,
        latitude: this.latitude
      }

      return this.$emit('click', input)
    },

    /**
     * 位置情報の取得を試みる
     */
    getGeoLocation () {
      navigator.geolocation.getCurrentPosition(
        this.geoLocationSuccessFunc,
        this.geoLocationErrorFunc,
        {}
      )
    },

    /**
     * 位置情報を正常に取得できるとき
     */
    geoLocationSuccessFunc (pos) {
      // 緯度
      this.latitude = pos.coords.latitude
      // 経度
      this.longitude = pos.coords.longitude
    },

    /**
     * 位置情報を正常に取得できないとき
     */
    geoLocationErrorFunc () {
      this.clearGeoLocation()
    }
  }
}
</script>

<style>

</style>
