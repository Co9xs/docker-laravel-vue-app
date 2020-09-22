<template>
    <div class="container">
        <div class="mypage">
            <div class="mypage__header">
                <div class="mypage__avatar">
                    <img class="mypage__image" src alt />
                </div>
                <h5 class="mypage__title">マイページ</h5>
            </div>
            <div class="tab-menu">
                <ul class="tab-menu__list">
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '1' }"
                    >
                        <a class="tab-menu__link" @click="changeTab('1')"
                            >基本情報</a
                        >
                    </li>
                    <li
                        class="tab-menu__item"
                        :class="{ selected: isActive === '2' }"
                    >
                        <a class="tab-menu__link" @click="changeTab('2')"
                            >登録情報の更新</a
                        >
                    </li>
                </ul>
            </div>
            <div v-if="isActive === '1'">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mypage__content">
                                <p class="mypage__heading">ユーザー情報</p>
                                <div class="mypage__body">
                                    <ul class="mypage__list">
                                        <li class="mypage__item">
                                            ユーザー名：{{ user.name }}
                                        </li>
                                        <li class="mypage__item">
                                            メールアドレス：{{ user.email }}
                                        </li>
                                        <li class="mypage__item">
                                            性別：{{ user.sex }}
                                        </li>
                                        <li class="mypage__item">
                                            学校名：{{ user.school_name }}
                                        </li>
                                        <li class="mypage__item">
                                            卒業年：{{ user.graduation_year }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mypage__content">
                                <p class="mypage__heading">データ</p>
                                <div class="mypage__body">
                                    <ul class="mypage__list">
                                        <li class="mypage__item">
                                            投稿した口コミ数：{{
                                                reviews.length
                                            }}件
                                        </li>
                                        <li class="mypage__item">
                                            いいねした口コミ数：0件
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="mypage__content">
                                <p class="mypage__heading">
                                    投稿した口コミ一覧
                                </p>
                                <div class="mypage__body">
                                    <ul class="mypage__list">
                                        <li
                                            class="mypage__item"
                                            v-if="reviews.length === 0"
                                        >
                                            投稿した口コミはまだありません
                                        </li>
                                        <li class="company-detail__pagination">
                                            <Paginate
                                                :page-count="getPageCount"
                                                :page-range="3"
                                                :margin-pages="2"
                                                :click-handler="clickCallback"
                                                :prev-text="'<< '"
                                                :next-text="' >>'"
                                                :container-class="
                                                    'pagination pg-blue'
                                                "
                                                :page-class="'page-item'"
                                                :page-link-class="'page-link'"
                                            >
                                            </Paginate>
                                        </li>
                                        <li
                                            class="mypage__item mt-1"
                                            v-for="review in reviewsForPagination"
                                            :key="review.id"
                                        >
                                            <ReviewCard
                                                :review="review"
                                            ></ReviewCard>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="isActive === '2'">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="mypage__content">
                                <p class="mypage__heading">登録情報の更新</p>
                                <div class="mypage__body">
                                    <div class="mypage__input-group">
                                        <label class="mypage__label" for="name"
                                            >ユーザー名</label
                                        >
                                        <input
                                            class="mypage_input"
                                            type="text"
                                            id="name"
                                            v-model="user.name"
                                        />
                                    </div>
                                    <div class="mypage__input-group">
                                        <label class="mypage__label" for="email"
                                            >メールアドレス</label
                                        >
                                        <input
                                            class="mypage_input"
                                            type="email"
                                            id="email"
                                            v-model="user.email"
                                        />
                                    </div>
                                    <div class="mypage__input-group">
                                        <label
                                            class="mypage__label"
                                            for="school_name"
                                            >学校名</label
                                        >
                                        <input
                                            class="mypage_input"
                                            type="text"
                                            id="school_name"
                                            v-model="user.school_name"
                                        />
                                    </div>
                                    <div class="mypage__input-group">
                                        <label
                                            class="mypage__label"
                                            for="graduation_year"
                                            >卒業年</label
                                        >
                                        <select
                                            name="graduation_year"
                                            id="graduation_year"
                                            class="mypage__input"
                                            v-model="user.graduation_year"
                                        >
                                            <option value="19卒">19卒</option>
                                            <option value="20卒">20卒</option>
                                            <option value="21卒">21卒</option>
                                            <option value="22卒">22卒</option>
                                            <option value="23卒">23卒</option>
                                            <option value="24卒">24卒</option>
                                        </select>
                                    </div>
                                    <div class="mypage__input-group">
                                        <label class="mypage__label" for="sex"
                                            >性別</label
                                        >
                                        <div>
                                            <input
                                                class="mypage__radio"
                                                type="radio"
                                                name="sex"
                                                id="man"
                                                value="男性"
                                                v-model="user.sex"
                                            />
                                            <label for="man">男性</label>
                                            <input
                                                class="mypage__radio"
                                                type="radio"
                                                name="sex"
                                                id="rady"
                                                value="女性"
                                                v-model="user.sex"
                                            />
                                            <label for="rady">女性</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mypage__cta">
                                    <button
                                        class="mypage__link"
                                        type="button"
                                        @click="update(user)"
                                    >
                                        更新
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ReviewCard from "../components/Review/ReviewCard";
import Paginate from "vuejs-paginate";
import { options } from "../toastOptions";
export default {
    components: {
        ReviewCard,
        Paginate
    },
    data() {
        return {
            isActive: "1",
            user: null,
            reviews: [],
            parPage: 2,
            currentPage: 1
        };
    },
    methods: {
        clickCallback(pageNum) {
            this.currentPage = parseInt(pageNum);
        },
        changeTab(num) {
            this.isActive = num;
        },
        async getReviews() {
            const response = await axios.get(
                `/api/users/${this.$route.params.id}/reviews`
            );
            this.reviews = response.data;
        },
        async getUser() {
            const response = await axios.get("/api/user");
            this.user = response.data;
        },
        async update(user) {
            const response = await axios.post(
                `/api/users/${this.user.id}`,
                user
            );
            this.changeTab("1");
            this.showToast("ユーザー情報を更新しました", options);
        },
        showToast(message, options) {
            this.$toasted.success(message, options);
        }
    },
    computed: {
        reviewsForPagination() {
            const current = this.currentPage * this.parPage;
            const start = current - this.parPage;
            if (this.reviews.length !== 0) {
                return this.reviews.slice(start, current);
            }
        },
        getPageCount() {
            return Math.ceil(this.reviews.length / this.parPage);
        }
    },
    mounted() {
        this.getUser();
        this.getReviews();
    }
};
</script>
<style scoped>
.mypage__content {
    background-color: #fff;
    border-radius: 5px;
    padding: 12px 24px;
    margin: 24px 0;
}

.mypage__heading {
    font-weight: bold;
    margin: 0;
    padding: 0;
    font-size: 16px;
    margin-bottom: 5px;
}

.mypage__list {
    margin: 0;
    padding: 0;
    list-style: none;
}

.tab-menu {
    border-top: 1px solid #707070;
    border-bottom: 1px solid #707070;
    margin: 0;
    padding: 0;
}

.tab-menu__list {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
}

.tab-menu__item {
    padding: 5px 12px;
    margin-right: 10px;
}

.selected {
    border-bottom: 2px solid #ffb808;
    color: #ffb808;
    font-weight: bold;
}

.tab-menu__link {
    color: #ffb808;
}
.mypage__header {
    display: flex;
    align-items: center;
    padding: 16px 0;
}
.mypage__avatar {
    width: 80px;
    height: 80px;
    border: 1px solid #707070;
    border-radius: 5px;
}
.mypage__title {
    padding: 16px;
}
.mypage__cta {
    text-align: right;
}
.mypage__link {
    text-align: center;
    background-color: #4fc250;
    border-radius: 3px;
    padding: 8px 16px;
    color: #fff;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    border: none;
}

.mypage__label {
    margin: 0;
}

.mypage__input-group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 10px 0;
}

.mypage_input {
    width: 40%;
}
</style>
