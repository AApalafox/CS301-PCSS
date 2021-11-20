<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script>
	//logout.php
	if(Cookies.get('id'))
		Cookies.remove('id');
	if(Cookies.get('type'))
		Cookies.remove('type');
	if(Cookies.get('name'))
		Cookies.remove('name');
	
	window.location.replace("../index.php");
</script>
