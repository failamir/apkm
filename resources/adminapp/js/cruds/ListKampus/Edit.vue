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
                <strong>{{ $t('cruds.listKampu.title_singular') }}</strong>
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
                      'has-items': entry.id_kampus,
                      'is-focused': activeField == 'id_kampus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.listKampu.fields.id_kampus')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.id_kampus"
                      @input="updateIdKampus"
                      @focus="focusField('id_kampus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama_kampus,
                      'is-focused': activeField == 'nama_kampus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.listKampu.fields.nama_kampus')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama_kampus"
                      @input="updateNamaKampus"
                      @focus="focusField('nama_kampus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.deskripsi,
                      'is-focused': activeField == 'deskripsi'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.listKampu.fields.deskripsi')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.deskripsi"
                      @input="updateDeskripsi"
                      @focus="focusField('deskripsi')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.alamat,
                      'is-focused': activeField == 'alamat'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.listKampu.fields.alamat')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.alamat"
                      @input="updateAlamat"
                      @focus="focusField('alamat')"
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
    ...mapGetters('ListKampusSingle', ['entry', 'loading'])
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
    ...mapActions('ListKampusSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setIdKampus',
      'setNamaKampus',
      'setDeskripsi',
      'setAlamat'
    ]),
    updateIdKampus(e) {
      this.setIdKampus(e.target.value)
    },
    updateNamaKampus(e) {
      this.setNamaKampus(e.target.value)
    },
    updateDeskripsi(e) {
      this.setDeskripsi(e.target.value)
    },
    updateAlamat(e) {
      this.setAlamat(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'list_kampus.index' })
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
