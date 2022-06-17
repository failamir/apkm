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
                <strong>{{ $t('cruds.dataDummy.title_singular') }}</strong>
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
                      'has-items': entry.lulus,
                      'is-focused': activeField == 'lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataDummy.fields.lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.lulus"
                      @input="updateLulus"
                      @focus="focusField('lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.tidak_lulus,
                      'is-focused': activeField == 'tidak_lulus'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataDummy.fields.tidak_lulus')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.tidak_lulus"
                      @input="updateTidakLulus"
                      @focus="focusField('tidak_lulus')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.observers,
                      'is-focused': activeField == 'observers'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.dataDummy.fields.observers')
                    }}</label>
                    <input
                      class="form-control"
                      type="number"
                      step="1"
                      :value="entry.observers"
                      @input="updateObservers"
                      @focus="focusField('observers')"
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
    ...mapGetters('DataDummiesSingle', ['entry', 'loading'])
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
    ...mapActions('DataDummiesSingle', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setLulus',
      'setTidakLulus',
      'setObservers'
    ]),
    updateLulus(e) {
      this.setLulus(e.target.value)
    },
    updateTidakLulus(e) {
      this.setTidakLulus(e.target.value)
    },
    updateObservers(e) {
      this.setObservers(e.target.value)
    },
    submitForm() {
      this.updateData()
        .then(() => {
          this.$router.push({ name: 'data_dummies.index' })
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
