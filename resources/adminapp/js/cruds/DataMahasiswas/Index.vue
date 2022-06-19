<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.dataMahasiswa.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
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
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.dataMahasiswa.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.dataMahasiswa.fields.nama',
          field: 'nama',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataMahasiswa.fields.data_mahasiswa',
          field: 'data_mahasiswa',
          thComp: TranslatedHeader,
          tdComp: DatatableAttachments
        },
        {
          title: 'cruds.dataMahasiswa.fields.batas_nilai',
          field: 'batas_nilai',
          thComp: TranslatedHeader,
          sortable: true
        },
        // {
        //   title: 'cruds.dataMahasiswa.fields.lulus',
        //   field: 'lulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.tidaklulus',
        //   field: 'tidaklulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.active',
        //   field: 'active',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.observers',
        //   field: 'observers',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.accuracy',
        //   field: 'accuracy',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.recall_lulus',
        //   field: 'recall_lulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.recall_tidak_lulus',
        //   field: 'recall_tidak_lulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.precision_tidak_lulus',
        //   field: 'precision_tidak_lulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        // {
        //   title: 'cruds.dataMahasiswa.fields.precision_lulus',
        //   field: 'precision_lulus',
        //   thComp: TranslatedHeader,
        //   sortable: true
        // },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'id', order: 'desc', limit: 100, s: '' },
      xprops: {
        module: 'DataMahasiswasIndex',
        route: 'data_mahasiswas',
        permission_prefix: 'data_mahasiswa_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('DataMahasiswasIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('DataMahasiswasIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
