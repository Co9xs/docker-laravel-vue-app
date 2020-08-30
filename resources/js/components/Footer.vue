<template>
<div class="container footer-inner">
  <ul class="footer-nav">
    <li class="footer-nav__item"><a class="footer-nav__link" href="">お問い合わせ</a></li>
    <li class="footer-nav__item"><a class="footer-nav__link" href="">プライバシーポリシー</a></li>
    <li class="footer-nav__item"><a class="footer-nav__link" href="">法人情報の取得元について</a></li>
  </ul>
  <span class="footer__copyright">Copyright ©︎ ryo fujishima All Rights Reserved.</span>
</div>
</template>

<style scoped>
.footer-inner {
  height: 60px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.footer-nav {
  display: flex;
  margin: 0;
  padding: 0;
}
.footer-nav__item {
  list-style: none;
  font-size: 12px;
}
.footer-nav__link {
  color: #efefef;
  padding: 5px;
}
.footer__copyright {
  font-size: 10px;
  color: #efefef;
}
</style>