<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{
                  $t('cruds.dataPreparation.title_singular')
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
                      $t('cruds.dataPreparation.fields.nama')
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
                      'has-items': entry.akses_file,
                      'is-focused': activeField == 'akses_file'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.akses_file')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.akses_file"
                      @input="updateAksesFile"
                      @focus="focusField('akses_file')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.akses_video,
                      'is-focused': activeField == 'akses_video'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.akses_video')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.akses_video"
                      @input="updateAksesVideo"
                      @focus="focusField('akses_video')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.akses_forum,
                      'is-focused': activeField == 'akses_forum'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.akses_forum')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.akses_forum"
                      @input="updateAksesForum"
                      @focus="focusField('akses_forum')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.kuis_1,
                      'is-focused': activeField == 'kuis_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.kuis_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.kuis_1"
                      @input="updateKuis1"
                      @focus="focusField('kuis_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.kuis_2,
                      'is-focused': activeField == 'kuis_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.kuis_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.kuis_2"
                      @input="updateKuis2"
                      @focus="focusField('kuis_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tugas_1,
                      'is-focused': activeField == 'tugas_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.tugas_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.tugas_1"
                      @input="updateTugas1"
                      @focus="focusField('tugas_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tugas_2,
                      'is-focused': activeField == 'tugas_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.tugas_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.tugas_2"
                      @input="updateTugas2"
                      @focus="focusField('tugas_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nilai_akhir,
                      'is-focused': activeField == 'nilai_akhir'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.nilai_akhir')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="0.01"
                      :value="entry.nilai_akhir"
                      @input="updateNilaiAkhir"
                      @focus="focusField('nilai_akhir')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_1,
                      'is-focused': activeField == 'status_1'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.status_1')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.status_1"
                      @input="updateStatus1"
                      @focus="focusField('status_1')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_2,
                      'is-focused': activeField == 'status_2'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.status_2')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.status_2"
                      @input="updateStatus2"
                      @focus="focusField('status_2')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.status_3,
                      'is-focused': activeField == 'status_3'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.status_3')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.status_3"
                      @input="updateStatus3"
                      @focus="focusField('status_3')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.dataPreparation.fields.data_log')
                    }}</label>
                    <attachment
                      :route="getRoute('data-preparations')"
                      :collection-name="'data_preparation_data_log'"
                      :media="entry.data_log"
                      :max-file-size="100"
                      @file-uploaded="insertDataLogFile"
                      @file-removed="removeDataLogFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.dataPreparation.fields.data_nilai')
                    }}</label>
                    <attachment
                      :route="getRoute('data-preparations')"
                      :collection-name="'data_preparation_data_nilai'"
                      :media="entry.data_nilai"
                      :max-file-size="100"
                      @file-uploaded="insertDataNilaiFile"
                      @file-removed="removeDataNilaiFile"
                      :max-files="1"
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
    ...mapGetters('DataPreparationsSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('DataPreparationsSingle', [
      'storeData',
      'resetState',
      'setNama',
      'setAksesFile',
      'setAksesVideo',
      'setAksesForum',
      'setKuis1',
      'setKuis2',
      'setTugas1',
      'setTugas2',
      'setNilaiAkhir',
      'setStatus1',
      'setStatus2',
      'setStatus3',
      'insertDataLogFile',
      'removeDataLogFile',
      'insertDataNilaiFile',
      'removeDataNilaiFile'
    ]),
    updateNama(e) {
      this.setNama(e.target.value)
    },
    updateAksesFile(e) {
      this.setAksesFile(e.target.value)
    },
    updateAksesVideo(e) {
      this.setAksesVideo(e.target.value)
    },
    updateAksesForum(e) {
      this.setAksesForum(e.target.value)
    },
    updateKuis1(e) {
      this.setKuis1(e.target.value)
    },
    updateKuis2(e) {
      this.setKuis2(e.target.value)
    },
    updateTugas1(e) {
      this.setTugas1(e.target.value)
    },
    updateTugas2(e) {
      this.setTugas2(e.target.value)
    },
    updateNilaiAkhir(e) {
      this.setNilaiAkhir(e.target.value)
    },
    updateStatus1(e) {
      this.setStatus1(e.target.value)
    },
    updateStatus2(e) {
      this.setStatus2(e.target.value)
    },
    updateStatus3(e) {
      this.setStatus3(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'data_preparations.index' })
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
