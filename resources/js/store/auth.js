const state = {
    user: null
};

const getters = {
    checkAuth: state => !!state.user,
    userId: state => (state.user ? state.user.id : null)
};

const mutations = {
    setUser(state, user) {
        state.user = user;
    }
};

const actions = {
    async register(context, data) {
        await new Promise((resolve, reject) => { 
            axios.post("/api/register", data)
                .then(response => { 
                    context.commit("setUser", response.data);
                    resolve(response)
                })
                .catch(error => { 
                    reject(error)
                })
        })
    },
    async login(context, data) {
        await new Promise((resolve, reject) => { 
            axios.post('/api/login', data)
                .then(response => { 
                    context.commit('setUser', response.data);
                    resolve(response)
                }).catch(error => { 
                    reject(error)
                })
        })
    },
    async logout(context) {
        await new Promise((resolve, reject) => { 
            axios.post('/api/logout')
                .then(response => { 
                    context.commit('setUser', null);
                    resolve(response)
                }).catch(error => { 
                    reject(error)
                })
        })
    },
    async currentUser(context) {
        const response = await axios.get("/api/user");
        const user = response.data || null;
        context.commit("setUser", user);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
