/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

function DelPhoto(eventid,cat,id) {
	'use strict';
	$.post('/adm/tools/ajax.php',{ "eventid": eventid, "cat": cat, "idii": id, "do": "DelPhoto" },
	function(data) {
		if(data===0)
		{
			$("#img"+id).remove();
		}
		else
		{
			$("#img"+id).remove();
			$("#img"+data).addClass("imgmain");
		}
	});
}

if($(".sortable-items").length>0){

	sortable('.sortable-items', {
				items: 'div' ,
				// placeholder: '<div class="col-xs-4 border-maroon"></div>',
				// placeholderClass: 'col-xs-4 border-maroon'
				// forcePlaceholderSize:true,
			});


	sortable('.sortable-items')[0].addEventListener('sortupdate', function(e) {

	    // console.log(e.detail.destination.items);

			$( ".sortable-items > div" ).each(function( index ) {
				if(index == 0)
				{
					$( this ).removeClass('col-xs-4').addClass('col-xs-12');
				}
				else {
					$( this ).addClass('col-xs-4').removeClass('col-xs-12');
				}

				});

	    /*
	    This event is triggered when the user stopped sorting and the DOM position has changed.

	    e.detail.item - {HTMLElement} dragged element

	    Origin Container Data
	    e.detail.origin.index - {Integer} Index of the element within Sortable Items Only
	    e.detail.origin.elementIndex - {Integer} Index of the element in all elements in the Sortable Container
	    e.detail.origin.container - {HTMLElement} Sortable Container that element was moved out of (or copied from)
	    e.detail.origin.itemsBeforeUpdate - {Array} Sortable Items before the move
	    e.detail.origin.items - {Array} Sortable Items after the move

	    Destination Container Data
	    e.detail.destination.index - {Integer} Index of the element within Sortable Items Only
	    e.detail.destination.elementIndex - {Integer} Index of the element in all elements in the Sortable Container
	    e.detail.destination.container - {HTMLElement} Sortable Container that element was moved out of (or copied from)
	    e.detail.destination.itemsBeforeUpdate - {Array} Sortable Items before the move
	    e.detail.destination.items - {Array} Sortable Items after the move
	    */
	});
}


// Start upload preview image

var croppieType = "jpeg";
$uploadCrop = $('#upload-demo').croppie({
	viewport: {
		width: 260,
		height: 210,
	},
	enforceBoundary: false,
	enableExif: true
});

$('.add_quantity_by_size_in_add_notsorted').on('click', function (event) {
	event.preventDefault();

});

$('#cropImagePop').on('shown.bs.modal', function(){
	// alert('Shown pop');
	$uploadCrop.croppie('bind', {
    		url: rawImg
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
});

$('.crop-img').on('click', function (event) {
	event.preventDefault();
	imageId = $(this).data('image_id');
	imageCat = $(this).data('image_cat');
	itemId = $(this).data('item_id');
	// tempFilename = $(this).data('imgsrc');
	rawImg = $(this).data('imgsrc');

	$('#cancelCropBtn').data('id', imageId);
	$('#upload-demo').addClass('ready');
	$('#cropImagePop').modal('show');
	// readFile(this);
});

$('#cropImageBtn').on('click', function (ev) {
	// $uploadCrop.croppie('result', {
	// 	type: 'base64',
	// 	format: 'jpeg',
	// 	size: {width: 260, height: 210}
	// }).then(function (resp) {
	// 	$('#' + imageId + ' img').attr('src', resp);
	// 	$('#cropImagePop').modal('hide');
	// });
	$uploadCrop.croppie('result', {
		type: 'base64',
		size: 'original',
		format: croppieType,
		quality: '0,65'
	}).then(function (resp) {

		$.post('/adm/tools/ajax.php',{
			"image_id":imageId,
			"image_cat":imageCat,
			"item_id":itemId,
			"image":resp,
			"image_type": croppieType,
			"do": "crop_item_image"
		},
		function(data) {
			console.log(data);
			if(data!==0)
			{
				$('#img' + imageId + ' img').attr('src', resp);
				$('#cropImagePop').modal('hide');
			}
		});

		// $.ajax({
		// 	url: "../../../tools/ajax.php",
		// 	type: "POST",
		// 	data: {"image":resp},
		// 	success: function (data) {
		// 		console.log(data);
		// 		$('#' + imageId + ' img').attr('src', resp);
		// 		$('#cropImagePop').modal('hide');
		// 		// html = '<img src="' + resp + '" />';
		// 		// $("#upload-demo-i").html(html);
		// 	}
		// });
	});
});
// End upload preview image
//Initialize Select2 Elements
$('.select2').select2({
	language: "ru",
	// minimumInputLength: 3 // only start searching when the user has input 3 or more characters
});

$('.select2_item_cats').select2({
	language: "ru",
	// minimumInputLength: 3 // only start searching when the user has input 3 or more characters
}).on('select2:selecting', function (e) {
	if (confirm("если поменять категори,то все характеристики обнулятся, поменять?")) {
	} else {
		e.preventDefault();
		// $(this).select2("close");
	}
}).on('select2:select', function (e) {

	// console.log(e.params.data.text +' ' + e.params.data.id + " " + $(this).find(":selected").data("sm_id"));
	show_size_model($(this).find(":selected").data("sm_id"));

	// console.log("select2:select", e);
});

function toTranslit(text) {
	return text.replace(/([а-яё])|([\s_-])|([^a-z\d])/gi,
	function (all, ch, space, words, i) {
			if (space || words) {
					return space ? '-' : '';
			}
			var code = ch.charCodeAt(0),
					index = code == 1025 || code == 1105 ? 0 :
							code > 1071 ? code - 1071 : code - 1039,
					t = ['yo', 'a', 'b', 'v', 'g', 'd', 'e', 'zh',
							'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
							'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh',
							'shch', '', 'y', '', 'e', 'yu', 'ya'
					];
			return t[index];
	});
}

function show_size_model(sm_id){
	$.ajax({
		url: '/adm/tools/ajax.php',
		type: 'POST',
		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {
			sm_id: sm_id,
			do: "show_size_model"
		}
	})
	.done(function(data) {
		console.log(data);
		$("#size_box").html(data);
		$('[data-toggle="tooltip"]').tooltip();


		console.log("success");
	})
	.fail(function(data) {
		console.log("error");
	})
	.always(function(data) {
		console.log("complete");
	});
}

$('.select2_items_attributes_modal_cat').select2({
	language: "ru",
	dropdownParent: $('#select2_items_attributes_modal')
	// minimumInputLength: 3 // only start searching when the user has input 3 or more characters
});





$('.select2_items_attributes_modal_newname').select2({
	language: "ru",
	delay: 250, // wait 250 milliseconds before triggering the request
	tags:true,
	dropdownParent: $('#select2_items_attributes_modal'),
	minimumInputLength: 3 // only start searching when the user has input 3 or more characters
}).on('select2:select', function (e) {
	$("#ia_code").val(toTranslit(e.params.data.text));
});

$('.select2_items_attributes_modal_type').select2({
	language: "ru",
	dropdownParent: $('#select2_items_attributes_modal')
	// minimumInputLength: 3 // only start searching when the user has input 3 or more characters
});

$('.select2_items_attributes_modal_values').select2({
	language: "ru",
	// tags:true,
	multiple:true,
	dropdownParent: $('#select2_items_attributes_modal')
	// minimumInputLength: 3 // only start searching when the user has input 3 or more characters
});

function formatColor (color) {
  if (!color.id) {
    return color.text;
  }

  var $color = $(
    '<span><span class="colorbox_in_colordd" style="background:'+ color.color_code +'"></span>   ' + color.text + '</span>'
  );
  return $color;
};

$('.select2_color').select2({ // НЕЗАКОНЧЕНО
	ajax: {
		url: '/adm/tools/ajax.php',
		delay: 250, // wait 250 milliseconds before triggering the request
		dataType: 'json',
		data: function (params) {
		 var query = {
			 iv_value: params.term,
			 // ia_id: $(this).data('ia-id'),
			 do: "select2_color_from_list"
		 }
		 return query;
	 }
 	},
	templateResult: formatColor,
	templateSelection: formatColor,
	language: "ru",
	closeOnSelect: true,
	placeholder: 'Выберите цвет',
	// tags: true,
	allowClear: true,
	// minimumInputLength: 1, // only start searching when the user has input 3 or more characters
}).on('select2:select', function (e) {
	console.log(e.params.data.text + ' ' + e.params.data.color_code);
	// add_new_value_to_attribute(
	// 	$(this).data('ia-id'),
	// 	e.params.data.text,
	// );
	// console.log("select2:select", e);
});


$('.select2_ajax').select2({ // НЕЗАКОНЧЕНО
	ajax: {
		url: '/adm/tools/ajax.php',
		delay: 250, // wait 250 milliseconds before triggering the request
		dataType: 'json',
		data: function (params) {
		 var query = {
			 iv_value: params.term,
			 ia_id: $(this).data('ia-id'),
			 db_prefix: $("#db_prefix").data('db_prefix'),
			 do: "select2_item_attribtues_select_one"
		 }
		 return query;
	 }
 	},
	language: "ru",
	closeOnSelect: true,
	placeholder: 'This is my placeholder',
	tags: true,
	allowClear: true,
	minimumInputLength: 1, // only start searching when the user has input 3 or more characters
}).on('select2:select', function (e) {
	console.log(e.params.data.text);
	// add_new_value_to_attribute(
	// 	$(this).data('ia-id'),
	// 	e.params.data.text,
	// );
	// console.log("select2:select", e);
});

$('.select2_item_attribtues').select2({
	language: "ru",
	delay: 250,
	closeOnSelect: true,
	placeholder: 'Оберіть чи напишіть',
	tags: true,
	allowClear: true,
	// minimumInputLength: 1, // only start searching when the user has input 3 or more characters
}).on('select2:select', function (e) {

	console.log(e.params.data.text + ' ' + e.params.data.id);

	if(e.params.data.text === e.params.data.id){
		if (confirm("Добавить новое значение атрибута?")) {
			$.ajax({
				url: '/adm/tools/ajax.php',
				type: 'POST',
				// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
				data: {
					iv_value: e.params.data.text,
					ia_id: $(this).data('ia-id'),
					idi: $('#idi').data('idi'),
					db_prefix: $("#db_prefix").data('db_prefix'),
					do: "add_new_value_to_attribute"
				}
			})
			.done(function(data) {
				console.log(data);
				console.log("success");
			})
			.fail(function(data) {
				console.log("error");
			})
			.always(function(data) {
				console.log("complete");
			});
		} else {
			e.preventDefault();
			// $(this).select2("close");
		}


	}





	// add_new_value_to_attribute(
	// 	$(this).data('ia-id'),
	// 	e.params.data.text,
	// );
	// console.log("select2:select", e);
});

	//Initialize Select2 Elements
	$('.select2_prom').select2({
		language: "ru",
		minimumInputLength: 3 // only start searching when the user has input 3 or more characters
	});

	$('.select2-tags').select2({
		language: "ru",
		// placeholder: 'Select an option',
		allowClear: true,
		tags: true,
		multiple:true,
		createTag: function (params) {
			var term = $.trim(params.term);

			if (term === '') {
				return null;
			}

			return {
				id: term,
				text: term,
				// newTag: true // add additional parameters
			}
		}
		// minimumInputLength: 1 // only start searching when the user has input 3 or more characters
	});

	$('.test_select2').select2({
		language: "ru",
		ajax: {
			url: 'https://api.github.com/search/repositories',
			data: function (params) {
				var query = {
					search: params.term,
					page: params.page || 1
				}

				// Query parameters will be ?search=[term]&page=[page]
				return query;
			},
			delay: 250 // wait 250 milliseconds before triggering the request
		}
	});

$(function () {
  'use strict';



	$('#add_attribute_form_submit').click(function(e){
		e.preventDefault();
			console.log('-----------------------------------');
		var select2_selects = ['ia_ic_id','ia_backend_label','ia_code','ia_data_type','iv_value_ru'];
		var data_to_ajax = [];
		$(select2_selects).each(function(index, el) {

			if($('#'+el).attr('type')==='text'){
				console.log('text = ' + $('#'+el).val());
				// data_to_ajax[el] = $('#'+el).val();
				data_to_ajax.push($('#'+el).val());
			}
			else{
				var ia = $('#'+el).select2('data')[0];
				console.log(ia.text + ' ' + ia.id);
				// data_to_ajax[el] = ia.id;
				data_to_ajax.push(ia.id);
			}
		});

		var db_prefix = $("#db_prefix").data('db_prefix');


		data_to_ajax.push($('#idi').data('idi'));

		console.log(data_to_ajax);
		if(data_to_ajax[2] && data_to_ajax[4]){
			$.post('/adm/tools/ajax.php',{ "data_to_ajax": data_to_ajax, "do": "add_attribute", "db_prefix": db_prefix },
			function(data) {
				console.log(data);
				if(data!==0)
				{

					$('#attributes_box_body'+ data_to_ajax[0] +' div.text-center').before(data);
					// $(data).appendTo("#" + cat + "_echo");
					// $(".comgoimg").colorbox({transition:"elastic",maxWidth:"100%"});
					$(".select2_item_attribtues").select2();
				}
			});
		}


		// $('#mySelect2').val(null).trigger('change');

	});


	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	                event.preventDefault();
									$(this).ekkoLightbox({
	                  alwaysShowClose: true,
	                });
	            });

	$('[data-mask]').inputmask();

	$( "input.urlfrom" ).each(function( index, element ) {
			$(element).syncTranslit({
			destination: $(element).data("urlto"),
			caseStyle: 'lower',
			type: 'url',
			urlSeparator: '-'
		});
	});



		$('.my-colorpicker2').colorpicker({
			// format: 'hex',
			// color: "green",
			// colorSelectors: { 'black': '#000000', 'white': '#ffffff', 'red': '#FF0000', 'default': '#777777', 'primary': '#337ab7', 'success': '#5cb85c', 'info': '#5bc0de', 'warning': '#f0ad4e', 'danger': '#d9534f' }
		});

function fileupload(filename, cat, ext, token, timestamp, eventid){
	// console.log("load fileupload");

	$("#"+filename).dropzone({
	url:"/uploadify.php",
	paramName: "Filedata", // The name that will be used to transfer the file
	maxFilesize: 100, // MB
	uploadMultiple: false,
	parallelUploads:1,
	autoProcessQueue: true,
	addRemoveLinks: false,
	previewsContainer:false, //previewsContainer: "#<?=$file['name']?>_prev",
	acceptedFiles:"."+ext,
	accept: function(file, done) {
		done();
	},

	//  uploadprogress: function(file, progress, bytesSent) {
	// 	// Display the progress
	// },

	sending: function(file, xhr, formData) {
		$(".dropzone-button").data("dropzone_button_text",$(".dropzone-button").text());
		$(".dropzone-button").html('Завантажую <i class="fa fa-fw fa-spinner fa-spin"></i>').addClass("disabled");
		// Will send the filesize along with the file as POST data.
		formData.append("filesize", file.size);
		formData.append("filename", filename);
		formData.append("ext", ext);
		if(eventid !== 0)
			{
				formData.append("eventid", eventid);
			}
		formData.append("cat", cat);
		formData.append("token", token);
		formData.append("timestamp", timestamp);
	},
	 success: function(file, responseText) {
		 $(".dropzone-button").text($(".dropzone-button").data("dropzone_button_text")).removeClass("disabled");
		 if(cat === "other_files")
			 {
				 $("#"+filename+"_echo").html(responseText);
			 }
		 else
			 {

				 ThumbleCreate(responseText,cat);
				 sortable('.sortable-' + cat);
				 // $("#"+cat+"_echo").html('<img width="140" height="auto" src="/photos/' + cat + '/img_' + eventid + '_orig.' + responseText + '?' + Date.now() + '" alt="">');
				 // $("#"+cat+"_photo_ext").val(responseText);
			 }

		 // console.log(responseText);
		}
	});
}


function ThumbleCreate(id,cat) {
	$.post('/adm/tools/ajax.php',{ "idii": id, "do": "ThumbleCreate" },
	function(data) {
		// console.log(data);
		if(data!==0)
		{
			$(data).appendTo("#" + cat + "_echo");
			// $(".comgoimg").colorbox({transition:"elastic",maxWidth:"100%"});
		}
	});
}




    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
			defaultViewDate:"today",
			clearBtn:true,
			format: "yyyy-mm-dd",
//			container:".box",
			language:"uk",
			todayHighlight:true
    });




	$('input').iCheck({
		checkboxClass: 'icheckbox_square-green',
		radioClass: 'iradio_square-green',
		increaseArea: '20%' /* optional */
	});



    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false,
			showMeridian:false,
			showSeconds:true
    });

		var table = $('.datatable').DataTable({
		'scrollY': '100vh',
		'scrollCollapse': true,
		'paging'      : false,
		'lengthChange': true,
		'searching'   : true,
		'ordering'    : true,
		'info'        : true,
		'responsive'	: true,
		'autoWidth'   : true,
		"language": {
				"url": "/bower_components/datatables.net/js/Ukranian.json"
		}
	});




	$( ".fileupload" ).each(function( index,element ) {
		var f_data = $(element).data('options');
		fileupload(f_data.filename, f_data.cat, f_data.ext, f_data.token, f_data.timestamp, f_data.eventid);
	});




    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.

  $( "textarea.editor" ).each(function( index, element ) {
//        CKEDITOR.replace(element);
				CKFinder.setupCKEditor();
				CKEDITOR.replace( element );
  });

	$('[data-toggle="tooltip"]').tooltip();
});
