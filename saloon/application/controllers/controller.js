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
			$('#products').css('display', 'none')
			$('.loader').css('display', 'block')
			var loaddiv = '<div class="loader white"><div class="loader-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div>'
			setTimeout(function () {
				$('#products').css('display', 'block')
				$('.loader').css('display', 'none')
				$('.reg_div').css('display', 'none')
			}, 2000)

			$('.switch_R').click(function (e) {
				e.preventDefault()
				$('.sign_div').fadeOut("fast", function () {
					$('.reg_div').fadeIn("slow")
					$('.reg-btn').html("Register")
				})
			})

			$('.switch_L').click(function (e) {
				e.preventDefault()
				$('.reg_div').fadeOut("fast", function () {
					$('.sign_div').fadeIn("slow")
					$('.login-btn').html('Login')
				})
			})

			$('.login-btn').click(function () {
				var uname = $('.uname').val();
				var upass = $('.upass').val();
				$.ajax({
					url: "routes",
					method: "POST",
					data: {
						action: "doLogin",
						uname: uname,
						upass: upass
					},
					beforeSend: function () {
						$('.login-btn').html(loaddiv)
					},
					cache: false,
					success: function (e) {
						setTimeout(function () {
							try {
								e = JSON.parse(e)
								if (e.response === 200) {
									document.location.href = "ad"
								} else {
									alert(e.message)
								}
							} catch (e1) {
								alert(e)
								alert(e1)
								alert('An unknown error occurred')
							}
							$('.login-btn').html('Login')
						}, 2000)

					}
				}).complete(function () {
					//$('.login-btn').html("Login")
				})
			})

			$('.reg-btn').click(function () {
				var umat = $('.umat').val()
				var uemail = $('.uemail').val()
				var upass = $('.uvpass').eq(0).val()
				var ucpass = $('.uvpass').eq(1).val()
				var uname = $('.uvname').val()
				var uphone = $('.uphone').val()
				$.ajax({
					url: "routes",
					method: "POST",
					data: {
						action: "doReg",
						umat: umat,
						uemail: uemail,
						upass: upass,
						uname: uname,
						uphone: uphone
					},
					beforeSend: function () {
						$('.reg-btn').html(loaddiv)
					},
					cache: false,
					success: function (e) {
						setTimeout(function () {
							try {
								e = JSON.parse(e)
								if (e.response === 200) {
									document.location.href = "ad"
								} else {
									alert(e.message)
								}
							} catch (e1) {
								alert(e)
								alert(e1)
								alert('An unknown error occurred')
							}
							$('.reg-btn').html('Register')
						}, 2000)
					},
					error: function (e2) {
						alert(e2)
						alert(e2.status)
					}
				}).complete(function () {
					//$('.login-btn').html("Login")
				})
			})

			//			$('.reg-btn').click(function () {
			//				$(this).html(loaddiv)
			//			})


			$('#for-form').on("submit", function (e) {
				e.preventDefault()
				var fd = new FormData()
				var formData = new FormData(this)
				var title = $('#title').val();
				var desc = $('#desc').val();
				var img = $('#img_div').val()
				//			var img = fd.append("image", $('#image').val());
				var price = $('#price').val();

				//				var selector = document.querySelector('#image')
				//				alert(JSON.stringify(selector))
				//				var file = selector.files[0];
				//				
				//				var fd = new FormData();
				//				fd.append("resume", file);
				//				var xhr = new XMLHttpRequest();
				//				xhr.open('POST', "routes", true);
				//
				//				xhr.onload = function() {
				//					if (this.status == 200) {
				//						alert("done");
				//					}
				//				}
				//				xhr.send({
				//					image: fd,
				//					action: "image"
				//				});

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

		$('.search').click(function () {
			var search = $('.search_term').val();
			if ($.trim(search).length > 0) {
				document.location.href = 'category?search=' + search
			}
		})
