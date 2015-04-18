$(document).ready(function(){
	$(document).on("click", "button#m_oBtnSave", function(){ return validateform();})
	$(document).on("click", "a.delete_confirm", function(){ return deleteconfirm();})
	
});

function validateform()
{
	var obj = new Object();
	var bResult;
	var err = document.getElementById("m_oLblMsg");
	try
	{
		obj.username = $('input#m_oTbUser').val();
		obj.fullname = $('input#m_oTbFullName').val();
		obj.password = $('input#m_oTbPassword').val();
		obj.confirm = $('input#m_oTbConfirm').val();
		
		if (obj.username == '')
		{
			err.innerHTML = 'User Name must be filled !!!';
			bResult = false;
		}
		else if (obj.fullname == '')
		{
			err.innerHTML = 'Full Name must be filled !!!';
			bResult = false;
		}
		else if (obj.password == '')
		{
			err.innerHTML = 'Password must be filled !!!';
			bResult = false;
		}
		else if (obj.confirm == '')
		{
			err.innerHTML = 'Confirmation Password must be filled !!!';
			bResult = false;
		}
		else if (obj.password != obj.confirm)
		{
			err.innerHTML = 'Confirmation Password not match !!!';
			bResult = false;
		}
		else
		{
			bResult = true;
		}
	}
	catch ($ex)
	{
		err.innerHTML = $ex.getMessage();
		bResult = false;
	}
	
	return bResult;
}

function deleteconfirm(element)
{
	var question = 'Do you want to delete data ?';
	if (confirm(question))
	{
		return true;
	}
	else
	{
		return false;
	}
}