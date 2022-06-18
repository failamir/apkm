<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
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
    ...mapGetters('DataMahasiswaOnGoingsSingle', ['entry', 'loading'])
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
      'insertDataMahasiswaFile',
      'removeDataMahasiswaFile',
      'setHasilPrediksi'
    ]),
    updateNama(e) {
      this.setNama(e.target.value)
    },
    updateHasilPrediksi(e) {
      this.setHasilPrediksi(e.target.value)
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
