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
              <strong>{{ $t('cruds.dataMahasiswaOnGoing.title_singular') }}</strong>
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
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.data_mahasiswa') }}
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
                          {{ $t('cruds.dataMahasiswaOnGoing.fields.batas_nilai') }}
                        </td>
                        <td>
                          {{ entry.batas_nilai }}
                          <!-- {{ entry }} -->
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
    <div class="row">
      <template v-for="(chart, key) in charts">
        <div :class="chart.column_class" :key="key">
          <stats-card
            v-if="chart.type === 'Stats'"
            :chart-data="chart"
          ></stats-card>
          <latest-card
            v-else-if="chart.type === 'Latest'"
            :chart-data="chart"
          ></latest-card>
          <div v-else class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">{{ chart.icon }}</i>
              </div>
              <h4 class="card-title">
                {{ chart.title }}
              </h4>
            </div>
            <div class="card-body">
              <component
                v-bind:is="`${chart.type}Chart`"
                :chart-data="chart"
                :options="chart.options"
              ></component>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'
import BarChart from '@components/Charts/Bar'
import LineChart from '@components/Charts/Line'
import PieChart from '@components/Charts/Pie'
import StatsCard from '@components/Charts/Stats'
import LatestCard from '@components/Charts/Latest'
// console.log(dataMahasiswaOnGoingsSingle);
export default {
  components: {
    DatatableAttachments,
    BarChart,
    LineChart,
    PieChart,
    StatsCard,
    LatestCard
  },
  data() {
    return {
      datacollection: null,
      charts: null
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('dataMahasiswaOnGoingsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchProsesData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('dataMahasiswaOnGoingsSingle', ['fetchProsesData', 'resetState'])
  },
  created() {
    axios.get('andri').then(response => {
      this.charts = response.data
      response.data.pie2.labels[0] = 'Lulus'
      response.data.pie2.labels[1] = 'Tidak Lulus'
      response.data.pie2.labels[2] = 'Observes'
      response.data.pie2.labels[3] = ''
      response.data.pie2.labels[4] = ''
      console.log(response.data.pie2.datasets[0].data)
      console.log(response.data)
    })
  }
}
</script>
