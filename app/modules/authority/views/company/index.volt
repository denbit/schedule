{% extends 'layouts/company.volt' %}
 {% block subhead %}
	 <div class="col" align="left">
		 <h5>Огляд перевізників</h5>
	 </div>
 {% endblock %}
{% block content %}

	{{ super() }}
	<table class="table middle_row">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Address</th>
			<th scope="col">Juducial form</th>
			<th scope="col">User</th>
			<th scope="col">Actions</th>
		</tr>
		</thead>
		<tbody>
		{% if companies is not empty %}
			{% for company in  companies %}
				<tr id="{{ company.id }}">
					<td><input type="checkbox" data-key="{{ company.id }}"> <i>{{ company.id }} {% if company.user  %}- {{ company.user.getLogin() }}{% endif %} </i>
					</td>
					<td>
						{% if company.name  %}{{ company.name }},<br>{% endif %}
						{% if company.cyr_name %}{{ company.cyr_name }},<br>{% endif %}
						{% if company.latin_name %}{{ company.latin_name }}{% endif %}
					</td>
					<td>
						{% if company.address  %}{{ company.address }},<br>{% endif %}
						{% if company.cyr_address %}{{ company.cyr_address }},<br>{% endif %}
						{% if company.latin_address  %}{{ company.latin_address }}{% endif %}
					</td>
					<td>
						{{ company.judicial_form }}
					</td>
					<td>
						{{ link_to(['for':'action-edit',"id": company.id, 'controller':router.getControllerName()] ,'Edit', 'class':"btn btn-outline-primary") }}
						<button class="btn btn-danger">Delete</button>
					</td>
				</tr>
			{% endfor %}
		{% endif %}
		</tbody>
	</table>


{% endblock %}
