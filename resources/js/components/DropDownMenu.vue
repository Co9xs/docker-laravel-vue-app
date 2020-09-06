<template>
    <div>
        <div class="all-wrapper">
            <div class="dropdown-wrapper" @click="isActive = !isActive">
                <div class="dropdown-text" v-if="!labelSelected">
                    {{ label }}
                </div>
                <div class="dropdown-text" v-if="labelSelected">
                    {{ labelSelected }}
                </div>
                <i class="fas fa-caret-down"></i>
            </div>
            <transition>
                <div class="list-items" v-if="isActive">
                    <template v-if="existsListItems">
                        <template v-for="(value, key) in listItems">
                            <div
                                class="list-item"
                                :class="[key == activeItemKey ? 'active' : '']"
                                @click="handleClickItem(key, value)"
                                :key="value"
                            >
                                {{ value }}
                            </div>
                        </template>
                    </template>
                    <template v-else>
                        <div class="list-item">
                            選択肢がありません
                        </div>
                    </template>
                </div>
            </transition>
        </div>
        <div
            class="dropdown-bg"
            @click="isActive = false"
            v-if="isActive"
        ></div>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            required: true
        },
        listItems: {
            type: Array,
            required: true
        },
        activeItemKey: {
            type: [String, Number],
            required: false
        }
    },
    data() {
        return {
            isActive: false,
            labelSelected: null
        };
    },
    computed: {
        existsListItems() {
            if (this.listItems !== 0) {
                return true;
            }
        }
    },
    methods: {
        handleClickItem(key, value) {
            if (key == this.activeItemKey) {
                return;
            }
            this.labelSelected = value;
            this.isActive = false;
            this.$emit('labelClicked', value)
        }
    }
};
</script>

<style>
.dropdown-bg {
    width: 100vw;
    height: 100vh;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 2;
}
.dropdown-wrapper {
    color: #666666;
    display: flex;
    align-items: center;
}

.dropdown-wrapper:hover {
    cursor: pointer;
}

.dropdown-text {
    font-size: 14px;
}

i {
    font-size: 10px;
    margin-left: 6px;
}
.all-wrapper {
    position: relative;
    user-select: none;
    padding: 5px;
    border: 1px solid #7f7f7f;
    border-radius: 3px;
}
.list-items {
    width: 260px;
    max-height: 300px;
    background-color: #fff;
    border-radius: 2px;
    border: 1px solid #b9bfc9;
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.12), 0 0 6px 0 rgba(0, 0, 0, 0.04);
    position: absolute;
    right: 0;
    overflow-y: scroll;
    z-index: 3;
    padding: 0.5rem 0;
}

.list-item {
    color: #333;
    font-size: 14px;
    line-height: 16px;
    padding: 0.75rem 1rem;

    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;

    position: relative;
}
.list-item:not(.active):hover {
    background-color: #f3f4f6;
    cursor: pointer;
}

.list-item.active {
    color: #fff;
    background-color: #182a4b;
}

.v-enter-active,
.v-leave-active {
    transition: all 0.3s;
}

.v-enter {
    transform: translateY(-10px);
}

.v-enter,
.v-leave-to {
    opacity: 0;
}
</style>
