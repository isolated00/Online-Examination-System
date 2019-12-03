	function disable(){
		$("#pass").prop('disabled', true);
		$("#cpass").prop('disabled', true);
		$("#hans").prop('disabled', true);
		$("select").prop('disabled', true);
		$("#registerbtn").prop('disabled', true);
	}
function sendOTP() {
	$(".error").html("").hide();
	var stid = $("#uid").val();
	if (stid.length > 5) {
		var input = {
			"stid" : stid,
			"action" : "send_otp"
		};
		$.ajax({
			url : 'sms/controller.php',
			type : 'POST',
			data : input,
			success : function(response) {
				
				$(".sendOTP").html(response);
			}
		});
			} else {
		$(".error").html('Please enter a valid ID!')
		$(".error").show();
	}
}

function verifyOTP() {
	$(".error").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'sms/controller.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
				$("." + response.type).html(response.message)
				$("." + response.type).show();
				$(".sendOTP").html(response).hide();
				$(".sendotpp").html(response).hide();
				$("input").prop('disabled', false);
				$("select").prop('disabled', false);
				$("#registerbtn").prop('disabled', false);
				$('#uid').attr('readonly', true);
			},
			error : function() {
			}
		});
	} else {
		$(".error").html('You have entered wrong OTP.')
		$(".error").show();
	}
}