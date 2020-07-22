import axios from 'axios'
const LS_TOKEN_KEY = 'token' // TokenをLocalStorageに保存するKey名

export const state = () => ({
  token: null
})

export const getters = {
  token: state => state.token,
  exsitToken: state => !!state.token
}

export const mutations = {
  setToken (state, { token }) {
    state.token = token
  }
}

export const actions = {
  async nuxtClientInit ({ commit, getters }) {
    if (getters.exsitToken) {
      return
    }

    // 2回目以降のアクセスでは、TokenをLocal Storageから取得する
    const token = localStorage.getItem(LS_TOKEN_KEY)
    if (token && token !== 'undefined') {
      commit('setToken', token)
      return
    }

    // 初回アクセス時は、TokenをAPIで生成する
    // TokenをAPIで生成する
    try {
      const { data } = await axios.post('/api/v1/key')
      console.error('Yap')
      console.error(data)
      commit('setToken', { token: data.token })
      localStorage.setItem(LS_TOKEN_KEY, getters.token)
    } catch (e) {
      console.error(e)
    }
  }
}
