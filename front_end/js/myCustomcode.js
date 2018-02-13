$(document).ready(function() {
  $('#form-comment').submit(function (e) {
    e.preventDefault();
    // ajax section
    $.ajax({
      url: $(this).attr('action'),
      type: 'post',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (response) {
        if (response.success == true) {
          var comments = response.comments;
          console.log(_.last(comments).comment_body);
          location.reload();
          $('#showComment').append(_.last(comments).comment_body);

          // now trying to show the comment in the comment section
          // $(this).find('#reply_body').val('');
        }else{
          $.each(response.message, function(index, val) {
             var element = $('#'+index);
             element.after(val);
          });
        }
      }
    })
  })
  // form reply section
  $('#form-reply').submit(function (e) {
    e.preventDefault();
    // ajax section
    $.ajax({
      url: $(this).attr('action'),
      type: 'post',
      dataType: 'json',
      data: $(this).serialize(),
      success: function (response) {
        if (response.success == true) {
          console.log(response);
          location.reload();
        }else{
          $.each(response.message, function(index, val) {
             var element = $('#'+index);
             element.after(val);
          });
        }
      }
    })
  })
});