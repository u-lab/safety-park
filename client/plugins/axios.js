export default ({ $axios, store: { getters } }) => {
  $axios.onRequest((config) => {
    if (getters.exsitToken) {
      config.headers.common['X-API-TOKEN'] = getters.token
    }
  })
}
