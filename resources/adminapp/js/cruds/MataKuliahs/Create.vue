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
                <strong>{{ $t('cruds.mataKuliah.title_singular') }}</strong>
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
                      'has-items': entry.id_mtk,
                      'is-focused': activeField == 'id_mtk'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.mataKuliah.fields.id_mtk')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.id_mtk"
                      @input="updateIdMtk"
                      @focus="focusField('id_mtk')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama_mtk,
                      'is-focused': activeField == 'nama_mtk'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.mataKuliah.fields.nama_mtk')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama_mtk"
                      @input="updateNamaMtk"
                      @focus="focusField('nama_mtk')"
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
                      $t('cruds.mataKuliah.fields.jurusan')
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
                      'has-items': entry.jumlah_sks,
                      'is-focused': activeField == 'jumlah_sks'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.mataKuliah.fields.jumlah_sks')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.jumlah_sks"
                      @input="updateJumlahSks"
                      @focus="focusField('jumlah_sks')"
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
    ...mapGetters('MataKuliahsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('MataKuliahsSingle', [
      'storeData',
      'resetState',
      'setIdMtk',
      'setNamaMtk',
      'setJurusan',
      'setJumlahSks',
      'fetchCreateData'
    ]),
    updateIdMtk(e) {
      this.setIdMtk(e.target.value)
    },
    updateNamaMtk(e) {
      this.setNamaMtk(e.target.value)
    },
    updateJurusan(value) {
      this.setJurusan(value)
    },
    updateJumlahSks(e) {
      this.setJumlahSks(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'mata_kuliahs.index' })
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
