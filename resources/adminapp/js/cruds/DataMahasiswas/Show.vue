<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.dataMahasiswa.title_singular') }}</strong>
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
                          {{ $t('cruds.dataMahasiswa.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.nama') }}
                        </td>
                        <td>
                          {{ entry.nama }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.data_mahasiswa') }}
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
                          {{ $t('cruds.dataMahasiswa.fields.mata_kuliah') }}
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
                          {{ $t('cruds.dataMahasiswa.fields.batas_nilai') }}
                        </td>
                        <td>
                          {{ entry.batas_nilai }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.lulus') }}
                        </td>
                        <td>
                          {{ entry.lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.tidaklulus') }}
                        </td>
                        <td>
                          {{ entry.tidaklulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.active') }}
                        </td>
                        <td>
                          {{ entry.active }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.observers') }}
                        </td>
                        <td>
                          {{ entry.observers }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.accuracy') }}
                        </td>
                        <td>
                          {{ entry.accuracy }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.recall_lulus') }}
                        </td>
                        <td>
                          {{ entry.recall_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t('cruds.dataMahasiswa.fields.recall_tidak_lulus')
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
                              'cruds.dataMahasiswa.fields.precision_tidak_lulus'
                            )
                          }}
                        </td>
                        <td>
                          {{ entry.precision_tidak_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.precision_lulus') }}
                        </td>
                        <td>
                          {{ entry.precision_lulus }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.dataMahasiswa.fields.location') }}
                        </td>
                        <td>
                          {{ entry.location }}
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
import DatatableAttachments from '@components/Datatables/DatatableAttachments'
import DatatableSingle from '@components/Datatables/DatatableSingle'

export default {
  components: {
    DatatableAttachments,
    DatatableSingle
  },
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('DataMahasiswasSingle', ['entry'])
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
    ...mapActions('DataMahasiswasSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
