function initialState() {
  return {
    entry: {
      id: null,
      nama: '',
      data_mahasiswa: [],
      mata_kuliah_id: null,
      batas_nilai: '',
      lulus: '',
      tidaklulus: '',
      active: '',
      observers: '',
      accuracy: '',
      recall_lulus: '',
      recall_tidak_lulus: '',
      precision_tidak_lulus: '',
      precision_lulus: '',
      location: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    lists: {
      mata_kuliah: []
    },
    loading: false
  }
}

const route = 'data-mahasiswas'

const getters = {
  entry: state => state.entry,
  lists: state => state.lists,
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
  insertDataMahasiswaFile({ commit }, file) {
    commit('insertDataMahasiswaFile', file)
  },
  removeDataMahasiswaFile({ commit }, file) {
    commit('removeDataMahasiswaFile', file)
  },
  setMataKuliah({ commit }, value) {
    commit('setMataKuliah', value)
  },
  setBatasNilai({ commit }, value) {
    commit('setBatasNilai', value)
  },
  setLulus({ commit }, value) {
    commit('setLulus', value)
  },
  setTidaklulus({ commit }, value) {
    commit('setTidaklulus', value)
  },
  setActive({ commit }, value) {
    commit('setActive', value)
  },
  setObservers({ commit }, value) {
    commit('setObservers', value)
  },
  setAccuracy({ commit }, value) {
    commit('setAccuracy', value)
  },
  setRecallLulus({ commit }, value) {
    commit('setRecallLulus', value)
  },
  setRecallTidakLulus({ commit }, value) {
    commit('setRecallTidakLulus', value)
  },
  setPrecisionTidakLulus({ commit }, value) {
    commit('setPrecisionTidakLulus', value)
  },
  setPrecisionLulus({ commit }, value) {
    commit('setPrecisionLulus', value)
  },
  setLocation({ commit }, value) {
    commit('setLocation', value)
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
  fetchCreateData({ commit }) {
    axios.get(`${route}/create`).then(response => {
      commit('setLists', response.data.meta)
    })
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
      commit('setLists', response.data.meta)
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
  insertDataMahasiswaFile(state, file) {
    state.entry.data_mahasiswa.push(file)
  },
  removeDataMahasiswaFile(state, file) {
    state.entry.data_mahasiswa = state.entry.data_mahasiswa.filter(item => {
      return item.id !== file.id
    })
  },
  setMataKuliah(state, value) {
    state.entry.mata_kuliah_id = value
  },
  setBatasNilai(state, value) {
    state.entry.batas_nilai = value
  },
  setLulus(state, value) {
    state.entry.lulus = value
  },
  setTidaklulus(state, value) {
    state.entry.tidaklulus = value
  },
  setActive(state, value) {
    state.entry.active = value
  },
  setObservers(state, value) {
    state.entry.observers = value
  },
  setAccuracy(state, value) {
    state.entry.accuracy = value
  },
  setRecallLulus(state, value) {
    state.entry.recall_lulus = value
  },
  setRecallTidakLulus(state, value) {
    state.entry.recall_tidak_lulus = value
  },
  setPrecisionTidakLulus(state, value) {
    state.entry.precision_tidak_lulus = value
  },
  setPrecisionLulus(state, value) {
    state.entry.precision_lulus = value
  },
  setLocation(state, value) {
    state.entry.location = value
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
  setLists(state, lists) {
    state.lists = lists
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
