(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[49],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Charts_Bar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @components/Charts/Bar */ "./resources/adminapp/js/components/Charts/Bar.vue");
/* harmony import */ var _components_Charts_Line__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @components/Charts/Line */ "./resources/adminapp/js/components/Charts/Line.vue");
/* harmony import */ var _components_Charts_Pie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @components/Charts/Pie */ "./resources/adminapp/js/components/Charts/Pie.vue");
/* harmony import */ var _components_Charts_Stats__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @components/Charts/Stats */ "./resources/adminapp/js/components/Charts/Stats.vue");
/* harmony import */ var _components_Charts_Latest__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @components/Charts/Latest */ "./resources/adminapp/js/components/Charts/Latest.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    BarChart: _components_Charts_Bar__WEBPACK_IMPORTED_MODULE_0__["default"],
    LineChart: _components_Charts_Line__WEBPACK_IMPORTED_MODULE_1__["default"],
    PieChart: _components_Charts_Pie__WEBPACK_IMPORTED_MODULE_2__["default"],
    StatsCard: _components_Charts_Stats__WEBPACK_IMPORTED_MODULE_3__["default"],
    LatestCard: _components_Charts_Latest__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  data: function data() {
    return {
      datacollection: null,
      charts: null
    };
  },
  created: function created() {
    var _this = this;

    axios.get('dashboard').then(function (response) {
      _this.charts = response.data;
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container-fluid" }, [
    _c(
      "div",
      { staticClass: "row" },
      [
        _vm._l(_vm.charts, function (chart, key) {
          return [
            _c(
              "div",
              { key: key, class: chart.column_class },
              [
                chart.type === "Stats"
                  ? _c("stats-card", { attrs: { "chart-data": chart } })
                  : chart.type === "Latest"
                  ? _c("latest-card", { attrs: { "chart-data": chart } })
                  : _c("div", { staticClass: "card" }, [
                      _c(
                        "div",
                        {
                          staticClass:
                            "card-header card-header-primary card-header-icon",
                        },
                        [
                          _c("div", { staticClass: "card-icon" }, [
                            _c("i", { staticClass: "material-icons" }, [
                              _vm._v(_vm._s(chart.icon)),
                            ]),
                          ]),
                          _vm._v(" "),
                          _c("h4", { staticClass: "card-title" }, [
                            _vm._v(
                              "\n              " +
                                _vm._s(chart.title) +
                                "\n            "
                            ),
                          ]),
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "card-body" },
                        [
                          _c(chart.type + "Chart", {
                            tag: "component",
                            attrs: {
                              "chart-data": chart,
                              options: chart.options,
                            },
                          }),
                        ],
                        1
                      ),
                    ]),
              ],
              1
            ),
          ]
        }),
      ],
      2
    ),
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/adminapp/js/pages/Dashboard.vue":
/*!***************************************************!*\
  !*** ./resources/adminapp/js/pages/Dashboard.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=template&id=0abe2158& */ "./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158&");
/* harmony import */ var _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Dashboard.vue?vue&type=script&lang=js& */ "./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/adminapp/js/pages/Dashboard.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Dashboard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/adminapp/js/pages/Dashboard.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158&":
/*!**********************************************************************************!*\
  !*** ./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Dashboard.vue?vue&type=template&id=0abe2158& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/adminapp/js/pages/Dashboard.vue?vue&type=template&id=0abe2158&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Dashboard_vue_vue_type_template_id_0abe2158___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);