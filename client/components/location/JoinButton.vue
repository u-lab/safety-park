<template>
  <div>
    <select v-model="number_of_people">
      <option disabled value="">利用人数</option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>
    <select v-model="time_diff">
      <option disabled value="">滞在時間 (分)</option>
      <option>5</option>
      <option>10</option>
      <option>20</option>
      <option>30</option>
      <option>60</option>
    </select>
    <button @click="onClick">
      遊びにいく
    </button>
  </div>
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
      longitude: 0,
      number_of_people: 0,
      time_diff: 0
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
        latitude: this.latitude,
        number_of_people: this.number_of_people,
        time_diff: this.time_diff
      }

      return this.$emit('click', input)
    }
  }
}
</script>

<style>

</style>
