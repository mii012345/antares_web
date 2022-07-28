<template>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light border-bottom" id="header">
        <div class="container-fluid cursor-default">
            <span
                class="navbar-brand"
            >Antares inc.</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse header-sp" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == 'home'}"
                            @click="routePush('home')"
                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        >Home</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == 'link'}"
                            @click="routePush('link')"
                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        >Link</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li v-if="user.login_flag">
                        <a class="nav-link pointer" :class="{'active': $route.name == '/logout'}" @click="routePush('logout')">Logout</a>
                    </li>
                    <li class="nav-item" v-else>
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == '/login'}"
                            @click="routePush('login')"
                            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                        >Login</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse header-pc">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == 'home'}"
                            @click="routePush('home')"
                        >Home</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == 'link'}"
                            @click="routePush('link')"
                        >Link</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li v-if="user.login_flag">
                        <a class="nav-link pointer" :class="{'active': $route.name == '/logout'}" @click="routePush('logout')">Logout</a>
                    </li>
                    <li class="nav-item" v-else>
                        <a
                            class="nav-link pointer"
                            :class="{'active': $route.name == '/login'}"
                            @click="routePush('login')"
                        >Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            user: {},
            collapse: false,
        }
    },
    mounted() {
        
    },
    methods: {
        routePush(name) {
            if(this.$route.name !== name){
                this.$router.push({ name: name});
                
            }
        }
    }
}
</script>
