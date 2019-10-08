// WIP - https://forum.codeigniter.com/thread-71597.html
/*
// https://github.com/js-cookie/js-cookie
$.ajaxSetup({
  data: {
    csrf_token_name: Cookies.get(csrf_cookie_name)
  }
})
const CSRF = [ "<?= csrf_token() ?>", "<?= csrf_hash() ?>" ];
*/

// Converts media query to boolean
function isMobile() {
	return window.matchMedia("only screen and (max-width: 760px)").matches;
}

/************* FORMS  *************/

function submitValidateCallback(form, url) {
	url = (typeof url !== 'undefined') ?  url : form.action;
	
	$.post(url, $(form).serialize(), function(data, textStatus, req) {
		alert(data);
		alert(textStatus);
	});
	return false;
}

/************* MODALS *************/

// Desktop-only modal - redirects to the URL for mobile
function desktopModal(url, options) {
 	if (isMobile()) {
 		window.location = url;
 		return;
 	}

 	loadModal(url, options);
 }
 
// Requests a URL and displays it in a modal
function loadModal(url, options) {
	// Check for an existing modal
	if (typeof options !== 'undefined' && typeof options.id !== 'undefined') {
		if ($('#' + options.id).length > 0) {
			$('#' + options.id).modal('show');
			return;
		}
	}
	
	// Create a new modal
	var modalId = addModal(options);
	
	// Load URL content into modal body, then open the modal
	$('#' + modalId + ' .modal-body').load(url, function(responseText, textStatus, req) {
		$('#' + modalId).modal();
	});
}

// Inserts a Bootstrap 4 modal into <body> and returns its ID
function addModal(options) {
	// Set defaults
	let defaults = {
		id: 'modal-' + Math.round(Date.now() / 1000),
		class: 'modal-dynamic',
		title: '',
		body: '',
		footer: '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>',
	};
	options = Object.assign({}, defaults, options);

	var template = 
'		<div id="' + options.id + '" class="modal ' + options.class + '" tabindex="-1" role="dialog">' +
'			<div class="modal-dialog" role="document">' +
'				<div class="modal-content">' +
'					<div class="modal-header">' +
'						<h5 class="modal-title">' + options.title + '</h5>' +
'						<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
'							<span aria-hidden="true">&times;</span>' +
'						</button>' +
'					</div>' +
'					<div class="modal-body">' + options.body + '</div>' +
'					<div class="modal-footer">' + options.footer + '</div>' +
'				</div>' +
'			</div>' +
'		</div>';
	
	document.body.insertAdjacentHTML('beforeend', template);
	
	return options.id;
}
