<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{
                  $t('cruds.dataMahasiswaOnGoing.title_singular')
                }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama,
                      'is-focused': activeField == 'nama'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.nama')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama"
                      @input="updateNama"
                      @focus="focusField('nama')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.data_history_id !== null,
                      'is-focused': activeField == 'data_history'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.data_history')
                    }}</label>
                    <v-select
                      name="data_history"
                      label="nama"
                      :key="'data_history-field'"
                      :value="entry.data_history_id"
                      :options="lists.data_history"
                      :reduce="entry => entry.id"
                      @input="updateDataHistory"
                      @search.focus="focusField('data_history')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.mata_kuliah_id !== null,
                      'is-focused': activeField == 'mata_kuliah'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.mata_kuliah')
                    }}</label>
                    <v-select
                      name="mata_kuliah"
                      label="id_mtk"
                      :key="'mata_kuliah-field'"
                      :value="entry.mata_kuliah_id"
                      :options="lists.mata_kuliah"
                      :reduce="entry => entry.id"
                      @input="updateMataKuliah"
                      @search.focus="focusField('mata_kuliah')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.dataMahasiswaOnGoing.fields.data_mahasiswa')
                    }}</label>
                    <attachment
                      :route="getRoute('data-mahasiswa-on-goings')"
                      :collection-name="'data_mahasiswa_on_going_data_mahasiswa'"
                      :media="entry.data_mahasiswa"
                      :model-id="$route.params.id"
                      :max-file-size="32"
                      @file-uploaded="insertDataMahasiswaFile"
                      @file-removed="removeDataMahasiswaFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.hasil_prediksi,
                      'is-focused': activeField == 'hasil_prediksi'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.hasil_prediksi')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.hasil_prediksi"
                      @input="updateHasilPrediksi"
                      @focus="focusField('hasil_prediksi')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.lulus,
                      'is-focused': activeField == 'lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.lulus"
                      @input="updateLulus"
                      @focus="focusField('lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tidak_lulus,
                      'is-focused': activeField == 'tidak_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.tidak_lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.tidak_lulus"
                      @input="updateTidakLulus"
                      @focus="focusField('tidak_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.active,
                      'is-focused': activeField == 'active'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.active')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.active"
                      @input="updateActive"
                      @focus="focusField('active')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.observers,
                      'is-focused': activeField == 'observers'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.observers')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.observers"
                      @input="updateObservers"
                      @focus="focusField('observers')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.accuracy,
                      'is-focused': activeField == 'accuracy'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.accuracy')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.accuracy"
                      @input="updateAccuracy"
                      @focus="focusField('accuracy')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.recall_lulus,
                      'is-focused': activeField == 'recall_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.recall_lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.recall_lulus"
                      @input="updateRecallLulus"
                      @focus="focusField('recall_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.recall_tidak_lulus,
                      'is-focused': activeField == 'recall_tidak_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.recall_tidak_lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.recall_tidak_lulus"
                      @input="updateRecallTidakLulus"
                      @focus="focusField('recall_tidak_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.precision_tidak_lulus,
                      'is-focused': activeField == 'precision_tidak_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t(
                        'cruds.dataMahasiswaOnGoing.fields.precision_tidak_lulus'
                      )
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.precision_tidak_lulus"
                      @input="updatePrecisionTidakLulus"
                      @focus="focusField('precision_tidak_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.precision_lulus,
                      'is-focused': activeField == 'precision_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswaOnGoing.fields.precision_lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.precision_lulus"
                      @input="updatePrecisionLulus"
                      @focus="focusField('precision_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import Attachment from '@components/Attachments/Attachment'

export default {
  components: {
    Attachment
  },
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('DataMahasiswaOnGoingsSingle', ['entry', 'loading', 'lists'])
  },
  beforeDestroy() {
    this.resetState()
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchEditData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('DataMahasiswaOnGoingsSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setNama',
      'setDataHistory',
      'setMataKuliah',
      'insertDataMahasiswaFile',
      'removeDataMahasiswaFile',
      'setHasilPrediksi',
      'setLulus',
      'setTidakLulus',
      'setActive',
      'setObservers',
      'setAccuracy',
      'setRecallLulus',
      'setRecallTidakLulus',
      'setPrecisionTidakLulus',
      'setPrecisionLulus'
    ]),
    updateNama(e) {
      this.setNama(e.target.value)
    },
    updateDataHistory(value) {
      this.setDataHistory(value)
    },
    updateMataKuliah(value) {
      this.setMataKuliah(value)
    },
    updateHasilPrediksi(e) {
      this.setHasilPrediksi(e.target.value)
    },
    updateLulus(e) {
      this.setLulus(e.target.value)
    },
    updateTidakLulus(e) {
      this.setTidakLulus(e.target.value)
    },
    updateActive(e) {
      this.setActive(e.target.value)
    },
    updateObservers(e) {
      this.setObservers(e.target.value)
    },
    updateAccuracy(e) {
      this.setAccuracy(e.target.value)
    },
    updateRecallLulus(e) {
      this.setRecallLulus(e.target.value)
    },
    updateRecallTidakLulus(e) {
      this.setRecallTidakLulus(e.target.value)
    },
    updatePrecisionTidakLulus(e) {
      this.setPrecisionTidakLulus(e.target.value)
    },
    updatePrecisionLulus(e) {
      this.setPrecisionLulus(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'data_mahasiswa_on_goings.index' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
