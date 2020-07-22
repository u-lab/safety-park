<template>
  <div>
    <h1>Member
      <h2>メンバー</h2>
    </h1>
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
div{
  width: 310px;
  padding:0;
  border: 0;
  margin: 0 auto 50px;

  h1{
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 700;
    font-size: 24px;
    text-align: center;
    margin: 0 auto;
    height:auto;

    h2{
      font-family: 'Noto Sans JP', sans-serif;
      font-weight: 700;
      font-size: 10px;
      text-align: center;
      margin: -4px auto;
    }
  }

  .list_area{
    width: 310px;
    margin: 20px auto 35px;

    .memberImage{
      height: 80px;
      width: 80px;
      background-color: gray;
      border-radius: 60px;
      margin: 0;
    }

    .memberName{
      font-family: 'Noto Sans JP', sans-serif;
      font-weight: 700;
      font-size: 14px;
      text-align: left;
      margin: 0;
    }

    .memberNameEn{
      font-family: 'Noto Sans JP', sans-serif;
      font-weight: 400;
      font-size: 10px;
      text-align: left;
      margin: 0;
    }

    .memberCareer{
      font-family: 'Noto Sans JP', sans-serif;
      font-weight: 400;
      font-size: 10px;
      text-align: left;
      margin: 0;
    }

    .memberText{
      font-family: 'Noto Sans JP', sans-serif;
      font-weight: 400;
      font-size: 10px;
      text-align: left;
      margin: 10px 0 0 0;
    }
  }
}
</style>
