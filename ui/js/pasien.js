$(function() {
	listdata();
	$(document).on("click", "a#pasienlist", function(){ listdata(this);});
	$(document).on("click", "a#pasienregistre", function(){ bindform();});	
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
	     url:"controller/pasien.php",
                  type:"POST",
                  data:"action=showdata&page="+$page + "pagesize=" + pagesize() + "&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
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
	$.ajax({
	     url:"controller/pasien.php",
                  type:"POST",
                  data:"action=showdata&page=1&searchby=" + OpsiFilter() + "&valuesearch=" + SearchTerm() + "&pagesize=" + pagesize(),
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

function onsucces(response){
	
}

function removeEditable(element) { 
	
	$('#indicator').show();
	
	var User = new Object();
	User.id = $('.current').attr('user_id');		
	User.field = $('.current').attr('field');
	User.newvalue = $(element).val();
	
	var userJson = JSON.stringify(User);
	
	$.post('controller/user.php',
		{
			action: 'update_field_data',			
			user: userJson
		},
		function(data, textStatus) {
			$('td.current').html($(element).val());
			$('.current').removeClass('current');
			$('#indicator').hide();			
		}, 
		"json"		
	);	
}

function makeEditable(element) { 
	$(element).html('<input id="editbox" size="'+  $(element).text().length +'" type="text" value="'+ $(element).text() +'">');  
	$('#editbox').focus();
	$(element).addClass('current'); 
}

function deleteConfirmation(element) {	
	$("#delete_confirm_modal").modal("show");
	$("#delete_confirm_modal input#user_id").val($(element).attr('user_id'));
}

function deleteUser(element) {	
	
	var User = new Object();
	User.id = $("#delete_confirm_modal input#user_id").val();
	
	var userJson = JSON.stringify(User);
	
	$.post('controller/user.php',
		{
			action: 'delete_user',
			user: userJson
		},
		function(data, textStatus) {
			getUserList(element);
			$("#delete_confirm_modal").modal("hide");
		}, 
		"json"		
	);	
}

function getUserList(element) {
	
	$('#indicator').show();
	
	$.post('controller/pasien.php',
		{
			action: 'getdata'
		},
		function(data, textStatus) {
			renderUserList(data);
			$('#indicator').hide();
		}, 
		"json"		
	);
}
    
function renderUserList(jsonData) {
	
	var table = '<table width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">Name</th><th scope="col">Gender</th><th scope="col">Address</th><th scope="col">Religion</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead><tbody>';

	$.each( jsonData, function( index, pasien){     
		table += '<tr>';
		table += '<td class="edit" field="nama" user_id="'+pasien.id+'">'+pasien.nama+'</td>';
		table += '<td class="edit" field="jeniskelamin" user_id="'+pasien.id+'">'+pasien.jeniskelamin+'</td>';
		table += '<td class="edit" field="alamat" user_id="'+pasien.id+'">'+pasien.alamat+'</td>';
		table += '<td class="edit" field="agama" user_id="'+pasien.id+'">'+pasien.agama+'</td>';
		table += '<td class="edit" field="status" user_id="'+pasien.id+'">'+pasien.status+'</td>';
		table += '<td><a href="javascript:void(0);" user_id="'+pasien.id+'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
		table += '</tr>';
    });
            
	table += '</tbody></table>';
	//table +='<br><div class="pager"></div>';
	$('div#content').html(table);
}

function addUser(element) {	
	
	$('#indicator').show();
	
	var User = new Object();
	User.name = $('input#name').val();
	User.email = $('input#email').val();
	User.mobile = $('input#mobile').val();
	User.address = $('textarea#address').val();
	
	var userJson = JSON.stringify(User);
	
	$.post('controller/user.php',
		{
			action: 'add_user',
			user: userJson
		},
		function(data, textStatus) {
			getUserList(element);
			$('#indicator').hide();
		}, 
		"json"		
	);
}

function getCreateForm(element) {
	
	var form = '<table>';
		form += '<tr><td align="center">Data Pasien</td><td></td><td align="center">Data Check Up</td></tr>';
		form += '<tr><td>';
		//left
		form += '<table><tr><td>Registration Number</td><td><input type="text" id="m_oTbRegNumber" name="m_oTbRegNumber" class="input-xlarge" readonly="true" value="' + element[0]['register'] + '"/></td></tr>';
    	form += '<tr><td>Nama</td><td><input type="text" id="m_oTbNama" name="m_oTbNama" class="input-xlarge"/></td></tr>';
    	form += '<tr><td>Tempat Lahir</td><td><input type="text" id="m_oTbTampatLahir" name="m_oTbTampatLahir" class="input-large"/></td></tr>';
    	form += '<tr><td>Tanggal Lahir</td><td><input type="text" id="m_oTbTanggalLahir" name="m_oTbTanggalLahir" class="input-large"/></td></tr>';
    	form += '<tr>';
    	form += '<td>';
    	form += 'Usia';
    	form += '</td>';
    	form += '<td>';
    	form += '<input type="text" id="m_oTbUsia" name="m_oTbUsia" class="input-small"/>';
    	form += '</td></tr><tr>';
    	form += '<td>Jenis Kelamin</td><td><input type="radio" value="Laki-laki" name="m_oRdJK"/>Laki-Laki<br><input type="radio" value="Perempuan" name="m_oRdJK"/>Perempuan<br></td></tr>';
    	form += '<tr><td valign="top">Agama</td><td>';
    	form += '<input type="radio" value="Islam" name="m_oRdAgama" id="m_oRdAgama"/>Islam <br>';
		form += '<input type="radio" value="Kristen" name="m_oRdAgama"/>Kristen <br>';
		form += '<input type="radio" value="Hindu" name="m_oRdAgama"/>Hindu <br>';
		form += '<input type="radio" value="Budha" name="m_oRdAgama"/>Budha <br>';
    	form += '</td></tr><tr><td valign="top">Status</td><td>';
    	form += '<input type="radio" value="Menikah" name="m_oRdStatus"/> Menikah <br>';
		form += '<input type="radio" value="Janda/Duda" name="m_oRdStatus"/> Janda/Duda <br>';
		form += '<input type="radio" value="Belum Menikah" name="m_oRdStatus"/> Belum Menikah <br>';
    	form += '</td></tr></table>';
		form += '</td><td width="5%"></td>';
		//righ 
		form += '<td valign="top">';
		form += '<table><tr><td>Nomor Antrian</td><td><input type="text" id="m_oTbNoAntri" name="m_oTbNoAntri" readonly="true" value="' + element[0]['antrian'] + '"/></td></tr>';
		var dat;
		form += '<tr><td>Poli</td><td>';
		//binding data poli to dropdownlist
		form += element[0]['poli'];
	   	form +='</td></tr>';
		form += '</table>';
		
		form += '</td>';
		form += '</tr>';
		form += '<tr><td colspan="3" align="center">';
		form +=	'<div class="control-group">';
		form +=	'<div class="">';		
		form +=	'<button type="button" id="add" class="btn btn-primary"><i class="icon-ok icon-white"></i> Add</button>';
		form +=	'</div>';
		form +=	'</div>';
		form +=	'</td></tr>';
		form += '</table>';
		
		
		
		$('#divcontent').html(form);
}


function bindform(){
	   
	   $.post('controller/pasien.php',
		{
			action: 'getpoli'
		},
		function(data, textStatus) {
			getCreateForm(data);
			//$('#indicator').hide();
		}, 
		"json"		
	);
		 
}
