(window.webpackJsonp=window.webpackJsonp||[]).push([[49],{nyup:function(t,a,e){"use strict";e.r(a);var i=e("L2JU");function r(t,a){var e=Object.keys(t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(t);a&&(i=i.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),e.push.apply(e,i)}return e}function s(t){for(var a=1;a<arguments.length;a++){var e=null!=arguments[a]?arguments[a]:{};a%2?r(Object(e),!0).forEach((function(a){n(t,a,e[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(e)):r(Object(e)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(e,a))}))}return t}function n(t,a,e){return a in t?Object.defineProperty(t,a,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[a]=e,t}var o={components:{Attachment:e("Dqre").a},data:function(){return{status:"",activeField:""}},computed:s({},Object(i.c)("PreparationDatasSingle",["entry","loading"])),beforeDestroy:function(){this.resetState()},methods:s(s({},Object(i.b)("PreparationDatasSingle",["storeData","resetState","insertDataLogFile","removeDataLogFile","insertDataNilaiFile","removeDataNilaiFile","setDataHasil"])),{},{updateDataHasil:function(t){this.setDataHasil(t.target.value)},getRoute:function(t){return"".concat(axios.defaults.baseURL).concat(t,"/media")},submitForm:function(){var t=this;this.storeData().then((function(){t.$router.push({name:"preparation_datas.index"}),t.$eventHub.$emit("create-success")})).catch((function(a){t.status="failed",_.delay((function(){t.status=""}),3e3)}))},focusField:function(t){this.activeField=t},clearFocus:function(){this.activeField=""}})},l=e("KHd+"),c=Object(l.a)(o,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"container-fluid"},[e("form",{on:{submit:function(a){return a.preventDefault(),t.submitForm.apply(null,arguments)}}},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"card"},[e("div",{staticClass:"card-header card-header-danger card-header-icon"},[t._m(0),t._v(" "),e("h4",{staticClass:"card-title"},[t._v("\n              "+t._s(t.$t("global.create"))+"\n              "),e("strong",[t._v(t._s(t.$t("cruds.preparationData.title_singular")))])])]),t._v(" "),e("div",{staticClass:"card-body"},[e("back-button")],1),t._v(" "),e("div",{staticClass:"card-body"},[e("bootstrap-alert"),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"form-group"},[e("label",[t._v(t._s(t.$t("cruds.preparationData.fields.data_log")))]),t._v(" "),e("attachment",{attrs:{route:t.getRoute("preparation-datas"),"collection-name":"preparation_data_data_log",media:t.entry.data_log,"max-file-size":100,"max-files":1},on:{"file-uploaded":t.insertDataLogFile,"file-removed":t.removeDataLogFile}})],1),t._v(" "),e("div",{staticClass:"form-group"},[e("label",[t._v(t._s(t.$t("cruds.preparationData.fields.data_nilai")))]),t._v(" "),e("attachment",{attrs:{route:t.getRoute("preparation-datas"),"collection-name":"preparation_data_data_nilai",media:t.entry.data_nilai,"max-file-size":100,"max-files":1},on:{"file-uploaded":t.insertDataNilaiFile,"file-removed":t.removeDataNilaiFile}})],1)])])],1),t._v(" "),e("div",{staticClass:"card-footer"},[e("vue-button-spinner",{staticClass:"btn-primary",attrs:{status:t.status,isLoading:t.loading,disabled:t.loading}},[t._v("\n              "+t._s(t.$t("global.save"))+"\n            ")])],1)])])])])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"card-icon"},[a("i",{staticClass:"material-icons"},[this._v("add")])])}],!1,null,null,null);a.default=c.exports}}]);