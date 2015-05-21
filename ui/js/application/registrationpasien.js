var IDHari;
var currentPage;
$(function() {
	getData(1);
	$(document).on("click", "a#pasienlist", function(){ getData(1);});
	$(document).on("click", "a#pasienregistre", function(){ bindFormRegistre();});	
	$(document).on("click", "a#pasiencheckup", function(){ bindFormCheckUp();});
	$(document).on("click", "button#add_user", function(){ addUser(this); });
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on("click", "button.delete", function(){ deletePasien(this); });
	$(document).on("keyup", "input#m_oTbSearch", function(){ getData(1); });
	$(document).on("change", "select#m_oDdlPageSize", function(){ getData(1); });
	
	//form pasien registre
	$(document).on("click", "button#m_oBtnSave", function(){ validateFormRegistreNew(); });
	$(document).on("change", "select#m_oDdlPoli", function(){ getDokter(); });
	$(document).on("click", "button#m_oBtnSelect", function(){ popupDayWorkDokter(); });
	
	//form chekup
    $(document).on("keyup", "input#m_oTbRegNumber", function(){ getPasien(); });
    $(document).on("click", "button#m_oBtnSaveChekcup", function(){ validateFormCheckUP(); });
	//pager
	$('#divcontent').on('click','.page-numbers',function(){
       $page = $(this).attr('href');
	   $pageind = $page.indexOf('page=');
	   $page = $page.substring(($pageind+5));
		getData($page);
		return false;
	});
});

function deleteConfirmation(element) {	
	$("#delete_confirm_modal").modal("show");
	$("#delete_confirm_modal input#m_oHfId").val($(element).attr('idpasien'));
}

function deletePasien() {	
	try
	{
		var Pasien = new Object();
		Pasien.ID = $("#delete_confirm_modal input#m_oHfId").val();
		Pasien.User = $("input#m_oHfField").val();
		
		var pasienJson = JSON.stringify(Pasien);
		
		$.post('controller/data/pasiencontroller.php',
			{
				action: 'delete',
				dataJson: pasienJson
			},
			function(data, textStatus) {
				if (data == "Success" )
				{
					getData(currentPage);
					$("div#delete_confirm_modal").modal("hide");	
					alert(data);
				}
				
			}, 
			"json"		
		);
	}
	catch(ex)
	{
		alert(ex.message());
	}
}

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
        data:"action=getdata&page=" + currentPage +"&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
        cache: false,
        success: function(response){
		   
		  $('#divcontent').html(response);
		 
		}
		
	});
	if (OpsiFilter() == 'nama') {
        $(".nama").each(function () {
            var searchPattern = new RegExp('(' + SearchTerm() + ')', 'ig');
            $(this).html($(this).text().replace(searchPattern, "<span class = 'highlight'>" + SearchTerm() + "</span>"));
        });
    }
	 return false;
}

function bindFormRegistre(){
	try
	{
		$('div#divSearch').hide();		
		$('#divcontent').load('./ui/forms/data/pasienform.php');
		
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}		 
}

function bindFormCheckUp(){
	try
	{
		$('div#divSearch').hide();		
		$('#divcontent').load('./ui/forms/data/pasiencheckup.php');
		
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}
		 
}

function removeValueOfDropdown()
{
	try
	{
		var oDdlDokter = document.getElementById("m_oDdlDokter");
		var numberOfOption = oDdlDokter.options.length;
		
		for (i=0; i < numberOfOption; i++)
		{
			oDdlDokter.remove(0);
		}
						
	} 
	catch (ex) 
	{
		return msgErr(ex.message);
	}
}
function getDokter()
{
	var oDdlDokter = document.getElementById("m_oDdlDokter");
	
	try
	{
		$.post('controller/data/pasiencontroller.php',
			{
				action: 'getdokter',
				data: $("#m_oDdlPoli").val()
			},
			function(data, textStatus) {
				removeValueOfDropdown();
				$.each(data[0], function(index, oDokter)
				{
					var createOption = document.createElement("option");
					createOption.text = oDokter.namadokter;
					createOption.value = oDokter.iddokter;
					oDdlDokter.add(createOption);
				});
				document.getElementById("m_oTbNoAntri").value = data[1];
			}, 
			"json"		
		);
	}
	catch(ex)
	{
		return msgErr(ex.message);
	}
}

function popupDayWorkDokter() 
{	
	try
	{
		$("div#divHariKerja").modal("show");
	
		var ID = document.getElementById("m_oDdlDokter").value;
		
		$.ajax({
			url:"controller/data/pasiencontroller.php",
	      	type:"POST",
	      	data:"action=getharipraktek&idDokter=" + ID,
	        cache: false,
	        success: function(response){
			   $("#divContentHari").html(response);
			}	
		});
		
	} catch (ex) 
	{
		alert(ex.message);
	}
	
}

function selectDayWorkDokter(ID, Hari)
{
	$("div#divHariKerja").modal("hide");
	IDHari = ID;
	document.getElementById("m_oTbHari").value = Hari;
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

function validateFormCheckUP()
{
	try
	{
		var objCheckUp  = new Object();
		objCheckUp.RegNumber = $("#m_oTbRegNumber").val();
		objCheckUp.NoAntrian = $("#m_oTbNoAntri").val();
		objCheckUp.Poli = $("#m_oDdlPoli").val();
		objCheckUp.Dokter = $("#m_oDdlDokter").val();
		objCheckUp.Hari = IDHari;
		
		if (objCheckUp.RegNumber == '')
		{
			return msgErr("Registration Number must be filled!");
		}
		else if (objCheckUp.NoAntrian == '')
		{
			return msgErr("No antrian must be filled!");
		}
		else if (objCheckUp.Poli == '')
		{
			return msgErr("Please select poli!");
		}
		else if (objCheckUp.Dokter == null)
		{
			return msgErr("Please select dokter!");
		}
		else if (objCheckUp.Hari == '')
		{
			return msgErr("Please select hari !");
		}
		else
		{
			document.getElementById("m_oLblMsg").innerHTML = '';
			saveData(objCheckUp, 'addcheckup');
		}
	}
	catch(ex)
	{
		return msgErr(ex.mesaage());
	}
}

function validateFormRegistreNew()
{
	try
	{
		var objRegistre = new Object();
		objRegistre.RegNumber = $("#m_oTbRegNumber").val();
		objRegistre.Nama = $("#m_oTbNama").val();
		objRegistre.TempatLahir = $("#m_oTbTampatLahir").val();
		objRegistre.TanggalLahir = $("#m_oTbTanggalLahir").val();
		objRegistre.Usia = $("#m_oTbUsia").val();
		objRegistre.Alamat = $("textarea#m_oTbAlamat").val();
		objRegistre.User = $("#m_oHfField").val();
		///object select
		objJK = document.getElementsByName("m_oRdJK");
		objAgama = document.getElementsByName("m_oRdAgama");
		objStatus =document.getElementsByName("m_oRdStatus");
		
		objRegistre.NoAntrian = $("#m_oTbNoAntri").val();
		objRegistre.Poli = $("#m_oDdlPoli").val();
		objRegistre.Dokter = $("#m_oDdlDokter").val();
		objRegistre.Hari = IDHari; //$("#m_oTbHari").val();
		
		var sValueJK, sValueAgama, sValueStatus;
		//value gender
		if (objJK[0].checked)
		{
			sValueJK = objJK[0].value;
		}
		else if (objJK[1].checked)
		{
			sValueJK = objJK[1].value;
		}
		
		//value religion
		if (objAgama[0].checked)
		{
			sValueAgama = objAgama[0].value;
		}
		else if (objAgama[1].checked)
		{
			sValueAgama = objAgama[1].value;
		}
		else if (objAgama[2].checked)
		{
			sValueAgama = objAgama[2].value;
		}
		else if (objAgama[3].checked)
		{
			sValueAgama = objAgama[3].value;
		}
		//value status
		if (objStatus[0].checked)
		{
			sValueStatus = objStatus[0].value;
		}
		else if (objStatus[1].checked)
		{
			sValueStatus = objStatus[1].value;
		}
		else if (objStatus[2].checked)
		{
			sValueStatus = objStatus[2].value;
		}
		
		objRegistre.JenisKelamin = sValueJK;
		objRegistre.Agama = sValueAgama;
		objRegistre.Status = sValueStatus;
		
		if (objRegistre.RegNumber == '')
		{
			return msgErr("Registration Number must be filled!");
		}
		else if (objRegistre.Nama == '')
		{
			return msgErr("Nama must be filled!");
		}
		else if (objRegistre.TempatLahir == '')
		{
			return msgErr("Tempat Lahir must be filled!");
		}
		else if (objRegistre.TanggalLahir == '')
		{
			return msgErr("Tanggal Lahir must be filled!");
		}
		else if (!objJK[0].checked && !objJK[1].checked)
		{
			return msgErr("Please select Jenis Kelamin!");
		}
		else if (objRegistre.Alamat == '')
		{
			return msgErr("Alamat must be filled!");	
		}
		else if (!objAgama[0].checked && !objAgama[1].checked && !objAgama[2].checked && !objAgama[3].checked)
		{
			return msgErr("Please select Agama!");
		}
		else if (!objStatus[0].checked && !objStatus[1].checked && !objStatus[2].checked)
		{
			return msgErr("Please select Status!");
		}
		else if (objRegistre.NoAntrian == '')
		{
			return msgErr("No antrian must be filled!");
		}
		else if (objRegistre.Poli == '')
		{
			return msgErr("Please select poli!");
		}
		else if (objRegistre.Dokter == null)
		{
			return msgErr("Please select dokter!");
		}
		else if (objRegistre.Hari == '')
		{
			return msgErr("Please select hari !");
		}
		else
		{
			document.getElementById("m_oLblMsg").innerHTML = '';
			saveData(objRegistre, 'add');
		}
	}
	catch(ex)
	{
		return msgErr(ex.mesaage());
	}
}

function saveData(objData, param)
{
	try
	{
		var objJson = JSON.stringify(objData);
		$.post('controller/data/pasiencontroller.php',
			{
				action: param,
				dataJson: objJson
			},
			function(data, textStatus) {
				if (param == 'addcheckup')
				{
					if (data == 1)
					{
						alert('Data successfully save');
						document.getElementById('pasiencheckup').click();
					}
					else
					{
						$("#m_oLblMsg").text('Pasien is has been registre checkup');
					}
				}
				if (param == 'add')
				{
					if (data == 'Success')
					{
						alert('Data successfully save');
						document.getElementById('pasienregistre').click();
					}
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
				action: 'getpaseienbyid',
				ID: $("#m_oTbRegNumber").val()
			},
			function(data, textStatus) {
				if (data[0])
				{
					$("#m_oTbNama").val(data[0].nama);
					$("#m_oTbTampatLahir").val(data[0].tempatlahir);
					$("#m_oTbTanggalLahir").val(data[0].tanggallahir);
					$("#m_oTbUsia").val(data[0].usia);
					$("#m_oTbAlamat").val(data[0].alamat);
					return msgErr("");
				}
				else
				{
					$("#m_oTbNama").val('');
					$("#m_oTbTampatLahir").val('');
					$("#m_oTbTanggalLahir").val('');
					$("#m_oTbUsia").val('');
					$("#m_oTbAlamat").val('');
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
