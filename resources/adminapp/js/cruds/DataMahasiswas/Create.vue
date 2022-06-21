<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.dataMahasiswa.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama,
                      'is-focused': activeField == 'nama'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswa.fields.nama')
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
                  <div class="form-group">
                    <label>{{
                      $t('cruds.dataMahasiswa.fields.data_mahasiswa')
                    }}</label>
                    <attachment
                      :route="getRoute('data-mahasiswas')"
                      :collection-name="'data_mahasiswa_data_mahasiswa'"
                      :media="entry.data_mahasiswa"
                      :max-file-size="132"
                      @file-uploaded="insertDataMahasiswaFile"
                      @file-removed="removeDataMahasiswaFile"
                      :max-files="1"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.batas_nilai,
                      'is-focused': activeField == 'batas_nilai'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswa.fields.batas_nilai')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.batas_nilai"
                      @input="updateBatasNilai"
                      @focus="focusField('batas_nilai')"
                      @blur="clearFocus"
                    />
                  </div>
                  <!-- <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.lulus,
                      'is-focused': activeField == 'lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswa.fields.lulus')
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
                      'has-items': entry.tidaklulus,
                      'is-focused': activeField == 'tidaklulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataMahasiswa.fields.tidaklulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.tidaklulus"
                      @input="updateTidaklulus"
                      @focus="focusField('tidaklulus')"
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
                      $t('cruds.dataMahasiswa.fields.active')
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
                      $t('cruds.dataMahasiswa.fields.observers')
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
                      $t('cruds.dataMahasiswa.fields.accuracy')
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
                      $t('cruds.dataMahasiswa.fields.recall_lulus')
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
                      $t('cruds.dataMahasiswa.fields.recall_tidak_lulus')
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
                      $t('cruds.dataMahasiswa.fields.precision_tidak_lulus')
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
                      $t('cruds.dataMahasiswa.fields.precision_lulus')
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
                  </div> -->
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
    ...mapGetters('DataMahasiswasSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('DataMahasiswasSingle', [
      'storeData',
      'resetState',
      'setNama',
      'insertDataMahasiswaFile',
      'removeDataMahasiswaFile',
      'setBatasNilai',
      'setLulus',
      'setTidaklulus',
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
    updateBatasNilai(e) {
      this.setBatasNilai(e.target.value)
    },
    updateLulus(e) {
      this.setLulus(e.target.value)
    },
    updateTidaklulus(e) {
      this.setTidaklulus(e.target.value)
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
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'data_mahasiswas.index' })
          this.$eventHub.$emit('create-success')
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
