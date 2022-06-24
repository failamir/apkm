import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'data-mahasiswas',
        name: 'data_mahasiswas.index',
        component: () => import('@cruds/DataMahasiswas/Index.vue'),
        meta: { title: 'cruds.dataMahasiswa.title' }
      },
      {
        path: 'data-mahasiswas/create',
        name: 'data_mahasiswas.create',
        component: () => import('@cruds/DataMahasiswas/Create.vue'),
        meta: { title: 'cruds.dataMahasiswa.title' }
      },
      {
        path: 'data-mahasiswas/:id',
        name: 'data_mahasiswas.show',
        component: () => import('@cruds/DataMahasiswas/Show.vue'),
        meta: { title: 'cruds.dataMahasiswa.title' }
      },
      {
        path: 'data-mahasiswas/:id/edit',
        name: 'data_mahasiswas.edit',
        component: () => import('@cruds/DataMahasiswas/Edit.vue'),
        meta: { title: 'cruds.dataMahasiswa.title' }
      },
      {
        path: 'data-mahasiswa-on-goings',
        name: 'data_mahasiswa_on_goings.index',
        component: () => import('@cruds/DataMahasiswaOnGoings/Index.vue'),
        meta: { title: 'cruds.dataMahasiswaOnGoing.title' }
      },
      {
        path: 'data-mahasiswa-on-goings/create',
        name: 'data_mahasiswa_on_goings.create',
        component: () => import('@cruds/DataMahasiswaOnGoings/Create.vue'),
        meta: { title: 'cruds.dataMahasiswaOnGoing.title' }
      },
      {
        path: 'data-mahasiswa-on-goings/:id',
        name: 'data_mahasiswa_on_goings.show',
        component: () => import('@cruds/DataMahasiswaOnGoings/Show.vue'),
        meta: { title: 'cruds.dataMahasiswaOnGoing.title' }
      },
      {
        path: 'data-mahasiswa-on-goings/:id/edit',
        name: 'data_mahasiswa_on_goings.edit',
        component: () => import('@cruds/DataMahasiswaOnGoings/Edit.vue'),
        meta: { title: 'cruds.dataMahasiswaOnGoing.title' }
      },
      {
        path: 'data-preparations',
        name: 'data_preparations.index',
        component: () => import('@cruds/DataPreparations/Index.vue'),
        meta: { title: 'cruds.dataPreparation.title' }
      },
      {
        path: 'data-preparations/create',
        name: 'data_preparations.create',
        component: () => import('@cruds/DataPreparations/Create.vue'),
        meta: { title: 'cruds.dataPreparation.title' }
      },
      {
        path: 'data-preparations/:id',
        name: 'data_preparations.show',
        component: () => import('@cruds/DataPreparations/Show.vue'),
        meta: { title: 'cruds.dataPreparation.title' }
      },
      {
        path: 'data-preparations/:id/edit',
        name: 'data_preparations.edit',
        component: () => import('@cruds/DataPreparations/Edit.vue'),
        meta: { title: 'cruds.dataPreparation.title' }
      },
      {
        path: 'data-master',
        name: 'data_master',
        component: View,
        redirect: { name: 'tentang_aplikasis.index' },
        children: [
          {
            path: 'tentang-aplikasis',
            name: 'tentang_aplikasis.index',
            component: () => import('@cruds/TentangAplikasis/Index.vue'),
            meta: { title: 'cruds.tentangAplikasi.title' }
          },
          {
            path: 'mahasiswas',
            name: 'mahasiswas.index',
            component: () => import('@cruds/Mahasiswas/Index.vue'),
            meta: { title: 'cruds.mahasiswa.title' }
          },
          {
            path: 'mahasiswas/create',
            name: 'mahasiswas.create',
            component: () => import('@cruds/Mahasiswas/Create.vue'),
            meta: { title: 'cruds.mahasiswa.title' }
          },
          {
            path: 'mahasiswas/:id',
            name: 'mahasiswas.show',
            component: () => import('@cruds/Mahasiswas/Show.vue'),
            meta: { title: 'cruds.mahasiswa.title' }
          },
          {
            path: 'mahasiswas/:id/edit',
            name: 'mahasiswas.edit',
            component: () => import('@cruds/Mahasiswas/Edit.vue'),
            meta: { title: 'cruds.mahasiswa.title' }
          },
          {
            path: 'mata-kuliahs',
            name: 'mata_kuliahs.index',
            component: () => import('@cruds/MataKuliahs/Index.vue'),
            meta: { title: 'cruds.mataKuliah.title' }
          },
          {
            path: 'mata-kuliahs/create',
            name: 'mata_kuliahs.create',
            component: () => import('@cruds/MataKuliahs/Create.vue'),
            meta: { title: 'cruds.mataKuliah.title' }
          },
          {
            path: 'mata-kuliahs/:id',
            name: 'mata_kuliahs.show',
            component: () => import('@cruds/MataKuliahs/Show.vue'),
            meta: { title: 'cruds.mataKuliah.title' }
          },
          {
            path: 'mata-kuliahs/:id/edit',
            name: 'mata_kuliahs.edit',
            component: () => import('@cruds/MataKuliahs/Edit.vue'),
            meta: { title: 'cruds.mataKuliah.title' }
          },
          {
            path: 'dosens',
            name: 'dosens.index',
            component: () => import('@cruds/Dosens/Index.vue'),
            meta: { title: 'cruds.dosen.title' }
          },
          {
            path: 'dosens/create',
            name: 'dosens.create',
            component: () => import('@cruds/Dosens/Create.vue'),
            meta: { title: 'cruds.dosen.title' }
          },
          {
            path: 'dosens/:id',
            name: 'dosens.show',
            component: () => import('@cruds/Dosens/Show.vue'),
            meta: { title: 'cruds.dosen.title' }
          },
          {
            path: 'dosens/:id/edit',
            name: 'dosens.edit',
            component: () => import('@cruds/Dosens/Edit.vue'),
            meta: { title: 'cruds.dosen.title' }
          },
          {
            path: 'jurusans',
            name: 'jurusans.index',
            component: () => import('@cruds/Jurusans/Index.vue'),
            meta: { title: 'cruds.jurusan.title' }
          },
          {
            path: 'jurusans/create',
            name: 'jurusans.create',
            component: () => import('@cruds/Jurusans/Create.vue'),
            meta: { title: 'cruds.jurusan.title' }
          },
          {
            path: 'jurusans/:id',
            name: 'jurusans.show',
            component: () => import('@cruds/Jurusans/Show.vue'),
            meta: { title: 'cruds.jurusan.title' }
          },
          {
            path: 'jurusans/:id/edit',
            name: 'jurusans.edit',
            component: () => import('@cruds/Jurusans/Edit.vue'),
            meta: { title: 'cruds.jurusan.title' }
          },
          {
            path: 'kampus',
            name: 'kampus.index',
            component: () => import('@cruds/Kampus/Index.vue'),
            meta: { title: 'cruds.kampu.title' }
          },
          {
            path: 'kampus/create',
            name: 'kampus.create',
            component: () => import('@cruds/Kampus/Create.vue'),
            meta: { title: 'cruds.kampu.title' }
          },
          {
            path: 'kampus/:id',
            name: 'kampus.show',
            component: () => import('@cruds/Kampus/Show.vue'),
            meta: { title: 'cruds.kampu.title' }
          },
          {
            path: 'kampus/:id/edit',
            name: 'kampus.edit',
            component: () => import('@cruds/Kampus/Edit.vue'),
            meta: { title: 'cruds.kampu.title' }
          }
        ]
      },
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          }
        ]
      },
      {
        path: 'report',
        name: 'report',
        component: View,
        redirect: { name: 'report_mahasiswa_ongoings.index' },
        children: [
          {
            path: 'report-mahasiswa-ongoings',
            name: 'report_mahasiswa_ongoings.index',
            component: () => import('@cruds/ReportMahasiswaOngoings/Index.vue'),
            meta: { title: 'cruds.reportMahasiswaOngoing.title' }
          },
          {
            path: 'report-mahasiswa-histories',
            name: 'report_mahasiswa_histories.index',
            component: () =>
              import('@cruds/ReportMahasiswaHistories/Index.vue'),
            meta: { title: 'cruds.reportMahasiswaHistory.title' }
          }
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
