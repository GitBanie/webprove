


(function($){

  $(function() {


    // Confirmation for single
    $('.link_delete', this).on('click', function() {
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
          success: function(response) {
            console.log(response); // see the reponse sent
            $('.item' + id).remove();
          },
          error: function(xhr) {
            console.log(xhr.responseText); // this line will save you tons of hours while debugging
            // do something here because of error
          }
        });

      }
    });

    //Checkbox
    $("#checkAll").on('change', function() {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
    });

    $('input:checkbox').on('change', function() {
      if (!($('input:checkbox').is(":checked"))) {
        // It is not checked, show your div...
        $('.option').hide();
      } else {
        $('.option').show();
      }

    });


    //Confirmation for Multi
    $('.deleteGroup').on('submit', function(e) {
      if (!confirm('Do you want to delete this item?')) {
        e.preventDefault();
      }
    });


    //liveSearch
    $('#search').on('keyup', function() {

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
        success: function(response) {
          // $('tbody').html(response);
          // $('.option_link').remove();


          // console.log(response);
          $output = "";

          let url_route_post_edit = window._config.route_post_edit;
          let url_route_post_show = window._config.route_post_show;

          for(n in response) {
               // console.log(response[n].id);
                   let id = response[n].id;
                   $output+='<tr class="item' + id + '">'+
                       '<td><input type="checkbox" name="deletes[]" value="' + response[n].id + '" /></td>'+
                       '<td>'+response[n].title+'</td>'+
                       '<td>'+response[n].post_type+'</td>'+
                       '<td>'+response[n].started_at + '|' + response[n].ended_at +'</td>'+
                       '<td>'+response[n].status+'</td>'+
                       '<td align="center"><a href="' + url_route_post_edit+'/' + id + '/edit' + '"><i class="fa fa-edit text-muted"></i></a></td>'+
                       '<td align="center"><a href="'+ url_route_post_show+'/' + id +'"><i class="fa fa fa-eye"></i></a></td>' +
                       '<td align="center"><a class="link_delete" style="cursor:pointer" data-id="' + id + '"data-token=""><i class="fa fa-trash text-danger"></i></a>' +
                   '</tr>';

                   // console.log($output);

           }

           $('tbody').html($output);



        }
      });



    })

  });



})(jQuery)

$( document ).ajaxComplete(function() {
  $('input:checkbox').on('change', function() {
    if (!($('input:checkbox').is(":checked"))) {
      // It is not checked, show your div...
      $('.option').hide();
    } else {
      $('.option').show();
    }

  });

  $('.link_delete', this).on('click', function() {
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
        success: function(response) {
          console.log(response); // see the reponse sent
          $('.item' + id).remove();
        },
        error: function(xhr) {
          console.log(xhr.responseText); // this line will save you tons of hours while debugging
          // do something here because of error
        }
      });

    }
  });
})
