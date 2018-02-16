/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 43);
/******/ })
/************************************************************************/
/******/ ({

/***/ 43:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(44);


/***/ }),

/***/ 44:
/***/ (function(module, exports) {



(function ($) {

  $(function () {

    // Confirmation for single
    $('.link_delete', this).on('click', function () {
      if (confirm("Do you whant to delete this item?") == true) {
        // $(this).closest('form').submit();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        var id = $(this).data("id");
        $.ajax({
          url: "destroy/" + id,
          type: 'delete',
          dataType: "JSON",
          data: {
            "id": id
          },
          success: function success(response) {
            console.log(response); // see the reponse sent
            $('.item' + id).remove();
          },
          error: function error(xhr) {
            console.log(xhr.responseText); // this line will save you tons of hours while debugging
            // do something here because of error
          }
        });
      }
    });

    //Checkbox
    $("#checkAll").on('change', function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $('input:checkbox').on('change', function () {
      if (!$('input:checkbox').is(":checked")) {
        // It is not checked, show your div...
        $('.option').hide();
      } else {
        $('.option').show();
      }
    });

    //Confirmation for Multi
    $('.deleteGroup').on('submit', function (e) {
      if (!confirm('Do you want to delete this item?')) {
        e.preventDefault();
      }
    });

    //liveSearch
    $('#search').on('keyup', function () {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $value = $(this).val();

      $.ajax({

        type: 'get',
        url: 'livesearch',
        data: {
          'search': $value
        },
        success: function success(response) {
          // $('tbody').html(response);
          // $('.option_link').remove();


          // console.log(response);
          $output = "";

          var url_route_post_edit = window._config.route_post_edit;
          var url_route_post_show = window._config.route_post_show;

          for (n in response) {
            // console.log(response[n].id);
            var id = response[n].id;
            $output += '<tr class="item' + id + '">' + '<td><input type="checkbox" name="deletes[]" value="' + response[n].id + '" /></td>' + '<td>' + response[n].title + '</td>' + '<td>' + response[n].post_type + '</td>' + '<td>' + response[n].started_at + '|' + response[n].ended_at + '</td>' + '<td>' + response[n].status + '</td>' + '<td align="center"><a href="' + url_route_post_edit + '/' + id + '/edit' + '"><i class="fa fa-edit text-muted"></i></a></td>' + '<td align="center"><a href="' + url_route_post_show + '/' + id + '"><i class="fa fa fa-eye"></i></a></td>' + '<td align="center"><a class="link_delete" style="cursor:pointer" data-id="' + id + '"data-token=""><i class="fa fa-trash text-danger"></i></a>' + '</tr>';

            // console.log($output);
          }

          $('tbody').html($output);
        }
      });
    });
  });
})(jQuery);

$(document).ajaxComplete(function () {
  $('input:checkbox').on('change', function () {
    if (!$('input:checkbox').is(":checked")) {
      // It is not checked, show your div...
      $('.option').hide();
    } else {
      $('.option').show();
    }
  });

  $('.link_delete', this).on('click', function () {
    if (confirm("Do you whant to delete this item?") == true) {
      // $(this).closest('form').submit();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      var id = $(this).data("id");
      $.ajax({
        url: "destroy/" + id,
        type: 'delete',
        dataType: "JSON",
        data: {
          "id": id
        },
        success: function success(response) {
          console.log(response); // see the reponse sent
          $('.item' + id).remove();
        },
        error: function error(xhr) {
          console.log(xhr.responseText); // this line will save you tons of hours while debugging
          // do something here because of error
        }
      });
    }
  });
});

/***/ })

/******/ });