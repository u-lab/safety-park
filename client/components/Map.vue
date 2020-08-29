<template>
  <div class='map'>
    <MglMap :accessToken='accessToken' :mapStyle='mapStyle' :center='center' :zoom='zoom' :minZoom='minzoom'>
      <MglGeolocateControl position='bottom-right' />
      <MglMarker @click='showPopup' v-for="(l, key) in geojson" :key="key" :coordinates="l.geometry.coordinates" color='red'>
        <MglPopup>
          <div>
            <div>{{ l.properties.id }}</div>
            <div>{{ l.properties.name }}</div>
          </div>
        </MglPopup>
      </MglMarker>
    </MglMap>
  </div>
</template>

<script>
// Mapboxのラッパーライブラリをインポート
import Mapbox from 'mapbox-gl'
import { MglMap, MglGeolocateControl, MglMarker, MglPopup } from 'vue-mapbox'

export default {
  components: {
    MglMap,
    MglGeolocateControl,
    MglMarker,
    MglPopup
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
    // popupウィンドウの表示
    showPopup () {
      const el = document.createElement('div')
      el.className = 'marker'
      el.style.backgroundImage = 'url(/mapbox-icon.png)'
      el.style.width = '36px'
      el.style.height = '48px'
      el.style.backgroundSize = '36px 48px'
      el.style.cursor = 'pointer'
    },
    // GeoJsonの取得
    async fetchGeoJson () {
      // geojsonを取得
      const geojson = await this.$axios.$get(`${this.$config.clientUrl}/geojson/t.geojson`)
      // vueインスタンス内のgeojsonを更新
      this.geojson = geojson.features
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
