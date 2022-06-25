function initialState() {
  return {
    entry: {
      id: null,
      data_log: [],
      data_nilai: [],
      data_hasil: [],
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    loading: false
  }
}

const route = 'preparation-datas'

const getters = {
  entry: state => state.entry,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  insertDataLogFile({ commit }, file) {
    commit('insertDataLogFile', file)
  },
  removeDataLogFile({ commit }, file) {
    commit('removeDataLogFile', file)
  },
  insertDataNilaiFile({ commit }, file) {
    commit('insertDataNilaiFile', file)
  },
  removeDataNilaiFile({ commit }, file) {
    commit('removeDataNilaiFile', file)
  },
  insertDataHasilFile({ commit }, file) {
    commit('insertDataHasilFile', file)
  },
  removeDataHasilFile({ commit }, file) {
    commit('removeDataHasilFile', file)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  insertDataLogFile(state, file) {
    state.entry.data_log.push(file)
  },
  removeDataLogFile(state, file) {
    state.entry.data_log = state.entry.data_log.filter(item => {
      return item.id !== file.id
    })
  },
  insertDataNilaiFile(state, file) {
    state.entry.data_nilai.push(file)
  },
  removeDataNilaiFile(state, file) {
    state.entry.data_nilai = state.entry.data_nilai.filter(item => {
      return item.id !== file.id
    })
  },
  insertDataHasilFile(state, file) {
    state.entry.data_hasil.push(file)
  },
  removeDataHasilFile(state, file) {
    state.entry.data_hasil = state.entry.data_hasil.filter(item => {
      return item.id !== file.id
    })
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
