<template>
    <div class="mt-3">
        <p>Welcome To Antares</p>
        <p>{{ message }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loginInfo: {},
            }
        },
        mounted() {
            console.log('Component mounted.')
            // axios.get('/sanctum/csrf-cookie')
            //     .then(response => {
            //         axios.get('/api/user')
            //             .then(response => {
            //                 this.loginInfo = response.data
            //                 console.log(this.loginInfo)
            //             })
            //             .catch(error => {
            //                 console.log(error)
            //             })
            //     })
            //     .catch(error => {
            //         console.log(error)
            //     })
        },
        computed: {
            message: function(){
                return this.$store.state.message
            }
        }
    }
</script>
