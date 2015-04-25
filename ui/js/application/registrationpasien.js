var IDHari;
$(function() {
	listdata();
	$(document).on("click", "a#pasienlist", function(){ listdata(this);});
	$(document).on("click", "a#pasienregistre", function(){ bindFormRegistre();});	
	$(document).on("click", "a#pasiencheckup", function(){ bindFormCheckUp();});
	$(document).on("click", "button#add_user", function(){ addUser(this); });
	$(document).on("click", "a.delete_confirm", function(){ deleteConfirmation(this); });
	$(document).on("click", "button.delete", function(){ deleteUser(this); });
	$(document).on("dblclick", "td.edit", function(){ makeEditable(this); });
	$(document).on("blur", "input#editbox", function(){ removeEditable(this) });
	
	 $('#divcontent').on('click','.page-numbers',function(){
       $page = $(this).attr('href');
	   $pageind = $page.indexOf('page=');
	   $page = $page.substring(($pageind+5));
       
	   $.ajax({
	     url:"controller/data/pasiencontroller.php",
                  type:"POST",
                  data:"action=getdata&page="+$page + "pagesize=" + pagesize() + "&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
        cache: false,
        success: function(response){
		   
		  $('#divcontent').html(response);
		 
		}
		
	   });
	return false;
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

function searchdata(){
	listdata();
}
function listdata(){
	$('div#divSearch').show();
	$.ajax({
	     url:"controller/data/pasiencontroller.php",
                  type:"POST",
                  data:"action=getdata&page=1&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
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

function deleteConfirmation(element) {	
	$("#delete_confirm_modal").modal("show");
	$("#delete_confirm_modal input#user_id").val($(element).attr('user_id'));
}

function bindFormRegistre(){
	try
	{
		$('div#divSearch').hide();		
		$('#divcontent').load('./ui/forms/data/pasienform.php');
		
	}
	catch(ex)
	{
		alert(ex.message());
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
		document.getElementById("m_oLblMsg").innerHTML = ex.message();
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
				$.each(data, function(index, oDokter)
				{
					var createOption = document.createElement("option");
					createOption.text = oDokter.namadokter;
					createOption.value = oDokter.iddokter;
					oDdlDokter.add(createOption);
				});
			}, 
			"json"		
		);
	}
	catch(ex)
	{
		document.getElementById("m_oLblMsg").innerHTML = ex.message();
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
		alert(ex.message());
	}
	
}

function selectDay(ID, Hari)
{
	$("div#divHariKerja").modal("hide");
	IDHari = ID;
	document.getElementById("m_oTbHari").value = Hari;
}
		
function bindFormCheckUp()
{
	try
	{
		$('div#divSearch').hide();
	}
	catch(ex)
	{
		alert(ex.message());
	}
}