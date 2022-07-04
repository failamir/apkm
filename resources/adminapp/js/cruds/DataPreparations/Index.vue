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
              <strong>{{ $t('cruds.dataPreparation.title') }}</strong>
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

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.dataPreparation.fields.id',
          field: 'id',
          thComp: TranslatedHeader,
          sortable: true,
          colStyle: 'width: 100px;'
        },
        {
          title: 'cruds.dataPreparation.fields.nama',
          field: 'nama',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.akses_file',
          field: 'akses_file',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.akses_video',
          field: 'akses_video',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.akses_forum',
          field: 'akses_forum',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.kuis_1',
          field: 'kuis_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.kuis_2',
          field: 'kuis_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.tugas_1',
          field: 'tugas_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.tugas_2',
          field: 'tugas_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.nilai_akhir',
          field: 'nilai_akhir',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.status_1',
          field: 'status_1',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.status_2',
          field: 'status_2',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.status_3',
          field: 'status_3',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.temp_log',
          field: 'temp_log',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.dataPreparation.fields.temp_nilai',
          field: 'temp_nilai',
          thComp: TranslatedHeader,
          sortable: true
        },
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
        module: 'DataPreparationsIndex',
        route: 'data_preparations',
        permission_prefix: 'data_preparation_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('DataPreparationsIndex', ['data', 'total', 'loading'])
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
    ...mapActions('DataPreparationsIndex', [
      'fetchIndexData',
      'setQuery',
      'resetState'
    ])
  }
}
</script>
