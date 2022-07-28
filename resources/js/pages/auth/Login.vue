<template>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Login</h1>
                <form @submit.prevent="login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" v-model="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" v-model="password">
                    </div>
                    <div class="mt-3">
                        <span class="alert alert-danger py-1" v-if="error">{{ error }}</span>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-link mt-2" href="/register">Register</a>
                        <button type="submit" class="btn btn-primary mt-2">Login</button>
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
                email: '',
                password: '',
                error: ''
            }
        },
        methods: {
            login() {
                axios.get('/sanctum/csrf-cookie')
                    .then(response => {
                        axios.post('/api/login', {
                            email: this.email,
                            password: this.password
                        })
                            .then(response => {
                                console.log(response)
                                response.data.auth.login_flag = true;
                                this.$store.commit('setUser', response.data.auth);
                                this.$router.push('/');
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