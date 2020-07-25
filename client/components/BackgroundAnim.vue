<template>
  <div class="background">
    <div class="box"></div>
    <div class="box2"></div>
    <div class="box3"></div>
    <div class="box4"></div>
  </div>
</template>

<!--<script>
const box = document.querySelector('.box')
const box2 = document.querySelector('.box2')
const box3 = document.querySelector('.box3')
const box4 = document.querySelector('.box4')

setInterval(setBorderRadius.bind(this), 10000)

function setBorderRadius () {
  box.style.setProperty('--br-blobby-before', generateBorderRadiusValue())
  box2.style.setProperty('--br-blobby-before', generateBorderRadiusValue())
  box3.style.setProperty('--br-blobby-before', generateBorderRadiusValue())
  box4.style.setProperty('--br-blobby-before', generateBorderRadiusValue())
}

function generateBorderRadiusValue () {
  return `${getRandomValue()}% ${getRandomValue()}% ${getRandomValue()}% ${getRandomValue()}% / ${getRandomValue()}% ${getRandomValue()}% ${getRandomValue()}%`
}

function getRandomValue () {
  return Math.floor(Math.random() * 50) + 50
}
</script>-->

<style lang="scss" scoped>
  .background{
    min-height: calc(100vh + 17px + 80px + 44px + 5px);
    width: 100vw;
    z-index: -2;
    position: absolute;
    top: 0;
    left: 0;
    overflow: hidden;
  }

  .box {
    --br-blobby: 50%;
    --br-blobby-before: 50%;
    --br-blobby-after: 50%;
    animation: rotate 5s linear infinite;
    background-color: #B1EB9B;
    border-radius: var(--br-blobby);
    position: absolute;
    top: -110px;
    left: -110px;
    height: 200px;
    width: 220px;
    transition: 0.3s linear;
  }

  .box::after {
    content: '';
    background-color:  #B1EB9B;
    border-radius: var(--br-blobby-after);
    position: absolute;
    opacity: 60%;
    top: -2%;
    left: -2%;
    height: 110%;
    width: 110%;
    transition: 0.3s linear;
  }

  .box::before {
    content: '';
    background-color:  #B1EB9B;
    border-radius: var(--br-blobby-before);
    position: absolute;
    opacity: 60%;
    top: -4%;
    left: -4%;
    height: 120%;
    width: 120%;
    transition: 0.3s linear;
  }

  .box2 {
    --br-blobby: 50%;
    --br-blobby-before: 50%;
    --br-blobby-after: 50%;
    animation: rotate 5s linear infinite;
    background-color: #EAA9DC;
    border-radius: var(--br-blobby);
    position: absolute;
    top: -110px;
    right: -70px;
    height: 150px;
    width: 150px;
    transition: 0.3s linear;
  }

  .box2::after {
    content: '';
    background-color:  #EAA9DC;
    border-radius: var(--br-blobby-after);
    position: absolute;
    opacity: 60%;
    top: -2%;
    left: -2%;
    height: 104%;
    width: 104%;
    transition: 0.3s linear;
  }

  .box2::before {
    content: '';
    background-color:  #EAA9DC;
    border-radius: var(--br-blobby-before);
    position: absolute;
    opacity: 60%;
    top: -4%;
    left: -4%;
    height: 108%;
    width: 108%;
    transition: 0.3s linear;
  }

  .box3 {
    --br-blobby: 50%;
    --br-blobby-before: 50%;
    --br-blobby-after: 50%;
    animation: rotate 5s linear infinite;
    background-color: #ABEEEC;
    border-radius: var(--br-blobby);
    position: absolute;
    top: 400px;
    right: -10px;
    height: 200px;
    width: 220px;
    transition: 0.3s linear;
  }

  .box3::after {
    content: '';
    background-color:  #ABEEEC;
    border-radius: var(--br-blobby-after);
    position: absolute;
    opacity: 60%;
    top: -2%;
    left: -2%;
    height: 104%;
    width: 105%;
    transition: 0.3s linear;
  }

  .box3::before {
    content: '';
    background-color:  #ABEEEC;
    border-radius: var(--br-blobby-before);
    position: absolute;
    opacity: 60%;
    top: -4%;
    left: -10%;
    height: 108%;
    width: 110%;
    transition: 0.3s linear;
  }

  .box4 {
    --br-blobby: 50%;
    --br-blobby-before: 50%;
    --br-blobby-after: 50%;
    animation: rotate 5s linear infinite;
    background-color: #EBD583;
    border-radius: var(--br-blobby);
    position: absolute;
    bottom: -120px;
    left: -80px;
    height: 200px;
    width: 230px;
    transition: 0.3s linear;
  }

  .box4::after {
    content: '';
    background-color:  #EBD583;
    border-radius: var(--br-blobby-after);
    position: absolute;
    opacity: 60%;
    top: -2%;
    left: -2%;
    height: 104%;
    width: 104%;
    transition: 0.3s linear;
  }

  .box4::before {
    content: '';
    background-color:  #EBD583;
    border-radius: var(--br-blobby-before);
    position: absolute;
    opacity: 60%;
    top: -4%;
    left: -4%;
    height: 110%;
    width: 110%;
    transition: 0.3s linear;
  }

  @keyframes rotate {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg)
    }
  }
</style>
