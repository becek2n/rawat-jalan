var jumlah = 0;
var Total = 0;
var currentPage;
var dataTemp = {};
$(function() {
	bindFormPembayaran();
	$(document).on("click", "a#listcheckup", function(){ getData(1);});
	$(document).on("click", "a#pembayaran", function(){ bindFormPembayaran();});	
	$(document).on("click", "#m_oBtnAdd", function(){ addTemp();});
	$(document).on("click", "button#add_user", function(){ addUser(this); });
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on("click", "button.delete", function(){ deleteUser(this); });
	$(document).on("keyup", "input#m_oTbSearch", function(){ getData(1); });
	$(document).on("change", "select#m_oDdlPageSize", function(){ getData(1); });
	$(document).on("click", "button#m_oBtnSave", function(){ validateForm(); });
	$(document).on("keyup", "input#m_oTbRegNumber", function(){ getPasien(); });
	
	$("#m_oTbFrom").datepicker({
        onSelect: function (value, ui) {
        	var today = new Date(),
            dob = new Date(value),
            yearNow = today.getFullYear(),
            age = yearNow - ui.selectedYear; //This is the update
        },
        yearRange: '2015:2050',
        changeMonth: true,
        changeYear: true
    });
    $("#m_oTbTo").datepicker({
        onSelect: function (value, ui) {
        	var today = new Date(),
            dob = new Date(value),
            yearNow = today.getFullYear(),
            age = yearNow - ui.selectedYear; //This is the update
        },
        yearRange: '2015:2050',
        changeMonth: true,
        changeYear: true
    });
	
	//pager
	$('#divcontent').on('click','.page-numbers',function(){
       $page = $(this).attr('href');
	   $pageind = $page.indexOf('page=');
	   $page = $page.substring(($pageind+5));
		getData($page);
		return false;
	});
	$(document).on('click', '.input-remove-row', function () {
        var tr = $(this).closest('tr');
        var number = tr[0].cells[0].innerText;
        Total = parseInt(Total) - parseInt(tr[0].cells[2].innerText);
        tr.fadeOut(200, function () {
            jumlah = jumlah - 1;
            tr.remove();
            dataTemp["tindakan"] = "";
            dataTemp["harga"] = "";
            $("#total").html(Total);
        });
    });
});

function pagesize(){
	return jQuery.trim($("[id*=m_oDdlPageSize]").val());
}
function SearchTerm() {
	return jQuery.trim($("[id*=m_oTbSearch]").val());
};

function OpsiFilter() {
    return jQuery.trim($("[id*=m_oDdlFilter]").val());
};

function getData(iPage){
	currentPage = iPage;
	$('div#divSearch').show();
	$.ajax({
	     url:"controller/data/pasiencontroller.php",
	     type:"POST",
	     data:"action=getdatapayment&page=" + currentPage +"&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
         cache: false,
        success: function(response){
			$('#divcontent').html(response);
		}	
	});
	
	return false;
}

function deleteConfirmation(element) 
{	
	$("#delete_confirm_modal").modal("show");
	$("#delete_confirm_modal input#user_id").val($(element).attr('user_id'));
}

function bindFormPembayaran()
{
	try
	{
		$('div#divSearch').hide();		
		$('#divcontent').load('./ui/forms/data/pembayaranform.php');
		
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}		 
}

function addTemp() 
{	
    try {
    	
    	if ($("#m_oTbTindakan").val() == '') 
    	{
			return msgErr("Tindakan must be filled !");
		}
		else if ($("#m_oTbHarga").val() == '')
		{
			return msgErr("Harga must be filled !");
		}
    	var m_oTblData = document.getElementById("m_oTblData");
		
        dataTemp["no"] = (jumlah == 0) ? 1 : jumlah + 1;
        dataTemp["tindakan"] = $("#m_oTbTindakan").val();
        dataTemp["harga"] = $("#m_oTbHarga").val();
        dataTemp["remove-row"] = '<i class="icon-remove"></i>';
        
        var row = $('<tr align="center"></tr>');
        $.each(dataTemp, function (type, value) 
        {
            $('<td align="center" style="width:5%;" class="input-' + type + '"></td>').html(value).appendTo(row);
        });
        
        Total = parseInt(Total) + parseInt($("#m_oTbHarga").val());
        $("#total").html(Total);
        //$('.preview-table > tbody:last').html(row);
        var tblID = $("#m_oTblData");
        $(row).appendTo(tblID);
        jumlah++;
        msgErr("");
        
    } catch (ex) {
        msgErr(ex.message);
    }
}

//validation
function msgErr(msg)
{
	try
	{
		document.getElementById("m_oLblMsg").innerHTML = msg;
		return false;
	}
	catch(ex)
	{
		alert(ex.message);
	}
	return false;
}

function validateForm()
{
	try
	{
		var objPembayaran  = new Object();
		objPembayaran.RegNumber = $("#m_oTbRegNumber").val();
		objPembayaran.Nama = $("#m_oTbNoAntri").val();
		var tempTable = document.getElementById("m_oTblData");
		if (objPembayaran.RegNumber == '')
		{
			return msgErr("ID Pasien must be filled!");
		}
		else if (objPembayaran.Nama == '')
		{
			return msgErr("Nama Pasien must be filled!");
		}
		else if (tempTable.rows.length == 2)
		{
			return msgErr("Tindakan must be filled!");
		}
		else
		{
			var m_oTblData = document.getElementById("m_oTblData");
			var objTindakan = [];
			var objHarga = [];
		    
			for (i = 1; i <= m_oTblData.rows.length - 2; i++) 
			{	
		    	objTindakan.push(m_oTblData.rows[i].cells[1].innerText);
				objHarga.push(m_oTblData.rows[i].cells[2].innerText);
			}
			
			objPembayaran.Tindakan = objTindakan;
			objPembayaran.Harga = objHarga;
			objPembayaran.User = $('input#m_oHfField').val();

			document.getElementById("m_oLblMsg").innerHTML = '';
			saveData(objPembayaran);
		}
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}
}

function saveData(objData)
{
	try
	{
		var objJson = JSON.stringify(objData);
		
		$.post('controller/data/pasiencontroller.php',
			{
				action: 'payment',
				dataJson: objJson
			},
			function(data, textStatus) {
				if (data == "Success")
				{
					alert('Data successfully save');
					document.getElementById('pembayaran').click();
				}
				else
				{
					$("#m_oLblMsg").text(data);
				}
			}, 
			"json"	
		);
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}
}

//form pasien checkup
function getPasien()
{
	try
	{
		
		$.post('controller/data/pasiencontroller.php',
			{
				action: 'getpasien',
				ID: $("#m_oTbRegNumber").val()
			},
			function(data, textStatus) {
				if (data[0])
				{
					$("#m_oTbNama").val(data[0].nama);
					$("#m_oTbPoli").val(data[0].namapoli);
					$("#m_oTbDokter").val(data[0].namadokter);
					return msgErr("");
				}
				else
				{
					$("#m_oTbNama").val('');
					$("#m_oTbPoli").val('');
					$("#m_oTbDokter").val('');
					return msgErr("Pasien not found");
				}
			}, 
			"json"	
		);
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}
}

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function detail(id)
{
	if( document.getElementById(id).style.display == 'table-row' )
	{
		document.getElementById(id).style.display = 'none'; // Hide the details div
	}
	else 
	{
		document.getElementById(id).style.display = 'table-row';  // show the details
	}
}
