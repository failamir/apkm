(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{"3u+l":function(t,a,s){var e=s("jcEX");"string"==typeof e&&(e=[[t.i,e,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};s("aET+")(e,r);e.locals&&(t.exports=e.locals)},AKXe:function(t,a,s){"use strict";var e={props:["field","row"],computed:{entry:function(){var t=_.split(this.field,".");return{key:t[0],field:t[1]}}}},r=(s("ELdS"),s("KHd+")),n=Object(r.a)(e,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[t.row[t.entry.key]?s("span",{staticClass:"badge badge-pill badge-azure"},[t._v("\n    "+t._s(t.row[t.entry.key][t.entry.field])+"\n  ")]):s("span",{staticClass:"badge badge-pill badge-orange"},[t._v("\n    Not Assigned\n  ")])])}),[],!1,null,"a60ff64a",null);a.a=n.exports},ELdS:function(t,a,s){"use strict";s("3u+l")},Tp6T:function(t,a,s){"use strict";s.r(a);var e=s("L2JU");function r(t,a){var s=Object.keys(t);if(Object.getOwnPropertySymbols){var e=Object.getOwnPropertySymbols(t);a&&(e=e.filter((function(a){return Object.getOwnPropertyDescriptor(t,a).enumerable}))),s.push.apply(s,e)}return s}function n(t){for(var a=1;a<arguments.length;a++){var s=null!=arguments[a]?arguments[a]:{};a%2?r(Object(s),!0).forEach((function(a){i(t,a,s[a])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(s)):r(Object(s)).forEach((function(a){Object.defineProperty(t,a,Object.getOwnPropertyDescriptor(s,a))}))}return t}function i(t,a,s){return a in t?Object.defineProperty(t,a,{value:s,enumerable:!0,configurable:!0,writable:!0}):t[a]=s,t}var c={components:{DatatableSingle:s("AKXe").a},data:function(){return{}},beforeDestroy:function(){this.resetState()},computed:n({},Object(e.c)("MahasiswasSingle",["entry"])),watch:{"$route.params.id":{immediate:!0,handler:function(){this.resetState(),this.fetchShowData(this.$route.params.id)}}},methods:n({},Object(e.b)("MahasiswasSingle",["fetchShowData","resetState"]))},d=s("KHd+"),l=Object(d.a)(c,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",{staticClass:"container-fluid"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-12"},[s("div",{staticClass:"card"},[s("div",{staticClass:"card-header card-header-danger card-header-icon"},[t._m(0),t._v(" "),s("h4",{staticClass:"card-title"},[t._v("\n            "+t._s(t.$t("global.view"))+"\n            "),s("strong",[t._v(t._s(t.$t("cruds.mahasiswa.title_singular")))])])]),t._v(" "),s("div",{staticClass:"card-body"},[s("back-button")],1),t._v(" "),s("div",{staticClass:"card-body"},[s("div",{staticClass:"row"},[s("div",{staticClass:"col-md-12"},[s("div",{staticClass:"table-responsive"},[s("div",{staticClass:"table"},[s("tbody",[s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.id"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.id)+"\n                      ")])]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.id_mahasiswa"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.id_mahasiswa)+"\n                      ")])]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.nama"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.nama)+"\n                      ")])]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.jurusan"))+"\n                      ")]),t._v(" "),s("td",[s("datatable-single",{attrs:{row:t.entry,field:"jurusan.nama_jurusan"}})],1)]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.angkatan"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.angkatan)+"\n                      ")])]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.email"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.email)+"\n                      ")])]),t._v(" "),s("tr",[s("td",{staticClass:"text-primary"},[t._v("\n                        "+t._s(t.$t("cruds.mahasiswa.fields.no_hp"))+"\n                      ")]),t._v(" "),s("td",[t._v("\n                        "+t._s(t.entry.no_hp)+"\n                      ")])])])])])])])])])])])])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"card-icon"},[a("i",{staticClass:"material-icons"},[this._v("remove_red_eye")])])}],!1,null,null,null);a.default=l.exports},jcEX:function(t,a,s){(t.exports=s("I1BE")(!1)).push([t.i,".badge[data-v-a60ff64a]{font-size:.875rem;font-weight:500;text-transform:none}",""])}}]);