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
		.location {
			margin: 5px 0 0 0;
		}

		.location > span {

			font-size: 14px;
			margin-left: 10px;
			margin-bottom: -14px;
			position: relative;
			bottom: 5px;
			left: 12px;
		}

		.location::after:hover {
			color: #484e53;
		}

		.unvisible {
			display: none;
		}

		.visible {
			display: block;
			position: absolute;
		}

		.visible > ul {
			list-style: none;
			margin: 0;
			padding: .5rem 2rem;
			background: #e2f6ceed;
		}

		.visible > ul > li {

			padding: .5rem;
			display: flex;
			justify-content: space-between;
		}

		.visible > ul > li > a {
			color: #484e53;
		}

		.location_tree > li > button {
			list-style: none;
			color: #484e53;
		!important;
		}

		.location_tree li > button > span {
			color: #80db25;
		}

		.btn-link > ul > li {
			list-style: none;
			color: #484e53;
		}

		.location_tree > li ul > li {
			list-style: none;

		}

		.location_tree > li > ul > li button {
			color: #484e53 !important;
		}

		.location_tree > li {
			list-style: none;
		}
	</style>
	<link rel="stylesheet" href="{{ url('/css/location.css') }}">
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

{% endblock %}

{% block footer %}
	<nav id="contextMenu" class="unvisible">
		<ul><span id="data"></span>
			<li class="contextMenuItem">
				Delete
			</li>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink">Edit</a>
			</li>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink">Save</a>
			</li>
		</ul>
	</nav>
	{{ super() }}
	<script>
		"use strict";
		let span = document.querySelectorAll('.location-menu');
		let state = 0;
		let contextMenu = document.getElementById('contextMenu');
		let active = 'visible';

		function closeMenu() {
			if (state !== 0) {
				state = 0;
				contextMenu.classList.remove(active);
				contextMenu.classList.add('unvisible');
			}
		}

		let spanMount = span.length;
		for (let i = 0; i < spanMount; i++) {
			let spanElement = span[i];
			contextMenuFunc(spanElement);
		}


		function contextMenuFunc(spanElement) {
			spanElement.addEventListener('contextmenu', function (e) {
				if (state !== 1) {
					state = 1;
					const parent = spanElement.parentNode.parentNode;
					let category = parent.getAttribute('data-category');
					let id = parent.getAttribute('data-id');
					let data = document.getElementById('data');
					data.setAttribute('data-uri', '/' + category + '/' + id);

					contextMenu.classList.add(active);
					contextMenu.classList.remove('unvisible');


					let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
					contextMenu.style.top = (e.clientY + (scrollTop) + 5) + 'px';
					contextMenu.style.left = (e.clientX + 5) + 'px';
					e.preventDefault();
				} else closeMenu();

			});
		}

		document.addEventListener('click', function () {
			if (contextMenu.classList.contains(active)) {
				closeMenu();
			}

		})
	</script>
{% endblock %}