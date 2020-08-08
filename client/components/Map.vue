<template>
  <div class="map">
    <MglMap :accessToken='accessToken' :mapStyle='mapStyle' :center='defaultCoordinates' :zoom='zoom'>
      <MglGeolocateControl position="bottom-right" />
      <MglGeojsonLayer
        :sourceId="geoJsonSource.id"
        :source="geoJsonSource"
        layerId="myLayer"
        :layer="geoJsonlayer"
      />
    </MglMap>
  </div>
</template>

<script>
//Mapboxのラッパーライブラリをインポート
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
      defaultCoordinates: [139.540667, 35.650614],
      coordinates: [139.540667, 35.650614],
      geoJsonSource: {
        // GeoJSON をURLから読み込む方法がわからない
      },
      geoJsonLayer: {
        //...some GeoJSON layer configuration object
      }
    }
  },
  created () {
    // We need to set mapbox-gl library here in order to use it in template
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
