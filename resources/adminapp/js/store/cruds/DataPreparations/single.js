function initialState() {
  return {
    entry: {
      id: null,
      nama: '',
      akses_file: '',
      akses_video: '',
      akses_forum: '',
      kuis_1: '',
      kuis_2: '',
      tugas_1: '',
      tugas_2: '',
      nilai_akhir: '',
      status_1: '',
      status_2: '',
      status_3: '',
      data_log: [],
      data_nilai: [],
      temp_log: '',
      temp_nilai: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    loading: false
  }
}

const route = 'data-preparations'

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
  setNama({ commit }, value) {
    commit('setNama', value)
  },
  setAksesFile({ commit }, value) {
    commit('setAksesFile', value)
  },
  setAksesVideo({ commit }, value) {
    commit('setAksesVideo', value)
  },
  setAksesForum({ commit }, value) {
    commit('setAksesForum', value)
  },
  setKuis1({ commit }, value) {
    commit('setKuis1', value)
  },
  setKuis2({ commit }, value) {
    commit('setKuis2', value)
  },
  setTugas1({ commit }, value) {
    commit('setTugas1', value)
  },
  setTugas2({ commit }, value) {
    commit('setTugas2', value)
  },
  setNilaiAkhir({ commit }, value) {
    commit('setNilaiAkhir', value)
  },
  setStatus1({ commit }, value) {
    commit('setStatus1', value)
  },
  setStatus2({ commit }, value) {
    commit('setStatus2', value)
  },
  setStatus3({ commit }, value) {
    commit('setStatus3', value)
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
  setTempLog({ commit }, value) {
    commit('setTempLog', value)
  },
  setTempNilai({ commit }, value) {
    commit('setTempNilai', value)
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
  setNama(state, value) {
    state.entry.nama = value
  },
  setAksesFile(state, value) {
    state.entry.akses_file = value
  },
  setAksesVideo(state, value) {
    state.entry.akses_video = value
  },
  setAksesForum(state, value) {
    state.entry.akses_forum = value
  },
  setKuis1(state, value) {
    state.entry.kuis_1 = value
  },
  setKuis2(state, value) {
    state.entry.kuis_2 = value
  },
  setTugas1(state, value) {
    state.entry.tugas_1 = value
  },
  setTugas2(state, value) {
    state.entry.tugas_2 = value
  },
  setNilaiAkhir(state, value) {
    state.entry.nilai_akhir = value
  },
  setStatus1(state, value) {
    state.entry.status_1 = value
  },
  setStatus2(state, value) {
    state.entry.status_2 = value
  },
  setStatus3(state, value) {
    state.entry.status_3 = value
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
  setTempLog(state, value) {
    state.entry.temp_log = value
  },
  setTempNilai(state, value) {
    state.entry.temp_nilai = value
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
