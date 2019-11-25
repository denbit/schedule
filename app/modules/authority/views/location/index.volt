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

		.visible > ul > li.contextMenuItem {
			padding: .5rem;
			display: flex;
			justify-content: space-between;
			cursor: default;
		}

		.visible > ul > li > a {
			color: #484e53;
			cursor: inherit;

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
		.states {
			display: flex;
			-ms-flex-direction: row;
			flex-direction: row;
			padding: 10px;
			margin-bottom: 0;
			list-style: none;
			flex-wrap: wrap;
			background-color:#b3b3b3;
		}
		.states-hidden{
			max-height: 200px;
			overflow: scroll;
		}
		.state-list-item{
			margin: 2px auto;
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
		<div class="col">
			<h4>Базові країни:</h4>
			<ul class="states states-hidden">
		{% for state in state_names %}
			<li class="btn btn-success btn-sm state-list-item" data-url="{{ url(['for':'action-auth','controller':router.getControllerName(),'action':'index'])~'/'~state.latin_name }}">
				<b>{{ state.latin_name }}</b>
			</li>
		{% endfor %}
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col form_field"></div>
	</div>
	<div class="row">
		<div class="col location_tree">{{ list_tree }}</div>
	</div>

{% endblock %}

{% block footer %}
	<nav id="contextMenu" class="unvisible">
		<ul><span id="data"></span>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink add">Add</a>
			</li>
			<li class="contextMenuItem">
				<a href="#" class="contextMenuItemLink edit">Edit</a>
			</li>
			<li class="contextMenuItem del">
				Delete
			</li>

		</ul>
	</nav>
	{{ super() }}
	<script>
		"use strict";
		var span = document.querySelectorAll('.location-menu');
		var state = 0;
		var baseLocation = '{{ url(['for':'action-auth','controller':router.getControllerName(),'action':''])}}';
		var contextMenu = document.getElementById('contextMenu');
		var uri_data = document.querySelector('#contextMenu #data');
		var active = 'visible';
		var url;
		$(document).ready(function () {

			$('.state-list-item').click(function () {
				location.href = $(this).data('url');
			});
			$(".contextMenuItemLink.edit").click(function (e) {
				var editRequest = $.ajax({
					method:"GET",
					url: $(uri_data).attr('data-edit-uri')
				});
				editRequest.done(function (data,status,xhr) {
					$('.form_field').html(data);
					console.log(status,xhr);
				})
			});

			$(".contextMenuItemLink.del").click(function (e) {
				if (confirm("Ви впевнені, що хочете видалити?")){
					var deleteRequest = $.ajax({
						method:"DELETE",
						url: $(uri_data).attr('data-edit-uri')
					});
					deleteRequest.done(function (data,status,xhr) {
						$('.form_field').html(data);
						console.log(status,xhr);
					})
				}
			});

			$(".contextMenuItemLink.add").click(function (e) {
				var url =  baseLocation+'add/' + $(uri_data).attr('data-child') + '/to/'+$(uri_data).attr('data-category')+'/'+$(uri_data).attr('data-id');
				var addRequest = $.ajax({
					method:"GET",
					url
				});
				addRequest.done(function (data,status,xhr) {
					$('.form_field').html(data);
					$('.form_field #add_form').submit(function (e) {
						e.preventDefault();
console.info(e.target);
						var data = $(e.target).serialize();
						var addRequest = $.ajax({
							method:"POST",
							data: data,
							dataType:"json",
							url: e.target.action
						}).done(console.info);
					});
					console.log(status,xhr);
				})
			});
		});

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
					let child = parent.getAttribute('data-child');
					uri_data.setAttribute('data-edit-uri', $(e.target).parent().data('url'));
					uri_data.setAttribute('data-id',id);
					uri_data.setAttribute('data-category',category);
					uri_data.setAttribute('data-child',child);
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