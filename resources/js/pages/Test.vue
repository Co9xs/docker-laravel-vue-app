<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <DropDownMenu
                    :label="'並び替え'"
                    :listItems="items"
                ></DropDownMenu>
            </div>
        </div>
    </div>
</template>

<script>
import DropDownMenu from "../components/DropDownMenu";
export default {
    components: {
        DropDownMenu
    },
    data() {
        return {
            items: ["評価の高い順", "新しい順", "古い順"]
        };
    }
};
</script>

<style></style>
