@extends('layouts.base')

@section('content')
	
<div id="app">
	@{{ message }}
</div>
<hr>
<div id="app-2">
	<span v-bind:title="message">
		Mis primeros pasos con Vue.js
	</span>
</div>
<hr>
<div id="app-3">	
	<p v-if="seen == 1">Hola me estas viendo.</p>
</div>
<hr>
<div id="app-4">
	<ol>
		<li v-for="todo in todos">
			@{{ todo.text }}
		</li>
	</ol>
</div>
	
@endsection

@section('scripts')
<script>
	var app = new Vue({
		el: "#app",
		data:{
			message: "Hola Vue!"
		}
	});

	var app2 = new Vue({
		el: "#app-2",
		data:{
			message: " Introducción a Vue.js"
		}
	});

	var app3 = new Vue({
		el:"#app-3",
		data:{
			seen: 1
		}
	});

	var app4 = new Vue({
		el: "#app-4",
		data: {
			todos: [
				{ text: "Javascript" },
				{ text: "VueJS" },
				{ text: "NodeJS" },
				{ text: "Laravel" },
				
			]
		}
	});
</script>
@endsection