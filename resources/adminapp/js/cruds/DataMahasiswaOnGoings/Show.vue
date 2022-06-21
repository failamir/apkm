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
              {{ $t("global.view") }}
              <strong>{{
                $t("cruds.dataMahasiswaOnGoing.title_singular")
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
                          {{ $t("cruds.dataMahasiswaOnGoing.fields.id") }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t("cruds.dataMahasiswaOnGoing.fields.nama") }}
                        </td>
                        <td>
                          {{ entry.nama }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t("cruds.dataMahasiswaOnGoing.fields.data_history")
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
                            field="mata_kuliah.id_mtk"
                          >
                          </datatable-single>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{
                            $t(
                              "cruds.dataMahasiswaOnGoing.fields.data_mahasiswa"
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
                              "cruds.dataMahasiswaOnGoing.fields.hasil_prediksi"
                            )
                          }}
                        </td>
                        <td>
                          <a :href="'/' + entry.hasil_prediksi"> Download </a>
                          <!-- {{ entry.hasil_prediksi }} -->
                        </td>
                      </tr>

                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col" id="chart">
              <!-- <apexchart type="pie" width="380" :options="chartOptions" :series="serisL"></apexchart> -->
              <apexchart
                type="pie"
                width="380"
                :options="chartOptions"
                :series="series"
              ></apexchart>
            </div>
            <div class="col" id="chart">
              <!-- <apexchart type="pie" width="380" :options="chartOptions1" :series="serisT"></apexchart> -->
              <apexchart
                type="pie"
                width="380"
                :options="chartOptions1"
                :series="series1"
              ></apexchart>
            </div>
          </div>

          <div id="wrapper">
            <div id="app" v-on:click="seen = !seen" class="control">
              <!-- <button>Show Nilai Accuracy and Recall</button> -->
              <button>Proporsi Mahasiswa Yang Di Prediksi</button>
            </div>

            <div v-if="seen" id="hide">
              <br />
              <p class="font-weight-bold">Di Prediksi Lulus : {{ entry.lulus }}</p>
              <!-- <p class="font-weight-bold">
                Tidak Lulus : {{ entry.tidak_lulus }}
              </p> -->
              <p class="font-weight-bold">
                Di Prediksi Tidak Lulus : {{ entry.tidak_lulus }}
              </p>
              <p class="font-weight-bold">Active : {{ entry.active }}</p>
              <p class="font-weight-bold">Observers : {{ entry.observers }}</p>
              <!-- <p class="font-weight-bold">Accuracy : {{ entry.accuracy }}</p>
              <p class="font-weight-bold">
                Recall Lulus : {{ entry.recall_lulus }}
              </p>
              <p class="font-weight-bold">
                Recall Tidak Lulus : {{ entry.recall_tidak_lulus }}
              </p>
              <p class="font-weight-bold">
                Precision Lulus : {{ entry.precision_lulus }}
              </p>
              <p class="font-weight-bold">
                Precision Tidak Lulus : {{ entry.precision_tidak_lulus }}
              </p> -->
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
import { mapGetters, mapActions } from "vuex";
import DatatableSingle from "@components/Datatables/DatatableSingle";
import DatatableAttachments from "@components/Datatables/DatatableAttachments";
import VueApexCharts from "vue-apexcharts";

export default {
  components: {
    DatatableSingle,
    DatatableAttachments,
    apexchart: VueApexCharts,
  },
  data() {
    return {
      seen: false,
      series: [1, 1],
      series1: [1, 1, 1],
      chartOptions: {
        title: {
          text: "Proporsi Mahasiswa Aktif dan Observers (Data Ongoing)",
          align: "left",
          margin: 10,
          offsetX: 0,
          offsetY: 0,
          floating: false,
          style: {
            fontSize: "14px",
            fontWeight: "bold",
            fontFamily: "Roboto",
            color: "#263238",
          },
        },
        chart: {
          width: 380,
          type: "pie",
        },
        labels: ["Active", "Observers"],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
      // series1: [entry.Active, entry.Observers],
      // series1: [12, 42],
      // series1: [this.charts.data.Active, this.charts.data.Observers],
      chartOptions1: {
        title: {
          text: "Proporsi Keseluruhan Mahasiswa (Data Ongoing)",
          align: "left",
          margin: 10,
          offsetX: 0,
          offsetY: 0,
          floating: false,
          style: {
            fontSize: "14px",
            fontWeight: "bold",
            fontFamily: "Roboto",
            color: "#263238",
          },
        },
        chart: {
          width: 380,
          type: "pie",
        },

        labels: ["Di Prediski Lulus", "Observers", "Di Prediksi Tidak Lulus"],
        responsive: [
          {
            breakpoint: 480,
            options: {
              chart: {
                width: 200,
              },
              legend: {
                position: "bottom",
              },
            },
          },
        ],
      },
    };
  },
  beforeDestroy() {
    this.resetState();
  },
  computed: {
    ...mapGetters("DataMahasiswaOnGoingsSingle", ["entry"]),
  },
  watch: {
    "$route.params.id": {
      immediate: true,
      handler() {
        this.resetState();
        this.fetchShowData(this.$route.params.id);
      },
    },
  },
  methods: {
    ...mapActions("DataMahasiswaOnGoingsSingle", [
      "fetchShowData",
      "resetState",
    ]),
  },
  created() {
    const route = "data-mahasiswa-on-goings";
    axios.get(`${route}/${this.$route.params.id}`).then((response) => {
      this.charts = response.data.data;
      console.log(this.charts, "andri");
      this.a = [this.charts.active, this.charts.observers];
      this.b = [this.charts.lulus, this.charts.observers, this.charts.tidak_lulus];
      console.log(this.b)
      this.series = this.a;
      this.series1 = this.b;
    });
  },
};
</script>
