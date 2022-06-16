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
        path: 'upload-data-mahasiswa-histories',
        name: 'upload_data_mahasiswa_histories.index',
        component: () =>
          import('@cruds/UploadDataMahasiswaHistories/Index.vue'),
        meta: { title: 'cruds.uploadDataMahasiswaHistory.title' }
      },
      {
        path: 'upload-data-mahasiswa-on-goings',
        name: 'upload_data_mahasiswa_on_goings.index',
        component: () => import('@cruds/UploadDataMahasiswaOnGoings/Index.vue'),
        meta: { title: 'cruds.uploadDataMahasiswaOnGoing.title' }
      },
      {
        path: 'report',
        name: 'report',
        component: View,
        redirect: { name: 'data_mahasiswa_histories.index' },
        children: [
          {
            path: 'data-mahasiswa-histories',
            name: 'data_mahasiswa_histories.index',
            component: () => import('@cruds/DataMahasiswaHistories/Index.vue'),
            meta: { title: 'cruds.dataMahasiswaHistory.title' }
          },
          {
            path: 'data-mahasiswa-on-goings',
            name: 'data_mahasiswa_on_goings.index',
            component: () => import('@cruds/DataMahasiswaOnGoings/Index.vue'),
            meta: { title: 'cruds.dataMahasiswaOnGoing.title' }
          }
        ]
      },
      {
        path: 'tentang-aplikasis',
        name: 'tentang_aplikasis.index',
        component: () => import('@cruds/TentangAplikasis/Index.vue'),
        meta: { title: 'cruds.tentangAplikasi.title' }
      },
      {
        path: 'data-uploads',
        name: 'data_uploads.index',
        component: () => import('@cruds/DataUploads/Index.vue'),
        meta: { title: 'cruds.dataUpload.title' }
      },
      {
        path: 'data-uploads/create',
        name: 'data_uploads.create',
        component: () => import('@cruds/DataUploads/Create.vue'),
        meta: { title: 'cruds.dataUpload.title' }
      },
      {
        path: 'data-uploads/:id',
        name: 'data_uploads.show',
        component: () => import('@cruds/DataUploads/Show.vue'),
        meta: { title: 'cruds.dataUpload.title' }
      },
      {
        path: 'data-uploads/:id/edit',
        name: 'data_uploads.edit',
        component: () => import('@cruds/DataUploads/Edit.vue'),
        meta: { title: 'cruds.dataUpload.title' }
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
