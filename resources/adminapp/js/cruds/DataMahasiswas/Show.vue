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
                          {{ $t('cruds.dataMahasiswa.fields.batas_nilai') }}
                        </td>
                        <td>
                          {{ entry.batas_nilai }}
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
            <div class="col-md-12">
              <div class="row">
                <div class="col" id="chart">
                  <apexchart type="pie" width="380" :options="chartOptions" :series="series"></apexchart>
                </div>
                <div class="col" id="chart">
                  <apexchart type="pie" width="380" :options="chartOptions1" :series="series1"></apexchart>
                </div>
            </div>

            <div id="wrapper">
            <div id="app" v-on:click="seen = !seen" class="control">
                <button>Show Nilai Accuracy and Recall</button>
            </div>
                  
            <div v-if="seen" id="hide">
            <br>
            <p class="font-weight-bold">Lulus : {{ entry.Lulus}} </p>
            <p class="font-weight-bold">Tidak Lulus : {{ entry.TidakLulus}} </p>
            <p class="font-weight-bold">Active : {{ entry.Active}} </p>
            <p class="font-weight-bold">Observers : {{ entry.Observers}} </p>
                <p class="font-weight-bold">Accuracy : {{ entry.Accuracy}} </p>
                <p class="font-weight-bold">Recall Lulus : {{ entry.RecallLulus}} </p>
                <p class="font-weight-bold">Recall Tidak Lulus : {{ entry.RecallTidakLulus}} </p>
                <p class="font-weight-bold">Precision Lulus : {{ entry.PrecisionLulus}} </p>
                <p class="font-weight-bold">Precision Tidak Lulus : {{ entry.PrecisionTidakLulus}} </p>
                
            </div>
          </div>
          </div>
        <!-- <div id="info">Testy</div>
      <button onclick="show">Show/Hide</button> -->
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'
import VueApexCharts from 'vue-apexcharts'
// import show from './show.js';

export default {
  mounted() {
  //  show()
  // console.log(DataMahasiswasSingle)
  // console.log(this.$store.getters.DataMahasiswasSingle)
  console.log(['entry'])
  this.andri = this.entry.Lulus,
        this.cantik = this.entry.TidakLulus
        // console.log(this.andri)
  },
  components: {
    DatatableAttachments,
    apexchart: VueApexCharts,
  },
  // data() {
  //   return {}
  // },
  data: function() {
    // console.log(['entry'])
      return {
        andri: "",
        cantik:"",
        // andri: this.entry.Lulus,
        // cantik:this.cantik,
        seen: false,
        // series: [this.andri, this.cantik],
        // series: [andri, cantik],
        series: [12, 34],
          chartOptions: {
               title: {
                text: 'Proporsi Jumlah Lulus dan Tidak Lulus',
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                  fontSize:  '14px',
                  fontWeight:  'bold',
                  fontFamily:  'Roboto',
                  color:  '#263238'
                },
            },
            chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['Lulus', 'Tidak Lulus'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
          // series1: [entry.Active, entry.Observers],
          series1: [12, 34],
          chartOptions1: {
               title: {
                text: 'Proporsi Mahasiswa Aktif dan Observers',
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                  fontSize:  '14px',
                  fontWeight:  'bold',
                  fontFamily:  'Roboto',
                  color:  '#263238'
                },
            },
            chart: {
              width: 380,
              type: 'pie',
            },
            labels: ['Active', 'Observers'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
      }
    },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('DataMahasiswasSingle', ['entry'])
    
    // andri: entry.Lulus,
    //     cantik:entry.TidakLulus,
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
    ...mapActions('DataMahasiswasSingle', ['fetchShowData', 'resetState']),
    // console.log(['entry'])
    // andri: entry.Lulus,
    //     cantik:entry.TidakLulus,
  },
  created() {
    // axios.get('dashboard').then(response => {
    //   this.charts = response.data
    // })
    // console.log(DataMahasiswasSingle)
    // console.log(DataMahasiswasSingle)
    // console.log(this.getters.entry)
    // console.log(this.entry)
    console.log(['andri'])
    console.log(['entry'])
    // this.andri = this.entry.Lulus
    //     this.cantik = this.entry.TidakLulus
  }
}
// new Vue({
// el:'#wrapper',
// data:{
//     seen: true
// }
// });
</script>
