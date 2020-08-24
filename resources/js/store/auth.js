const state = {
    user: null
};

const getters = {
    checkAuth: state => !!state.user,
    userId: state => (state.user ? state.user.id : null)
};

const mutations = {
    setUser(state, user) {
        console.log(state.user +  '=>' + user)
        state.user = user;
    }
};

const actions = {
    async register(context, data) {
        const response = await axios.post("/api/register", data);
        context.commit("setUser", response.data);
    },
    async login(context, data) {
        const response = await axios.post("/api/login", data);
        context.commit("setUser", response.data);
    },
    async logout(context) {
        const response = await axios.post("/api/logout");
        context.commit("setUser", null);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
