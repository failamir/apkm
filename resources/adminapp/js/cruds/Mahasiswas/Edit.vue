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
                <strong>{{ $t('cruds.mahasiswa.title_singular') }}</strong>
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
                      'has-items': entry.id_mahasiswa,
                      'is-focused': activeField == 'id_mahasiswa'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mahasiswa.fields.id_mahasiswa')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.id_mahasiswa"
                      @input="updateIdMahasiswa"
                      @focus="focusField('id_mahasiswa')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama,
                      'is-focused': activeField == 'nama'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.mahasiswa.fields.nama')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama"
                      @input="updateNama"
                      @focus="focusField('nama')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.jurusan_id !== null,
                      'is-focused': activeField == 'jurusan'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mahasiswa.fields.jurusan')
                    }}</label>
                    <v-select
                      name="jurusan"
                      label="nama_jurusan"
                      :key="'jurusan-field'"
                      :value="entry.jurusan_id"
                      :options="lists.jurusan"
                      :reduce="entry => entry.id"
                      @input="updateJurusan"
                      @search.focus="focusField('jurusan')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.angkatan,
                      'is-focused': activeField == 'angkatan'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mahasiswa.fields.angkatan')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.angkatan"
                      @input="updateAngkatan"
                      @focus="focusField('angkatan')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mahasiswa.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.no_hp,
                      'is-focused': activeField == 'no_hp'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mahasiswa.fields.no_hp')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.no_hp"
                      @input="updateNoHp"
                      @focus="focusField('no_hp')"
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
    ...mapGetters('MahasiswasSingle', ['entry', 'loading', 'lists'])
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
    ...mapActions('MahasiswasSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setIdMahasiswa',
      'setNama',
      'setJurusan',
      'setAngkatan',
      'setEmail',
      'setNoHp'
    ]),
    updateIdMahasiswa(e) {
      this.setIdMahasiswa(e.target.value)
    },
    updateNama(e) {
      this.setNama(e.target.value)
    },
    updateJurusan(value) {
      this.setJurusan(value)
    },
    updateAngkatan(e) {
      this.setAngkatan(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateNoHp(e) {
      this.setNoHp(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'mahasiswas.index' })
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
