
// function resetvalues() {

//     var title = document.getElementById("apftitle");
//     title.value = '';

//     var content = document.getElementById("apfcontents");
//     content.value = '';

// }

// jQuery(document).on('submit', 'form.new_sample_editor', function (e) {
//     e.preventDefault();
//     var thisId = $(this).data('answerId'),
//         codeSample = editor('.code-sample-input', this).val(),
//         postType = jQuery('[name="post_type"]', this).val(),
//         answerId = jQuery('.answer-id-hidden', this).val(),
//         title = jQuery('.title-input', this).val();

//     jQuery.ajax({

//         type: 'POST',

//         url: apfajax.ajaxurl,

//         data: {
//             action: 'apf_addpost',
//             post_type: postType,
//             code_title: title,
//             answer_id: answerId,
//             code_sample: codeSample
//         },

//         success: function(data, textStatus, XMLHttpRequest) {
//             var id = '#apf-response';
//             jQuery(id).html('');
//             jQuery(id).append(data);

//             resetvalues();
//         },

//         error: function(MLHttpRequest, textStatus, errorThrown) {
//             alert(errorThrown);
//         }

//     });
// })

