<template>
    <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
        <event-hub></event-hub>
        <side-bar :sidebarLinks="sidebarLinks">
            <mobile-menu slot="content"></mobile-menu>
        </side-bar>

        <div class="main-panel">
            <top-navbar></top-navbar>
            <div class="content">
                <dashboard-content></dashboard-content>
            </div>
        </div>
    </div>
</template>

<script>
import DashboardContent from "./Content.vue";
import TopNavbar from "./TopNavbar.vue";
import MobileMenu from "./MobileMenu.vue";

export default {
  components: {
    DashboardContent,
    TopNavbar,
    MobileMenu
  },
  data() {
    return {
      sidebarLinks: [
        {
          title: 'global.dashboard',
          icon: 'dashboard',
          path: { name: 'dashboard' }
        },
        {
          title: 'cruds.dataMahasiswa.title',
          icon: 'table_view',
          path: { name: 'data_mahasiswas.index' },
          gate: 'data_mahasiswa_access'
        },
        {
          title: 'cruds.dataMahasiswaOnGoing.title',
          icon: 'table_view',
          path: { name: 'data_mahasiswa_on_goings.index' },
          gate: 'data_mahasiswa_on_going_access'
        },
        {
          title: 'cruds.dataPreparation.title',
          icon: 'table_view',
          path: { name: 'data_preparations.index' },
          gate: 'data_preparation_access'
        },
        {
          title: 'cruds.report.title',
          icon: 'table_view',
          path: { name: 'report' },
          gate: 'report_access',
          children: [
            {
              title: 'cruds.reportMahasiswaOngoing.title',
              icon: 'table_view',
              path: { name: 'report_mahasiswa_ongoings.index' },
              gate: 'report_mahasiswa_ongoing_access'
            },
            {
              title: 'cruds.reportMahasiswaHistory.title',
              icon: 'table_view',
              path: { name: 'report_mahasiswa_histories.index' },
              gate: 'report_mahasiswa_history_access'
            }
          ]
        },
        {
          title: 'cruds.dataMaster.title',
          icon: 'table_view',
          path: { name: 'data_master' },
          gate: 'data_master_access',
          children: [
            {
              title: 'cruds.tentangAplikasi.title',
              icon: 'table_view',
              path: { name: 'tentang_aplikasis.index' },
              gate: 'tentang_aplikasi_access'
            },
            {
              title: 'cruds.mahasiswa.title',
              icon: 'table_view',
              path: { name: 'mahasiswas.index' },
              gate: 'mahasiswa_access'
            },
            {
              title: 'cruds.mataKuliah.title',
              icon: 'table_view',
              path: { name: 'mata_kuliahs.index' },
              gate: 'mata_kuliah_access'
            },
            {
              title: 'cruds.dosen.title',
              icon: 'table_view',
              path: { name: 'dosens.index' },
              gate: 'dosen_access'
            },
            {
              title: 'cruds.jurusan.title',
              icon: 'table_view',
              path: { name: 'jurusans.index' },
              gate: 'jurusan_access'
            },
            {
              title: 'cruds.kampu.title',
              icon: 'table_view',
              path: { name: 'kampus.index' },
              gate: 'kampu_access'
            }
          ]
        },
        {
          title: 'cruds.userManagement.title',
          icon: 'person',
          path: { name: 'user_management' },
          gate: 'user_management_access',
          children: [
            {
              title: 'cruds.permission.title',
              icon: 'perm_data_setting',
              path: { name: 'permissions.index' },
              gate: 'permission_access'
            },
            {
              title: 'cruds.role.title',
              icon: 'group',
              path: { name: 'roles.index' },
              gate: 'role_access'
            },
            {
              title: 'cruds.user.title',
              icon: 'person',
              path: { name: 'users.index' },
              gate: 'user_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
