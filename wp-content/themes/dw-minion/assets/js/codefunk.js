jQuery(document).ready(function () {
  jQuery('.add-sample-title').on('click', function () {
    var id = jQuery(this).data('answerId'), thisBox = jQuery('#sample-answer-postbox-' + id);
    thisBox.slideToggle(function () {
      var editor = ace.edit('code-sample-editor-' + id);
      editor.setTheme("ace/theme/monokai");
      editor.getSession().setMode("ace/mode/javascript");
      jQuery('.ace_content', thisBox).css({'height': '150px'});

      jQuery("button.submit-sample-btn", thisBox).one('click', function (e) {
          e.preventDefault();
          var codeSample = editor.getSession().getValue(),
              postType = jQuery('[name="post_type"]', thisBox).val(),
              answerId = jQuery('.answer-id-hidden', thisBox).val(),
              title = jQuery('.title-input', thisBox).val();

          jQuery.ajax({

              type: 'POST',

              url: apfajax.ajaxurl,

              data: {
                  action: 'apf_addpost',
                  post_type: postType,
                  code_title: title,
                  answer_id: answerId,
                  code_sample: codeSample
              },

              success: function(data, textStatus, XMLHttpRequest) {
                  var id = '#apf-response';
                  jQuery(id).html('');
                  jQuery(id).append(data);
              },

              error: function(MLHttpRequest, textStatus, errorThrown) {
                  alert(errorThrown);
              }

          });
      });

    });
  });
});