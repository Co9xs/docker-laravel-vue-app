<template>
    <div class="card mt-3">
        <div class="card-header d-flex justify-content-between">
            <h5 class="h5 card-title m-0">
                <a class="company__name" href="">{{ review.company.name }}</a>
                <span class="company__area"
                    >本社所在地: {{ review.company.area }}</span
                >
            </h5>
        </div>
        <div class="card-body pb-2">
            <user-info :review="review"></user-info>
        </div>
        <div class="card-body pt-0 pb-2">
            <div class="font-weight-lighter d-flex align-items-baseline">
                <p class="mb-0 pr-1">総合評価</p>
                <star-rating :starNum="review.evaluation"></star-rating>
            </div>
            <div class="card-text">
                {{ excerpt(review.body, 50) }}
            </div>
            <div class="fon-weight-lighter">
                <a :href="'/reviews/' + review.id">この口コミの詳細を見る>></a>
            </div>
        </div>
    </div>
</template>

    <div class="review">
        <div class="company-info">
            <a class="company-info__name">{{ review.company.name }}</a>
            <span class="company-info__area">本社所在地: {{ review.company.area }}</span>
        </div>
        <div class="review__user-info">
            <user-info :review="review"></user-info>
        </div>
        <div class="review__content">
            <div class="review__evaluation">
                <star-rating :starNum="review.evaluation"></star-rating>
            </div>
            <div class="review__body">
                {{ excerpt(review.body, 50) }}
            </div>
            <div class="review__cta">
                <a class="review__link" :href="'/reviews/' + review.id">この口コミの詳細を見る>></a>
            </div>
        </div>
    </div>