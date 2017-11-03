<template>
    <div class="wrap">
        <router-view></router-view>
    </div>
</template>

<script type="text/babel">

    export default {
        name: 'NinjaFeedbackApp',
        data() {
            return {

            }
        },
        mounted() {

        },
    }

</script>

<style>
    .el-message {
        z-index: 999999 !important;
        top: 5px;
    }
</style>