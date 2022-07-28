<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Register</h1>
                <div v-if="page === 1">
                    <form @submit.prevent="register">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" v-model="name">
                        </div>
                        <span class="alert alert-danger py-1" v-if="errors.name">{{ errors.name[0] }}</span>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" v-model="email">
                        </div>
                        <span class="alert alert-danger py-1" v-if="errors.email">{{ errors.email[0] }}</span>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" v-model="password">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password Confirm</label>
                            <input type="password" class="form-control" id="password_confirm" v-model="password_confirm">
                        </div>
                        <span class="alert alert-danger py-1" v-if="errors.password">{{ errors.password[0] }}</span>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </div>
                    </form>
                </div>
                <div v-else>
                    <form @submit.prevent="register">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <span class="alert alert-success py-0">{{ name }}</span>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <span class="alert alert-success py-0">{{ email }}</span>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-2">Register</button>
                        </div>
                    </form>
                </div>
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
            password_confirm: '',
            errors: {},
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
                        password: this.password,
                        password_confirmation: this.password_confirm
                    })
                        .then(response => {
                            if(this.page === 1){
                                this.page = 2;
                            }else{
                                this.$router.push('/login');
                            }
                        })
                        .catch(error => {
                            this.errors = error.response.data.errors;
                        })
                })
                .catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>