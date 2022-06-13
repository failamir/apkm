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
import DashboardContent from './Content.vue'
import TopNavbar from './TopNavbar.vue'
import MobileMenu from './MobileMenu.vue'

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
          title: 'cruds.uploadDataMahasiswaHistory.title',
          icon: 'table_view',
          path: { name: 'upload_data_mahasiswa_histories.index' },
          gate: 'upload_data_mahasiswa_history_access'
        },
        {
          title: 'cruds.uploadDataMahasiswaOnGoing.title',
          icon: 'table_view',
          path: { name: 'upload_data_mahasiswa_on_goings.index' },
          gate: 'upload_data_mahasiswa_on_going_access'
        },
        {
          title: 'cruds.report.title',
          icon: 'table_view',
          path: { name: 'report' },
          gate: 'report_access',
          children: [
            {
              title: 'cruds.dataMahasiswaHistory.title',
              icon: 'table_view',
              path: { name: 'data_mahasiswa_histories.index' },
              gate: 'data_mahasiswa_history_access'
            },
            {
              title: 'cruds.dataMahasiswaOnGoing.title',
              icon: 'table_view',
              path: { name: 'data_mahasiswa_on_goings.index' },
              gate: 'data_mahasiswa_on_going_access'
            }
          ]
        }
      ]
    }
  }
}
</script>
