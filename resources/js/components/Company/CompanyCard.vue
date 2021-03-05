<template>
    <a class="company-link" :href="'/companies/' + company.corporateNumber + '/review/create'">
        <div class="company-card">
            <div class="company-card__header">
                <p class="company-card__name">{{ company.name }}</p>
            </div>
            <div class="company-card__body">
                <p class="company-card__area">
                    所在地：{{ company.prefectureName }}{{ company.cityName
                    }}{{ company.streetNumber }}
                </p>
            </div>
        </div>
    </a>
</template>

<script>
export default {
    props: {
        company: Object
    }
};
</script>

<style>
.company-link {
    text-decoration: none;
}
.company-link:hover {
    text-decoration: none;
}

.company-card {
    width: 100%;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16),
        0 2px 10px 0 rgba(0, 0, 0, 0.12);
    border-radius: 5px;
}

.company-card__header {
    background-color: #efefef;
    padding: 8px 16px;
}

.company-card__body {
    padding: 12px 16px;
}

.company-card__name {
    margin: 0;
    padding: 0;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
}

.company-card__area {
    margin: 0;
    padding: 0;
    text-decoration: none;
    color: #333;
}

</style>
