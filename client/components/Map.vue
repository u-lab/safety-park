<template>
  <div class="map">
    <MglMap :accessToken='accessToken' :mapStyle='mapStyle' :center='center' :minZoom='minzoom'>
      <MglGeolocateControl position="bottom-right" />
      <MglGeojsonLayer
        :sourceId="geoJsonSource.features.id"
        :source="geoJsonSource"
        layerId="myLayer"
        :layer="geoJsonlayer"
      />
    </MglMap>
  </div>
</template>

<script>
// Mapboxのラッパーライブラリをインポート
import Mapbox from 'mapbox-gl'
import { MglMap, MglGeolocateControl, MglGeojsonLayer } from 'vue-mapbox'

export default {
  components: {
    MglMap,
    MglGeolocateControl,
    MglGeojsonLayer
  },
  data () {
    return {
      accessToken: 'pk.eyJ1Ijoic3luc2NoaXNtbyIsImEiOiJja2E5eHEwbXAweHdyMnlxcjlzMDVjMm56In0.lOPjbTfTjop6jTk58sOhTQ',
      mapStyle: 'mapbox://styles/synschismo/cka9xvauz00w31ilcr6ganv88',
      minzoom: 11,
      center: [139.540667, 35.650614],
      geoJsonSource: null,
      geoJsonLayer: null
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
      const geoJsonSource = await this.$axios.$get(`${this.$config.clientUrl}/geojson/tokyo.geojson`)
      // vueインスタンス内のgeojsonを更新
      this.geoJsonSource = geoJsonSource
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
