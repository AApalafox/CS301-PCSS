<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script>
	//logout.php
	if(Cookies.get('id')||Cookies.get('type')){
		Cookies.remove('id');
		Cookies.remove('type');
	}
	window.location.replace("../index.php");
</script>