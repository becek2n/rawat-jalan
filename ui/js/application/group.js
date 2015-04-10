$(document).ready(function(){
	$(document).on('click', 'button#m_oBtnSave', function(){ savedata();});
})

function savedata(){
	try{
		var group = new Object();
		group.name = $('input#m_oTbGroupName').val();
		
		var items = $("#jqxTree").jqxTree('getItems');
    	var datagroup = new Array();
    	
	    $.each(items, function () {
	    	(this.checked == true)? datagroup[datagroup.length] = this.id : '';
	    });
	    
	    //group.data = datagroup;
	    var groupjson = JSON.stringify(group);
	    var idjson = JSON.stringify(datagroup);
	    $.post('controller/admin/group.php',
			{
				action: 'save',
				group: groupjson,
				idgroup: idjson
			},
			function(data, textStatus) {
				getUserList(element);
				$('#indicator').hide();
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