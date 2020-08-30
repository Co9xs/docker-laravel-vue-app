<template>
    <ul class="pagination">
        <li
            class="inactive"
            :class="current_page == 1 ? 'disabled' : ''"
            @click="changePage(current_page - 1)"
        >
            «
        </li>
        <li
            v-for="page in frontPageRange"
            :key="page"
            @click="changePage(page)"
            :class="isCurrent(page) ? 'active' : 'inactive'"
        >
            {{ page }}
        </li>
        <li v-show="front_dot" class="inactive disabled">...</li>
        <li
            v-for="page in middlePageRange"
            :key="page"
            @click="changePage(page)"
            :class="isCurrent(page) ? 'active' : 'inactive'"
        >
            {{ page }}
        </li>
        <li v-show="end_dot" class="inactive disabled">...</li>
        <li
            v-for="page in endPageRange"
            :key="page"
            @click="changePage(page)"
            :class="isCurrent(page) ? 'active' : 'inactive'"
        >
            {{ page }}
        </li>
        <li
            class="inactive"
            :class="current_page >= last_page ? 'disabled' : ''"
            @click="changePage(current_page + 1)"
        >
            »
        </li>
    </ul>
</template>
