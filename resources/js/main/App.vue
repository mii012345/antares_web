<template>
    <div>
        <Header></Header>
        <div class="px-3 header-top position-relative">
            <router-view />
        </div>
    </div>
</template>

<script>
    import Header from '../components/Header.vue'

    export default {
        components: {
            Header
        },
    }
</script>
