<template>
  <div class="paragraph">
    <h1>Member</h1>
    <h2>メンバー</h2>
    <div class="list_area" v-for="member of members" v-bind:key="member">
      <div class="memberImage"></div>
      <div class="memberName">{{ member.name }}</div>
      <div class="memberNameEn">{{ member.name_en }}</div>
      <div class="memberCareer">{{ member.career }}</div>
      <div class="memberText">{{ member.text }}</div>
    </div>
  </div>
</template>

<script>
import memberslist from '~/assets/json/memberlist.json'

export default {
  data () {
    return {
      members: memberslist
    }
  }
}
</script>

<style lang="scss" scoped>
@import "~assets/sass/paragraph.scss";

.list_area{
  width: 89.3vw;
  margin: 20px auto 35px;

  .memberImage{
    float: left;
    height: 80px;
    width: 80px;
    background-color: gray;
    border-radius: 60px;
    margin: 0;
  }

  .memberName{
    float: left;
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 700;
    font-size: 14px;
    text-align: left;
    margin: 0 0 0 10px;
  }

  .memberNameEn{
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 400;
    font-size: 10px;
    text-align: left;
    padding: 4px 0 0 160px;
  }

  .memberCareer{
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 400;
    font-size: 10px;
    text-align: left;
    margin: 5px 0 0 90px;
  }

  .memberText{
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 400;
    font-size: 10px;
    text-align: left;
    margin: 5px 0 0 90px;
  }
}
</style>
