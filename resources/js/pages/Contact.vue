<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5 mb-5">
                <div class="contact">
                    <h4 class="contact__title h4 mt-3">お問い合わせ</h4>
                    <p class="contant__message">
                        お問い合わせはTwitterのDMからお願いします。コードはすべてGitHub上に公開しています。
                    </p>
                    <div class="contact__row">
                        <div class="contact__content">
                            <p class="contact__heading">
                                <i
                                    class="fab fa-twitter fa-sm contact__icon"
                                ></i
                                >Twitter
                            </p>
                            <div
                                class="contact__image contact__image--twitter"
                            ></div>
                            <a
                                class="contact__link"
                                href="https://twitter.com/Co9xsR"
                                target="_blank"
                                >@Co9xsR</a
                            >
                        </div>
                        <div class="contact__content">
                            <p class="contact__heading">
                                <i class="fab fa-github fa-sm contact__icon"></i
                                >GitHub
                            </p>
                            <div
                                class="contact__image contact__image--github"
                            ></div>
                            <a
                                class="contact__link"
                                href="https://github.com/Co9xs?tab=overview&from=2020-09-01&to=2020-09-22"
                                target="_blank"
                                >Co9xs</a
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<style>
.contact__row {
    display: flex;
    justify-content: space-evenly;
}

.contact__heading {
    margin: 0;
    padding: 8px;
    font-weight: bold;
    display: flex;
    align-items: center;
}

.contact__icon {
    padding-right: 4px;
}

.contact__link {
    padding: 8px;
}

.contact__content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}
.contact__image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-position: center;
    background-size: cover;
}

.contact__image--twitter {
    background-image: url("/img/profile-twitter.JPG");
}

.contact__image--github {
    background-image: url("/img/profile-github.jpeg");
}
</style>
