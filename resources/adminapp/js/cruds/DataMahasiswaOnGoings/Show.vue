<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{
                $t('cruds.dataMahasiswaOnGoing.title_singular')
              }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.nama') }}
                        </td>
                        <td>
                          {{ entry.nama }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswaOnGoing.fields.data_history')
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="data_history.nama"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswaOnGoing.fields.mata_kuliah')
                          }}
                        </td>
                        <td>
                          <datatable-single
                            :row="entry"
                            field="mata_kuliah.nama_mtk"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.data_mahasiswa'
                            )
                          }}
                        </td>
                        <td>
                          <datatable-attachments
                            :row="entry"
                            :field="'data_mahasiswa'"
                          >
                          </datatable-attachments>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.hasil_prediksi'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.hasil_prediksi }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.lulus') }}
                        </td>
                        <td>
                          {{ entry.lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswaOnGoing.fields.tidak_lulus')
                          }}
                        </td>
                        <td>
                          {{ entry.tidak_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.active') }}
                        </td>
                        <td>
                          {{ entry.active }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswaOnGoing.fields.observers')
                          }}
                        </td>
                        <td>
                          {{ entry.observers }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.accuracy') }}
                        </td>
                        <td>
                          {{ entry.accuracy }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswaOnGoing.fields.recall_lulus')
                          }}
                        </td>
                        <td>
                          {{ entry.recall_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.recall_tidak_lulus'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.recall_tidak_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.precision_tidak_lulus'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.precision_tidak_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.precision_lulus'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.precision_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              'cruds.dataMahasiswaOnGoing.fields.prediksi_tidak_lulus'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.prediksi_tidak_lulus }}
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'

export default {
  components: {
    DatatableSingle,
    DatatableAttachments
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('DataMahasiswaOnGoingsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('DataMahasiswaOnGoingsSingle', [
      'fetchShowData',
      'resetState'
    ])
  }
}
</script>
