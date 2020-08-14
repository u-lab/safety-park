<template>
  <div class='map'>
    <MglMap :accessToken='accessToken' :mapStyle='mapStyle' :center='center' :zoom='zoom' :minZoom='minzoom'>
      <MglGeolocateControl position='bottom-right' />
      <MglGeojsonLayer
        :sourceId="geoJsonSource.data.id"
        :source="geoJsonSource"
        layerId="somethingSomething"
        :layer="geoJsonLayer"
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
      zoom: 11,
      minzoom: 4,
      center: [139.540667, 35.650614],
      geojson: null,
      myLayerSource: {
        type: 'geojson',
        data: '/static/geojson/tokyo.geojson'
      },
      myLayer: {
        type: 'circle',
        paint: {
          'circle-color': 'red'
        }
      }
    }
  },
  created () {
    this.mapbox = Mapbox
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








const aaa = []
// 現在位置から各座標までの距離を計算
function getDistance (x, y, x2, y2) {
  const distance = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y))
  return distance
}
// ここで位置情報をもとに公園を選別する？
Object.keys(geojson).forEach(function (value) {
  if (getDistance(139.540667, 35.650614, value.features.geometry.coordinates[0], value.features.geometry.coordinates[1]) < 0.1) {
    aaa.push(value)
  }
  this.geojson = value.features
})
