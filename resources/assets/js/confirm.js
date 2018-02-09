$(document).ready(function() {

      $('.link_delete').click(function() {
          if(confirm("Do you whant to delete this item?") == true) ($('.delete').submit());
      });
});
