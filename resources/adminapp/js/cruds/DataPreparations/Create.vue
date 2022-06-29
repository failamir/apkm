<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
          <div class="card">
            <div class="card-header card-header-danger card-header-icon">
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
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.temp_log,
                      'is-focused': activeField == 'temp_log'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.temp_log')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.temp_log"
                      @input="updateTempLog"
                      @focus="focusField('temp_log')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.temp_nilai,
                      'is-focused': activeField == 'temp_nilai'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataPreparation.fields.temp_nilai')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.temp_nilai"
                      @input="updateTempNilai"
                      @focus="focusField('temp_nilai')"
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
    ...mapGetters('DataPreparationsSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('DataPreparationsSingle', [
      'storeData',
      'resetState',
      'insertDataLogFile',
      'removeDataLogFile',
      'insertDataNilaiFile',
      'removeDataNilaiFile',
      'setTempLog',
      'setTempNilai'
    ]),
    updateTempLog(e) {
      this.setTempLog(e.target.value)
    },
    updateTempNilai(e) {
      this.setTempNilai(e.target.value)
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
