var currentPage;
$(document).ready(function(){
	getdata(1);
	$(document).on('click', 'button#m_oBtnNew', function(){ adddata();});	
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on('click', 'button.save', function(){ Add(); });
	$(document).on('click', 'button.delete', function(){ deleteDokter(); });
	$(document).on('click', 'button#m_oBtnNo', function(){ getdata(currentPage); })
	$(document).on('change', 'select#m_oDdlPageSize', function(){ getdata(currentPage); })
	$('#divcontent').on('click','.page-numbers',function(){ 
		$page = $(this).attr('href');
		$pageind = $page.indexOf('page=');
	   	$page = $page.substring(($pageind+5));
	   	getdata($page);
	   	return false;
	});
})

function adddata() {	
	$("div#adddata").modal("show");
}

function deleteConfirmation(othis) {	
	$("div#delete_confirm_modal").modal("show");
	$("#delete_confirm_modal input#m_oHfId").val($(othis).attr('iddokter'));
}

function getdata(iPage){
	currentPage = iPage;
	$.ajax({
	     url:"controller/master/doktercontroller.php",
                  type:"POST",
                  data:"action=getdata&page=" + iPage + "&valuesearch=" + SearchTerm() + "&pagesize=" + PageSize(),
        cache: false,
        success: function(response){
		   
		  $('#divcontent').html(response);
		 
		}
		
	});
	return false;
}

function PageSize(){
	return jQuery.trim($("[id*=m_oDdlPageSize]").val());
}

function SearchTerm() {
	return jQuery.trim($("[id*=m_oTbSearch]").val());
}

function MsgChild(msg)
{
	document.getElementById('m_oLblMsgChild').innerHTML = msg;
}

function Add()
{
	
	var Dokter = new Object();
	Dokter.NamaDokter = $('input#m_oTbNama').val();
	Dokter.IdPoli = $('select#m_oDdlPoli').val();
	Dokter.User = $('input#m_oHfField').val();
	
	var dokterJson = JSON.stringify(Dokter);
	
	$.post('controller/master/doktercontroller.php',
		{
			action: 'add',
			datajson: dokterJson
		},
		function(data, textStatus) {
				alert(data);
				getdata(currentPage);
		}, 
		"json"		
	);
}

function deleteDokter() {	
	
	var User = new Object();
	User.id = $("#delete_confirm_modal input#m_oHfId").val();
	
	var userJson = JSON.stringify(User);
	
	
}

