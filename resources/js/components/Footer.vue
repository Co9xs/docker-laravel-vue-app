<template>
    <div class="container footer-inner">
        <ul class="footer-nav">
            <li class="footer-nav__item">
                <a class="footer-nav__link" href="/contact">お問い合わせ</a>
            </li>
            <li class="footer-nav__item">
                <a class="footer-nav__link" href="/privacy-policy">プライバシーポリシー</a>
            </li>
            <li class="footer-nav__item">
                <a class="footer-nav__link" href="/company-api-info">法人情報の取得元について</a>
            </li>
        </ul>
        <span class="footer__copyright">Copyright ©︎ ryo fujishima 2020</span>
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

@media (max-width: 575.98px) {
    .footer-inner {
        height: auto;
        padding: 15px;
    }

    .footer-nav {
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .footer-nav__item {
        margin-bottom: 5px;
    }

    .footer-inner {
        justify-content: space-evenly;
        flex-direction: column;
    }
}
</style>
