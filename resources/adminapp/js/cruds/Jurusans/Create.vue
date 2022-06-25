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
                <strong>{{ $t('cruds.jurusan.title_singular') }}</strong>
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
                      'has-items': entry.id_jurusan,
                      'is-focused': activeField == 'id_jurusan'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.jurusan.fields.id_jurusan')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.id_jurusan"
                      @input="updateIdJurusan"
                      @focus="focusField('id_jurusan')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama_jurusan,
                      'is-focused': activeField == 'nama_jurusan'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.jurusan.fields.nama_jurusan')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama_jurusan"
                      @input="updateNamaJurusan"
                      @focus="focusField('nama_jurusan')"
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

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('JurusansSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('JurusansSingle', [
      'storeData',
      'resetState',
      'setIdJurusan',
      'setNamaJurusan'
    ]),
    updateIdJurusan(e) {
      this.setIdJurusan(e.target.value)
    },
    updateNamaJurusan(e) {
      this.setNamaJurusan(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'jurusans.index' })
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
