{% extends 'layouts/location.volt' %}
{% block subhead %}
	<div class="col" align="left">
		<h5>
			Огляд локацій
		</h5>
	</div>

{% endblock %}
{% block content %}
	{{ super() }}
	<style>
		.location_tree{
			padding-left: 50px;
		}
		.location{
			margin: 5px 0 0 0;
		}
		.location > span {

			font-size: 12px;
			margin-left: 10px;
			margin-bottom: -14px;
			position: relative;
			bottom: 5px;
			left:12px;
		}

		.location::after:hover {
			color: #484e53;
		}

	</style>
	<link rel="stylesheet" href="../../../../../public/css/location.css">
	<div class="clearfix m-2  text-right ">
		{{ link_to(['for':'action-auth','controller':router.getControllerName(),'action':'form'],'Створити нову локацію',['class':'btn btn-info float-right']) }}
	</div>
	<div class="row justify-content-start navbar navbar-expand-sm navbar-light"
		 style="background-color: #484e53d4; width: 100%;  margin: auto;">
		<div class="col navbar-collapse">
			<ul class="navbar-nav mr-auto">
				{% for item,index in overview.list %}
					<li class="nav-link"><b>{{ item }}</b> - {{ index }}</li>
				{% endfor %}
			</ul>

		</div>
	</div>
	<div class="row">
		<div class="col location_tree">{{ list_tree }}</div>
	</div>
	<nav class="contextMenu">
		<ul>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink">Delate</a>
			</li>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink">Edit</a>
			</li>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink">Save</a>
			</li>
		</ul>
	</nav>
{% endblock %}

{% block footer %}
	{{ super() }}
	<script>
		(function () {
			"use strict";
			document.addEventListener('contextmenu', function (e) {
				console.log(e);
			});
		})();


	</script>
{% endblock %}