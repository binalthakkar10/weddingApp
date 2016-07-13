/********************************************************************************************************************
* This script is brought to you by Vasplus Programming Blog by whom all copyrights are reserved.
* Website: www.vasplus.info
* Email: info@vasplus.info
* This script must not be sold or use for commercial purpose without the permission of Vasplus Programming Blog
* Please, do not remove this information from the top of this page.
*********************************************************************************************************************/



//This function hides the fetched title
// on click of it and shows the textarea
// box title content so that the user 
//can edit the fetched title content
function vpb_display_title_hidden()
{
	$('.vpb_title').slideUp('fast');
	$('.vpb_title_hidden').slideDown('slow');
}

//This function hides the fetched 
//description on click of it and shows the 
//textarea box description content so that 
//the user can edit the fetched description content
function vpb_display_description_hidden()
{
	$('.vpb_description').slideUp('fast');
	$('.vpb_description_hidden').slideDown('slow');
}

//This function validates every submitted url for correct and valid URLs
function vpb_url_validated(url)
{
	var vpb_url_exp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if(vpb_url_exp.test(url)) { return true; }
	else { return false; }
}

//This function does the actual fetching of the submitted URL contents
function vpb_fetch_url_contents()
{
	var url = $('#vpb_link_to_fetch').val();
	if(url == "" || url == "Type or copy and paste your URL here...")
	{
		$("#vpb_display_response").html('<br clear="all" /><div class="vpb_info">Please enter your URL in the required field to proceed. Thanks.</div>');
		$('#vpb_link_to_fetch').focus()
		return false;
	}
	else if(!vpb_url_validated(url))
	{
		$("#vpb_display_response").html('<br clear="all" /><div class="vpb_info">Please enter a valid URL to proceed. Thanks.</div>');
		$('#vpb_link_to_fetch').focus()
		return false;
	}
	else
	{
		var dataString = "url=" + $.base64Encode(url);
		$.ajax({
			type: "POST",
			url: "vpb_fetch_url_contents",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#vpb_display_response").html('<br clear="all" /><font style="font-family: Verdana, Geneva, sans-serif;color: black;font-size:12px;">Please wait</font> <img style="" src="images/loadings.gif" align="absmiddle" alt="Loading" /><br clear="all" />');
			},
			success: function(response)
			{
				$('#vpb_display_response').hide().fadeIn('slow').html(response);
				$('.vpb_all_images img').hide();
				if($('img#vasplus_image_id1').length > 0)
				{
					$('img#vasplus_image_id1').show();
					$('#vpb_selected_image').val(1);
					$('#vpb_selected_image_num').html(1);
				}
				else
				{
					$('img#vasplus_image_id0').show();
					$('#vpb_selected_image').val(0);
					$('#vpb_selected_image_num').html(0);
				}
				$('#vpb_link_to_fetch').val('');
			}
		});
	}
}

//This function takes the fetched contents 
//and properly saves it to the database on 
//clicking of the Post Button and displays 
//the result of the Post on the screen to the user
function vpb_fetch_url_contents_submission()
{
	var vpn_link = $.base64Encode($('#vpn_link').val());
	var linkTitle = $('#linkTitle').val();
	var linkDescription = $.base64Encode($('#linkDescription').val());
	var link_Image = $('#vpb_selected_image').val();
	var imageslinks = $('img#vasplus_image_id'+link_Image).attr('src')
	var selectedimgurl =  $.base64Encode(imageslinks);
	
	if(selectedimgurl == "") { selectedimgurl = "images/no_images.png"; }
	
	
	if(linkTitle == "")
	{
		$("#vpb_display_responsed").html('<br clear="all" /><div class="vpb_info">The title field must not be empty please. Thanks.</div>');
		$('#linkTitle').focus()
		return false;
	}
	else if(linkDescription == "")
	{
		$("#vpb_display_responsed").html('<br clear="all" /><div class="vpb_info">The description field must not be empty please. Thanks.</div>');
		$('#linkDescription').focus()
		return false;
	}
	else
	{
		var dataString = "linkTitle=" + linkTitle + "&linkDescription=" + linkDescription + "&selectedimgurl=" + selectedimgurl + "&vpn_link=" + vpn_link;
		$.ajax({
			type: "POST",
			url: "vpb_fetch_url_contents",
			data: dataString,
			cache: false,
			beforeSend: function()
			{
				$("#vpb_display_response").html('<br clear="all" /><font style="font-family: Verdana, Geneva, sans-serif;color: black;font-size:12px;">Please wait</font> <img style="" src="images/loadings.gif" align="absmiddle" alt="Loading" /><br clear="all" />');
			},
			success: function(response)
			{
				$("#vpb_display_response").html('');
				$('#vpb_display_posted_response').hide().fadeIn(3000).prepend(response);
			}
		});
	}
}

// This function performs the next image operation by showing the next images one by one on clicking the Next Button
function vpb_next_images()
{
	var total_images = parseInt($('#total_images').val());			 
	if (total_images > 0)
	{
		var imageMain = $('#vpb_selected_image').val();
		$('img#vasplus_image_id'+imageMain).hide();
		if(imageMain < total_images)
		{
			New_imageMain = parseInt(imageMain)+parseInt(1);
		}
		else
		{
			New_imageMain = 1;
		}
		$('#vpb_selected_image').val(New_imageMain);
		$('#vpb_selected_image_num').html(New_imageMain);
		$('img#vasplus_image_id'+New_imageMain).show();
	}
}	

// This function performs the previous images operation by showing the previous images one by one on clicking the Prev Button
function vpb_prev_images()
{	
	var total_images = parseInt($('#total_images').val());	 				 
	if (total_images > 0)
	{
		var PimageMain = $('#vpb_selected_image').val();
		$('img#vasplus_image_id'+PimageMain).hide();
		if(PimageMain > 1)
		{
			New_P_imageMain = parseInt(PimageMain)-parseInt(1);;
		}
		else
		{
			New_P_imageMain = total_images;
		}
		$('#vpb_selected_image').val(New_P_imageMain);
		$('#vpb_selected_image_num').html(New_P_imageMain);
		$('img#vasplus_image_id'+New_P_imageMain).show();
	}
}

//The below code runs automatically
// $(document).ready(function()
// {	
	// // watermark input and textarea box fields
	 // $("#vpb_link_to_fetch").Watermark("Type or copy and paste your URL here...");
// 	
	// //This function automatically calls 
	// //the main function "vpb_fetch_url_contents()" 
	// //that does the actual fetching of links at the 
	// //top of this page upon submitting or typing a valid URL
	// //in the input box
	// $("#vpb_link_to_fetch").keyup(function() 
	// {
		// var vpb_url_seen = $(this).val();
		// var Regex_url = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
		// var actual_url_realised = vpb_url_seen.match(Regex_url);
		// if(actual_url_realised.length < 0 || actual_url_realised == "Type or copy and paste your URL here...")
		// {
			// return false;
		// }
		// else
		// {
			// vpb_fetch_url_contents();
		// }
	// });	
// });	