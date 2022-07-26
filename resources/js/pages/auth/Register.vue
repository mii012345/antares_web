<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Register</h1>
                <form @submit.prevent="register">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" id="name" v-model="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" v-model="password">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-2">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            page: 1,
        }
    },
    methods: {
        register() {
            let url = '/api/register';
            if(this.page === 1){
                url = '/api/register-valid';
            }
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post(url, {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            console.log(response)
                        })
                        .catch(error => {
                            this.error = error.response.data.errors.email[0]
                        })
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>