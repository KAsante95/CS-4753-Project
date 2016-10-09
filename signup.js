function valueEntered() {
	var entry = document.getElementById("state_entry");
	entry.value = entry.value.toUpperCase();
	if(entry.value.length >= 2)
		entry.value = entry.value.substring(0, 2);
}