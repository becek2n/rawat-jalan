var currentPage;
$(document).ready(function(){
	getdata(1);
	$(document).on('click', 'button#m_oBtnNew', function(){ adddata();});	
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on('click', 'button.save', function(){ Add(); });
	$(document).on('click', 'button.delete', function(){ deletePoli(); });
	$(document).on('click', 'button#m_oBtnNo', function(){ getdata(currentPage); })
	$(document).on('change', 'select#m_oDdlPageSize', function(){ getdata(currentPage); })
	$(document).on('keyup', 'input#m_oTbSearch', function(){ getdata(1); })
	
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
	$("#delete_confirm_modal input#m_oHfId").val($(othis).attr('idpoli'));
}

function getdata(iPage){
	currentPage = iPage;
	$.ajax({
	     url:"controller/master/policontroller.php",
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
	
	var Poli = new Object();
	Poli.PoliName = $('input#m_oTbNama').val();
	Poli.User = $('input#m_oHfField').val();
	
	var poliJson = JSON.stringify(Poli);
	
	$.post('controller/master/policontroller.php',
		{
			action: 'add',
			datajson: poliJson
		},
		function(data, textStatus) {
				alert(data);
				getdata(currentPage);
		}, 
		"json"		
	);
}

function deletePoli() {	
	
	var Poli = new Object();
	Poli.Id = $("#delete_confirm_modal input#m_oHfId").val();
	Poli.User = $('input#m_oHfField').val();
	var poliJson = JSON.stringify(Poli);
	
	$.post('controller/master/policontroller.php',
		{
			action: 'delete',
			datajson: poliJson
		},
		function(data, textStatus) {
				alert(data);
				getdata(currentPage);
				$("div#delete_confirm_modal").modal("hide");
		}, 
		"json"		
	);
}

