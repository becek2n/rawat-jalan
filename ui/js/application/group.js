$(document).ready(function(){
	$(document).on('click', 'button#m_oBtnSave', function(){ savedata();});
})

function savedata(){
	try{
		var group = new Object();
		group.id = $('input#m_oHfIDGroup').val();
		group.name = $('input#m_oTbGroupName').val();
		group.user = 'admin';
		
		var items = $("#jqxTree").jqxTree('getItems');
    	var datagroup = new Array();
    	
	    $.each(items, function () {
	    	(this.checked == true || this.checked == null)? datagroup[datagroup.length] = this.id : '';
	    });
	    
	    group.data = datagroup;
	    var groupjson = JSON.stringify(group);
	    $.post('controller/admin/group.php',
			{
				action: 'save',
				group: group,
				idgroup: datagroup
			},
			function(data, textStatus) {
				if (textStatus == 'success'){
					alert(data);
					return true;
				}else{
					document.getElementById('m_oLblMsg').innerHTML = data;
				}
			}, 
			"json"		
		);
	} catch (ex) {
		document.getElementById('m_oLblMsg').innerHTML = ex.message;
	}
}

$("input").click(function () {
    var items = $("#jqxTree").jqxTree('getItems');
    var data = '';
    $.each(items, function () {
    	(this.checked == true)?
        	data += $.param({ label: this.label, checked: this.checked }) + "," : '';
        
    });

});