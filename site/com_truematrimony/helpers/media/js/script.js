window.onload = function() {  
   document.getElementById('additional-info').style.display = 'none';
   document.getElementById('matrimony-basic-edit-info').style.display = 'none';
   document.getElementById('hideadditinfo').style.display = 'none';
   document.getElementById('uploadpic').style.display = 'none';
   document.getElementById('uploadprofile').style.display = 'none';
}

function showAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'inline';
    document.getElementById('hideadditinfo').style.display = 'inline';
    document.getElementById('moreinfo').style.display = 'none';
    document.getElementById('matrimony-edit-forms').style.display = 'none';
    document.getElementById('matrimony-raasi-edit-info').style.display = 'none';
    document.getElementById('matrimony-additional-edit-info').style.display = 'none';
    document.getElementById('matrimony-education-edit-info').style.display = 'none';
    document.getElementById('matrimony-physical-edit-info').style.display = 'none';
    document.getElementById('matrimony-contact-edit-info').style.display = 'none';
    document.getElementById('matrimony-basic-edit-info').style.display = 'none';
    document.getElementById('uploadprofile').style.display = 'none';
  }

function hideAdditionalinfo() {
	document.getElementById('additional-info').style.display = 'none';
	document.getElementById('hideadditinfo').style.display = 'none';
	document.getElementById('moreinfo').style.display = 'inline';
}

function showEditForm() {
   document.getElementById('matrimony-family-info').style.display = 'none';
   document.getElementById('matrimony-edit-forms').style.display = 'inline';   
}

function showEditRaasiForm() {
document.getElementById('matrimony-raasi-edit-info').style.display = 'inline';
document.getElementById('matrimony-raasi-info').style.display = 'none';
}

function showEditAdditForm() {
document.getElementById('matrimony-additional-edit-info').style.display = 'inline';
document.getElementById('matrimony-additional-infos').style.display = 'none';
}

function showUpload() {
document.getElementById('uploadpic').style.display = 'inline';
}

function showEditEducateForm() {
document.getElementById('matrimony-education-edit-info').style.display = 'inline';
document.getElementById('matrimony-education-info').style.display = 'none';
}

function showEditPhysicalForm() {
document.getElementById('matrimony-physical-edit-info').style.display = 'inline';
document.getElementById('matrimony-physical-info').style.display = 'none';
}

function cancelFamilyForm() {
document.getElementById('matrimony-edit-forms').style.display = 'none';
document.getElementById('matrimony-family-info').style.display = 'inline';
}

function cancelRaasiForm() {
document.getElementById('matrimony-raasi-edit-info').style.display = 'none';
document.getElementById('matrimony-raasi-info').style.display = 'inline';
}

function cancelAdditForm() {
document.getElementById('matrimony-additional-edit-info').style.display = 'none';
document.getElementById('matrimony-additional-infos').style.display = 'inline';
}

function cancelEducateForm() {
document.getElementById('matrimony-education-edit-info').style.display = 'none';
document.getElementById('matrimony-education-info').style.display = 'inline';
}

function cancelPhysicalForm() {
document.getElementById('matrimony-physical-edit-info').style.display = 'none';
document.getElementById('matrimony-physical-info').style.display = 'inline';
}

function showContactForm() {
document.getElementById('matrimony-contact-edit-info').style.display = 'inline';
document.getElementById('matrimony-contact-info').style.display = 'none';
}

function showBasicForm() {
document.getElementById('matrimony-basic-edit-info').style.display = 'inline';
document.getElementById('truematrimony-basic-info').style.display = 'none';
document.getElementById('uploadprofile').style.display = 'none';
}

function cancelBasicForm() {
document.getElementById('matrimony-basic-edit-info').style.display = 'none';
document.getElementById('truematrimony-basic-info').style.display = 'inline';
}

function cancelContactForm() {
document.getElementById('matrimony-contact-edit-info').style.display = 'none';
document.getElementById('matrimony-contact-info').style.display = 'inline';
}
