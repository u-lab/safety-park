<template>
  <div class="footer">
    <div class="footer__role">
      <ul>
        <li class="TermsofService">
          <a href="https://www.notion.so/9e3d4497349949a791d9907f40c2bf89">サービス利用規約</a>
        </li>
        <li class="PrivacyPolicy">
          <a href="https://www.notion.so/bd6374b0a80e4155a65a275fc9e11453">プライバシーポリシー</a>
        </li>
      </ul>
    </div>
    <p class="footer__text">©2020 synschismo</p>
  </div>
</template>

<style>
  .footer{
    z-index: -1;
    font-family: 'Noto Sans JP', sans-serif;
    font-weight: 300;
    font-size: 10px;
    height: 44px;
    position: relative;
    bottom: 0;
    margin: auto auto 5px;
    width: 89.3333333333vw;
  }

  .footer__role{
    height: 14px;
    width:89.3333333333vw;
    text-align: center;
    margin: 0;
    padding:0;
    border: 0;
  }

  .TermsofService{
    width: 30%;
    margin: 0 5px;
    padding:0;
    border: 0;
  }

  .PrivacyPolicy{
    width: 30%;
    margin: 0 5px;
    padding:0;
    border: 0;
  }

  .CopyrightPolicy{
    width: 30%;
    margin: 0 5px;
    padding:0;
    border: 0;
  }

  .footer__text{
    text-align: center;
    position: relative;
    bottom: -10px;
    margin: auto;
  }
</style>
