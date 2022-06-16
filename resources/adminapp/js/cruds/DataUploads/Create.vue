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
                <strong>{{ $t('cruds.dataUpload.title_singular') }}</strong>
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
                      'has-items': entry.nama_data,
                      'is-focused': activeField == 'nama_data'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataUpload.fields.nama_data')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama_data"
                      @input="updateNamaData"
                      @focus="focusField('nama_data')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.dataUpload.fields.data_excel')
                    }}</label>
                    <attachment
                      :route="getRoute('data-uploads')"
                      :collection-name="'data_upload_data_excel'"
                      :media="entry.data_excel"
                      :max-file-size="32"
                      @file-uploaded="insertDataExcelFile"
                      @file-removed="removeDataExcelFile"
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
    ...mapGetters('DataUploadsSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('DataUploadsSingle', [
      'storeData',
      'resetState',
      'setNamaData',
      'insertDataExcelFile',
      'removeDataExcelFile'
    ]),
    updateNamaData(e) {
      this.setNamaData(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'data_uploads.index' })
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
