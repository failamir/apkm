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
                  $t('cruds.preparationData.title_singular')
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
                      $t('cruds.preparationData.fields.data_log')
                    }}</label>
                    <attachment
                      :route="getRoute('preparation-datas')"
                      :collection-name="'preparation_data_data_log'"
                      :media="entry.data_log"
                      :max-file-size="100"
                      @file-uploaded="insertDataLogFile"
                      @file-removed="removeDataLogFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.preparationData.fields.data_nilai')
                    }}</label>
                    <attachment
                      :route="getRoute('preparation-datas')"
                      :collection-name="'preparation_data_data_nilai'"
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
                      'has-items': entry.data_hasil,
                      'is-focused': activeField == 'data_hasil'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.preparationData.fields.data_hasil')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.data_hasil"
                      @input="updateDataHasil"
                      @focus="focusField('data_hasil')"
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
    ...mapGetters('PreparationDatasSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('PreparationDatasSingle', [
      'storeData',
      'resetState',
      'insertDataLogFile',
      'removeDataLogFile',
      'insertDataNilaiFile',
      'removeDataNilaiFile',
      'setDataHasil'
    ]),
    updateDataHasil(e) {
      this.setDataHasil(e.target.value)
    },
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'preparation_datas.index' })
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
