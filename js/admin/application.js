/*
* Created by Dang Ngoc Giao at giaodn@gmail.com
*/

function toggle_checkbox(form_name, field_name, checked) {
	
	if(!document.forms[form_name])
		return;
	var objCheckBoxes = document.forms[form_name].elements[field_name];
	if(!objCheckBoxes)
		return;
	var countCheckBoxes = objCheckBoxes.length;
	if(!countCheckBoxes)
		objCheckBoxes.checked = checked;
	else
		// set the check value for all check boxes
		for(var i = 0; i < countCheckBoxes; i++)
			objCheckBoxes[i].checked = checked;
	  
}

function create_calendar(id, showsTime, showsOtherMonths) {
	function selected(cal, date) {
	  cal.sel.value = date;
	  cal.callCloseHandler();
	}

	function closeHandler(cal) {
	  cal.hide();
	  _dynarch_popupCalendar = null;
	}

  var el = document.getElementById(id);
  if (_dynarch_popupCalendar != null) {
	_dynarch_popupCalendar.hide();
  } else {
	var cal = new Calendar(1, null, selected, closeHandler);
	if (typeof showsTime == "string") {
	  cal.showsTime = true;
	  cal.time24 = (showsTime == "24");
	}
	if (showsOtherMonths) {
	  cal.showsOtherMonths = true;
	}
	_dynarch_popupCalendar = cal;
	cal.setRange(1900, 2070);
	cal.create();
  }
  _dynarch_popupCalendar.parseDate(el.value);
  _dynarch_popupCalendar.sel = el;
  _dynarch_popupCalendar.showAtElement(el, "Br");

  return false;
}