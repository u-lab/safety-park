<template>
  <div class="map">
    <MglMap :accessToken='accessToken' :mapStyle='mapStyle' :center='center' :zoom='zoom' :minZoom='minzoom'>
      <MglGeolocateControl position="bottom-right" />
      <MglMarker :coordinates="geojson" color="blue" />
    </MglMap>
  </div>
</template>

<script>
// Mapboxのラッパーライブラリをインポート
import Mapbox from 'mapbox-gl'
import { MglMap, MglGeolocateControl, MglMarker } from 'vue-mapbox'

export default {
  components: {
    MglMap,
    MglGeolocateControl,
    MglMarker
  },
  data () {
    return {
      accessToken: 'pk.eyJ1Ijoic3luc2NoaXNtbyIsImEiOiJja2E5eHEwbXAweHdyMnlxcjlzMDVjMm56In0.lOPjbTfTjop6jTk58sOhTQ',
      mapStyle: 'mapbox://styles/synschismo/cka9xvauz00w31ilcr6ganv88',
      zoom: 11,
      minzoom: 4,
      center: [139.540667, 35.650614],
      geojson: null
    }
  },
  async created () {
    await this.fetchGeoJson()
    this.mapbox = Mapbox
  },
  methods: {
    // GeoJsonの取得
    async fetchGeoJson () {
      // geojsonを取得
      const geojson = await this.$axios.$get(`${this.$config.clientUrl}/geojson/tokyo.geojson`)
      // vueインスタンス内のgeojsonを更新
      this.geojson = geojson.features[0].geometry.coordinates
    }
  }
}
</script>

<style lang='scss' scoped>
.map {
  z-index: 9;
  height: 408px; /*50.24630542vh*/
  width: 89vw;
  border: 1px solid #424242;
  border-radius: 25px;
  margin-top: 30px;
  overflow: hidden;
}
</style>
