<template>
  <div class="main__container">
    <div class="body">
      <div id="wrapper">
        <div id="map" />
        <div id="modal">
          <p id="location"></p><br>
          <p id="address">栃木県宇都宮市峰町350</p><br>
          <p>遊びに行こう!<span>0人</span></p><br>
          <span id="closebutton">×</span>
          <select name="people">
            <option value="number" selected>人数</option>
            <option value="one">1人</option>
            <option value="two">2人</option>
            <option value="three">3人</option>
          </select>
          <select name="stay">
            <option value="time" selected>滞在時間</option>
            <option value="harfhour">30分</option>
            <option value="onehour">1時間</option>
          </select>
          <br>
          <select name="schedule">
            <option value="now" selected>すぐに遊びに行く</option>
            <option value="harfhour">30分後</option>
            <option value="onehour">1時間後</option>
          </select>
        </div>

        <script>
          mapboxgl.accessToken = 'pk.eyJ1Ijoic2h1d2EiLCJhIjoiY2tjcXhmbjI5MDg1cjM1bHd2MjhtbWRkZiJ9.E0t9XBQCG3nQ87q-JQOLIQ';
          var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [139.9145, 36.5482],
          zoom: 13
          });

          var json = {
          'features': [
          {
          'datas': {
          'location': '宇都宮大学 峰キャンパス',
          'address': '栃木県宇都宮市峰町350'
          },
          'coordinates': [139.9145, 36.5482]
          },
          {
          'datas': {
          'location': '宇都宮大学 陽東キャンパス',
          'address': '栃木県宇都宮市陽東7丁目1−2'
          },
          'coordinates': [139.9303, 36.5499]
          }
          ]
          };

          json.features.forEach(function(marker) {
          // create a DOM element for the marker
          var el = document.createElement('div');
          el.className = 'marker';
          el.style.backgroundImage = 'url(/mapbox-icon.png)';
          el.style.width = '36px';
          el.style.height = '48px';
          el.style.backgroundSize = '36px 48px';
          el.style.cursor = 'pointer';
          el.addEventListener('click', function() {
          var modal = document.getElementById('modal');
          var location = document.getElementById('location');
          var address = document.getElementById('address');
          modal.style.display = 'inline';
          location.innerHTML = marker.datas.location;
          address.innerHTML = marker.datas.address;
          });
          new mapboxgl.Marker(el)
          .setLngLat(marker.coordinates)
          .addTo(map);
          });

          var button = document.getElementById('closebutton')
          button.addEventListener('click', function() {
          var modal = document.getElementById('modal');
          modal.style.display = 'none';
          })
        </script>
      </div>
      <ConceptMsg />
      <Map />
      <Contact />
    </div>
    <BackgroundAnim />
  </div>
</template>

<script>
export default {
  head () {
    return {
      buttonText: 'TOPページ',
      script: [
        { src: 'https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.js' }
      ],
      link: [
        { href: 'https://api.mapbox.com/mapbox-gl-js/v1.11.1/mapbox-gl.css', rel: 'stylesheet' }
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
  .main__container{
    width: 89.3333333333vw;
    height: 841px;
    margin-left:auto;
    margin-right:auto;
    padding:0;
  }

  .body{
    margin-left:auto;
    margin-right:auto;
    width:89.3333333333vw;
    height: 548px;
    padding:41px 0 0 0;
  }
</style>

<style>
  #wrapper {
    position: relative;
    margin: 100px 0;
  }

  #map {
    margin: 0 auto;
    width: 60%;
    height: 400px;
    border: 1px solid #000;
    border-radius: 10px;
  }

  #modal {
    display: none;
    position: absolute;
    top: 50px;
    left: 25%;
    width: 250px;
    background-color: #fff;
    border: 1px solid #000;
    border-radius: 10px;
  }
  #modal p {
    display: inline-block;
  }
  #closebutton {
    position: absolute;
    font-size: 24px;
    top: 0;
    right: 8px;
    cursor : pointer;
  }
</style>
