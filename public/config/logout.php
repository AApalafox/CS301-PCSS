<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
<script>
	//logout.php
	Cookies.remove('id',{path:'/pcss/public'});
	Cookies.remove('type',{path: '/pcss/public'});
	Cookies.remove('name',{path: '/pcss/public'});
	window.location.replace("../index.php");
</script>
