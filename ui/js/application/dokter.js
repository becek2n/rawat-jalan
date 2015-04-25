var currentPage;
var jumlah = 0;
$(document).ready(function(){
	getdata(1);
	$(document).on('click', 'button#m_oBtnNew', function(){ adddata();});	
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on('click', 'button#m_oBtnSave', function(){ Add(); });
	$(document).on('click', 'button.delete', function(){ deleteDokter(); });
	$(document).on('click', 'button#m_oBtnNo', function(){ getdata(currentPage); });
	$(document).on('click', 'button#m_oBtnAdd', function(){ addData(); });
	$(document).on('change', 'select#m_oDdlPageSize', function(){ getdata(currentPage); })
	
	$('#divcontent').on('click','.page-numbers',function(){ 
		$page = $(this).attr('href');
		$pageind = $page.indexOf('page=');
	   	$page = $page.substring(($pageind+5));
	   	getdata($page);
	   	return false;
	});
	
	$(document).on('click', '.input-remove-row', function () {
        var tr = $(this).closest('tr');
        tr.fadeOut(200, function () {
            jumlah = jumlah - 1;
            tr.remove();
            dataPraktek["haripraktek"] = "";
            dataPraktek["jampraktekdari"] = "";
            dataPraktek["jamprakteksampai"] = "";
            
        });

        
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
	
	try
	{
		var Dokter = new Object();
		var dataPraktek = new Object();
		var objHari = [];
		var objJamDari = [];
		var objJamSampai = [];
		var m_oTblData = document.getElementById("m_oTblData");
		
		Dokter.NamaDokter = $('input#m_oTbNama').val();
		Dokter.IdPoli = $('select#m_oDdlPoli').val();
		Dokter.User = $('input#m_oHfField').val();
		
		for (i = 1; i < m_oTblData.rows.length; i++) 
		{
			objJamDari.push(m_oTblData.rows[i].cells[2].innerText);
			objJamSampai.push(m_oTblData.rows[i].cells[3].innerText);
			objHari.push(m_oTblData.rows[i].cells[1].innerText);
		}
		
		dataPraktek.HariPraktek = objHari;
		dataPraktek.JamDari = objJamDari;
		dataPraktek.JamSampai = objJamSampai;
		
		var praktekJson = JSON.stringify(dataPraktek);
		var dokterJson = JSON.stringify(Dokter);
			
		$.post('controller/master/doktercontroller.php',
			{
				action: 'add',
				jsonDokter: dokterJson,
				jsonPraktek: praktekJson
			},
			function(data, textStatus) {
					alert(data);
					getdata(currentPage);
			}, 
			"json"		
		);
	}
	catch(ex)
	{
		errchild(ex.message);
	}
}

function deleteDokter() {	
	try
	{
		var Dokter = new Object();
		Dokter.ID = $("#delete_confirm_modal input#m_oHfId").val();
		
		var dokterJson = JSON.stringify(Dokter);
		
		$.post('controller/master/doktercontroller.php',
			{
				action: 'delete',
				dataJson: dokterJson
			},
			function(data, textStatus) {
					alert(data);
					getdata(currentPage);
					$("div#delete_confirm_modal").modal("hide");
			}, 
			"json"		
		);
	}
	catch(ex)
	{
		alert(ex.message());
	}
}
var dataPraktek = {};
function addData() 
{	
    try {
    	
    	var m_oTblData = document.getElementById("m_oTblData");
    	for (i = 1; i < m_oTblData.rows.length; i++) 
    	{
			if ($("select#m_oDdlHariPraktek").val() == m_oTblData.rows[i].cells[1].innerText) 
	        {
	            errchild("Hari prakter dokter already exists");
	            return false;
	        }	        
		}
		
        dataPraktek["no"] = (jumlah == 0) ? 1 : jumlah + 1;
        dataPraktek["haripraktek"] = $("select#m_oDdlHariPraktek").val();
        dataPraktek["jampraktekdari"] = $("select#m_oDdlJamPrakterDari").val();
        dataPraktek["jamprakteksampai"] = $("select#m_oDdlJamPrakterSampai").val();
        dataPraktek["remove-row"] = '<i class="icon-remove"></i>';
        
        if (dataPraktek["jampraktekdari"] == dataPraktek["jamprakteksampai"])
        {
			errchild("Jam praktek tidak boleh sama");
		}
		else
		{
            var row = $('<tr align="center"></tr>');
            $.each(dataPraktek, function (type, value) 
            {
                $('<td align="center" style="width:5%;" class="input-' + type + '"></td>').html(value).appendTo(row);
            });
            
            //$('.preview-table > tbody:last').html(row);
            var tblID = $("#m_oTblData");
            $(row).appendTo(tblID);
            jumlah++;
            errchild("");
       }
        
    } catch (ex) {
        errchild(ex.message);
    }
}

function errchild(msg)
{
	try
	{
		document.getElementById('m_oLblMsgChild').innerHTML = msg;
		return false;
	} 
	catch (ex) 
	{
		alert(ex.message);
	}
}

function detail(id)
{
	var did = 'd' + id;
	if( document.getElementById(did).style.display == 'inline' )
	{
		document.getElementById(did).style.display = 'none'; // Hide the details div
		//document.getElementById(id).innerHTML = '<strong>+</strong>';  // Change the symbol to + 

	}
	else 
	{
		//document.getElementById(did).style.display = 'inline';  // show the details
		document.getElementById(did).style.display = 'inline';  // show the details
		//document.getElementById(id).innerHTML = '<strong>-</strong>'; //Change the symbol to -

	}
}