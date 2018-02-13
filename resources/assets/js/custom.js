$(document).ready(function() {

  // Confirmation for single
  $('.link_delete', this).click(function() {
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
  $("#checkAll").change(function() {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
  });

  $('input:checkbox').change(function() {
    if (!($('input:checkbox').is(":checked"))) {
      // It is not checked, show your div...
      $('.option').hide();
    } else {
      $('.option').show();
    }

  });


  //Confirmation for Multi
  $('.deleteGroup').on('submit',function(e){
   if(!confirm('Do you want to delete this item?')){
         e.preventDefault();
   }
 });

});
