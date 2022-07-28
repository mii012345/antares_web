export const user = {
    name: 'module/user',
    namespaced: true,
    state: {
        user: {},
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        }
    },
    getters: {
        getUser(state) {
            return state.user
        }
    },
    actions: {
        async getUser({ commit }) {
            try{
                const user = await axios.get('/api/user')
                commit('setUser', user.data)
            }
            catch(error){
                const user = {}
                user.login_flag = false
                commit('setUser', user.data)
            }
        }
    }
}

