<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.dosen.title_singular') }}</strong>
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
                      'has-items': entry.id_dosen,
                      'is-focused': activeField == 'id_dosen'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.dosen.fields.id_dosen')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.id_dosen"
                      @input="updateIdDosen"
                      @focus="focusField('id_dosen')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.nama_dosen,
                      'is-focused': activeField == 'nama_dosen'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.dosen.fields.nama_dosen')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.nama_dosen"
                      @input="updateNamaDosen"
                      @focus="focusField('nama_dosen')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.jurusan.length !== 0,
                      'is-focused': activeField == 'jurusan'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dosen.fields.jurusan')
                    }}</label>
                    <v-select
                      name="jurusan"
                      label="nama_jurusan"
                      :key="'jurusan-field'"
                      :value="entry.jurusan"
                      :options="lists.jurusan"
                      :closeOnSelect="false"
                      multiple
                      @input="updateJurusan"
                      @search.focus="focusField('jurusan')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div class="form-group">
                    <label>{{ $t('cruds.dosen.fields.title') }}</label>
                    <v-radio
                      :value="entry.title"
                      :options="lists.title"
                      @change="updateTitle"
                    >
                    </v-radio>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dosen.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="email"
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
                      $t('cruds.dosen.fields.no_hp')
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
    ...mapGetters('DosensSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('DosensSingle', [
      'storeData',
      'resetState',
      'setIdDosen',
      'setNamaDosen',
      'setJurusan',
      'setTitle',
      'setEmail',
      'setNoHp',
      'fetchCreateData'
    ]),
    updateIdDosen(e) {
      this.setIdDosen(e.target.value)
    },
    updateNamaDosen(e) {
      this.setNamaDosen(e.target.value)
    },
    updateJurusan(value) {
      this.setJurusan(value)
    },
    updateTitle(value) {
      this.setTitle(value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updateNoHp(e) {
      this.setNoHp(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'dosens.index' })
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
