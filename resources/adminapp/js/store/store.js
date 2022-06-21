import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import MahasiswasIndex from './cruds/Mahasiswas'
import MahasiswasSingle from './cruds/Mahasiswas/single'
import MataKuliahsIndex from './cruds/MataKuliahs'
import MataKuliahsSingle from './cruds/MataKuliahs/single'
import JurusansIndex from './cruds/Jurusans'
import JurusansSingle from './cruds/Jurusans/single'
import DosensIndex from './cruds/Dosens'
import DosensSingle from './cruds/Dosens/single'
import TentangAplikasis from './cruds/TentangAplikasis'
import DataMahasiswasIndex from './cruds/DataMahasiswas'
import DataMahasiswasSingle from './cruds/DataMahasiswas/single'
import DataMahasiswaOnGoingsIndex from './cruds/DataMahasiswaOnGoings'
import DataMahasiswaOnGoingsSingle from './cruds/DataMahasiswaOnGoings/single'
import ListKampusIndex from './cruds/ListKampus'
import ListKampusSingle from './cruds/ListKampus/single'
import ReportMahasiswaOngoings from './cruds/ReportMahasiswaOngoings'
import ReportMahasiswaHistories from './cruds/ReportMahasiswaHistories'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    MahasiswasIndex,
    MahasiswasSingle,
    MataKuliahsIndex,
    MataKuliahsSingle,
    JurusansIndex,
    JurusansSingle,
    DosensIndex,
    DosensSingle,
    TentangAplikasis,
    DataMahasiswasIndex,
    DataMahasiswasSingle,
    DataMahasiswaOnGoingsIndex,
    DataMahasiswaOnGoingsSingle,
    ListKampusIndex,
    ListKampusSingle,
    ReportMahasiswaOngoings,
    ReportMahasiswaHistories
  },
  strict: debug
})
