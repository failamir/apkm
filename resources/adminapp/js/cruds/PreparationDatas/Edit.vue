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
                      :model-id="$route.params.id"
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
                      :model-id="$route.params.id"
                      :max-file-size="100"
                      @file-uploaded="insertDataNilaiFile"
                      @file-removed="removeDataNilaiFile"
                      :max-files="1"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{
                      $t('cruds.preparationData.fields.data_hasil')
                    }}</label>
                    <attachment
                      :route="getRoute('preparation-datas')"
                      :collection-name="'preparation_data_data_hasil'"
                      :media="entry.data_hasil"
                      :model-id="$route.params.id"
                      :max-file-size="100"
                      @file-uploaded="insertDataHasilFile"
                      @file-removed="removeDataHasilFile"
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
    ...mapGetters('PreparationDatasSingle', ['entry', 'loading'])
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
    ...mapActions('PreparationDatasSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'insertDataLogFile',
      'removeDataLogFile',
      'insertDataNilaiFile',
      'removeDataNilaiFile',
      'insertDataHasilFile',
      'removeDataHasilFile'
    ]),
    getRoute(name) {
      return `${axios.defaults.baseURL}${name}/media`
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'preparation_datas.index' })
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
