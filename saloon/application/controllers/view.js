function format(number) {
	return parseInt(number, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
}


function bs_input_file() {
	$(".input-file").before(
		function () {
			if (!$(this).prev().hasClass('input-ghost')) {
				var element = $("<input type='file' class='input-ghost' id='img_div' style='visibility:hidden; height:0'>");
				element.attr("name", $(this).attr("name"));
				element.change(function () {
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function () {
					element.click();
				});
				$(this).find("button.btn-reset").click(function () {
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor", "pointer");
				$(this).find('input').mousedown(function () {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function () {
	bs_input_file();
});

$(document).ready(function () {
	var data = {
		action: "init"
	}

	if (param('q') !== "") {
		data = {
			action: "category",
			param: param('q')
		}
	}
	if (param('search') !== "") {
		data = {
			action: "search",
			param: param('search')
		}
	}
	$.ajax({
		url: "routes",
		method: "POST",
		data: data,
		beforeSend: function () {
			$('#products').css('display', 'none')
			$('.loader').css('display', 'block')
		},
		cache: false,
		success: function (e) {
			try {
				e = JSON.parse(e)
				if (e.response === 200) {
					$.each(e.data, function (key, value) {
						var exports = '<div class="col-sm-4 product-details">'
						exports += '<div class="product-image">'
						exports += '<div class="product-img" style="background-image: url(\' ' + value.item_image + '\')">'
						exports += '<div class="desc">'
						exports += '<h4>' + value.item_title + '</h4><br>'
						exports += '<p>' + value.item_desc + '</p>'
						exports += '</div>'
						exports += '</div>'
						exports += '<div class="row prod-pod" style="width:100% !important">'
						exports += '<div class="col-sm-10">'
						exports += '<strike>&#8358; 40,000.00</strike><br/> &#8358;' + format(value.item_price)
						exports += '</div>'
						exports += '<div class="col-sm-2" style="margin-top:auto !important;margin-bottom:auto !important;">'
						exports += '<span class="glyphicon glyphicon-th showModal" data-toggle="modal" data-target="#myModal" data-id="' + value.item_id + '"></span>'
						exports += '</div>'
						exports += '</div>'
						exports += '</div>'
						exports += '</div>'

						$('#products').append(exports)
					})
				} else if (e.response === 201) {
					$.gritter.add({
						title: 'You Have a new Order!',
						text: 'Congratulations, you just recieved a new <a href="orders" style="color:#ccc">Order</a>',
						image: 'img/cart10.png',
						sticky: false,
						time: ''
					});
				} else {
					alert(e.message)
				}
			} catch (e1) {
				alert(e1)
				alert(e)
			}
		},
		error: function (err) {
			alert("Error: " + err.status + "- " + err.statusText)
		}
	}).complete(function () {
		setTimeout(function () {
			$('#products').css('display', 'block')
			$('.loader').css('display', 'none')
		}, 2000)
	})

	$('#for-form').on("submit", function (e) {
		e.preventDefault()
		var fd = new FormData()
		var formData = new FormData(this)
		var title = $('#title').val();
		var desc = $('#desc').val();
		var img = $('#img_div').val()
		var price = $('#price').val();

		$.ajax({
			url: "routes",
			method: "POST",
			data: {
				action: "add",
				title: title,
				desc: desc,
				image: img,
				price: price
			},
			beforeSend: function () {

			},
			cache: false,
			success: function (e) {
				try {
					e = JSON.parse(e)
					if (e.response == 200) {
						alert(e.message)
					} else if (e.response == 409) {
						alert("Please login to Post an AD")
					} else if (e.response == 405) {
						alert(e.message)
					}
				} catch (e1) {
					alert(e)
				}
			},
			error: function (e) {

			}
		}).complete(function () {

		})
	})
})



$(document).on('click', '.showModal', function () {
	var cusid = $(this).data('id')
	$('#myModal .details-cont').css('display', 'none')
	$('#myModal .details-image').html('')
	$('#myModal .details-image').append('<div class="loader centered"><div class="loader-inner line-scale"><div></div><div></div>' +
		'<div></div><div></div><div></div></div></div>')
	$.ajax({
		url: 'routes',
		method: 'POST',
		data: {
			action: 'refresh',
			id: cusid
		},
		beforeSend: function () {
			$('#myModal .details-cont').css('display', 'block')
			//					$("#myModal").on('shown.bs.modal', function() {});
		},
		cache: false,
		success: function (e) {
			try {
				e = JSON.parse(e)
				if (e.response == 200) {
					setTimeout(function () {
						$('#myModal').find('.title').html(e.data[0].item_title)
						$('#myModal').find('.descr').html(e.data[0].item_desc)
						$('#myModal').find('.name').html(e.data[0].name)
						$('#myModal').find('.email').html(e.data[0].email)
						$('#myModal').find('.mobile').html(e.data[0].mobile)
						$('#myModal').find('.mobile2').html('<span style="color: red">Unavailable</span>')
						$('#myModal').find('.details-image').html('<div class="detail-img" style="background-image: url(' + e.data[0].item_image + ')">')
					}, 2000)

				} else if (e.response == 409) {
					alert(e.message)
				} else if (e.response == 405) {
					alert(e.message)
				}
			} catch (e1) {
				alert(e)
			}
		},
		error: function (e) {

		}
	})
})

$('.logout').click(function () {
	$.confirm({
		//content: "Are you sure ?"
		title: "Logout",
		content: "Are you sure ?",
		icon: 'fa fa-question',
		theme: 'supervan',
		closeIcon: true,
		animation: 'scale',
		type: 'orange',
		onAction: function (btnName) {
			if (btnName == "Yes") {
				$.confirm({
					onAction: function (btnName) {
						if (btnName == "Ok") {
							window.location.href = "index"
						}
					},
					onClose: function () {
						window.location.href = "index"
					},
					buttons: {
						Ok: function () {},
					},
					content: function () {
						var self = this;
						return $.ajax({
							url: "routes",
							method: "POST",
							data: {
								action: "logout"
							},
							cache: false,
						}).done(function (e) {
							try {
								e = JSON.parse(e)
								if (e.response === 200) {
									self.setTitle("Message");
									self.setContent(e.message);
								} else {
									self.setTitle("Failed");
									self.setContent('Message: ' + e.message);
								}
							} catch (e1) {
								self.setTitle("Success");
							}

						}).fail(function () {
							self.setContent('Something went wrong.');
						});
					}
				});
			}
		},
		onClose: function () {},
		buttons: {
			Yes: function () {},
			No: function () {}
		}
	});
})

function param(name) {
	return (location.search.split(name + '=')[1] || '').split('&')[0];
}

$('.search').click(function(){
	var search = $('.search_term').val();
	if($.trim(search).length > 0){
		document.location.href = 'category?search=' + search
	}
})

// $('.add-form').click(function(e){
//    e.preventDefault()
//    var formData = new FormData(this);
//    alert(formData)
//    alert(formData.get(image))
//     var title = $('#title').val();
//     var desc  = $('#desc').val();
//     var img = $('#image').val();
//     var price = $('#price').val();
//     $.ajax({
//         url: "routes",
//         method: "POST",
//         data: {
//             action: "add",
//             desc: desc,
//             title: title,
//             image: img,
//             price: price
//         },
//         beforeSend: function(){

//         },
//         cache: false,
//         success: function(e){
//             try{
//                 e = JSON.parse(e)
//                 if(e.response == 200){
//                     alert(e.message)
//                 }else if(e.response == 409){
//                     alert("Please login to Post an AD")
//                 }else if(e.response == 405){
//                     alert(e.message)
//                 }
//             }catch(e1){
//                 alert(e)
//             }
//         },
//         error: function(e){

//         }
//     }).complete({

//     })
// })
